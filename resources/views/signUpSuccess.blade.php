@extends('app')

@section('page-title')
    Thanks for Registering
@endsection

@section('content')
	<div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <br>
                <br>
                <h1 class="text-center">You're almost there! Check your inbox</h1>
                <br>
                <img src="/images/email-icon.png" width="130" height="130" class="center-block">
                <br>
                <h3 class="text-center">A verification link has been sent to {{$email}}.</h3>
                <br>
                <br>
                <p>While you're waiting, check out these handy pages to help you get started</p>
                <ul>
                    <li></li>
                </ul>
                <br>
                <br>
                <br><br>
                <br>
                <br>
                <br><br>
                <br>
                <br>
                <br>


			</div> {{--End white background--}}
		</div>

	</div>
@endsection