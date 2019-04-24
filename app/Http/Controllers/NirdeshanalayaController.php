<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Nirdeshanalaya;
use Session;

class NirdeshanalayaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    } 
    
    public function index()
    {        
        $nirdeshanalayas = Nirdeshanalaya::all();        
        return view('admin.nirdeshanalaya.index')->with('nirdeshanalayas',$nirdeshanalayas);
    }

    public function create()
    {        
        $ministries= Ministry::where('status','=',1)->get();
        return view('admin.nirdeshanalaya.create')->with('ministries',$ministries);
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[
            'nirdeshanalaya_name'=>'required',
            'ministry_id'=>'required'
        ]);

        $nirdeshanalaya = new Nirdeshanalaya;
        $nirdeshanalaya->ministry_id = $request['ministry_id'];
        $nirdeshanalaya->nir_name = $request['nirdeshanalaya_name'];
        $nirdeshanalaya->status = $request['status'];
        $nirdeshanalaya->save();
        // Nirdeshanalaya::create([
        //     'ministry_id'=>$request['ministry_id'],
        //     'nir_name'=>$request['nirdeshanalaya_name'],
        //     'status'=>$request['status']
        // ]);
        Session::flash('success','Nirdeshanalaya Created Successfully!');

        return redirect()->route('nirdeshanalaya.index');
    }

    public function show($id)
    {        
    }
    
    public function edit($id)
    {        
        $nirdeshanalaya= Nirdeshanalaya::find($id);
        $ministries=Ministry::all();
        return view('admin.nirdeshanalaya.edit')->with(compact('ministries','nirdeshanalaya','onenirdeshanalaya'));
    }

    public function update(Request $request, $id)
    {
        
        $nirdeshanalaya = Nirdeshanalaya::find($id);
        $nirdeshanalaya->ministry_id= $request->ministry_id;
        $nirdeshanalaya->nir_name= $request->nirdeshanalaya_name;
        $nirdeshanalaya->status= $request->status;
        $nirdeshanalaya->save();

        Session::flash('success','Nirdeshanalaya updated successfully');
        return redirect()->route('nirdeshanalaya.index');
    }

    // public function destroy($id)
    // {        
    //     Nirdeshanalaya::destroy($id);
    //     Session::flash('success','Nirdeshanalaya Deleted Successfully');
    //     return redirect()->route('nirdeshanalaya.index');
    // }
}
