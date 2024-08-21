<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\FAQ;

class AskQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FAQ::latest()->where('is_delete', 0)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.faq.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
          'question' => 'required|string',
          'answer' => 'required|string',
        ]);
        $data = $request->all();
        $datastore = FAQ::create($data);
        if ($datastore){
            return redirect()->route('admin.askquestion.index')
            ->with('success','Added successfully!');
        } else{ 
            return redirect()->route('admin.askquestion.index')
            ->with('error','Something went wrong!');
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
        $faqdata = FAQ::where('id', $id)->first();
        return view('admin.faq.edit', compact('faqdata'));
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
          'question' => 'required|string',
          'answer' => 'required|string',
        ]);
        $data = $request->all();
        $dataget = FAQ::find($id);
        if ($dataget){
            $dataget->update($data);
            return redirect()->route('admin.askquestion.index')
            ->with('success','Updated successfully!');
        } else{ 
            return redirect()->route('admin.askquestion.index')
            ->with('error','Something went wrong!');
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
        $faqdata = FAQ::where('id', $id)->first();
        $faqdata->is_delete = '1';
        $faqdata->save();
        if($faqdata){
            return redirect()->route('admin.askquestion.index')->with('success', 'Dalated Successfully!');
        }else{
            return redirect()->route('admin.askquestion.index')->with('error', 'Something went wrong!');
        }
    }
}
