<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Nirdeshanalaya;
use App\Karyalaya;
use App\Taha;
use App\Pad;
use Session;
use DB;

class PadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {                       
        return view('admin.pad.index')->with('pads',Pad::all());
    }
    
    public function create()
    {        
        return view('admin.pad.create')->with('ministries',Ministry::where('status',1)->get())
                                        ->with('nirdeshanalayas',Nirdeshanalaya::where('status',1)->get())
                                        ->with('karyalayas',Karyalaya::where('status',1)->get())
                                        ->with('tahas',Taha::where('status',1)->get());
    }
    
    public function store(Request $request)
    {        
        $this->validate($request,[
            'ministry_id'=>'required',
            'nirdeshanalaya'=>'required',
            'karyalaya'=>'required',
            'taha'=>'required',
            'pad'=>'required'
        ]);

        
        Pad::create([
            'ministry_id'=>$request['ministry_id'],
            'nirdeshanalaya_id'=>$request['nirdeshanalaya'],
            'karyalaya_id'=>$request['karyalaya'],
            'taha_id'=>$request['taha'],
            'pad_name'=>$request['pad'],

        ]);

        Session::flash('success','Pad Created Successfully!');
        return redirect()->route('pad.index');
    }
  
    public function show($id)
    {        
    }
    
    public function edit($id)
    {               
        $pad = Pad::find($id);    
        $tahas = Taha::where('status',1)->get();
        $karyalayas= Karyalaya::where('status',1)->get();
        $nirdeshanalayas =Nirdeshanalaya::where('status',1)->get();
        $ministries=Ministry::where('status',1)->get();

        return view('admin.pad.edit')->with(compact('nirdeshanalayas','ministries','karyalayas','tahas','pad'));        
    }
    
    public function update(Request $request, $id)
    {

        $pad = Pad::find($id);
        $pad->ministry_id= $request->ministry_id;
        $pad->nirdeshanalaya_id= $request->nirdeshanalaya;
        $pad->karyalaya_id= $request->karyalaya;
        $pad->taha_id= $request->taha;
        $pad->pad_name= $request->pad;
        $pad->status= $request->status;      
        $pad->save();

        Session::flash('success','पद सम्पादन भयो ।');
        return redirect()->route('pad.index');

    }

    // public function destroy($id)
    // {        
    // }
}
