@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header" style="font-size:20px;">
           Edit शृीणी:{{$shreni->shreni_name}}
        </div>

        <div class="card-body">
            <form action="{{route('shreni.update',['shreni'=>$shreni->id ])}}"method="post" >
                {{-- {{ csrf_field() }} --}}
            @csrf
            {{-- {{method_field('put')}} --}}
            @method('put')

            <div class="form-group">
                <label for="name">शृीणी:</label>
                <input type="text" name="shreni_name" value="{{$shreni->shreni_name}}" class="form-control">
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Available</option>
                    <option value="0">UnAvailable</option>
                </select>
                 
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-md btn-success" type="submit" style="float:left">Update </button>
                </div>
            </div>

            </form>
        </div>
    </div>    

@endsection