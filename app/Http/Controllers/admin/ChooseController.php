<?php

namespace App\Http\Controllers\admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choose;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Choose::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($row){
                    $url = asset($row->image);
                    return '<img src="'.$url.'" width="80" height="50"/>';
                })
                ->addColumn('action', 'admin.choose.action')
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.choose.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.choose.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required|string|max:50'
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($file = $request->file('image')) {
                $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/whychooseusimages');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/whychooseusimages/' . $detailPageImgFileName;
                $data['image'] = $pname;
            }
        }
        $order = Choose::create($data);
        if ($order) {
            return redirect()->route('admin.choose.index')
                ->with('success', 'Data stored successfully!');
        } else {
            return redirect()->route('admin.choose.index')
                ->with('error', 'Data did not store successfully!');
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
        $selecteddata = Choose::where('id', $id)->first();
        return view('admin.choose.edit', compact('selecteddata'));
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
        $request->validate([
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required|string|max:50'
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($file = $request->file('image')) {
                $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/whychooseusimages');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/whychooseusimages/' . $detailPageImgFileName;
                $data['image'] = $pname;
            }
        }
        $order = Choose::find($id);
        if ($order) {
            $order->update($data);
            return redirect()->route('admin.choose.index')
                ->with('success', 'Data stored successfully!');
        } else {
            return redirect()->route('admin.choose.index')
                ->with('error', 'Data did not store successfully!');
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
        $deletedata = Choose::where('id', $id)->delete();
        if($deletedata){
            return redirect()->route('admin.banner.index')->with('success', 'Dalated Successfully!');
        } else {
            return redirect()->route('admin.choose.index')->with('error', 'Something went worng!');
        }
    }
}
