<?php

namespace App\Http\Controllers\admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//models
use App\Models\Solar;
use App\Models\Solar_img;

class SolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Solar::where('is_delete', 0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.solar.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.solar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.solar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'sizeinft' => 'required|integer',
            'sizeinmtr' => 'required|integer',
            'kw' => 'nullable|integer',
            'cost' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);
        $solardata = Solar::create($data);
        if (isset($request->image)) {
            if ($files = $request->file('image')) {
                foreach ($files as $key => $file) {
                    $detailPageImgFileName = 'product_img_' . $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $savePath = public_path('/storage/product_images');
                    $file->move($savePath, $detailPageImgFileName);
                    $pname = 'storage/product_images/' . $detailPageImgFileName;
                    Solar_img::create(['url' => $pname, 'solar_id' => $solardata->id]);
                }
            }
        }
        if ($solardata) {
            return redirect()->route('admin.solar.index')
                ->with('success', 'Solar added successfully!');
        } else {
            return redirect()->route('admin.solar.index')
                ->with('error', 'Solar not added successfully!');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solars = Solar::where('id',$id)->with(['solarimg'])->first();
        return view('admin.solar.edit', compact('solars'));
        // return view('admin.solar.edit');
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
        $data = $request->validate([
            'name' => 'required|string',
            'sizeinft' => 'required|integer',
            'sizeinmtr' => 'required|integer',
            'kw' => 'nullable|integer',
            'cost' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);
        $solardata = Solar::where('id', $id)->first();
        // Update the solar data
        $solardata->update($data);
        if (isset($request->image)) {
            if ($files = $request->file('image')) {
                foreach ($files as $key => $file) {
                    $detailPageImgFileName = 'product_img_' . $key . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $savePath = public_path('/storage/product_images');
                    $file->move($savePath, $detailPageImgFileName);
                    $pname = 'storage/product_images/' . $detailPageImgFileName;
                    Solar_img::create(['url' => $pname, 'solar_id' => $solardata->id]);
                }
            }
        }
        if ($solardata) {
            return redirect()->route('admin.solar.index')
                ->with('success', 'Updated successfully!');
        } else {
            return redirect()->route('admin.solar.index')
                ->with('error', 'Not updated successfully!');
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
        $state = Solar::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.solar.index')->with('success', 'Dalated Successfully!');
    }
    public function imgdlt($id){
        $state = Solar_img::where('id', $id)->delete();
        return redirect()->route('admin.solar.index')->with('success', 'Dalated Successfully!');
    }
}
