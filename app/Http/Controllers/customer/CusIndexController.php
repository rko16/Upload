<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\FAQ;
use App\Models\Project;
use App\Models\Review;
use App\Models\Service;
use App\Models\Banner;
use App\Models\Area;
use App\Models\City;
use App\Models\state;
use App\Models\User;
use App\Models\SolarInqury;
use App\Models\UserMessageEnquiry;
use App\Mail\OrderConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\Choose;

class CusIndexController extends Controller
{
    public function index(){
        $residentialprojects = Project::latest()->where('is_delete', 0)
                                                ->where('type',1)
                                                ->take(4)->get();
        $commercialprojects = Project::latest()->where('is_delete', 0)
                                                ->where('type',2)
                                                ->take(4)->get();
        $reviews = Review::latest()->where('is_delete', 0)->get();
        $banners = Banner::latest()->where('is_delete',0)->where('is_active', 0)->get();
        $services = Service::latest()->orderBy('created_at', 'desc')->take(2)
                                                ->where('is_delete', 0)->get();
        $projects = Project::latest()->get();
        $capacity = '';
        $auth = Auth::User();

        $measurementIddata = User::where('id',1)->first();
        $states = state::latest()->where('is_delete',0)->get();
        $choosedata = Choose::latest()->take(8)->get();
        return view('welcome', compact('states', 'auth', 'capacity', 'banners', 'services', 'residentialprojects', 'commercialprojects', 'reviews', 'measurementIddata', 'choosedata'));
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }


