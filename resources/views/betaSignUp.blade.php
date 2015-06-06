@extends('app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10">

				@if (Session::has('message'))
					<div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
				@endif

				@if (Session::has('errors'))
					<div class="alert alert-danger" role="alert">{{ Session::get('errors')->first('email') }}</div>
				@endif

				<h1>Welcome</h1>
				<p>You and your friends probably already share and view content from the internet through email, Facebook, and Twitter. Now you can get paid for it.</p>

				<h3>How it Works</h3>
				<p>When you submit a post, it will be manually approved by a human. Most posts will be approved.</p>
				<p>Common reasons for denial include: </p>

				<ul>
					<li><p>Posting content that has already been posted</p></li>
					<li><p>Post with severe grammatical errors</p></li>
					<li><p>Spam/inappropriate content</p></li>
				</ul>

				<h3>Gaining Points</h3>
				<p>You will earn points for each post you make and additionally for amount of unique views that post receives.</p>

				<table class="table table-striped">
					<tr>
						<th>Post</th>
						<th>When Posting</th>
						<th>Per View</th>
					</tr>

					@for($i = 0; $i < count($basePoints); $i++)
					<tr>
						<td>{{$postNames[$i]}}</td>
						<td>{{$basePoints[$i]}}</td>
						<td>{{$perViewPoints[$i]}}</td>
					</tr>
					@endfor
				</table>

				<p>Once a post is listed, you can start accumulating views to your post.</p>
				<p>If you have reached a minimum of 4000 points ($10), you can request a payout. Payouts occur via PayPal at the end of each week.</p>

				<table class="table table-striped">
					<tr>
						<th>Points</th>
						<th>Payout</th>
					</tr>

					<tr>
						<td>1 Point</td>
						<td>{{$cashPerPoint}}</td>

					</tr>
				</table>
			</div>
		</div>

		<div class="row sign-up-row-background">
			<div class="col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10">

				<h1 class="white-font">Sign Up</h1>
				<p class="white-font">Unfortunately, public sign ups are not yet open. Good news is that we'll send you email once they are.</p>

				{!! Form::open(array('route' => 'sign-up-beta-post', 'class' => 'form')) !!}


					<div class="row">
						<div class="col-sm-6 col-sm-offset-2">
							<div class="form-group">
								{!! Form::text('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Your email', 'type'=>'email')) !!}
							</div>
						</div>

						<div class="col-sm-2">
							<div class="form-group">
								{!! Form::submit('Submit', array('class'=>'btn btn-primary btn-lg')) !!}
							</div>
						</div>
					</div>

				{!! Form::close() !!}

				<p class="small white-font">The only email you will receive from is when registrations begin.
				Your email address will not be given to anyone else.</p>

			</div>
		</div>
	</div>
@endsection
