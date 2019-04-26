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
            <div class="card-header" style="font-size:20px;">
                Create new कार्यालय
            </div>
            <div class="card-body">
                <form action="{{route('karyalaya.store')}}" method="post" >                
                    @csrf
                <div class="form-group"style="font-size:20px;">
                    <label for="name">Select Ministry:</label>
                    <select name="ministry_id" id="ministry_id" class="form-control">
                        <option value="">Select a ministry</option>
                        @foreach ($ministries as $ministry)
                            <option value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                        
                        @endforeach
                    </select>                    
                </div>
                <div class="form-group" style="font-size:20px;">
                    <label for="name">Select Nirdeshanalaya:</label>
                    <select name="nirdeshanalaya" id="nirdeshanalaya" class="form-control">
                        <option value="">Select a nirdeshanalaya</option>
                        @foreach ($nirdeshanalayas as $nirdeshanalaya)
                            <option value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>                        
                        @endforeach
                    </select>                    
                </div>
                <div class="form-group" style="font-size:20px;">
                    <label for="name">कार्यालय:</label>
                    <input type="text" name="karyalaya" class="form-control">
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

    {{-- <script>
        jQuery(document).ready(function($){
            $('#ministry_id').change(function(){
                $.get("{{ route('dropdown')}}", 
                    { option: $(this).val() }, 
                    function(data) {
                        var nirdeshanalaya = $('#nirdeshanalaya');
                        nirdeshanalaya.empty();
    
                        $.each(data, function(index, element) {
                            nirdeshanalaya.append("<option value='"+ element.id +"'>" + element.nir_name + "</option>");
                        });
                    });
            });
        });
     </script> --}}
@endsection