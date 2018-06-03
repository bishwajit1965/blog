@extends('user.app')
@section('title', 'Start Bootstrap Theme')
@section('heading', 'Clean blog')
@section('sub-heading', 'A Blog Theme by Start Bootstrap')
@section('author', 'Start Bootstrap')
@section('published-on', 'on August 24, 2018')
@section('bg-img', asset('user/img/home-bg.jpg'))
@section('stylesheet')
    <style>
        .fa-thumbs-up:hover{color:red;}
    </style>
@endsection
@section('main-content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($posts as $post)
            <div class="post-preview">
                <a href="{{ route('post', $post->slug) }}">
                    <h2 class="post-title">{{ $post->title }} </h2>
                    <h3 class="post-subtitle">{{ $post->subtitle}}</h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{ $post->posted_by}}</a>
                    Posted at : {{ $post->created_at->diffForHumans()}}
            
                    <a href=""> <small> 0</small> <i class="fa fa-thumbs-up"></i> </a>
                </p>
                {{-- <p class="lead"> {!! substr($post->body, 0 , 150) !!} {!! strlen($post->body) > 150 ? "..." : "" !!} --}}
                {{-- </p> --}}
                <p class="lead"> {{ substr(Strip_tags($post->body), 0 , 160) }} {{ strlen(Strip_tags($post->body)) > 160 ? "..." : "" }} 
                </p>
                <a href="{{ route('post', $post->slug) }}" class="btn btn-sm btn-info">Read More</a><hr class="style-one"> 
            </div>
        @endforeach

        {{-- Pagination --}} 
        <div class="clearfix pagination justify-content-center">      
            {{ $posts->links() }}               
        </div> 
    </div>
</div>
<hr class="style-one">
@endsection