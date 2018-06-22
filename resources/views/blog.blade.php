@extends('layouts.master')

@section('content')
<div class="margin-top">
	<!-- Page Header -->
	<header class="masthead" style="background-image: url('img/post-bg.jpg');height: 250px;margin-top: -5px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="mx-auto">
					<div style="padding-top: 25px;">
						<h1>{{ $blog->blog_title }}</h1>		          
						<span class="meta">Posted by
							<a href="javascript:void(0)">{{ $blog->user->name }}</a> on {{ \Carbon\Carbon::parse($blog->blog_posted_at)->toFormattedDateString() }}
							<p>{{ implode(', ', $blog->categories()->get()->pluck('title')->toArray()) }}</p>
						</span>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Post Content -->
	<article>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					{!! $blog->blog_text !!}
				</div>
			</div>
		</div>
	</article>

	<hr>
</div>
@endsection