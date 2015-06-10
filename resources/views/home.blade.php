@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-offset-1 col-md-10">

				<h4 class="section-intro-heading">FEATURED</h4>
				<div class="row">

					<div class="col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[0], 'thumbnailClass' => 'lg'])
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[1], 'thumbnailClass' => 'xs'])
						{{--@include('partials/thumbnail', ['post' => $posts[2]])--}}
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[3], 'thumbnailClass' => 'xs'])
						{{--@include('partials/thumbnail', ['post' => $posts[4]])--}}
					</div>


					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[4], 'thumbnailClass' => 'xs'])
						{{--@include('partials/thumbnail', ['post' => $posts[2]])--}}
					</div>

				</div>

				<div class="row">
					<h4 class="section-intro-heading">RECENT POSTS</h4>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[1]])
						@include('partials/thumbnail', ['post' => $posts[2]])
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[3]])
						@include('partials/thumbnail', ['post' => $posts[4]])
					</div>


					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[1]])
						@include('partials/thumbnail', ['post' => $posts[2]])
					</div>

				</div>

			</div>
		</div>
	</div>
@endsection
