@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">

					<div class="col-md-4 col-sm-12">

						@for ($i = 0; $i < count($posts)/3; $i++)
							<div class="home-thumbnail-wrapper">
								<div href="#" style="background: linear-gradient( rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4) ), url('/upload/{{$posts[$i]['content']}}');background-position:center center;" class="home-thumbnail" ></div>
							</div>
						@endfor


					</div>

					<div class="col-md-4 col-sm-12">
						@for ($i = count($posts)/3; $i < count($posts)*2/3 ; $i++)
							<div class="home-thumbnail-wrapper">
								<div href="#" style="background: linear-gradient( rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4) ), url('/upload/{{$posts[$i]['content']}}');background-position:center center;" class="home-thumbnail" ></div>
							</div>
						@endfor

					</div>

					<div class="col-md-4 col-sm-12">
						@for ($i = 2*count($posts)/3; $i < count($posts); $i++)
							<div class="home-thumbnail-wrapper">
								<div href="#" style="background: linear-gradient( rgba(0, 0, 0, 0.0), rgba(0, 0, 0, 0.4) ), url('/upload/{{$posts[$i]['content']}}');background-position:center center;" class="home-thumbnail" ></div>
							</div>

						@endfor

					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
