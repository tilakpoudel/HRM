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
        <div class="card-header">
            Create new Nirdeshanalaya
        </div>

        @if ($ministries->count() > 0)
            <div class="card-body">
                <form action="{{route('nirdeshanalaya.store')}}"method="post" >           
                    @csrf
                <div class="form-group">
                    <label for="name">Select Ministry:</label>
                    <select name="ministry_id" id="ministry" class="form-control">
                        <option value="">Select a ministry</option>
                        @foreach ($ministries as $ministry)
                            <option value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                        
                        @endforeach
                    </select>                    
                </div>

                <div class="form-group">
                    <label for="name">Nirdeshanalaya Name:</label>
                    <input type="text" name="nirdeshanalaya_name" class="form-control">
                </div>
            
                <div class="form-group" style="font-size:20px;">
                    <label for="name">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Available</option>
                        <option value="0">Unavalable</option>
                    </select>                            
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-md btn-success" type="submit" style="float:left">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    


    @else
    <div class="card-body">
        <div class="alert alert-danger" role="alert">
            At First Create Ministry..
          </div>
    </div>

    @endif  
@endsection