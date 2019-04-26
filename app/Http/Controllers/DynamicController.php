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

class DynamicController extends Controller
{
    public function fetch(Request $request){
        $select = $request->get('select');
        $value  = $request->get('value');
        $dependent = $request->get('dependent');
            
        if($dependent == 'nirdeshanalaya_id'){

            $data = Nirdeshanalaya::where('status',1)
                ->where($select,$value)
                ->get();       

            $output = '<option value = ""> Select '.ucfirst($dependent).'</option>';        
            foreach($data as $row){            
                $output .= '<option value = "'.$row->id.'">'.$row->nirdeshanalaya_name.'</option>';
            }

        }else if($dependent == 'karyalaya_id'){
            $data = karyalaya::where('status',1)
                ->where($select,$value)
                ->get();       

            $output = '<option value = ""> Select '.ucfirst($dependent).'</option>';        
            foreach($data as $row){            
                $output .= '<option value = "'.$row->id.'">'.$row->karyalaya_name.'</option>';
            }
        }else if($dependent == 'taha_id'){
            $data = taha::where('status',1)
                ->where($select,$value)
                ->get();                   

            $output = '<option value = ""> Select '.ucfirst($dependent).'</option>';        
            foreach($data as $row){            
                $output .= '<option value = "'.$row->id.'">'.$row->taha_name.'</option>';
            }
        }
        else if($dependent == 'shreni_id'){
            $data = shreni::all();                   

            $output = '<option value = ""> Select '.ucfirst($dependent).'</option>';        
            foreach($data as $row){            
                $output .= '<option value = "'.$row->id.'">'.$row->shreni_name.'</option>';
            }
        }else if($dependent == 'pad_id'){
            $data = pad::where('status',1)
                ->where($select,$value)
                ->get();       

            $output = '<option value = ""> Select '.ucfirst($dependent).'</option>';        
            foreach($data as $row){            
                $output .= '<option value = "'.$row->id.'">'.$row->pad_name.'</option>';
            }
        }
               
        echo $output;
    }
    
}
