<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('id',1)->first();
        return view('admin.settings.index', compact('data'));
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
        $request->validate([
            'email' => 'sometimes|email|unique:users',
            'host' => 'sometimes',
            'username' => 'sometimes',
            'smtp_pswd' => 'sometimes',
        ]);
        $userID = Auth::User()->id;
        $data = User::where('id', $userID)->first();
        $data->email = isset($request->email)?$request->email:'NULL';
        $data->host = isset($request->host)?$request->host:'NULL';
        $data->username = isset($request->username)?$request->username:'NULL';
        $data->smtp_pswd = isset($request->smtp_pswd)?$request->smtp_pswd:'NULL';
        $data->save();
        
        if(!empty($data)){
            return redirect()->route('admin.settings.index')->with('success','Updated successfully!');
        }else{
            return redirect()->route('admin.settings.index')->with('error','Something went wrong');
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

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'email' => 'sometimes|unique:users,email,'.$id
    //     ]);

    //     $data = User::where('id', $id)->first();

    //     if ($request->has('email')) {
    //         $data->email = $request->email;
    //     }
        
    //     $data->host = $request->host ?? 'NULL';
    //     $data->username = $request->username ?? 'NULL';
    //     $data->smtp_pswd = $request->smtp_pswd ?? 'NULL';
    //     $data->measurementId = $request->measurementId ?? '';
    //     $data->save();

    //     if ($data) {
    //         return redirect()->route('admin.settings.index')->with('success', 'Updated successfully!');
    //     } else {
    //         return redirect()->route('admin.settings.index')->with('error', 'Something went wrong');
    //     }
    // }

    public function update(Request $request, $id)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();
        $request->validate([
            'number' =>'sometimes|unique:users,number,'.$id,
            'email' => 'sometimes|unique:users,email,'.$id
        ]);

        $data = $request->except(['_token', '_method']);
        $updatedata = User::where('id', $id)->update($data);

        if ($updatedata) {
            return redirect()->route('admin.settings.index')->with('success', 'Updated successfully!');
        } else {
            return redirect()->route('admin.settings.index')->with('error', 'Something went wrong');
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
