@extends('app')

@section('page-title')
    Thanks for Registering
@endsection

@section('content')
	<div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <br>
                <h1 class="text-center">You're all set!</h1>
                <br>
                <img src="/images/email-icon.png" width="130" height="130" class="center-block">

                <h3 class="text-center">We're thrilled to have you here.</h3>
                <br>
                <div class="text-center">
                    <a href="/post/create" class="btn btn-lg btn-primary">Create Your First Post</a>
                    <b>or</b>
                    <a href="/post/{{$randomPost->slug}}" class="btn btn-lg btn-primary">View A Random Post</a>
                </div>
                <br>
                <br><br>
                <br>
                <br>
                <br><br>



			</div> {{--End white background--}}
		</div>

	</div>
@endsection