@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header"  style="font-size:20px;">
            उपलब्ध मन्त्रालय..
            <a href="{{route('ministry.create')}}" class="btn btn-md btn-success" style="float:right;">नया मन्त्रालय थप्नुहोस</a>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead style="font-size:20px;">
                    <tr>
                        <th>सिन</th>
                        <th>मन्तरालय</th>
                        <th>Status</th>
                        <th>Edit</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>                    
                    @foreach($ministries as $ministry)
                    <tr>
                        <td>{{$loop->iteration}}</td>                        
                        <td>{{$ministry->ministry_name}}</td> 
                        <td>
                            @if ($ministry->status=='1')
                                <span class="badge badge-success">Available</span>
                            @else
                                <span class="badge badge-warning">UnAvailable</span>
                            @endif
                        </td> 
                        <td><a href="{{route('ministry.edit',['ministry'=>$ministry->id ]) }}" class="btn btn-sm btn-primary">Edit</a></td>                    
                    {{-- <td>
                        <form action="{{route('ministry.destroy',['ministry'=>$ministry->id ])}}" method="POST">
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