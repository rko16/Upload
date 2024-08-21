<?php

namespace App\Http\Controllers\admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model
use App\Models\state;
use App\Models\City;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Area::with(['cities', 'state'])->where('is_delete', 0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.area.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.area.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        $states = state::get();
        return view('admin.area.create', compact('cities', 'states'));
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
          'city_id' => 'required',
          'state_id' => 'required'
        ]);
        $area = new Area();
        $area->name = isset($request->name)?$request->name:'NULL';
        $area->city_id = isset($request->city_id)?$request->city_id:'NULL';
        $area->state_id = isset($request->state_id)?$request->state_id:'NULL';
        $area->save();
        if (!empty($area)){
            return redirect()->route('admin.area.index')
            ->with('success','Area added successfully!');
        } else{ 
            return redirect()->route('admin.area.index')
            ->with('error','Area not added successfully!');
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
        $cities = City::get();
        $states = state::get();
        $data = Area::with(['cities', 'state'])->where('id', $id)->first();
        return view('admin.area.edit', compact('cities', 'states', 'data'));
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
          'city_id' => 'required',
          'state_id' => 'required'
        ]);
        $area = Area::where('id', $id)->first();
        $area->name = isset($request->name)?$request->name:'NULL';
        $area->city_id = isset($request->city_id)?$request->city_id:'NULL';
        $area->state_id = isset($request->state_id)?$request->state_id:'NULL';
        $area->save();
        if (!empty($area)){
            return redirect()->route('admin.area.index')
            ->with('success','Updated successfully!');
        } else{ 
            return redirect()->route('admin.area.index')
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
        $state = Area::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.area.index')->with('success', 'Dalated Successfully!');
    }
}
