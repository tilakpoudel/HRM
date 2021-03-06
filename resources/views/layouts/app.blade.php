<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
        <div class="container">
            <div class="row">
                
              @if (Auth::check())
              <div class="col-lg-3" style="margin-top: 2%;">
                <ul class="list-group" style="font-size:20px">
                    <li class="list-group-item">
                        <a href="{{route('home')}}">गृह पृष्ठ</a>
                    </li>

                   
                    <div class="dropdown" >
                            <button class="btn btn-info dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: -webkit-fill-available;font-size:20px;text-align: left;">
                                    सेटअप
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="font-size:20px">
                                    <li class="list-group-item">
                                            <a href="{{route('ministry.index')}}">मन्त्रालय</a>
                                    </li>
                                    <li class="list-group-item">
                                            <a href="{{route('nirdeshanalaya.index')}}">निर्देशनालय</a>
                                    </li>
                                    <li class="list-group-item">
                                            <a href="{{route('karyalaya.index')}}">कार्यालय</a>
                                    </li>
                                    <li class="list-group-item">
                                            <a href="{{route('taha.index')}}">तह</a>
                                    </li>
                    
                                    
                                    <li class="list-group-item">
                                            <a href="{{route('pad.index')}}">पद	</a>
                                    </li>
                    
                                    <li class="list-group-item">
                                            <a href="{{route('shreni.index')}}">श्रेणी </a>
                                    </li>
                            </div>
                          </div>

                    <li class="list-group-item">
                        <a href="{{route('employee.index')}}">कर्मचारि</a>
                    </li>

                    
                </ul>
            </div>
              @endif
                
                <div class="col-lg-9">
                        <main class="py-4">
                                @yield('content')
                            </main>
                </div>
            </div>    
        </div>  


        
    </div>
    {{-- script --}}
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
    </script>


    {{-- Script for dynamic sublists --}}
    <script>
        $(document).ready(function(){
            $('.dynamic').change(function(){
                if($(this).val() != ''){                
                    var select = $(this).attr('id');                                
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('dynamic.fetch')}}",
                        method :"POST",
                        data:{select:select,value:value,_token:_token,dependent:dependent},
                        success:function(result){
                            $('#'+dependent).html(result);
                        }
                    })
                }
            })
        });
</script>

</body>
</html>
