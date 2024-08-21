<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Models\SolarInqury;
use App\Models\User;
use App\Models\Privacy;
use App\Models\Finance;
use App\Mail\OrderConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index() {
        $auth = Auth::user();
        $orders = SolarInqury::where('user_id', $auth->id)->get();
        if ($orders->isNotEmpty()) {
            return redirect()->route('getorder', ['id' => $orders->first()->id]);
        }
        $orderdata = SolarInqury::where('id', $orders[0]->id)->first();
        if(isset($orderdata)){
            return view('user.dashboard.index', compact('orders', 'orderdata'));
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }



    public function getorder($id){
        $orderdata = SolarInqury::where('id', $id)->first();
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id', $auth->id)->get();
        $measurementIddata = User::where('id',1)->first();
        if (isset($orderdata)) {
            return view('user.dashboard.index', compact('orderdata', 'orders', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }
    public function payment($id){
        // $auth = Auth::User();
        // $orders = SolarInqury::where('user_id',$auth->id)->get();
        $orderdata = SolarInqury::where('id', $id)->first();
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id', $auth->id)->get();
        $measurementIddata = User::where('id',1)->first();
        if (isset($orderdata)) {
                return view('user.dashboard.payment', compact('orders', 'orderdata', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }
    public function finance($id){
        $orderdata = SolarInqury::where('id', $id)->first();
        if(isset($orderdata)){
            $auth = Auth::User();
            $orders = SolarInqury::where('user_id',$auth->id)->get();
            $financedata = Finance::where('is_delete',0)->latest()->take(4)->get();
            $measurementIddata = User::where('id',1)->first();
            return view('user.dashboard.finance', compact('orders', 'financedata', 'orderdata', 'measurementIddata'));
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }
    public function financetab($id){
        $orderdata = SolarInqury::where('user_id', $id)->first();
        if(isset($orderdata)){
            $auth = Auth::User();
            $orders = SolarInqury::where('user_id',$auth->id)->get();
            $financedata = Finance::where('is_delete',0)->latest()->take(4)->get();
            $measurementIddata = User::where('id',1)->first();
            return view('user.dashboard.finance', compact('orders', 'financedata', 'orderdata', 'measurementIddata'));
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }
    public function orm($id){
        // return "orm";
        // $auth = Auth::User();
        // $orders = SolarInqury::where('user_id',$auth->id)->get();
        // $orderdata = SolarInqury::where('id', $auth->id)->first();
        $orderdata = SolarInqury::where('id', $id)->first();
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id', $auth->id)->get();
        $measurementIddata = User::where('id',1)->first();
        if (isset($orderdata)) {
                return view('user.dashboard.orm', compact('orders', 'orderdata', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }
    public function surveydesign($id){
        // return "hhhhh";
        $orderdata = SolarInqury::where('id', $id)->first();
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id',$auth->id)->get();
        $orderIMG = SolarInqury::where('id',$id)->first();
        $measurementIddata = User::where('id',1)->first();
        // echo "<pre>";
        // print_r($orders);
        // exit();
        if (isset($orderdata)) {
        return view('user.surveydesign.index', compact('orderdata', 'orderIMG', 'orders', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }

    public function getorderdesign($id){
        // echo "<pre>";
        // print_r($id);
        // exit();
        $orderdata = SolarInqury::where('id', $id)->first();
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id', $auth->id)->get();
        $measurementIddata = User::where('id',1)->first();
        if (isset($orderdata)) {
            return view('user.surveydesign.index', compact('orderdata', 'orders', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }
    public function proposal($id){
        $orderdata = SolarInqury::where('id', $id)->first();
        $measurementIddata = User::where('id',1)->first();
        if (isset($orderdata)) {
            return view('user.proposal.index', compact('orderdata', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }
    public function proposalremark(Request $request, $id){
        if($request->proposal_remark){
            $request->validate([
                'proposal_remark' => 'required|string|max:500'
            ]);
            $proposal_remark = $request->except('_token');
            if($proposal_remark){
                SolarInqury::where('id',$id)->update($proposal_remark);
            }
        }
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id',$auth->id)->get();
        $orderdata = SolarInqury::where('id', $id)->first();
        return redirect()->route('procurement',['id' => $id]);
        // return view('user.procurement.index', compact('orders', 'orderdata'));
    }
    public function procurement($id){
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id',$auth->id)->get();
        $orderdata = SolarInqury::where('id', $id)->first();
        $measurementIddata = User::where('id',1)->first();
        if (isset($orderdata)) {
        return view('user.procurement.index', compact('orders', 'orderdata', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }

    // public function mail()
    // {
    //     $user = User::first();
    //     $auth = Auth::user()->email;

    //     // Debugging to ensure the email is correctly set
    //     if (!filter_var($auth, FILTER_VALIDATE_EMAIL)) {
    //         return 'Invalid authenticated user email!';
    //     }

    //     // Debugging to ensure the configuration is correctly set
    //     // dd(config('mail.mailers.smtp'));

    //     Mail::to($auth)->send(new RegisterEmail());

    //     return 'Email sent successfully!';
    // }

    public function governmentapproval($id){
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id',$auth->id)->get();
        $orderdata = SolarInqury::where('id', $id)->first();
        $measurementIddata = User::where('id',1)->first();
        // echo "<pre>";
        // print_r($orderdata);
        // exit();
        if (isset($orderdata)) {
            return view('user.government.index', compact('orders', 'orderdata', 'measurementIddata'));
        } else {
            return redirect()->back()->with('error', 'Order not found');
        }
    }

    public function newCreateProject(Request $request) {
        $request->validate([
            'solar_name' => 'required|string|max:100',
            'solarnameRemark' => 'required|string|max:200',
        ]);
        $userID = auth()->id();
        $newdata = new SolarInqury();
        $newdata->user_id = $userID;
        $newdata->solar_name = $request->solar_name;
        $newdata->solarnameRemark = $request->solarnameRemark;
        $newdata->is_ordered = '1';
        $newdata->save();
        if(!empty($newdata)) {
        //     $username = auth()->user()->name;
        //     $projectID = $newdata->id;
        //     $date = $newdata->created_at;

        //     $details = [
        //         'username' => $username,
        //         'projectID' => $projectID,
        //         'date' => $date,
        //     ];

            // $senderid = Auth::user()->email;
            // Mail::to($senderid)->send(new OrderConfirmationEmail($details));//this email will be send to the user

            return redirect()->back()
            ->with('success','dashboard updated successfully!');
        } else {
            return redirect()->back()
            ->with('error', 'Something went wrong!');
        }
    }
    public function timeline(Request $request, $id)
    {
        if($request->timelineRemark){
            $request->validate([
                'timelineRemark' => 'required|string|max:200'
            ]);
            $timelineRemark = $request->except('_token');
            if($timelineRemark){
                SolarInqury::where('id',$id)->update($timelineRemark);
            }
        }
        $auth = Auth::User();
        $orders = SolarInqury::where('user_id',$auth->id)->get();
        $orderdata = SolarInqury::where('id', $id)->first();
        return redirect()->route('governmentapproval',['id' => $id]);
    }//downloadproposal

    public function ormpage(){
        $measurementIddata = User::where('id',1)->first();
        return view('user.ormpage', compact('measurementIddata'));
    }

    public function privacypolicy(){
        $measurementIddata = User::where('id',1)->first();
        $privacydata = Privacy::where('id',1)->first();
        if(isset($measurementIddata) && isset($privacydata)){
            return view('privacypolicy',compact('privacydata', 'measurementIddata'));
        }else{
            return redirect()->back();
        }

        // return "sdfbs";
    }
    public function tnc(){
        $measurementIddata = User::where('id',1)->first();
        $privacydata = Privacy::where('id',2)->first();
        return view('term',compact('privacydata', 'measurementIddata'));
        if(isset($measurementIddata) && isset($privacydata)){
            return view('privacypolicy',compact('privacydata', 'measurementIddata'));
        }else{
            return redirect()->back();
        }
    }

}
