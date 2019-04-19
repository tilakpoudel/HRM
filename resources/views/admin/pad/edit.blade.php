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
        <div class="card-header" style="font-size:20px;font-weight: 600;">
            
            पद सम्पादन गर्नुहोस् :{{$pad->pad_name}}
        </div>

        <div class="card-body">
            <form action="{{route('pad.update',['pad'=>$pad->id ])}}"method="post" >
                {{-- {{ csrf_field() }} --}}
            @csrf
            @method('put')
            <div class="form-group" style="font-size:20px;">
                <label for="name">मन्त्रालय छान्नुहोस्:</label>
                <select name="ministry_id" id="ministry" class="form-control">
                        <option value="">मन्त्रालय छान्नुहोस्:</option>
                    @foreach ($ministries as $ministry)
                        <option value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>
                        
                    @endforeach
                </select>
                    
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">निर्देशनालय  छान्नुहोस्:</label>
                <select name="nirdeshanalaya" id="nirdeshanalaya" class="form-control">
                        <option value="">निर्देशनालय  छान्नुहोस्</option>
                    @foreach ($nirdeshanalayas as $nirdeshanalaya)
                        <option value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nir_name}}</option>
                        
                    @endforeach
                </select>
                    
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">कर्यालय छान्नुहोस्:</label>
                <select name="karyalaya" id="karyalaya" class="form-control">
                        <option value="">कर्यालय छान्नुहोस्</option>
                    @foreach ($karyalayas as $karyalaya)
                        <option value="{{$karyalaya->id}}">{{$karyalaya->kar_name}}</option>
                        
                    @endforeach
                </select>
                    
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">तह छान्नुहोस्:</label>
                <select name="taha" id="taha" class="form-control">
                        <option value="">तह छान्नुहोस्</option>
                    @foreach ($tahas as $taha)
                        <option value="{{$taha->id}}">{{$taha->taha_name}}</option>
                        
                    @endforeach
                </select>
                    
            </div>

            <div class="form-group" style="font-size:20px;">
                <label for="name">पद:</label>
                <input type="text" name="pad" value="{{$pad->pad_name}}" class="form-control">
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Closed</option>
                    <option value="0">open</option>
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