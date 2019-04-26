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
                @csrf
                @method('put')
            <div class="form-group" style="font-size:20px;">
                <label for="name">मन्त्रालय छान्नुहोस्:</label>
                <select name="ministry_id" id="ministry" class="form-control">
            
                    @foreach ($ministries as $ministry)
                        @if($ministry->id == $pad->ministry_id)
                            <option selected value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                        
                        @else
                            <option value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                        
                        @endif
                    @endforeach
                </select>
                    
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">निर्देशनालय  छान्नुहोस्:</label>
                <select name="nirdeshanalaya" id="nirdeshanalaya" class="form-control">                        
                    @foreach ($nirdeshanalayas as $nirdeshanalaya)
                        @if($nirdeshanalaya->id == $pad->nir_id)
                            <option selected value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>
                        @else
                            <option value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>
                        @endif                        
                    @endforeach
                </select>
                    
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">कर्यालय छान्नुहोस्:</label>
                <select name="karyalaya" id="karyalaya" class="form-control">                        
                    @foreach ($karyalayas as $karyalaya)
                        @if($karyalaya->id == $pad->kar_id)
                            <option selected value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                                                    
                        @else
                            <option value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                        
                        @endif
                    @endforeach
                </select>
                    
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">तह छान्नुहोस्:</label>
                <select name="taha" id="taha" class="form-control">                        
                    @foreach ($tahas as $taha)
                        @if($taha->id == $pad->taha_id)
                            <option selected value="{{$taha->id}}">{{$taha->taha_name}}</option>
                        @else
                            <option value="{{$taha->id}}">{{$taha->taha_name}}</option>
                        @endif
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