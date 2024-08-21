<?php

namespace App\Http\Controllers\admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolarInqury;

class AdminInqueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return "fvnvnf";
        if ($request->ajax()) {
            $data = SolarInqury::with(['userdata', 'statename'])->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.inquery.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.inquery.index');
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
        $solarInqurydata = SolarInqury::with(['userdata', 'statename'])->where('id', $id)->first();
        return view('admin.inquery.show', compact('solarInqurydata'));
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
        $solarInqurydata = SolarInqury::where('id', $id)->delete();
        if($solarInqurydata){
            return redirect()->route('admin.inqueryAdmin.index')->with('success', 'Dalated Successfully!');
        }else{
            return redirect()->route('admin.inqueryAdmin.index')->with('error', 'Something went worng!');
        }
    }
}
