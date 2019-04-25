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
    public function index()
    {        
        return view('admin.employee.index')->with('employees',Employee::all());
    }
    
    public function create()
    {        
        $ministries=Ministry::where('status',1)->get();

        return view('admin.employee.create')->with('ministries',$ministries)
                                        ->with('nirdeshanalayas',Nirdeshanalaya::where('status',1)->get())
                                        ->with('karyalayas',Karyalaya::where('status',1)->get())
                                        ->with('tahas',Taha::where('status',1)->get())
                                        ->with('shrenis',Shreni::where('status',1)->get())
                                        ->with('pads',Pad::where('status',1)->get());                                    
    }

    
    public function store(Request $request)
    {
        
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

        Session::flash('success','Employess Record Successfully!');
        return redirect()->route('employee.index');
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {        
        $employee = Employee::find($id);
        $shrenis = Shreni::where('status',1)->get();
        $pads= Pad::where('status',0)->get();
        // dd($pads);
        $tahas = Taha::where('status',1)->get();
        $karyalayas= Karyalaya::where('status',1)->get();
        $nirdeshanalayas =Nirdeshanalaya::where('status',1)->get();
        $ministries=Ministry::where('status',1)->get();

        return view('admin.employee.edit')->with(compact('nirdeshanalayas','ministries','karyalayas','tahas','pads','shrenis','employee'));
    }
    
    public function update(Request $request, $id)
    {
        Employee::where('id', $id)
                    ->update(['first_name' =>  $request->fname,
                    'middle_name' =>  $request->mname,
                    'last_name' =>  $request->lname,
                    'address' =>  $request->address,
                    'gender' =>  $request->gender,
                    'dob' =>  $request->dob,
                    'father_name' =>  $request->fathername,
                    'grandfather_name' =>  $request->gfname,
                    'spouse_name' =>  $request->hwname,
                    'ministry_id' =>  $request->ministry_id,
                    'nir_id' =>  $request->nirdeshanalaya,
                    'kar_id' =>  $request->lname,
                    'kar_id' =>  $request->karyalaya,
                    'taha_id' =>  $request->taha,
                    'shreni_id' =>  $request->shreni,
                    'pad_id' =>  $request->pad,
                    'hire_date' =>  $request->hdate,
                    'emp_type' =>  $request->emp_type,
                    'emp_status' =>  $request->emp_status,
                    ]);

                    Session::flash('success','पद सम्पादन भयो ।');
                    return redirect()->route('employee.index');
    }
        
    public function destroy($id)
    {
        
    }

    //this method is to perform additional operation on employee
    public function operate($id){

        // $employee = Employee::find($id);
        // $shrenis = Shreni::where('status',1)->get();
        // $pads= Pad::where('status',0)->get();
        // // dd($pads);
        // $tahas = Taha::where('status',1)->get();
        // $karyalayas= Karyalaya::where('status',1)->get();
        // $nirdeshanalayas =Nirdeshanalaya::where('status',1)->get();
        // $ministries=Ministry::where('status',1)->get();

        // return view('admin.employee.operate')->with(compact('nirdeshanalayas','ministries','karyalayas','tahas','pads','shrenis','employee'));


        $oneemployee = DB::table('employees')
        ->join('pads','pads.id','=','employees.pad_id')
        ->join('shrenis','shrenis.id','=','employees.shreni_id')
        ->join('tahas', 'tahas.id', '=', 'employees.taha_id')
        ->join('karyalayas', 'karyalayas.id', '=', 'employees.kar_id')
        ->join('nirdeshanalayas', 'nirdeshanalayas.id', '=', 'employees.nir_id')
        ->join('ministries', 'ministries.id', '=', 'employees.ministry_id')
        ->select('tahas.*','karyalayas.*','nirdeshanalayas.*','ministries.*', 'employees.*','pads.*','shrenis.*')
        ->where('employees.id','=',$id)
        ->get();

        // dd($oneemployee);

        $employee = Employee::find($id);
        $shrenis = Shreni::where('status',1)->get();
        $pads= Pad::where('status',1)->get();
        $tahas = Taha::where('status',1)->get();
        $karyalayas= Karyalaya::where('status',1)->get();
        $nirdeshanalayas =Nirdeshanalaya::where('status',1)->get();
        $ministries=Ministry::where('status',1)->get();

        return view('admin.employee.operate')->with(compact('oneemployee','nirdeshanalayas','ministries','karyalayas','tahas','pads','shrenis','employee'));

        // return view('admin.employee.operate')->with()
    }

    public function storeOperate(Request $request){
        
    }


}
