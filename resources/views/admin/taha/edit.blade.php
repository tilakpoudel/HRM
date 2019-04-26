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
            Update Taha:{{$taha->taha_name}}
        </div>

        <div class="card-body">
            <form action="{{route('taha.update',['taha'=>$taha->id ])}}"method="post" >        
                @csrf
                @method('put')
            <div class="form-group">
                <label for="name">Select Ministry:</label>
                <select name="ministry_id" id="ministry" class="form-control">              
                    @foreach ($ministries as $ministry)
                        @if($taha->ministry_id == $ministry->id)
                            <option selected value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                        
                        @else
                            <option value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                        
                        @endif
                    @endforeach
                </select>                    
            </div>
            <div class="form-group">
                <label for="name">Select Nirdeshanalaya:</label>
                <select name="nirdeshanalaya" id="nirdeshanalaya" class="form-control">                    
                    @foreach ($nirdeshanalayas as $nirdeshanalaya)
                        @if($taha->kar_id == $nirdeshanalaya->id)
                            <option selected value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>                        
                        @else
                            <option value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>                        
                        @endif
                    @endforeach
                </select>                    
            </div>
            <div class="form-group">
                <label for="name">Select Karyalaya:</label>
                <select name="karyalaya" id="karyalaya" class="form-control">                    
                    @foreach ($karyalayas as $karyalaya)
                        @if($taha->kar_id == $karyalaya->id)
                            <option selected value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                        
                        @else
                            <option value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                        
                        @endif
                    @endforeach
                </select>                    
            </div>
            <div class="form-group">
                <label for="name">Taha Name:</label>
                <input type="text" name="taha" value="{{$taha->taha_name}}" class="form-control">
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
@endsection