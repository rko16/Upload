<?php

namespace App\Http\Controllers\subadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolarInqury;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class SubIndexController extends Controller
{
    public function index(){
        $complete = SolarInqury::where('is_quotation',1)->count();
        $cancel = SolarInqury::where('is_ordered',0)->count();
        $pending = SolarInqury::where('is_quotation',0)->count();

        $authid = Auth::user()->id;
        $total = SolarInqury::where('is_ordered',1)
                                ->where('pm_id', $authid)
                                ->count();        
        $daynumber = SolarInqury::where('is_ordered',1)
                                ->where('pm_id', $authid)
                                ->where('created_at', '>=', now()->subDay())
                                ->count();
        $weeknumber = SolarInqury::where('is_ordered',1)
                                ->where('pm_id', $authid)
                                ->where('created_at', '>=', now()->subWeek())
                                ->count();
        $monthnumber = SolarInqury::where('is_ordered',1)
                                ->where('pm_id', $authid)
                                ->where('created_at', '>=', now()->subMonth())
                                ->count();
        $totalamountget = SolarInqury::where('pm_id', $authid)->sum('amount1') + SolarInqury::where('pm_id', $authid)->sum('amount2') + SolarInqury::where('pm_id', $authid)->sum('amount3') + SolarInqury::where('pm_id', $authid)->sum('amount4');
        $advancereceived = SolarInqury::where('pm_id', $authid)->sum('amount1');
        // echo "<pre>";
        // print_r($advancereceived);
        // exit();
        return view('sub-admin.dashboard.index', compact('complete','cancel','pending','total', 'daynumber', 'weeknumber', 'monthnumber', 'totalamountget', 'advancereceived'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
