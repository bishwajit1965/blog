<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    @yield('stylesheet')
    
    {{-- <title>Clean Blog - Start Bootstrap Theme</title> --}}
    <title>Laravel Blog - @yield('title')</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('images/laravel-favicon.png')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('user/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('user/css/clean-blog.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/app.css')}}" rel="stylesheet">
    <style>
        a{text-decoration: none;}  
    </style>
</head>