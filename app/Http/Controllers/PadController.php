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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pad = DB::table('tahas')
            ->join('pads', 'tahas.id', '=', 'pads.taha_id')
            ->select('tahas.taha_name', 'pads.*')
            ->get();

        return view('admin.pad.index')->with('pads',$pad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pad.create')->with('ministries',Ministry::all())
                                        ->with('nirdeshanalayas',Nirdeshanalaya::all())
                                        ->with('karyalayas',Karyalaya::all())
                                        ->with('tahas',Taha::all())
                                        ;
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
        $this->validate($request,[
            'ministry_id'=>'required',
            'nirdeshanalaya'=>'required',
            'karyalaya'=>'required',
            'taha'=>'required',
            'pad'=>'required'
        ]);

        
        Pad::create([
            'ministry_id'=>$request['ministry_id'],
            'nir_id'=>$request['nirdeshanalaya'],
            'kar_id'=>$request['karyalaya'],
            'taha_id'=>$request['taha'],
            'pad_name'=>$request['pad'],

        ]);

        Session::flash('success','Pad Created Successfully!');

        return redirect()->route('pad.index');
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
        $pad = Pad::find($id);
        $taha = Taha::all();
        $karyalaya= Karyalaya::all();
        $nirdeshanalaya =Nirdeshanalaya::all();
        $ministry=Ministry::all();
        return view('admin.pad.edit')->with('nirdeshanalayas',$nirdeshanalaya)
                                        ->with('ministries',$ministry)
                                        ->with('karyalayas',$karyalaya)
                                        ->with('tahas',$taha)
                                        ->with('pad',$pad);
                                               

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
        $pad = Pad::find($id);
        $pad->ministry_id= $request->ministry_id;
        $pad->nir_id= $request->nirdeshanalaya;
        $pad->kar_id= $request->karyalaya;
        $pad->taha_id= $request->taha;
        $pad->pad_name= $request->pad;
        $pad->status= $request->status;
      
        $pad->save();

        Session::flash('success','पद सम्पादन भयो ।');
        return redirect()->route('pad.index');

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
}
