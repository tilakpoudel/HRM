<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ministry;
use App\Nirdeshanalaya;
use App\Karyalaya;
use App\Taha;
use Session;

class TahaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index()
    {              
        return view('admin.taha.index')->with('tahas',Taha::all());
    }
 
    public function create()
    {        
        $ministries=Ministry::where('status','=','1')->get();
        $nirdeshanalayas= Nirdeshanalaya::where('status','=','1')->get();
        $karyalayas= Karyalaya::where('status','=','1')->get();
        return view('admin.taha.create')->with(compact('ministries','nirdeshanalayas','karyalayas'));             
    }
    
    public function store(Request $request)
    {        
        $this->validate($request,[
            'ministry_id'=>'required',
            'nirdeshanalaya'=>'required',
            'karyalaya'=>'required',
            'taha'=>'required'
        ]);
        
        Taha::create([
            'ministry_id'=>$request['ministry_id'],
            'nirdeshanalaya_id'=>$request['nirdeshanalaya'],
            'karyalaya_id'=>$request['karyalaya'],
            'taha_name'=>$request['taha'],
            'status'=>$request['status']
        ]);

        Session::flash('success','Taha Created Successfully!');
        return redirect()->route('taha.index');
    }

    public function show($id)
    {

    }
    
    public function edit($id)
    {               
        $taha = Taha::find($id);
        $ministries=Ministry::where('status','=','1')->get();
        $nirdeshanalayas= Nirdeshanalaya::where('status','=','1')->get();
        $karyalayas= Karyalaya::where('status','=','1')->get();
        return view('admin.taha.edit')->with(compact('ministries','nirdeshanalayas','karyalayas','taha','onetaha'));
     }

    public function update(Request $request, $id)
    {        
        $taha = Taha::find($id);
        $taha->ministry_id= $request->ministry_id;
        $taha->nirdeshanalaya_id= $request->nirdeshanalaya;
        $taha->karyalaya_id= $request->karyalaya;
        $taha->taha_name= $request->taha;
        $taha->status= $request->status;

        $taha->save();

        Session::flash('success','Taha updated successfully');
        return redirect()->route('taha.index');
    }
   
    // public function destroy($id)
    // {        
        // Taha::destroy($id);
        // Session::flash('success','Taha Deleted Successfully');
        // return redirect()->route('taha.index');
    // }

    //this method dynamically sececlts the data for select

    // function fetch (Request $request){
    //     dd($request);
    //     $select = $request->get('select');
    //     $value = $request->get('value');
    //     $dependent = $request->get('dependent');
    //      $data = DB::table('ministries')
    //             ->where($select,$value)
    //             ->groupBy($dependent)
    //             ->get();
    //     $output = '<option value="">
    //                 Select '.ucfirst($dependent).
    //                 '</option>'; 
    //     foreach($data as $row){
    //         $output .= '<option value="'.$row->dependent.'">'.$row->dependent.'</option>';

    //         }      
    //         echo $output;
    // }

}
