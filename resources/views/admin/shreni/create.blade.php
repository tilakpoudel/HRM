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
            नयाँ श्रेणी थप्नुहोस्।
        </div>

        <div class="card-body">
            <form action="{{route('shreni.store')}}"method="post" >
                {{-- {{ csrf_field() }} --}}
            @csrf

            <div class="form-group" style="font-size:20px;">
                <label for="name">श्रेणी:</label>
                <input type="text" name="shreni_name" class="form-control">
            </div>
            <div class="form-group" style="font-size:20px;">
                <label for="name">स्थिति:</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Available</option>
                    <option value="0">Unavalable</option>
                </select>
                    
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-md btn-success" type="submit" style="float:left">सुरक्षित गर्नुहोस्</button>
                </div>
            </div>

            </form>
        </div>
    </div>    

@endsection