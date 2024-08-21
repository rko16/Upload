<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Log;
//model
use App\Models\state;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = state::latest()->get()->where('is_delete', 0);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.state.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.state.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.state.create');
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
          'name' => 'required',
        ]);
        $state = new state();
        $state->name = isset($request->name)?$request->name:'NULL';
        $state->generation = isset($request->generation)?$request->generation:'NULL';
        $state->save();
        if (!empty($state)){
            return redirect()->route('admin.state.index')
            ->with('success','State added successfully!');
        } else{ 
            return redirect()->route('admin.state.index')
            ->with('error','State not added successfully!');
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
        $state = state::where('id', $id)->first();
        return view('admin.state.edit', compact('state'));
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
          'name' => 'required'
        ]);
        $state = state::where('id', $id)->first();
        $state->name = isset($request->name)?$request->name:'NULL';
        $state->generation = isset($request->generation)?$request->generation:'NULL';
        $state->save();
        if (!empty($state)){
            return redirect()->route('admin.state.index')
            ->with('success','State updated successfully!');
        } else{ 
            return redirect()->route('admin.state.index')
            ->with('error','State not updated successfully!');
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
        $state = state::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.state.index')->with('success', 'Dalated Successfully!');
    }
}
