<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Service::latest()->where('is_delete',0)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.service.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
            $savePath = public_path('/storage/service');
            $file->move($savePath, $detailPageImgFileName);
            $pname = 'storage/service/' . $detailPageImgFileName;
            $data['image'] = $pname;
        }

        $order = Service::create($data);

        if($order){
            return redirect()->route('admin.service.index')->with('success','Data stored successfully!');
        } else {
            return redirect()->route('admin.service.index')->with('error','Something went wrong!');
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
        $servicedata = Service::where('id',$id)->first();
        return view('admin.service.edit', compact('servicedata'));
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
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
            $savePath = public_path('/storage/service');
            $file->move($savePath, $detailPageImgFileName);
            $pname = 'storage/service/' . $detailPageImgFileName;
            $data['image'] = $pname;
        }

        $order = Service::find($id);
        
        if($order){
            $order->update($data);
            return redirect()->route('admin.service.index')
            ->with('success','Updated successfully!');
        }else{
            return redirect()->route('admin.service.index')
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
        $state = Service::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.service.index')->with('success', 'Dalated Successfully!');
    }
}
