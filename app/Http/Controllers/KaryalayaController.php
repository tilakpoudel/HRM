<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Nirdeshanalaya;
use App\Karyalaya;
use Session;
use DB;

class KaryalayaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {            
        $karyalayas = Karyalaya::all();       
        return view('admin.karyalaya.index')->with(compact('karyalayas'));        
    }
    
    public function create()
    {
        return view('admin.karyalaya.create')->with('ministries',Ministry::where('status',1)->get())
                                             ->with('nirdeshanalayas',Nirdeshanalaya::where('status',1)->get());
    }
    
    public function store(Request $request)
    {               
        $this->validate($request,[
            'ministry_id'=>'required',
            'nirdeshanalaya'=>'required',
            'karyalaya'=>'required'
        ]);

        
        Karyalaya::create([
            'ministry_id'=>$request['ministry_id'],
            'nirdeshanalaya_id'=>$request['nirdeshanalaya'],
            'karyalaya_name'=>$request['karyalaya'],
            'status'=>$request['status']
        ]);

        Session::flash('success','Karyalaya Created Successfully!');

        return redirect()->route('karyalaya.index');
    }

    public function show($id)
    {        
    }

    public function edit($id)
    {      
        $karyalaya= Karyalaya::find($id);                
        $nirdeshanalayas =Nirdeshanalaya::where('status',1)->get();        
        $ministries=Ministry::where('status',1)->get();
        return view('admin.karyalaya.edit')->with(compact('ministries','nirdeshanalayas','karyalaya'));               
    }

    public function update(Request $request, $id)
    {        
        $karyalaya = Karyalaya::find($id);
        $karyalaya->ministry_id= $request->ministry_id;
        $karyalaya->nirdeshanalaya_id= $request->nirdeshanalaya;
        $karyalaya->karyalaya_name= $request->karyalaya;
        $karyalaya->status= $request->status;
        $karyalaya->save();

        Session::flash('success','Karyalaya updated successfully');
        return redirect()->route('karyalaya.index');
    }

    public function destroy($id)
    {
        // Karyalaya::destroy($id);
        // Session::flash('success','Karyalaya Deleted Successfully');
        // return redirect()->route('karyalaya.index');
    }
}
