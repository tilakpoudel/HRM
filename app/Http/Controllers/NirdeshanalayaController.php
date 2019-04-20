<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Nirdeshanalaya;
use Session;
use DB;

class NirdeshanalayaController extends Controller
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
        $nirdeshanalayas = DB::table('ministries')
            ->join('nirdeshanalayas', 'ministries.id', '=', 'nirdeshanalayas.ministry_id')
            ->select('ministries.ministry_name', 'nirdeshanalayas.*')
            ->get();

        return view('admin.nirdeshanalaya.index')->with('nirdeshanalayas',$nirdeshanalayas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nirdeshanalaya.create')->with('ministries',Ministry::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'nirdeshanalaya_name'=>'required',
            'ministry_id'=>'required'
        ]);

        
        Nirdeshanalaya::create([
            'ministry_id'=>$request['ministry_id'],
            'nir_name'=>$request['nirdeshanalaya_name'],
            'status'=>$request['status']

        ]);

        Session::flash('success','Nirdeshanalaya Created Successfully!');

        return redirect()->route('nirdeshanalaya.index');
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
        $onenirdeshanalaya = DB::table('nirdeshanalayas')
        ->join('ministries', 'ministries.id', '=', 'nirdeshanalayas.ministry_id')
        ->select('nirdeshanalayas.*','ministries.*')
        ->where('nirdeshanalayas.id','=',$id)
        ->get();

        $nirdeshanalaya= Nirdeshanalaya::find($id);
        $ministries=Ministry::all();
        return view('admin.nirdeshanalaya.edit')->with(compact('ministries','nirdeshanalaya','onenirdeshanalaya'));


        // return view('admin.nirdeshanalaya.edit')->with('nirdeshanalaya',$nirdeshanalaya)
        //                                         ->with('ministries',$ministry)
        //                                        ;

        // return view('admin.nirdeshanalaya.edit')->with('nirdeshanalaya',Nirdeshanalaya::find($id))
        //                                         ->with('ministries',Ministry::all());

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
        $nirdeshanalaya = Nirdeshanalaya::find($id);
        $nirdeshanalaya->ministry_id= $request->ministry_id;
        $nirdeshanalaya->nir_name= $request->nirdeshanalaya_name;
        $nirdeshanalaya->status= $request->status;

        $nirdeshanalaya->save();

        Session::flash('success','Nirdeshanalaya updated successfully');
        return redirect()->route('nirdeshanalaya.index');

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
        Nirdeshanalaya::destroy($id);

        Session::flash('success','Nirdeshanalaya Deleted Successfully');

        return redirect()->route('nirdeshanalaya.index');
    }
}
