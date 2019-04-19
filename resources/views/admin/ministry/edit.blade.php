@extends('layouts.app')


@section('content')
    <div class="card card-default">
        <div class="card-header" style="font-size:20px;">
           Edit मन्तरालय:{{$ministry->ministry_name}}
        </div>

        <div class="card-body">
            <form action="{{route('ministry.update',['ministry'=>$ministry->id ])}}"method="post" >
                {{-- {{ csrf_field() }} --}}
            @csrf
            {{-- {{method_field('put')}} --}}
            @method('put')

            <div class="form-group">
                <label for="name">मन्तरालय:</label>
                <input type="text" name="ministry_name" value="{{$ministry->ministry_name}}" class="form-control">
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