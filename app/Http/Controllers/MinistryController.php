<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use Session;

class MinistryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ministries = Ministry::all();
        return view('admin.ministry.index')->with('ministries',$ministries);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ministry.create');
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
        //dd($request->all());
        $this->validate($request,[
            'ministry_name'=>'required'
        ]);

        
        Ministry::create([
            'ministry_name'=>$request['ministry_name'],
            'status'=>$request['status']
        ]);

        Session::flash('success','Ministry Created Successfully!');

        return redirect()->route('ministry.index');



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
        return view('admin.ministry.edit')->with('ministry',Ministry::find($id));
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
        $ministry = Ministry::find($id);

        $ministry->ministry_name= $request->ministry_name;
        $ministry->status= $request->status;

        $ministry->save();

        Session::flash('success','Ministry updated successfully');
        return redirect()->route('ministry.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ministry::destroy($id);

        Session::flash('success','Ministry Deleted Successfully');

        return redirect()->route('ministry.index');
    }
}
