@extends('layouts.app')

@section('content')
<div class="card card-default">
        <div class="card-header" style="font-size:20px;">
            कर्मचारि बिबरण।
            <a href="{{route('employee.create')}}" class="btn btn-md btn-success" style="float:right;">नया कर्मचारि थप्नुहोस</a>
        </div>
        
        <div class="card-body">
            <table class="table table-hover">
                <thead style="font-size:20px;">
                    <tr>
                        <th>सिन</th>
                        <th>नाम</th>
                        <th>ठेगाना
                            </th>
                        <th>जन्म मिति</th>

                        {{-- <th>मन्तरालय</th>
                        <th>निर्देशनालय</th>
                        <th>कार्यालय</th>
                        <th>तह॰</th>
                        <th>पद</th> --}}
                        <th>स्वीकार गरिएको मिति</th>
                        <th>स्थिति</th>
                        <th>सम्पादन</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($employees as $employee)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$employee->first_name}} {{$employee->middle_name}}{{ $employee->last_name}}</td> 
                    <td>{{$employee->address}}</td> 
                    <td>{{$employee->dob}}</td> 
                    {{-- <td>{{$employee->ministry_name}}</td> 
                    <td>{{$employee->nir_name}}</td> 
                    <td>{{$employee->kar_name}}</td> 
                    <td>{{$employee->taha_name}}</td>
                    <td>{{$employee->pad_name}}</td>   --}}
                    <td>{{$employee->hire_date}}</td>
                    <td>
                        @if ($employee->emp_status=='1')
                        <span class="badge badge-success">Active</span>

                        @else
                        <span class="badge badge-warning">Inactive</span>

                        @endif
                    </td>
                    <td><a href="{{route('employee.edit',['employee'=>$employee->id ]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                                       
                    </form>
                    </tr>

                    @endforeach
                </tbody>

            </table>

            

            
        </div>
    </div>    


@endsection