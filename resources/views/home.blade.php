@extends('user.app') 
@section('title', 'Single post') 
@section('heading', 'Welcome !') 
@section('sub-heading', '')
@section('bg-img', asset('user/img/welcome-bg.jpg')) 
@section('main-content')
<!-- Post Content -->
<article>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<!--/Post Content -->
<hr class="style-one">
@endsection
