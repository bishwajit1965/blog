<!DOCTYPE html>
<html>
<head>
    @include('admin.partials._head')
</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        @include('admin.partials._header')

        @include('admin.partials._sidebar')

        @section('main-content')

        @show
       
        @include('admin.partials._footer')
 
    </div>

    @include('admin.partials._scripts')

</body>

</html>