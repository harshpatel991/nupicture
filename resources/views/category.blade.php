@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-offset-1 col-md-10">


				<div class="row">

                    <h4 class="section-intro-heading">{{strtoupper($category)}}</h4>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[1], 'thumbnailClass' => 'sm'])
						@include('partials/thumbnail', ['post' => $posts[2], 'thumbnailClass' => 'lg'])
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[1], 'thumbnailClass' => 'lg'])
						@include('partials/thumbnail', ['post' => $posts[2], 'thumbnailClass' => 'sm'])
					</div>

					<div class="col-md-4 col-sm-6 col-xs-12 home-column-padding">
						@include('partials/thumbnail', ['post' => $posts[1], 'thumbnailClass' => 'sm'])
						@include('partials/thumbnail', ['post' => $posts[2], 'thumbnailClass' => 'lg'])
					</div>

				</div>

			</div>
		</div>
	</div>
@endsection
