<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\SolarInqury;
use App\Mail\RegisterEmail;
use App\Mail\OrderConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        $reviews = Review::where('is_delete', 0)->get();
        $measurementIddata = User::where('id',1)->first();
        return view('auth.register', compact('reviews', 'measurementIddata'));
    }

    public function getRegister(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        // Store user data and OTP in session
        $otp = rand(100000, 999999);
        Session::put('user', $request->only('name', 'email', 'number', 'password'));
        Session::put('otp', $otp);

        $message = "Your OTP for login with Roofsol is {$otp}. Please use this code within the next 10 minutes to complete your login. Note: Do not share this OTP with anyone. Regards Roofsol Energy.";
        $msisdn = $request->number;

        // Construct the SMS API URL
        $smsApiUrl = "http://sms.bulksmsind.in/v2/sendSMS?";
        $smsParams = [
            'username' => 'rooftext',
            'message' => $message,
            'sendername' => 'ROOFSL',
            'smstype' => 'TRANS',
            'numbers' => $msisdn,
            'apikey' => '768fdfc4-83e3-41ac-8486-94bde2e02040',
        ];

        $smsSent = false;
        $emailSent = false;

        // Send the OTP via SMS using the HTTP client
        $response = Http::get($smsApiUrl, $smsParams);

        // Check the SMS response
        if ($response->successful()) {
            $smsSent = true;
            Log::info("OTP sent via SMS to {$msisdn}");
        } else {
            Log::error('Failed to send OTP via SMS: ' . $response->body());
        }

        $details = ['otp' => $otp];
        $senderid = $request->email;

        // Fetch mail configuration from the database
        $mailConfig = User::where('id', 1)->first();

        if ($mailConfig) {
            // Set mailer configuration dynamically
            Config::set('mail.mailers.smtp.host', $mailConfig->host);
            Config::set('mail.mailers.smtp.username', $mailConfig->username);
            Config::set('mail.mailers.smtp.password', $mailConfig->smtp_pswd);
            Config::set('mail.from.address', $mailConfig->email);

            // Reset the mailer to apply new settings
            app()->forgetInstance('mailer');
            app()->bind('mailer', function ($app) {
                return $app->loadComponent('mail', \Illuminate\Mail\MailServiceProvider::class, 'mailer');
            });

            Log::info("Mail configuration set for {$senderid}");

            // Send the email
            try {
                Mail::to($senderid)->send(new RegisterEmail($details));
                $emailSent = true;
                Log::info("OTP email sent to {$senderid}");
            } catch (\Exception $e) {
                Log::error('Failed to send email: ' . $e->getMessage());
            }
        } else {
            Log::error('Mail configuration not found in the database.');
        }

        // Redirect to OTP form if either SMS or email was sent successfully
        if ($smsSent || $emailSent) {
            return redirect()->route('otp.form')->with('success', 'OTP sent successfully.');
        } else {
            return back()->with('error', 'Failed to send OTP. Please try again later.');
        }
    }





 



    public function otpsend(Request $request)
    {
      $otp = rand(100000, 999999);
        
         $message = "Your OTP for login with Roofsol is {$otp}. Please use this code within the next 10 minutes to complete your login. Note: Do not share this OTP with anyone. Regards Roofsol Energy.";
        $msisdn = $request->phone;

        // Construct the SMS API URL
        $smsApiUrl = "http://sms.bulksmsind.in/v2/sendSMS?";
        $smsParams = [
            'username' => 'rooftext',
            'message' => $message,
            'sendername' => 'ROOFSL',
            'smstype' => 'TRANS',
            'numbers' => $msisdn,
            'apikey' => '768fdfc4-83e3-41ac-8486-94bde2e02040',
        ];

        Session::put('otp', $otp);





        $details = ['otp' => $otp];
        $senderid = $request->email;

        // Fetch mail configuration from the database
        $mailConfig = User::where('id', 1)->first();
$response = Http::get($smsApiUrl, $smsParams);




        if ($mailConfig) {
            // Set mailer configuration dynamically
            Config::set('mail.mailers.smtp.host', $mailConfig->host);
            Config::set('mail.mailers.smtp.username', $mailConfig->username);
            Config::set('mail.mailers.smtp.password', $mailConfig->smtp_pswd);
            Config::set('mail.from.address', $mailConfig->email);

            // Reset the mailer to apply new settings
            app()->forgetInstance('mailer');
            app()->bind('mailer', function ($app) {
                return $app->loadComponent('mail', \Illuminate\Mail\MailServiceProvider::class, 'mailer');
            });

           // Log::info("Mail configuration set for {$senderid}");

            // Send the email
            Mail::to($senderid)->send(new RegisterEmail($details));
        } 

       

        // Send the OTP via SMS using the HTTP client
        

        // Check the SMS response
        if ($response->successful()) {
           return response()->json(['success' => true, 'message' => 'OTP sent successfully!' ,'otp' => $otp]);
        } else {
           return response()->json(['error' => true, 'message' => 'OTP Not sent successfully!']);
        }


        
    }





    public function showOtpForm()
    {
        // Pass additional data if needed
        $measurementIddata = User::where('id', 1)->first();
        return view('auth.otp', compact('measurementIddata'));
    }

    public function verifyOtp(Request $request)
    {
        // Validate the OTP request
        $request->validate([
            'otp' => 'required|string',
        ]);

        // Retrieve the OTP stored in the session
        $sessionOtp = Session::get('otp');
        $inputOtp = $request->otp;

        // Debug: Log both OTPs to see what's being compared
        Log::info('Session OTP: ' . $sessionOtp);
        Log::info('User Input OTP: ' . $inputOtp);

        // Convert both to strings just in case there is a type mismatch
        if ((string)$inputOtp === (string)$sessionOtp) {
            // Retrieve user data from the session
            $userData = Session::get('user');
            
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'number' => $userData['number'],
                'password' => Hash::make($userData['password']),
            ]);

            if (!$user) {
                return back()->with('error', 'User creation failed.');
            }

            // Save additional data to SolarInqury
            $newdata = new SolarInqury();
            $newdata->user_id = $user->id;
            $newdata->user_name = $user->name;
            $newdata->monumber = $user->number;
            $newdata->email = $user->email;
            $newdata->solar_name = time();
            $newdata->is_ordered = '1';
            $newdata->save();

            // Clear session data
            Session::forget('user');
            Session::forget('otp');

            return redirect()->route('userloginpage');
        } else {
            return back()->with('error', 'OTP does not match!');
        }
    }






    public function updateprofile(Request $request, $id){
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'email|max:255',
            'number' => 'nullable|string|max:15',
            'monthly_bill_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rooftop_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('_token');
        if ($request->hasFile('monthly_bill_img')) {
            if ($file = $request->file('monthly_bill_img')) {
                $detailPageImgFileName = 'monthly_bill_img_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/monthly_bill_img');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/monthly_bill_img/' . $detailPageImgFileName;
                $data['monthly_bill_img'] = $pname;
            }
        }
        //rooftop_img
        if ($request->hasFile('rooftop_img')) {
            if ($file = $request->file('rooftop_img')) {
                $detailPageImgFileName = 'rooftop_img_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/rooftop_img');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/rooftop_img/' . $detailPageImgFileName;
                $data['rooftop_img'] = $pname;
            }
        }
        $userdata = SolarInqury::where('id',$id)->update($data);
        if($userdata){
            return redirect()->route('survey-design', ['id' => $id]);
        }else{
            return redirect()->route('userprofile', ['id' => $id])->with('error','Something went wrong!');
        }
    }
}
