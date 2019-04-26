@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">
                    {{$error}}
                </li>
            @endforeach
        </ul>

        
    @endif

   
    <div class="card card-default">
        <div class="card-header" style="font-size:20px;">
            कर्मचारि बिबरण परिवर्तन गर्नुहोस्
            <a href="#" class="btn btn-md btn-info" type ="button" onclick="asd(1)" id="insert" style="float:right;">पदोन्नति(Upgrade)</a>
            <a href="#" type ="button" class="btn btn-md btn-success" onclick="asd(0)" id="insert" style="float:right;">सेवानिवृत्त(Leave)</a>
    
            

        </div>

        <div class="card-body" style="font-size:20px;">

        <form id="upgrade" action="">
                <div class="row">
                        <span class="badge badge-warning" style="font-size:20px;">कर्मचारि पदोन्नति बिबरण परिवर्तन गर्नुहोस्</span>

                </div>
                <div class="row">
                        <div class="form-group col-md-4" >
                            
                                <label for="name">मन्तरालय चयन गर्नुहोस्:</label>
                                <select name="ministry_id" id="ministry" class="form-control">
                                    @foreach ($ministries as $ministry)
                                        @if($employee->ministry->id == $ministry->id)
                                            <option selected value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                                                
                                        @else
                                            <option value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                                                
                                        @endif
                                    @endforeach
                                </select>
                                    
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label for="name">निर्देशनालय चयन गर्नुहोस्:</label>
                                        <select name="nirdeshanalaya" id="nirdeshanalaya" class="form-control">                                            
                                                @foreach ($nirdeshanalayas as $nirdeshanalaya)
                                                    @if($employee->nirdeshanalayas_id == $nirdeshanalaya->id)
                                                        <option selected value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->name}}</option>                                                
                                                    @else
                                                        <option value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->name}}</option>                                                
                                                    @endif
                                                @endforeach
                                            </select> 
                                            
                                    </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label for="name">कार्यालय चयन गर्नुहोस्</label>
                                        <select name="karyalaya" id="karyalaya" class="form-control">                                            
                                                @foreach ($karyalayas as $karyalaya)
                                                    @if($karyalaya->id == $employee->karyalaya_id)
                                                        <option selected value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                                                
                                                    @else
                                                        <option value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                                                
                                                    @endif
                                                @endforeach
                                            </select>
                                            
                                    </div>
                        </div>
                    </div>

                    <div class="row">
                                    
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="name">तह चयन गर्नुहोस्</label>
                                            <select name="taha" id="taha" class="form-control">                                         
                                                    @foreach ($tahas as $taha)
                                                        @if ($taha->id == $employee->taha_id)
                                                            <option selected value="{{$taha->id}}">{{$taha->taha_name}}</option>                                                    
                                                        @else
                                                            <option value="{{$taha->id}}">{{$taha->taha_name}}</option>                                                
                                                        @endif                                                                                           
                                                    @endforeach
                                                </select>
                                                
                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="name">श्रेणी चयन गर्नुहोस्</label>
                                            <select name="shreni" id="shreni" class="form-control">                                            
                                                    @foreach ($shrenis as $shreni)
                                                        @if($shreni->id == $employee->shreni_id)
                                                            <option selected value="{{$shreni->id}}">{{$shreni->shreni_name}}</option>
                                                        @else
                                                            <option value="{{$shreni->id}}">{{$shreni->shreni_name}}</option>
                                                        @endif                                                
                                                    @endforeach
                                                </select> 
                                                
                                    </div>
                            </div>
                        
                        <div class="col-md-4">
                                <div class="form-group">
                                        <label for="name">पद चयन गर्नुहोस्</label>
                                        <select name="pad" id="pad" class="form-control">                                            
                                                @foreach ($pads as $pad)
                                                    @if($pad->id == $employee->pad_id)
                                                        <option selected value="{{$pad->id}}">{{$pad->pad_name}}</option>                                                
                                                    @else 
                                                        <option value="{{$pad->id}}">{{$pad->pad_name}}</option>                                                
                                                    @endif
                                                @endforeach
                                            </select>
                                            
                                </div>
                        </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-md-4">
                                <label for="name">पदोन्नति गरिएको मिति</label>
                                        
                                <input class="form-control"value="{{$employee->hire_date}}" type="date" name="hdate" id="hdate">
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="name">कर्मचारिको पर्कार</label>
                                            {{-- <option value="{{$employee->emp_type}}">{{$employee->emp_type}}</option> --}}

                                            <select name="emp_type" id="emp_type" class="form-control">
                                                  
                                                <option value="k">काज</option>
                                                <option value="p">पदस्थापन</option>
                                                <option value="n">नयाँ</option>

                                                  
                                            </select>
                                                
                                    </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="name">स्थिति:</label>
                                            <select name="emp_status" id="emp_status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                                
                                    </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-lg btn-success" type="submit" style="float:left">सुरक्षित गर्नुहोस्</button>
                                </div>
                            </div>
                        </div>
                        <hr> 
   
                    

        </form>

        <form id="leave" action="">
                <h1>HII insert some data for leave </h1>
        </form>
      
      <script type="text/javascript">
      
        window.onload = function() {
      
          document.getElementById("upgrade").style.display = "none";
          document.getElementById("leave").style.display = "none";
      
        };
      
        function asd(a) {
        
          if (a == 1) {
            document.getElementById("upgrade").style.display = "block";
            document.getElementById("leave").style.display = "none";
          } else {
            document.getElementById("leave").style.display = "block";
            document.getElementById("upgrade").style.display = "none";
          }
            
        }
      </script>
     


            <form action="{{route('employee.storeOperate')}}"method="post" >
                {{-- {{ csrf_field() }} --}}
            @csrf

            <div class="form-group" style="font-size:20px;">
                <div class="row" >
                    <div class="col-md-4">
                    <label for="name">कर्मचारिको नाम:</label><span style="color: firebrick;">{{$employee->first_name}} {{$employee->middle_name}} {{ $employee->last_name}}</span>
                    </div>

                    <div class="col-md-4">
                        <label for="name">ठेगाना:</label><span style="color: firebrick;">{{$employee->address}}</span>
                    </div>
                    <div class="col-md-4">
                        <label for="name">लिङ्ग:</label><span style="color: firebrick;">@if ($employee->gender=='m')
                            पुरुष
                        @elseif($employee->gender=='f')
                            महिला
                        @else
                        अन्य
                        @endif
                        
                        </span>
                                          
                     </div>
                    
                </div>
                <hr>
                <div class="row">
                    
                    
                </div>
                <hr>
                    <div class="row">
                            <div class="col-md-4">
                                <label for="name">बुबाको नाम :</label><span style="color: firebrick;">{{$employee->father_name}}</span>
                            </div>
                            <div class="col-md-4">
                                <label for="name">हजुरबुबाको नाम :</label><span style="color: firebrick;">{{$employee->grandfather_name}}</span>
                            </div>
                            <div class="col-md-4">
                                <label for="name">पति/पत्नी नाम :</label><span style="color: firebrick;">{{$employee->spouse_name}}</span>
                            </div>
                        </div>
                        <hr><hr>
                        <div class="row">
                                <div class="form-group col-md-4" >
                                        <label for="name">मन्तरालय :</label><span style="color: firebrick;">{{$oneemployee[0]->ministry_name}}</span>
                                       
                                            
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="name">निर्देशनालय :</label><span style="color: firebrick;">{{$oneemployee[0]->nirdeshanalaya_name}}</span>
                                               
                                                    
                                            </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="name">कार्यालय :</label><span style="color: firebrick;">{{$oneemployee[0]->karyalaya_name}}</span>
                                               
                                                    
                                            </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                    
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                    <label for="name">तह :</label><span style="color: firebrick;">{{$oneemployee[0]->taha_name}}</span>
                                                   
                                                        
                                            </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                                    <label for="name">श्रेणी :</label><span style="color: firebrick;">{{$oneemployee[0]->shreni_name}}</span>
                                                    
                                                        
                                            </div>
                                    </div>
                                
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="name">पद :</label><span style="color: firebrick;">{{$oneemployee[0]->pad_name}}</span>
                                                
                                                    
                                        </div>
                                </div>
                            </div>  
                            

                                <div class="row">
                                        <div class="col-md-4">
                                            <label for="name">स्वीकार गरिएको मिति :</label><span style="color: firebrick;">{{$employee->hire_date}}</span>
                                             
                                        </div>
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                        <label for="name">कर्मचारिको पर्कार :</label><span style="color: firebrick;">@if ($employee->emp_type=='k')
                                                            काज
                                                        @elseif($employee->emp_type=='p')
                                                            पदस्थापन
                                                        @else
                                                            नयाँ
                                                        @endif
                                                    </span>
                                                       
                                                            
                                                </div>
                                        </div>
                                        <div class="col-md-4">

                                                <div class="col-md-4">
                                                        <label for="name">जन्म मिति :</label><span style="color: firebrick;">{{$employee->dob}}</span>
                                                                             
                                                    </div>
                                                <div class="form-group">
                                                        {{-- <label for="name">स्थिति:</label><span style="color: firebrick;">{{$employee->emp_status}}</span> --}}
                                                        
                                                            
                                                </div>
                                        </div>
                                        
                                    </div>
               
           

            </form>
        </div>
    </div>    

@endsection