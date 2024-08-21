<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Review;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    

    public function userlogin(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $remember = $request->has('rememberme');
        
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            if ($user->type == '1') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->type == '2') {
                return redirect()->route('subadmin.dashboard');
            } elseif ($user->type == '0') {
                return redirect()->route('dashboard');
            }
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    
    public function userloginpage(){
        $measurementIddata = User::where('id',1)->first();
        $reviews = Review::where('is_delete', 0)->get();
        return view('userloginpage', compact('reviews', 'measurementIddata'));
    }

    public function forgetpage(){
        $measurementIddata = User::where('id',1)->first();
        return view('forgetpage', compact('measurementIddata'));
    }

    // public function getforgetuserpassword(Request $request){
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed',
    //         'password_confirmation' => 'required'
    //     ]);

    //      $getuser = User::where('email', $credentials['email'])->first();
    //     if ($getuser) {
    //         $getuser->password = Hash::make($credentials['password']);
    //         $getuser->save();
    //         return redirect()->route('user.login');
    //     } else {
    //         return redirect()->route('forgetpage')->with('error','User not found.');
    //     }
    // }

    public function getforgetuserpassword(Request $request)
    {
        $credentials = $request->validate([
            'number' => 'required|exists:users,number',
            'password' => 'required|confirmed',
        ]);

        $otp = rand(100000, 999999);
        Session::put('user', $request->only('number', 'password'));
        Session::put('otp', $otp);

        $message = "Your OTP for resetting your password with Roofsol is {$otp}. Please use this code within the next 10 minutes to complete your password reset. Note: Do not share this OTP with anyone. Regards Roofsol Energy.";
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

        // Get the user's email associated with the number
        $user = User::where('number', $msisdn)->first();

        if ($user) {
            $senderid = $user->email;

            // Send the email
            try {
                Mail::to($senderid)->send(new RegisterEmail(['otp' => $otp]));
                $emailSent = true;
                Log::info("OTP email sent to {$senderid}");
            } catch (\Exception $e) {
                Log::error('Failed to send email: ' . $e->getMessage());
            }
        }

        // Redirect to OTP form if either SMS or email was sent successfully
        if ($smsSent || $emailSent) {
            return redirect()->route('otp.forgetuserpassword')->with('success', 'OTP sent successfully.');
        } else {
            return back()->with('error', 'Failed to send OTP. Please try again later.');
        }
    }


    public function otpforgetlogin(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

        $sessionOtp = Session::get('otp');
        $inputOtp = $request->otp;

        Log::info('Session OTP: ' . $sessionOtp);
        Log::info('Input OTP: ' . $inputOtp);

        if ((string)$inputOtp === (string)$sessionOtp) {
            $userData = Session::get('user');
            $user = User::where('number', $userData['number'])->first();

            if ($user) {
                Log::info('User found: ' . $user->id);

                $user->password = Hash::make($userData['password']);
                $user->save();

                Session::forget('user');
                Session::forget('otp');

                return redirect()->route('userloginpage')->with('success', 'Password has been reset successfully.');
            } else {
                return back()->with('error', 'User not found.');
            }
        } else {
            return back()->with('error', 'OTP does not match!');
        }
    }


    public function forgetpwdotp()
    {
        $userData = Session::get('user');
        $email = Session::get('email');

       $user = User::where('number', $userData['number'])->first();

      
        $measurementIddata = User::where('id', 1)->first();
        return view('forgetpwdotp', compact('measurementIddata','user','userData'));
    }



}
