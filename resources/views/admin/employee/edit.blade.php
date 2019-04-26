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
            कर्मचारि बिबरण अद्यावधिक गर्नुहोस्
        </div>
        <div class="card-body">
            <form action="{{route('employee.update',['employee'=>$employee->id ])}}"method="post" >             
                @csrf
                @method('put')
            <div class="form-group" style="font-size:20px;">
                <div class="row" >
                    <div class="col-md-4">
                        <label for="name">कर्मचारिको पहिलो नाम </label>
                        <input class="form-control" value = "{{$employee->first_name}}"type="text" name="fname" id="fname">
                    </div>
                    <div class="col-md-4">
                        <label for="name">कर्मचारिको बिचको नाम </label>
                        <input class="form-control" value = "{{$employee->middle_name}}" type="text" name="mname" id="mname">
                    </div>
                    <div class="col-md-4">
                        <label for="name">कर्मचारिको थर </label>
                        <input class="form-control" value = "{{$employee->last_name}}" type="text" name="lname" id="lname">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">ठेगाना </label>
                        <input class="form-control" value = "{{$employee->address}}" type="text" name="address" id="address">
                    </div>
                    <div class="col-md-4">
                        <label for="name">लिङ्ग</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="m">पुरुष</option>
                            <option value="f">महिला</option>
                            <option value="o">अन्य</option>
                        </select>                   
                     </div>
                    <div class="col-md-4">
                        <label for="name">जन्म मिति </label>                     
                        <input class="form-control" value = "{{$employee->dob}}"type="date" name="dob" id="dob">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">बुबाको नाम</label>
                        <input class="form-control" value = "{{$employee->father_name}}" type="text" name="fathername" id="fathername">
                    </div>
                    <div class="col-md-4">
                        <label for="name">हजुरबुबाको नाम </label>
                        <input class="form-control" value = "{{$employee->grandfather_name}}"type="text" name="gfname" id="gfname">
                    </div>
                    <div class="col-md-4">
                        <label for="name">पति/पत्नी नाम </label>
                        <input class="form-control" value = "{{$employee->spouse_name}}" type="text" name="hwname" id="hwname">
                    </div>
                </div>
                <hr>
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
                                    @if($employee->nir_id == $nirdeshanalaya->id)
                                        <option selected value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>                                                
                                    @else
                                        <option value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>                                                
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
                                    @if($karyalaya->id == $employee->karyalaya->kar_id)
                                        <option selected value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                                                
                                    @else
                                        <option value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                                                
                                    @endif
                                @endforeach
                            </select>                                                
                        </div>
                    </div>                                           
                </div>
                <hr style="color:red">
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
                <hr>                      
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">स्वीकार गरिएको मिति</label>                                            
                        <input class="form-control"value="{{$employee->hire_date}}" type="date" name="hdate" id="hdate">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">कर्मचारिको पर्कार</label>                                            
                            <select name="emp_type" id="emp_type" class="form-control">          
                                    <option @if($employee->emp_type == "k") selected @endif value="k">काज</option>
                                    <option @if($employee->emp_type == "p") selected @endif value="p">पदस्थापन</option>
                                    <option @if($employee->emp_type == "n") selected @endif value="n">नयाँ</option>
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
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-lg btn-success" type="submit" style="float:left">सुरक्षित गर्नुहोस्</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>    
@endsection