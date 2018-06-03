@extends('user.app')

@section('title', 'Single post')

@section('heading', $post->title)

@section('sub-heading', $post->subtitle)

@section('author', $post->posted_by)

@section('published-on', date('M j,Y H:i:s A', strtotime($post->created_at)))

{{-- @section('bg-img',Storage::disk('local')->url($post->image)) --}}

@section('bg-img', asset('user/img/post-bg.jpg')  )

@section('main-content')
	<!--/Facebook comment -->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12';
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!--/Facebook comment -->

	<!-- Post Content -->
	<article>
		<div class="container">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="">
					<span class="">
						<span style="color:#DDD; font-weight:900;">Posted by : </span>
						<span style="font-weight:900;color:#A8A8A8;">{{ $post->posted_by }}</span>
					</span>
					<span class="pull-right">
						<span  style="color:#DDD; font-weight:900;">
						Published on : 
						</span>
						<span style="font-weight:900;color:#A8A8A8;">{{ date('M j , Y , H : i A', strtotime($post->created_at))}}
						</span> 
					</span>	
				</div><br>
				<span class="">
					<span style="border:1px solid#DEDEDE;padding:3px 5px;border-radius:3px; font-weight:900; background-color:#DDD;color:#999;">Category :</span>
					@foreach ($post->categories as $category)
						<a href="{{ route('category', $category->slug) }}"><span style="border:1px solid #DEDEDE; padding:2px 6px; border-radius:3px;background-color:#F2F2F2; margin-right:5px; font-weight:900; color:#A8A8A8;">
							{{ $category->name }}
						</span></a> 
					@endforeach
				</span><br><hr>
				
				{!! htmlspecialchars_decode($post->body) !!}

				<!--Tag clouds-->
				<div class="">
					<h4>Tag clouds :</h4>
					@foreach ($post->tags as $tag)
						<a href="{{ route('tag', $tag->slug) }}">
							<span class="pull-left" style="border:1px solid #DEDEDE;padding:2px 4px; border-radius:3px;background-color:#F2F2F2; margin-right:5px; font-weight:900; color:#A8A8A8;">	 
							{{ $tag->name }}
							</span>
						</a>	 
					@endforeach
				</div><br><hr>
				<!--Facebook Post Content -->
				<h4>Comment(s) :</h4>
				<div class="fb-comments" data-href="{{ Request::url() }}"></div>
				<!-- /Facebook Post Content -->
			</div>		  
		</div>
	</article>	
	<hr class="style-one">
@endsection