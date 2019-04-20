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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $karyalayas = DB::table('karyalayas')
        ->join('nirdeshanalayas', 'nirdeshanalayas.id', '=', 'karyalayas.nirdeshanalaya_id')
        ->join('ministries', 'ministries.id', '=', 'karyalayas.ministry_id')
        ->select('nirdeshanalayas.nir_name','ministries.ministry_name', 'karyalayas.*')
        ->get();


    return view('admin.karyalaya.index')->with(compact('karyalayas'));


        // $karyalayas = DB::table('nirdeshanalayas')
        //     ->join('karyalayas', 'nirdeshanalayas.id', '=', 'karyalayas.nirdeshanalaya_id')
        //     ->select('nirdeshanalayas.nir_name', 'karyalayas.*')
        //     ->get();

        // return view('admin.karyalaya.index')->with('karyalayas',$karyalayas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.karyalaya.create')->with('ministries',Ministry::all())
                                            ->with('nirdeshanalayas',Nirdeshanalaya::all());
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
        // dd($request->all());
        $this->validate($request,[
            'ministry_id'=>'required',
            'nirdeshanalaya'=>'required',
            'karyalaya'=>'required'
        ]);

        
        Karyalaya::create([
            'ministry_id'=>$request['ministry_id'],
            'nirdeshanalaya_id'=>$request['nirdeshanalaya'],
            'kar_name'=>$request['karyalaya'],
            'status'=>$request['status']


        ]);

        Session::flash('success','Karyalaya Created Successfully!');

        return redirect()->route('karyalaya.index');
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
        $onekaryalaya = DB::table('karyalayas')
        ->join('nirdeshanalayas', 'nirdeshanalayas.id', '=', 'karyalayas.nirdeshanalaya_id')
        ->join('ministries', 'ministries.id', '=', 'karyalayas.ministry_id')
        ->select('nirdeshanalayas.*','ministries.*', 'karyalayas.*')
        ->where('karyalayas.id','=',$id)
        ->get();

        $karyalaya= Karyalaya::find($id);
        $nirdeshanalayas =Nirdeshanalaya::all();
        $ministries=Ministry::all();
        return view('admin.karyalaya.edit')->with(compact('ministries','nirdeshanalayas','karyalaya','onekaryalaya'));

        // return view('admin.karyalaya.edit')->with('nirdeshanalaya',$nirdeshanalaya)
        //                                     ->with('ministries',$ministry)
        //                                     ->with('karyalaya',$karyalaya)
        //                                        ;
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
        $karyalaya = Karyalaya::find($id);
        $karyalaya->ministry_id= $request->ministry_id;
        $karyalaya->nirdeshanalaya_id= $request->nirdeshanalaya;
        $karyalaya->kar_name= $request->karyalaya;
        $karyalaya->status= $request->status;


        $karyalaya->save();

        Session::flash('success','Karyalaya updated successfully');
        return redirect()->route('karyalaya.index');
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
        Karyalaya::destroy($id);

        Session::flash('success','Karyalaya Deleted Successfully');

        return redirect()->route('karyalaya.index');
    }
}
