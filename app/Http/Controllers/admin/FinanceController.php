<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Finance;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Finance::where('is_delete',0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($row){
                    $url = asset($row->image);
                    return '<img src="'.$url.'" width="80" height="50"/>';
                })
                ->addColumn('action', 'admin.finance.action')
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.finance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.finance.create');
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
                $savePath = public_path('/storage/finance');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/finance/' . $detailPageImgFileName;
                $data['image'] = $pname;
            }
        }
        $order = Finance::create($data);
        if ($order) {
            return redirect()->route('admin.finance.index')
                ->with('success', 'Data stored successfully!');
        } else {
            return redirect()->route('admin.finance.index')
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
        $state = Finance::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.finance.index')->with('success', 'Dalated Successfully!');
    }
}
