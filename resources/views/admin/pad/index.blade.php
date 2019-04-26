@extends('layouts.app')
@section('content')
<div class="card card-default">
        <div class="card-header" style="font-size:20px;">
            उपलब्ध पदहरु।
            <a href="{{route('pad.create')}}" class="btn btn-md btn-success" style="float:right;">नया पद थप्नुहोस</a>
        </div>        
        <div class="card-body">
            <table class="table table-hover">
                <thead style="font-size:20px;">
                    <tr>
                        <th>सिन</th>
                        <th>मन्तरालय</th>
                        <th>निर्देशनालय</th>
                        <th>कार्यालय</th>
                        <th>तह॰</th>
                        <th>पद</th>
                        <th>Status</th>
                        <th>Edit</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>                    
                    @foreach($pads as $pad)
                    <tr>                            
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pad->ministry->ministry_name}}</td> 
                        <td>{{$pad->nirdeshanalaya->nirdeshanalaya_name}}</td> 
                        <td>{{$pad->karyalaya->karyalaya_name}}</td> 
                        <td>{{$pad->taha->taha_name}}</td>
                        <td>{{$pad->pad_name}}</td>  
                        <td>
                            @if ($pad->status=='1')
                                <span class="badge badge-warning">packed</span>
                            @else
                                <span class="badge badge-success">open</span>
                            @endif
                        </td>
                        <td><a href="{{route('pad.edit',['pad'=>$pad->id ]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                        
                        {{-- <td>
                            <form action="{{route('taha.destroy',['taha'=>$taha->id ])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td> --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div>    
@endsection