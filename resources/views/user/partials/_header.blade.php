<header class="masthead" style="background-image: url(@yield('bg-img'))">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>@yield('heading')</h1>
					<span class="subheading">@yield('sub-heading')</span>
					<span class="meta">@yield('Posted by:')
						<a href="#">@yield('author')</a>
						@yield('published-on')</span>
						<hr class="style1">
				</div>
			</div>
		</div>
	</div>
</header>