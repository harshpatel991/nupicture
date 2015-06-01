@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-offset-2 col-sm-8 col-xs-12">
				<div class="row">

					@for($j = 0; $j < 3; $j++)
						<div class="col-md-4 col-sm-6 home-column-padding">
							@for ($i = $j*count($posts)/3; $i < count($posts)*($j+1)/3 ; $i++)
								@include('partials/thumbnail', ['post' => $posts[$i]])
							@endfor
						</div>
					@endfor

				</div>
			</div>
		</div>
	</div>
@endsection
