@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header" style="font-size:20px;">
            उपलब्ध कार्यालय..
            <a href="{{route('karyalaya.create')}}" class="btn btn-md btn-success" style="float:right;">नया कार्यालय थप्नुहोस</a>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Ministry</th>
                        <th>Nirdeshanalaya</th>
                        <th>Karyalaya Name</th>
                        <th>Status</th>
                        <th>Edit</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>                    
                    @foreach($karyalayas as $kar)
                    <tr>
                        <td>{{$loop->iteration}}</td>                        
                        <td>{{$kar->ministry->ministry_name}}</td> 
                        <td>{{$kar->nirdeshanalaya->nir_name}}</td> 
                        <td>{{$kar->kar_name}}</td> 
                        <td>
                                @if ($kar->status=='1')
                                <span class="badge badge-success">Available</span>
                            @else
                            <span class="badge badge-warning">UnAvailable</span>
    
                            @endif
                        </td> 
                        
                        <td><a href="{{route('karyalaya.edit',['karyalaya'=>$kar->id ]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                        
                        {{-- <td>
                            <form action="{{route('karyalaya.destroy',['karyalaya'=>$kar->id ])}}" method="POST">
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