<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AulaCampus Site</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/base.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/notas.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
        
     </head>
    <body>
        @if (\Request::is('login'))
            <div class="container-fluid">
                <div class="row">
                    @yield('login')
                </div>
            </div>
        @else
            @include('header')
            <div class="container-fluid">
                <div class="row">
                    @include('aside')
                    @yield('main')
                </div>
            </div>
        @endif
        
        <!-- JavaScripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <!-- <script src="{{ resource_path('js/dashboard.js') }}" type="text/js"></script>-->
    </body>
</html>