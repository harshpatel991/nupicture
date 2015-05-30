@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
				<div class="row">

					<div class="col-md-4 col-sm-12">

						@for ($i = 0; $i < count($posts)/3; $i++)
							<div class="home-thumbnail-wrapper {{$posts[$i]['thumbnail-class']}}">
								<div href="#" style="background-image: url('/upload/{{$posts[$i]['content']}}')" class="home-thumbnail" >
									<div class="home-thumbnail-content">
										{{$posts[$i]['title']}}
									</div>
								</div>
							</div>

						@endfor


					</div>

					<div class="col-md-4 col-sm-12">
						@for ($i = count($posts)/3; $i < count($posts)*2/3 ; $i++)
							<div class="home-thumbnail-wrapper {{$posts[$i]['thumbnail-class']}}">
								<div href="#" style="background-image: url('/upload/{{$posts[$i]['content']}}')" class="home-thumbnail" >
									<div class="home-thumbnail-content">
										{{$posts[$i]['title']}}
									</div>
								</div>
							</div>
						@endfor

					</div>

					<div class="col-md-4 col-sm-12">
						@for ($i = 2*count($posts)/3; $i < count($posts); $i++)
							<div class="home-thumbnail-wrapper {{$posts[$i]['thumbnail-class']}}">
								<div href="#" style="background-image: url('/upload/{{$posts[$i]['content']}}')" class="home-thumbnail" >
									<div class="home-thumbnail-content">
										{{$posts[$i]['title']}}
									</div>
								</div>
							</div>

						@endfor

					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
