<?php

namespace App\Http\Controllers\subadmin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//model
use App\Models\Solar;
use App\Models\state;
use App\Models\City;
use App\Models\Area;
use App\Models\User;
use App\Models\Order;
use App\Models\SolarInqury;

class CompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = SolarInqury::with(['userdata'])
    //                     ->where('is_ordered',1)
    //                     ->where('is_visited',1)
    //                     ->where('is_quotation',1)
    //                     ->where('is_complete',1)
    //                     ->latest()
    //                     ->get();
    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', 'sub-admin.complete.action')
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     return view('sub-admin.complete.index');
    // }

    public function index(Request $request)
    {
        $authid = Auth::user()->id;
        if ($request->ajax()) {
            $data = SolarInqury::with(['statedata', 'citydata','userdata'])
                        ->where('pm_id', $authid)
                        ->where('is_ordered',1)
                        ->where('is_visited',1)
                        ->where('is_quotation',1)
                        ->where('is_complete',1)
                        ->latest()
                        ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'sub-admin.complete.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('sub-admin.complete.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = SolarInqury::where('id',$id)->with(['userdata'])->first();
        $cities = City::where('id',$orders->city_id)->first();
        $states = state::where('id',$orders->city_id)->first();
        return view('sub-admin.complete.show', compact('orders', 'cities', 'states'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
