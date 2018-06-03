<!DOCTYPE html>

<html lang="en">
    <!-- Head -->
        @include('user.partials._head')
    
  <body>

    <!-- Navigation -->
        @include('user.partials._navbar')

    <!-- Page Header -->
        @include('user.partials._header')

    <!-- Main Content -->
        <div class="container">

            @yield('main-content')

        </div>
       
    <!-- Footer -->
        @include('user.partials._footer')

    <!-- Scripts -->
        @include('user.partials._scripts')
  </body>

</html>
