<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::where('is_delete', 0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', 'admin.contact.action')
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // echo "<pre>";
    //     // print_r($request->all());
    //     // exit();
    //     $data = $request->validate([
    //         'first_name' => 'required|string|max:20',
    //         'last_name' => 'required|string|max:20',
    //         'phone_number' => 'required|string|regex:/^\d{10}$/',
    //         'message' => 'required|string|max:600',
    //         'email' => 'required|email',
    //         'subject' => 'required|string',
    //         'country_code' => 'required',
    //         'g-recaptcha-response' => 'required|recaptcha'
    //     ]);
    //     if ($data) {
    //         $order = Contact::create($data);
    //         return back()->with('success', 'Your message has been sent successfully!');
    //     }else{
    //         return back()->with('error', 'Your message has not been sent successfully!');
    //     }
    // }

    public function store(Request $request)
    {
        // Validate the request data including ReCaptcha
        $data = $request->validate([
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'phone_number' => 'required|string|regex:/^\d{10}$/',
            'message' => 'required|string|max:600',
            'email' => 'required|email',
            'subject' => 'required|string',
            'country_code' => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha'
        ]);

        if ($data) {
            // Save the contact information
            Contact::create($data);
            return back()->with('success', 'Your message has been sent successfully!');
        } else {
            return back()->with('error', 'Your message has not been sent successfully!');
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
        // return "dvddddd";
        $contacts = Contact::where('id',$id)->first();
        return view('admin.contact.show', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::where('id',$id)->first();
        return view('admin.contact.edit', compact('contacts'));
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
        $data = $request->all();
        $order = Contact::find($id);
        if($order){
            $order->update($data);
            return redirect()->route('admin.contact.index')->with('success','Data updated successfully!');
        } else {
            return redirect()->route('admin.contact.index')->with('error','Something went wrong!');
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
        $state = Contact::where('id', $id)->first();
        $state->is_delete = '1';
        $state->save();
        return redirect()->route('admin.contact.index')->with('success', 'Dalated Successfully!');
    }
}
