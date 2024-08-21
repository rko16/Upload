<?php

namespace App\Http\Controllers\admin;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
//model
use App\Models\Solar;
use App\Models\state;
use App\Models\City;
use App\Models\Area;
use App\Models\User;
use App\Models\Order;
use App\Models\SolarInqury;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = SolarInqury::with(['userdata'])->where('is_ordered',1)->latest()->get();
            // $data = SolarInqury::with(['statedata','citydata', 'userdata'])->where('is_ordered',1)->latest()->get();
            $data = SolarInqury::with(['statedata', 'citydata', 'userdata'])
                           ->latest()
                           ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.quotation-visit.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.quotation-visit.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = SolarInqury::where('id',$id)->with(['userdata'])->first();
        $cities = City::where('id',$orders->city_id)->first();
        $states = state::where('id',$orders->city_id)->first();
        $pm = User::where('id',$orders->pm_id)->first();
        $totalamountget = SolarInqury::where('id',$id)->sum('amount1') + SolarInqury::where('id',$id)->sum('amount2') + SolarInqury::where('id',$id)->sum('amount3') + SolarInqury::where('id',$id)->sum('amount4');
        // echo "<pre>";
        // print_r($totalamountget);
        // exit();
        return view('admin.quotation-visit.show', compact('orders', 'cities', 'states', 'pm', 'totalamountget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = SolarInqury::where('id',$id)->with(['userdata'])->first();
        $projectmanagers = User::where('type',2)->where('status',1)->latest()->get();
        // echo "<pre>";
        // print_r($orders);
        // exit();
        return view('admin.quotation-visit.edit', compact('orders', 'projectmanagers'));
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
    //     // echo "<pre>";
    //     // print_r($request->all());
    //     // exit();
    //     $data = $request->except('design_img');

    //     if ($request->hasFile('design_img')) {
    //         $file = $request->file('design_img');
    //         $detailPageImgFileName = 'design_img_' . time() . '.' . $file->getClientOriginalExtension();
    //         $savePath = public_path('/storage/order_design');

    //         // Ensure the directory exists
    //         if (!file_exists($savePath)) {
    //             mkdir($savePath, 0755, true);
    //         }

    //         $file->move($savePath, $detailPageImgFileName);
    //         $pname = 'storage/order_design/' . $detailPageImgFileName;
    //         $data['design_img'] = $pname;
    //     }

    //     // $order = SolarInqury::find($id);
    //     $order = SolarInqury::where('id',$id)->first();
    //     $order->capacity = isset($request->capacity)?$request->capacity:'NULL';
    //     $order->space = isset($request->space)?$request->space:'NULL';
    //     $order->greenEnergy = isset($request->greenEnergy)?$request->greenEnergy:'NULL';
    //     $order->annualSavings = isset($request->annualSavings)?$request->annualSavings:'NULL';
    //     $order->price = isset($request->price)?$request->price:'NULL';
    //     $order->is_visited = isset($request->is_visited)?$request->is_visited:'NULL';
    //     $order->visited_date = $request->visited_date;
    //     $order->is_quotation = isset($request->is_quotation)?$request->is_quotation:'NULL';
    //     $order->quotation_date = $request->quotation_date;
    //     $order->design_plan = isset($request->design_plan)?$request->design_plan:'NULL';
    //     $order->milestone_plan = isset($request->milestone_plan)?$request->milestone_plan:'NULL';
    //     $order->info = isset($request->info)?$request->info:'NULL';
    //     $order->quotation = isset($request->quotation)?$request->quotation:'NULL';
    //     $order->place_date = $request->place_date;
    //     $order->save();
    //     if($order){
    //         $order->update($data);
    //         return redirect()->route('admin.quotationvisit.index')
    //         ->with('success','Updated successfully!');
    //     }else{
    //         return redirect()->route('admin.quotationvisit.index')
    //         ->with('error','Order data not found!');
    //     }
    // }

    public function update(Request $request, $id)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit();

        $request->validate([
            'proposal_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'surveyphoto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'surveypdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);
        //proposal_img
        if ($request->hasFile('proposal_img')) {
            if ($file = $request->file('proposal_img')) {
                $detailPageImgFileName = 'proposal_img_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/proposal_img');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/proposal_img/' . $detailPageImgFileName;
                $data['proposal_img'] = $pname;
            }
        }
        //surveyphoto
        if ($request->hasFile('surveyphoto')) {
            if ($file = $request->file('surveyphoto')) {
                $detailPageImgFileName = 'surveyphoto_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/surveyphoto');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/surveyphoto/' . $detailPageImgFileName;
                $data['surveyphoto'] = $pname;
            }
        }
        //surveypdf
        if ($request->hasFile('surveypdf')) {
            if ($file = $request->file('surveypdf')) {
                $detailPageImgFileName = 'surveypdf_' . time() . '.' . $file->getClientOriginalExtension();
                $savePath = public_path('/storage/surveypdf');
                $file->move($savePath, $detailPageImgFileName);
                $pname = 'storage/surveypdf/' . $detailPageImgFileName;
                $data['surveypdf'] = $pname;
            }
        }
        $updatedata = SolarInqury::where('id', $id)->update($data);

        if ($updatedata) {
            // return "update";
            return redirect()->route('admin.quotationvisit.index')->with('success','Updated successfully!');
        } else {
            // return "not";
            return redirect()->route('admin.quotationvisit.index')->with('error','Order data not found!');
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
        $user = Order::find($request->id);
        $user->is_active = $request->status;
        $user->save();
        return back();
    }

    public function downloadsurveyphoto($id){
        $photo = SolarInqury::find($id);

        if ($photo && $photo->surveyphoto) {
            $filePath = public_path($photo->surveyphoto);

            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } else {
            return abort(404, 'Photo not found.');
        }
    }
    public function downloadsurveypdf($id){
        $photo = SolarInqury::find($id);

        if ($photo && $photo->surveypdf) {
            $filePath = public_path($photo->surveypdf);

            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } else {
            return abort(404, 'Photo not found.');
        }
    }
    //downloadproposal
    public function downloadproposal($id){
        $photo = SolarInqury::find($id);

        if ($photo && $photo->proposal_img) {
            $filePath = public_path($photo->proposal_img);

            if (file_exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found.');
            }
        } else {
            return abort(404, 'Photo not found.');
        }
    }
}
