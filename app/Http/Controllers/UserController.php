<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
//models
use App\Models\User;
use App\Models\state;
use App\Models\City;
use App\Models\Area;
use App\Models\SolarInqury;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::where('type', 2)->get();
        // $userCounts = [];

        // foreach ($users as $user) {
        //     $count = SolarInqury::where('pm_id', $user->id)->count();
        //     $userCounts[$user->id] = $count;
        // }

        // echo "<pre>";
        // print_r($count);
        // echo "</pre>";
        // exit();
        return view('admin.pm.index');
    }

    public function getdata(Request $request){
            // $data = User::latest()->where('type', 2)->get();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            // exit();
        if ($request->ajax()) {
        $data = User::latest()->where('type', 2)->get();

        foreach ($data as $user) {
            $user->solar_inquiry_count = SolarInqury::where('pm_id', $user->id)->count();
            $user->quotation = SolarInqury::where('is_quotation',1)->where('pm_id', $user->id)->count();
            $user->is_complete = SolarInqury::where('is_complete',0)->where('pm_id', $user->id)->count();

            $user->total_finalamount = SolarInqury::where('pm_id', $user->id)->sum('finalamount');
            $user->amount1 = SolarInqury::where('pm_id', $user->id)->sum('amount1');
        }

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function($row){
                if ($row->status == '0') {
                    $statusBtn = '<button class="btn btn-danger btn-sm status-toggle" data-id="'.$row->id.'" data-status="1">Inactive</button>';
                } else {
                    $statusBtn = '<button class="btn btn-success btn-sm status-toggle" data-id="'.$row->id.'" data-status="0">Active</button>';
                }
                return $statusBtn;
            })
            ->addColumn('solar_inquiry_count', function($row){
                return $row->solar_inquiry_count;
            })
            ->addColumn('quotation', function($row){
                return $row->quotation;
            })
            ->addColumn('is_complete', function($row){
                return $row->is_complete;
            })
            ->addColumn('total_finalamount', function($row){
                return $row->total_finalamount;
            })
            ->addColumn('amount1', function($row){
                return $row->amount1;
            })
            ->addColumn('action', 'admin.pm.action')
            ->rawColumns(['status', 'action'])
            ->make(true);
        }

    }

    public function userdata(Request $request){
        if ($request->ajax()) {
            $data = User::latest()->where('type', 0)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function($row){
                if ($row->status == '0') {
                    $statusBtn = '<button class="btn btn-danger btn-sm status-toggle" data-id="'.$row->id.'" data-status="1">Inactive</button>';
                } else {
                    $statusBtn = '<button class="btn btn-success btn-sm status-toggle" data-id="'.$row->id.'" data-status="0">Active</button>';
                }
                return $statusBtn;
                })
                ->addColumn('action', 'admin.user.action')
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pm.create');
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
          // 'name' => 'required',
          // 'email' => 'required|email|unique:users,email',
          // 'pswd' => 'required',
          // 'type' => 'required'

            'name' => 'required|string|max:255',  // Ensure the name is a string and not too long
    'email' => 'required|email|unique:users,email|max:255',  // Validate email with max length
    'password' => 'required|string',  // Ensure the password is a string with a minimum length
    'type' => 'required',

        ]);
        $users = new User();
        $users->name = isset($request->name)?$request->name:'NULL';
        $users->email = isset($request->email)?$request->email:'NULL';
        $users->password = Hash::make($request->pswd);
        $users->type = isset($request->type)?$request->type:'NULL';
        $users->save();
        if (!empty($users)){
            return redirect()->route('admin.pm.index')
            ->with('success','User added successfully!');
        } else{ 
            return redirect()->route('admin.pm.index')
            ->with('error','User not added successfully!');
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
        $users = User::where('id',$id)->first();
        return view('admin.pm.show', compact('users'));
        // return view('admin.pm.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id',$id)->first();
        return view('admin.pm.edit', compact('users'));
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
          'name' => 'required',
          'email' => 'required|email|unique:users,email',
          'pswd' => 'required',
          'type' => 'required'
        ]);
        $users = User::where('id',$id)->first();
        $users->name = isset($request->name)?$request->name:'NULL';
        $users->email = isset($request->email)?$request->email:'NULL';
        $users->password = Hash::make($request->pswd);
        $users->type = isset($request->type)?$request->type:'NULL';
        $users->save();
        if (!empty($users)){
            return redirect()->route('admin.pm.index')
            ->with('success','Updated successfully!');
        } else{ 
            return redirect()->route('admin.pm.index')
            ->with('error','Not updated successfully!');
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

    public function toggleStatus(Request $request)
    {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return back();
    }
    public function userindex(){
        return view('admin.user.index');
    }

    public function userdetail($id){
        $users = User::where('id',$id)->first();
        return view('admin.user.show', compact('users'));
    }
}
