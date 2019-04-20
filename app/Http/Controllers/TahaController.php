<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Nirdeshanalaya;
use App\Karyalaya;
use App\Taha;
use Session;
use DB;

class TahaController extends Controller
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
        $tahas = DB::table('tahas')
            ->join('karyalayas', 'karyalayas.id', '=', 'tahas.kar_id')
            ->join('nirdeshanalayas', 'nirdeshanalayas.id', '=', 'tahas.nir_id')
            ->join('ministries', 'ministries.id', '=', 'tahas.ministry_id')
            ->select('karyalayas.kar_name','nirdeshanalayas.nir_name','ministries.ministry_name', 'tahas.*')
            ->get();


        return view('admin.taha.index')->with(compact('tahas'));


        // $tahas = DB::table('karyalayas')
        //     ->join('tahas', 'karyalayas.id', '=', 'tahas.kar_id')
        //     ->select('karyalayas.kar_name', 'tahas.*')
        //     ->get();

        // return view('admin.taha.index')->with('tahas',$tahas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ministries=Ministry::where('status','=','1')->get();
        $nirdeshanalayas= Nirdeshanalaya::where('status','=','1')->get();
        $karyalayas= Karyalaya::where('status','=','1')->get();
        return view('admin.taha.create')->with(compact('ministries','nirdeshanalayas','karyalayas'));

        // return view('admin.taha.create')->with('ministries',Ministry::where('status','=','1'))
        //                                     ->with('nirdeshanalayas',Nirdeshanalaya::where('status','=','1'))
        //                                     ->with('karyalayas',Karyalaya::where('status','=','1')->get())
        //                                     ;
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
            'taha'=>'required'
        ]);

        
        Taha::create([
            'ministry_id'=>$request['ministry_id'],
            'nir_id'=>$request['nirdeshanalaya'],
            'kar_id'=>$request['karyalaya'],
            'taha_name'=>$request['taha'],
            'status'=>$request['status']

        ]);

        Session::flash('success','Taha Created Successfully!');

        return redirect()->route('taha.index');

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
        $onetaha = DB::table('tahas')
        ->join('karyalayas', 'karyalayas.id', '=', 'tahas.kar_id')
        ->join('nirdeshanalayas', 'nirdeshanalayas.id', '=', 'tahas.nir_id')
        ->join('ministries', 'ministries.id', '=', 'tahas.ministry_id')
        ->select('tahas.*','karyalayas.*','nirdeshanalayas.*','ministries.*', 'tahas.*')
        ->where('tahas.id','=',$id)
        ->get();

        $taha = Taha::find($id);
        $ministries=Ministry::where('status','=','1')->get();
        $nirdeshanalayas= Nirdeshanalaya::where('status','=','1')->get();
        $karyalayas= Karyalaya::where('status','=','1')->get();
        return view('admin.taha.edit')->with(compact('ministries','nirdeshanalayas','karyalayas','taha','onetaha'));

//alternative way 
    //     return view('admin.taha.edit')->with('nirdeshanalayas',$nirdeshanalaya)
    //                                             ->with('ministries',$ministry)
    //                                             ->with('karyalayas',$karyalaya)
    //                                             ->with('taha',$taha)
    //                                            ;
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
        $taha = Taha::find($id);
        $taha->ministry_id= $request->ministry_id;
        $taha->nir_id= $request->nirdeshanalaya;
        $taha->kar_id= $request->karyalaya;
        $taha->taha_name= $request->taha;
        $taha->status= $request->status;

        $taha->save();

        Session::flash('success','Taha updated successfully');
        return redirect()->route('taha.index');
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
        Taha::destroy($id);

        Session::flash('success','Taha Deleted Successfully');

        return redirect()->route('taha.index');
    }
}
