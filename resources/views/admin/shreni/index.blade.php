@extends('layouts.app')

@section('content')
<div class="card card-default">
        <div class="card-header"  style="font-size:20px;">
            उपलब्ध श्रेणी..
            <a href="{{route('shreni.create')}}" class="btn btn-md btn-success" style="float:right;">नया श्रेणी थप्नुहोस</a>

        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead style="font-size:20px;">
                    <tr>
                        <th>सिन</th>
                        <th>श्रेणी</th>
                        <th>स्थिति</th>
                        <th>सम्पादन</th>
                        {{-- <th>Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($shrenis as $shreni)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                        
                    <td>{{$shreni->shreni_name}}</td> 
                    <td>
                        @if ($shreni->status=='1')
                            <span class="badge badge-success">Available</span>
                        @else
                        <span class="badge badge-warning">UnAvailable</span>
 
                        @endif
                    </td> 

                    <td><a href="{{route('shreni.edit',['shreni'=>$shreni->id ]) }}" class="btn btn-sm btn-primary">Edit</a></td>
                    
                    
                    </form>
                    </tr>

                    @endforeach
                </tbody>

            </table>

            

            
        </div>
    </div>    


@endsection