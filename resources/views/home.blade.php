@extends('app')

@section('page-title')
    Nu Picture
@endsection

@section('content')
	<div class="container-fluid">

        <div class="row hero" style="background-image: url('/upload/{{$posts[0]->thumbnail_image}}');">
            <div class="hero-overlay">
            <div class="col-sm-12 col-md-10 col-md-offset-1" style="position:relative; height: 100%;">
                <div class="hero-title">
                    {{$posts[0]->title}}
                    <div class="hero-info">
                        {{$posts[0]->total_views}} <b>VIEWS </b>|
                        {{strtoupper(date_format($posts[0]->updated_at, "F j, Y"))}}
                    </div>
                </div>

            </div>
            </div>


        </div>


		<div class="row">
			<div class="col-sm-12 col-md-10 col-md-offset-1">


				<div class="row">

                    <div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
                        @include('partials/thumbnail', ['post' => $posts[0], 'thumbnailClass' => 'sm'])
                        @include('partials/thumbnail', ['post' => $posts[1], 'thumbnailClass' => 'sm'])
                        {{--@include('partials/thumbnail', ['post' => $posts[2]])--}}
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
                        @include('partials/thumbnail', ['post' => $posts[1], 'thumbnailClass' => 'sm'])
                        @include('partials/thumbnail', ['post' => $posts[2], 'thumbnailClass' => 'sm'])
                        {{--@include('partials/thumbnail', ['post' => $posts[2]])--}}
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
                        @include('partials/thumbnail', ['post' => $posts[2], 'thumbnailClass' => 'sm'])
                        @include('partials/thumbnail', ['post' => $posts[3], 'thumbnailClass' => 'sm'])
                        {{--@include('partials/thumbnail', ['post' => $posts[2]])--}}
                    </div>

				</div>


				<div class="row">
					<h4 class="section-intro-heading">RECENT POSTS</h4>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[1], 'thumbnailClass' => 'sm'])
						@include('partials/thumbnail', ['post' => $posts[2], 'thumbnailClass' => 'sm'])
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[3], 'thumbnailClass' => 'sm'])
						@include('partials/thumbnail', ['post' => $posts[4], 'thumbnailClass' => 'sm'])
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[5], 'thumbnailClass' => 'sm'])
						@include('partials/thumbnail', ['post' => $posts[2], 'thumbnailClass' => 'sm'])
					</div>

				</div>

			</div>
		</div>
	</div>
@endsection
