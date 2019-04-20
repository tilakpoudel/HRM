<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shreni;
use Session;

class ShreniController extends Controller
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
        $shrenis = Shreni::all();
        return view('admin.shreni.index')->with('shrenis',$shrenis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.shreni.create');

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
            'shreni_name'=>'required'
        ]);

        
        Shreni::create([
            'shreni_name'=>$request['shreni_name'],
            'status'=>$request['status']
        ]);

        Session::flash('success','Shreni Created Successfully!');

        return redirect()->route('shreni.index');

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
        return view('admin.shreni.edit')->with('shreni',Shreni::find($id));

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
        $shreni = Shreni::find($id);

        $shreni->shreni_name= $request->shreni_name;
        $shreni->status= $request->status;

        $shreni->save();

        Session::flash('success','Shreni updated successfully');
        return redirect()->route('shreni.index');
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
