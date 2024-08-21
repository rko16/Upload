<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Review::where('is_delete',0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($row){
                    $url = asset($row->image);
                    return '<img src="'.$url.'" width="80" height="50"/>';
                })
                ->addColumn('action', 'admin.review.action')
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('admin.review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();
                $request->validate([
            'name' => 'required|max:255',
          'discription' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
            $savePath = public_path('/storage/review');
            $file->move($savePath, $detailPageImgFileName);
            $pname = 'storage/review/' . $detailPageImgFileName;
            $data['image'] = $pname;
        }

        $order = Review::create($data);

        if($order){
            return redirect()->route('admin.review.index')->with('success','Data stored successfully!');
        } else {
            return redirect()->route('admin.review.index')->with('error','Something went wrong!');
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
        $projectdata = Review::where('id',$id)->first();
        return view('admin.review.edit', compact('projectdata'));
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
            'name' => 'required|max:255',
          'discription' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->except('upimage');
        if ($request->hasFile('upimage')) {
            $file = $request->file('upimage');
            $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
            $savePath = public_path('/storage/review');
            $file->move($savePath, $detailPageImgFileName);
            $pname = 'storage/review/' . $detailPageImgFileName;
            $data['image'] = $pname;
        }
        $order = Review::find($id);
        if($order){
            $order->update($data);
            return redirect()->route('admin.review.index')
            ->with('success','Updated successfully!');
        }else{
            return redirect()->route('admin.review.index')
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
        $state = Review::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.review.index')->with('success', 'Dalated Successfully!');
    }
}
