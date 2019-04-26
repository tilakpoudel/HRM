@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header"  style="font-size:20px;">
            उपलब्ध निर्देशनालय..
            <a href="{{route('nirdeshanalaya.create')}}" class="btn btn-md btn-success" style="float:right;">नया निर्देशनालय थप्नुहोस</a>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead style="font-size:20px;">
                    <tr>
                        <th>सिन</th>
                        <th>मन्तरालय</th>
                        <th>निर्देशनालय </th>
                        <th>Status</th>
                        <th>Edit</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>                    
                    @foreach($nirdeshanalayas as $nir)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$nir->ministry->ministry_name}}</td> 
                            <td>{{$nir->nirdeshanalaya_name}}</td> 
                            <td>
                                @if ($nir->status=='1')
                                    <span class="badge badge-success">Available</span>
                                @else
                                    <span class="badge badge-warning">UnAvailable</span>
                                @endif                                
                            </td>                                                    
                            <td>
                                <a href="{{route('nirdeshanalaya.edit',['nirdeshanalaya'=>$nir->id ]) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>                            
                            {{-- <td>
                                <form action="{{route('nirdeshanalaya.destroy',['nirdeshanalaya'=>$nir->id ])}}" method="POST">
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