    public function services() {
        $measurementIddata = User::where('id',1)->first();
        $services = Service::orderBy('created_at', 'desc')->where('is_delete', 0)->get();
        return view('services', compact('services', 'measurementIddata'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }

    public function profile($id)
    {
        $cities = City::where('is_delete', 0)->get();
        $states = State::where('is_delete', 0)->get();
        $auth = Auth::user();
        if (!$auth) {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }
        $orders = SolarInqury::where('user_id', $auth->id)->get();
        $orderdata = SolarInqury::where('id', $id)->first();
        if (!isset($orderdata)) {
            // return redirect()->route('profile', ['id' => $auth->id])->with('error', 'Order not found.');
            return redirect()->back()->with('error', 'Order not found');
        }
        $measurementIddata = User::where('id',1)->first();

        return view('user.profile.index', compact('cities', 'states', 'orders', 'orderdata', 'measurementIddata'));
    }


    public function myorders(){
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id',$auth->id)->get();
        return view('myorders', compact('orders'));
    }

    public function plan($id){
        return "fdsvvadf";
    }

    public function editprofile(){
        return view('editprofile');
    }

    public function calculate(Request $request){
        $user = $request->customerdetail;
        $auth = Auth::user();
        $states = State::where('is_delete', 0)->get();

        $request->validate([
            'monthlyBill' => 'required|numeric',
            'electricityCost' => 'required|numeric',
            'generation' => 'required|numeric',
        ]);

        $monthlyBill = $request->monthlyBill;
        $electricityCost = $request->electricityCost;
        $generation = $request->generation;

        $capacity = round((($monthlyBill / $electricityCost) * 12) / $generation);
        $capacityA = (($monthlyBill / $electricityCost) * 12) / $generation;
        $space = round($capacityA * 90);
        $greenEnergy = round($capacityA * $generation);
        $annualSavings = round($capacityA * $generation * $electricityCost);
        $price = round($capacityA * 65000);
        if($capacityA > 0 && $capacityA <= 2){
            $subsidyamount = round($capacityA*30000);
        } elseif($capacityA > 2 && $capacityA <= 3){
            $subsidyamount = round($capacityA*48000);
        } elseif($capacityA > 3){
            $subsidyamount = round($capacityA*78000);
        }else {
            $subsidyamount = "Can't define";
        }

        if($user){
            $existingCalculation = SolarInqury::where('user_id', $user)
                ->where('monthlyBill', $monthlyBill)
                ->where('electricityCost', $electricityCost)
                ->where('generation', $generation)
                ->where('is_ordered', 0)
                ->first();

            // if (!$existingCalculation) {
            //     $details = new SolarInqury();
            //     $details->user_id = $request->customerdetail;
            //     $details->monthlyBill = $monthlyBill;
            //     $details->electricityCost = $electricityCost;
            //     $details->generation = $generation;
            //     $details->capacity = $capacity;
            //     $details->space = $space;
            //     $details->greenEnergy = $greenEnergy;
            //     $details->annualSavings = $annualSavings;
            //     $details->price = $price;
            //     $details->save();
            // }
            return response()->json([
                'capacity' => $capacity,
                'space' => $space,
                'greenEnergy' => $greenEnergy,
                'annualSavings' => $annualSavings,
                'price' => $price,
                'subsidyamount' => $subsidyamount
            ]);
        }else{
            return response()->json([
                'capacity' => $capacity,
                'space' => $space,
                'greenEnergy' => $greenEnergy,
                'annualSavings' => $annualSavings,
                'price' => $price,
                'subsidyamount' => $subsidyamount
            ]);
        }
    }

    public function order($id){
        $auth = Auth::User();
        $authID = Auth::user()->email;
        $date = Carbon::today()->toDateString();
        $orderInquiry = SolarInqury::where('id',$id)->where('user_id',$auth->id)->first();
        $orderInquiry->is_ordered = 1;
        $orderInquiry->order_date = $date;
        $orderInquiry->save();
        if($orderInquiry){
            if (!filter_var($authID, FILTER_VALIDATE_EMAIL)) {
                return 'Invalid authIDenticated user email!';
            }
            $customername = $auth->name;
            $projectID = $orderInquiry->id;
            $customeradd = $auth->add5;
            $projectcap = $orderInquiry->capacity;
            $date = now();
            Mail::to($authID)->send(new OrderConfirmationEmail($date, $customername, $projectID, $customeradd, $projectcap));
            return "send";
        }
        return back();
    }

    public function myaddresses(){
        $user = Auth::User();
        $state = state::where('id',$user->add3)->first();
        $city = City::where('id',$user->add4)->first();
        $area = Area::where('id',$user->add6)->first();
        return view('myaddresses', compact('city', 'state', 'area'));
    }

    public function editaddress(){
        $areas = Area::get();
        $cities = City::get();
        $states = state::get();
        return view('editaddress', compact('areas', 'cities', 'states'));
        // return view('editaddress');
    }

    public function addresses(Request $request){
        $data = $request->except('_token');
        $auth = Auth::User();
        $userdata = User::where('id',$auth->id)->update($data);
        if($userdata){
            return redirect()->route('myaddresses')->with('success','Data stored successfully!');
        }else{
            return redirect()->route('myaddresses')->with('error','Something went wrong!');
        }
    }

    public function deleteadd(){
        // return "ascb";
        $authdata = Auth::User();

        $authdata->add1 = null;
        $authdata->add2 = null;
        $authdata->add3 = null;
        $authdata->add4 = null;
        $authdata->add5 = null;
        $authdata->add6 = null;
        $authdata->pincode = null;
        $authdata->addtype = null;
        $authdata->save();
        if($authdata){
            return redirect()->route('myaddresses')->with('success','Data deleted successfully!');
        }else{
            return redirect()->route('myaddresses')->with('error','Something went wrong!');
        }
    }

    public function mysocialaccounts(){
        return view('mysocialaccounts');
    }

    public function socialaccounts(Request $request){
        echo "<pre>";
        print_r($request->all());
        $request->validate([
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
            'twitter' => 'nullable|string',
            'utube' => 'nullable|string',
        ]);

        $socialLinks = $request->only(['facebook', 'linkedin', 'instagram', 'twitter', 'utube']);

        if (count(array_filter($socialLinks)) === 0) {
            return redirect()->back()->with(['error' => 'At least one social link must be provided.']);
        }

        $data = $request->except('_token');
        $auth = Auth::User();
        $userdata = User::where('id',$auth->id)->update($data);
        if($userdata){
            return redirect()->back()->with('success','Account data update successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }
    public function myenquiries(){
        $auth = Auth::User();
        $enquiries = UserMessageEnquiry::where('user_id',$auth->id)->get();
        // echo "<pre>";
        // print_r($enquiries);
        // exit();
        return view('myenquiries', compact('enquiries'));
    }
    public function userenquiries(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        $request->validate(['message' => 'string|max:50|required']);
        $date = Carbon::today()->toDateString();
        $auth = Auth::User()->id;
        $data = $request->message;
        $enquiry = new UserMessageEnquiry();
        $enquiry->user_id = $auth;
        $enquiry->date = $date;
        $enquiry->message = $data;
        $enquiry->save();
        if($enquiry){
            return redirect()->back()->with('success','Send successfully!');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }
    public function faqs(){
        $measurementIddata = User::where('id',1)->first();
        $faqdata = FAQ::latest()->where('is_delete',0)->get();
        return view('faqs', compact('faqdata', 'measurementIddata'));
    }
}
