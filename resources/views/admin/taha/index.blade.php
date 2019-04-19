@extends('layouts.app')

@section('content')
<div class="card card-default">
        <div class="card-header" style="font-size:20px;">
            उपलब्ध तह..
            <a href="{{route('taha.create')}}" class="btn btn-md btn-success" style="float:right;">नया तह थप्नुहोस</a>

        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead style="font-size:20px;">
                    <tr>
                        <th>सिन</th>
                        <th>मन्तरालय</th>
                        <th>निर्देशनालय</th>
                        <th>कार्यालय</th>
                        <th>तह</th>
                        <th>Status</th>
                        <th>Edit</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($tahas as $taha)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$taha->ministry_id}}</td> 
                    <td>{{$taha->nir_id}}</td> 
                    <td>{{$taha->kar_name}}</td> 
                    <td>{{$taha->taha_name}}</td> 
                    <td>
                            @if ($taha->status=='1')
                                <span class="badge badge-success">Available</span>
                            @else
                            <span class="badge badge-warning">UnAvailable</span>
     
                            @endif
                        </td>
                    <td><a href="{{route('taha.edit',['taha'=>$taha->id ]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    
                    {{-- <td>
                        <form action="{{route('taha.destroy',['taha'=>$taha->id ])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button  class="btn btn-sm btn-danger" type="submit">Delete</button>
                    </td> --}}

                    </form>
                    </tr>

                    @endforeach
                </tbody>

            </table>

            

            
        </div>
    </div>    


@endsection