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
   
    public function index()
    {
        $ministries = Ministry::all();
        return view('admin.ministry.index')->with('ministries',$ministries);

    }
   
    public function create()
    {        
        return view('admin.ministry.create');
    }

    public function store(Request $request)
    {
     
        $this->validate($request,[
            'ministry_name'=>'required'
        ]);
        
        $ministry = new Ministry;
        $ministry->ministry_name = $request['ministry_name'];
        $ministry->status = $request['status'];
        $ministry->save();

        // Ministry::create([
        //     'ministry_name'=>$request['ministry_name'],
        //     'status'=>$request['status']
        // ]);

        Session::flash('success','Ministry Created Successfully!');

        return redirect()->route('ministry.index');
    }

    public function show($id)
    {        
    }

    public function edit($id)
    {        
        return view('admin.ministry.edit')->with('ministry',Ministry::find($id));
    }

    public function update(Request $request, $id)
    {        
        $ministry = Ministry::find($id);

        $ministry->ministry_name= $request->ministry_name;
        $ministry->status= $request->status;

        $ministry->save();

        Session::flash('success','Ministry updated successfully');
        return redirect()->route('ministry.index');

    }

    public function destroy($id)
    {
        // Ministry::destroy($id);

        // Session::flash('success','Ministry Deleted Successfully');

        // return redirect()->route('ministry.index');
    }
}