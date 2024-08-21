<?php

namespace App\Http\Controllers\admin;


use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::where('is_delete',0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($row){
                    $url = asset($row->image);
                    return '<img src="'.$url.'" width="80" height="50"/>';
                })
                ->addColumn('status', function($row){
                if ($row->is_active == '0') {
                    $statusBtn = '<button class="btn btn-success btn-sm status-toggle" data-id="'.$row->id.'" data-status="1">Active</button>';
                } else {
                    $statusBtn = '<button class="btn btn-danger btn-sm status-toggle" data-id="'.$row->id.'" data-status="0">Inactive</button>';
                }
                return $statusBtn;
                })
                ->addColumn('action', 'admin.banner.action')
                ->rawColumns(['action', 'image', 'status'])
                ->make(true);
        }
        return view('admin.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            if ($file = $request->file('image')) {
                $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/banner');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/banner/' . $detailPageImgFileName;
                $data['image'] = $pname;
            }
        }
        $order = Banner::create($data);
        if ($order) {
            return redirect()->route('admin.banner.index')
                ->with('success', 'Data stored successfully!');
        } else {
            return redirect()->route('admin.banner.index')
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
        $banners = Banner::where('id',$id)->first();
        return view('admin.banner.edit',compact('banners'));
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('upimage');
        if ($request->hasFile('upimage')) {
            if ($file = $request->file('upimage')) {
                $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/banner');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/banner/' . $detailPageImgFileName;
                $data['image'] = $pname;
            }
        }
        $order = Banner::find($id);
        if($order){
            $order->update($data);
            return redirect()->route('admin.banner.index')
            ->with('success','Updated successfully!');
        }else{
            return redirect()->route('admin.banner.index')
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
        $state = Banner::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.banner.index')->with('success', 'Dalated Successfully!');
    }

    public function toggleStatus(Request $request)
    {
        $user = Banner::find($request->id);
        $user->is_active = $request->status;
        $user->save();
        return back();
    }
}
