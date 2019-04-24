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
    
    public function index()
    {        
        $shrenis = Shreni::where('status',1)->get();
        return view('admin.shreni.index')->with('shrenis',$shrenis);
    }
    
    public function create()
    {        
        return view('admin.shreni.create');
    }
    
    public function store(Request $request)
    {        
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

    public function show($id)
    {        
    }
    
    public function edit($id)
    {        
        return view('admin.shreni.edit')->with('shreni',Shreni::find($id));

    }
    
    public function update(Request $request, $id)
    {        
        $shreni = Shreni::find($id);

        $shreni->shreni_name= $request->shreni_name;
        $shreni->status= $request->status;

        $shreni->save();

        Session::flash('success','Shreni updated successfully');
        return redirect()->route('shreni.index');
    }

    
    // public function destroy($id)
    // {        
    // }
}
