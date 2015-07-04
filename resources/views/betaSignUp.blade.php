@extends('app')

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10">

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif

                        @if (Session::has('errors'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('errors')->first('email') }}</div>
                        @endif

                        <h1 style="padding-top: 10px;">Welcome</h1>
                        <p>You and your friends probably already share and view content from the internet through email, Facebook, and Twitter. Now you can get paid for it.</p>

                        <h3>How it Works</h3>
                        <p>Once logged in, you will see a button in the top right to post content. Submit content such as images, lists, and articles. We are looking for funny, interesting, and cool content. Check out the <a href="/">frontpage</a> for inspiration.</p>

                        <p>When you submit a post, it will be manually reviewed by a human.</p>
                        <p>Reasons for denial include</p>

                        <ul>
                            <li><p>Posting content that has already been posted</p></li>
                            <li><p>Posting with severe grammatical errors</p></li>
                            <li><p>Spam/inappropriate content</p></li>
                        </ul>

                        <p>As long as your post doesn't fall into the above categories, your post will be approved in less than 12 hours.</p>

                        <h3>Gaining Points</h3>
                        <p>You will earn points for each post you make and additionally for amount of unique views that post receives.</p>

                        <p>Once a post is listed, you can start accumulating views to your post.</p>
                        <p>If you have reached a minimum of 4000 points ($10), you can request a payout. Payouts occur via PayPal at the end of each week.</p>


                    </div>
                </div> {{--End inner row--}}

			</div>
		</div> {{--End outer row--}}

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
								{!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
							</div>
						</div>
					</div>

				{!! Form::close() !!}

				<p class="small white-font">The only email you will receive from us is when registrations begin.
				Your email address will not be shared with anyone else.</p>

			</div>
		</div>
	</div>
@endsection