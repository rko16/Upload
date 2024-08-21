<?php

namespace App\Http\Controllers\admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model
use App\Models\state;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = City::with(['states'])->where('is_delete', 0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.city.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = state::get();
        return view('admin.city.create', compact('states'));
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
          'state_id' => 'required'
        ]);
        $cities = new City();
        $cities->name = isset($request->name)?$request->name:'NULL';
        $cities->state_id = isset($request->state_id)?$request->state_id:'NULL';
        $cities->save();
        if (!empty($cities)){
            return redirect()->route('admin.city.index')
            ->with('success','City added successfully!');
        } else{ 
            return redirect()->route('admin.city.index')
            ->with('error','City not added successfully!');
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
        $states = state::get();
        $data = City::with(['states'])->where('id', $id)->first();
        return view('admin.city.edit', compact('data', 'states'));
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
          'state_id' => 'required'
        ]);
        $cities = City::where('id', $id)->first();
        $cities->name = isset($request->name)?$request->name:'NULL';
        $cities->state_id = isset($request->state_id)?$request->state_id:'NULL';
        $cities->save();
        if (!empty($cities)){
            return redirect()->route('admin.city.index')
            ->with('success','Updated successfully!');
        } else{ 
            return redirect()->route('admin.city.index')
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
        $state = City::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.city.index')->with('success', 'Dalated Successfully!');
    }
}
