<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://parsleyjs.org/src/parsley.css">
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
    <body>
    

        @section('header')
             @include('Eshopper.header')
        @show
        
        <div class="container">
            @yield('content')
        </div>
     
        @section('footer')
             @include('Eshopper.footer')
        @show
        
        @yield('scripts')

        
        <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('dist/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{ asset('dist/js/price-range.js')}}"></script>
        <script src="{{ asset('dist/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{ asset('dist/js/main.js')}}"></script> 
    
 
</html>