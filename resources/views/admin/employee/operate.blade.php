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
            <a href="#" class="btn btn-md btn-info" style="float:right;">पदोन्नति(Upgrade)</a>
            <a href="#" class="btn btn-md btn-success" style="float:right;">सेवानिवृत्त(Leave)</a>


        </div>

        <div class="card-body">
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
                    
                    <div class="col-md-4">
                        <label for="name">जन्म मिति :</label><span style="color: firebrick;">{{$employee->dob}}</span>
                                             
                    </div>
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
                                                <label for="name">निर्देशनालय :</label><span style="color: firebrick;">{{$oneemployee[0]->nir_name}}</span>
                                               
                                                    
                                            </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                                <label for="name">कार्यालय :</label><span style="color: firebrick;">{{$oneemployee[0]->kar_name}}</span>
                                               
                                                    
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
                                                <div class="form-group">
                                                        {{-- <label for="name">स्थिति:</label><span style="color: firebrick;">{{$employee->emp_status}}</span> --}}
                                                        
                                                            
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