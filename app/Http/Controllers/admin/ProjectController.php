<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::where('is_delete',0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function($row){
                    $url = asset($row->image);
                    return '<img src="'.$url.'" width="80" height="50"/>';
                })
                ->addColumn('action', 'admin.project.action')
                ->rawColumns(['action','image'])
                ->make(true);
        }
        return view('admin.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
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
        $pname = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
            $savePath = public_path('/storage/project');
            $file->move($savePath, $detailPageImgFileName);
            $pname = 'storage/project/' . $detailPageImgFileName;
            // $data['image'] = $pname;
        }

        $order = new Project();
        $order->image = $pname;
        $order->name = $request->name;
        $order->power = $request->power;
        $order->address = $request->address;
        $order->type = $request->type;
        $order->save();

        if($order){
            return redirect()->route('admin.project.index')->with('success','Data stored successfully!');
        } else {
            return redirect()->route('admin.project.index')->with('error','Something went wrong!');
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
        $projectdata = Project::where('id', $id)->first();
        return view('admin.project.edit', compact('projectdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $pname = null;

        if ($request->hasFile('upimage')) {
            $file = $request->file('upimage');
            if ($file->isValid()) {
                $detailPageImgFileName = 'image_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/project');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/project/' . $detailPageImgFileName;
            } else {
                return redirect()->route('admin.project.index')->with('error', 'Invalid file uploaded.');
            }
        }

        $order = Project::find($id);

        if (!$order) {
            return redirect()->route('admin.project.index')->with('error', 'Project not found.');
        }

        $order->image = $pname ?? $order->image;; // Keep existing image if no new image is uploaded
        $order->name = $request->name;
        $order->power = $request->power;
        $order->address = $request->address;
        $order->type = $request->type;
        $order->save();

        if ($order) {
            return redirect()->route('admin.project.index')->with('success', 'Project updated successfully!');
        } else {
            return redirect()->route('admin.project.index')->with('error', 'Project not updated successfully!');
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
        $state = Project::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.project.index')->with('success', 'Dalated Successfully!');
    }
}
