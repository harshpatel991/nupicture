@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10">
				<div class="row">

					@for($j = 0; $j < 3; $j++)
						<div class="col-md-4 col-sm-12 home-column-padding">
							@for ($i = $j*count($posts)/3; $i < count($posts)*($j+1)/3 ; $i++)
								<a href="/post/{{$posts[$i]['slug']}}">
									<div class="home-thumbnail-wrapper {{$posts[$i]['thumbnail-class']}}">

										<div class="home-thumbnail-title">
											{{$posts[$i]['title']}}
											<div class="home-thumbnail-info">
												{{$posts[$i]['total_views']}} VIEWS |
												POSTED: {{$posts[$i]['updated_at']}}
											</div>
										</div>

										<div href="#" style="background-image: url('/upload/{{$posts[$i]['content']}}')" class="home-thumbnail" ></div>

									</div>
								</a>
							@endfor
						</div>
					@endfor

				</div>
			</div>
		</div>
	</div>
@endsection
