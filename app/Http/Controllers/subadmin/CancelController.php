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

class CancelController extends Controller
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
    //                     ->where('is_complete',0)
    //                     ->latest()
    //                     ->get();
    //         return DataTables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', 'sub-admin.cancel.action')
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     return view('sub-admin.cancel.index');
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
                        ->where(function ($query) {
                                $query->where('is_complete', 0)
                              ->orWhere('is_complete', null);
                        })
                        ->latest()
                        ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'sub-admin.cancel.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('sub-admin.cancel.index');
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
        return view('sub-admin.cancel.show', compact('orders', 'cities', 'states'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = SolarInqury::where('id',$id)->with(['userdata'])->first();
        return view('sub-admin.cancel.edit', compact('orders'));
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
        // echo "<pre>";
        // print_r($request->all());
        // exit();

        $request->validate([
            'proposal_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'surveyphoto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'surveypdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);
        //proposal_img
        if ($request->hasFile('proposal_img')) {
            if ($file = $request->file('proposal_img')) {
                $detailPageImgFileName = 'proposal_img_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/proposal_img');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/proposal_img/' . $detailPageImgFileName;
                $data['proposal_img'] = $pname;
            }
        }
        //surveyphoto
        if ($request->hasFile('surveyphoto')) {
            if ($file = $request->file('surveyphoto')) {
                $detailPageImgFileName = 'surveyphoto_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/surveyphoto');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/surveyphoto/' . $detailPageImgFileName;
                $data['surveyphoto'] = $pname;
            }
        }
        //surveypdf
        if ($request->hasFile('surveypdf')) {
            if ($file = $request->file('surveypdf')) {
                $detailPageImgFileName = 'surveypdf_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/surveypdf');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/surveypdf/' . $detailPageImgFileName;
                $data['surveypdf'] = $pname;
            }
        }
        $updatedata = SolarInqury::where('id', $id)->update($data);

        if ($updatedata) {
            // return "update";
            return redirect()->route('subadmin.cancel.index')
            ->with('success','Updated successfully!');
        } else {
            // return "not";
            return redirect()->route('subadmin.cancel.index')
            ->with('error','Order data not found!');
        }
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
