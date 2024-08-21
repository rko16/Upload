<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SolarInqury;
use App\Models\User;
use App\Models\Order;
use App\Models\City;

class IndexController extends Controller
{
    public function index(){
        $inactiveuser = User::where('status',0)->where('type',0)->count();
        $activeuser = User::where('status',1)->where('type',0)->count();
        $inactiveprojectmanager = User::where('status',0)->where('type',2)->count();
        $activeprojectmanager = User::where('status',1)->where('type',2)->count();
        $complete = SolarInqury::where('is_quotation',1)->count();
        $cancel = SolarInqury::where('is_ordered',0)->count();
        $pending = SolarInqury::where('is_quotation',0)->count();
        $total = SolarInqury::where('is_ordered',1)->count();

        $daynumber = SolarInqury::where('created_at', '>=', now()->subDay())->count();
        $weeknumber = SolarInqury::where('created_at', '>=', now()->subWeek())->count();
        $monthnumber = SolarInqury::where('created_at', '>=', now()->subMonth())->count();

        $converted = SolarInqury::where('is_procurementOngoing',1)->count();

        $rejected = SolarInqury::where('is_complete',1)->count();

        $totalamountget = SolarInqury::sum('amount1') + SolarInqury::sum('amount2') + SolarInqury::sum('amount3') + SolarInqury::sum('amount4');

        $advancereceived = SolarInqury::sum('amount1');

        $citydata = City::where('is_delete',0)->get();

        // echo "<pre>";
        // print_r($citydata);
        // exit();
        return view('admin.dashboard.index',compact('inactiveuser', 'activeuser', 'inactiveprojectmanager', 'activeprojectmanager', 'complete','cancel', 'pending', 'total', 'daynumber', 'weeknumber', 'monthnumber', 'converted', 'rejected', 'totalamountget', 'advancereceived', 'citydata'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function cityAmount($id){
        // return "City ID: " . $id; // Just a test response for now
        $inactiveuser = User::where('status',0)->where('type',0)->count();
        $activeuser = User::where('status',1)->where('type',0)->count();
        $inactiveprojectmanager = User::where('status',0)->where('type',2)->count();
        $activeprojectmanager = User::where('status',1)->where('type',2)->count();
        $complete = SolarInqury::where('is_quotation',1)->count();
        $cancel = SolarInqury::where('is_ordered',0)->count();
        $pending = SolarInqury::where('is_quotation',0)->count();
        $total = SolarInqury::where('is_ordered',1)->count();

        $daynumber = SolarInqury::where('created_at', '>=', now()->subDay())->count();
        $weeknumber = SolarInqury::where('created_at', '>=', now()->subWeek())->count();
        $monthnumber = SolarInqury::where('created_at', '>=', now()->subMonth())->count();

        $converted = SolarInqury::where('is_procurementOngoing',1)->count();

        $rejected = SolarInqury::where('is_complete',1)->count();

        $totalamountget = SolarInqury::where('city_id',$id)->sum('amount1') + 
                            SolarInqury::where('city_id',$id)->sum('amount2') + 
                            SolarInqury::where('city_id',$id)->sum('amount3') + 
                            SolarInqury::where('city_id',$id)->sum('amount4');

        $advancereceived = SolarInqury::where('city_id',$id)->sum('amount1');

        $citydata = City::where('is_delete',0)->get();

        // echo "<pre>";
        // print_r($citydata);
        // exit();
        return view('admin.dashboard.index',compact('inactiveuser', 'activeuser', 'inactiveprojectmanager', 'activeprojectmanager', 'complete','cancel', 'pending', 'total', 'daynumber', 'weeknumber', 'monthnumber', 'converted', 'rejected', 'totalamountget', 'advancereceived', 'citydata'));
    }

}
