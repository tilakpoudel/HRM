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
            Create new Taha
        </div>
        <div class="card-body">
            <form action="{{route('taha.store')}}"method="post" >              
                @csrf
            <div class="form-group">
                <label for="name">Select Ministry:</label>
                <select name="ministry_id" id="ministry" class="form-control dynamic" data-dependent="nirdeshanalaya">
                        <option value="">Select a मन्तरालय</option>
                    @foreach ($ministries as $ministry)
                        <option value="{{$ministry->id}}">{{$ministry->ministry_name}}</option>                        
                    @endforeach
                </select>                    
            </div>        
            <div class="form-group">
                <label for="name">Select Nirdeshanalaya:</label>
                <select name="nirdeshanalaya" id="nirdeshanalaya" class="form-control dynamic" data-dependent="karyalaya">
                    <option value="">Select a ministry</option>
                    @foreach ($nirdeshanalayas as $nirdeshanalaya)
                        <option value="{{$nirdeshanalaya->id}}">{{$nirdeshanalaya->nirdeshanalaya_name}}</option>                        
                    @endforeach
                </select>                    
            </div>
            <div class="form-group">
                <label for="name">Select Karyalaya:</label>
                <select name="karyalaya" id="karyalaya" class="form-control">
                    <option value="">Select a Karyalaya</option>
                    @foreach ($karyalayas as $karyalaya)
                        <option value="{{$karyalaya->id}}">{{$karyalaya->karyalaya_name}}</option>                        
                    @endforeach
                </select>                    
            </div>
            <div class="form-group">
                <label for="name">Taha Name:</label>
                <input type="text" name="taha" class="form-control">
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
        $(document).ready(function () {
            $('.dynamic').change(function(){
                if($(this).val()!=''){
                    var select=$(this).attr("id");
                    var value=$(this).val();
                    var dependent=$(this).data("dependent");
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('tahaController.fetch')}}",
                        method:"post",
                        data:{select:select,value:value,_token:_token,dependent:dependent},
                        success:function(result){
                            $('#'.+dependent).html(result)
                            }
                    })

                }
            })
        })
    </script> --}}
@endsection