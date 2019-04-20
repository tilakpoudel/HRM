<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Nirdeshanalaya;
use App\Karyalaya;
use App\Taha;
use App\Pad;
use App\Employee;
use App\Shreni;
use Session;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.employee.index')->with('employees',Employee::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ministries=Ministry::all();

        return view('admin.employee.create')->with('ministries',$ministries)
                                        ->with('nirdeshanalayas',Nirdeshanalaya::all())
                                        ->with('karyalayas',Karyalaya::all())
                                        ->with('tahas',Taha::all())
                                        ->with('shrenis',Shreni::all())
                                        ->with('pads',Pad::all())
                                        
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
            'pad'=>'required',
            'fname'=>'required',
            'lname'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'fathername'=>'required',
            'gfname'=>'required',
            'shreni'=>'required',
            'emp_type'=>'required',
            
            
        ]);

        
        Employee::create([
            'first_name'=>$request['fname'],
            'middle_name'=>$request['mname'],
            'last_name'=>$request['lname'],
            'address'=>$request['address'],
            'gender'=>$request['gender'],
            'dob'=>$request['dob'],
            'father_name'=>$request['fathername'],
            'grandfather_name'=>$request['gfname'],
            'spouse_name'=>$request['hwname'],
            'ministry_id'=>$request['ministry_id'],
            'nir_id'=>$request['nirdeshanalaya'],
            'kar_id'=>$request['karyalaya'],
            'taha_id'=>$request['taha'],
            'shreni_id'=>$request['shreni'],
            'pad_id'=>$request['pad'],
            'hire_date'=>$request['hdate'],
            'emp_type'=>$request['emp_type'],
            'emp_status'=>$request['emp_status'],

        ]);

        Session::flash('success','Employess REcord Successfully!');

        return redirect()->route('employee.index');
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
