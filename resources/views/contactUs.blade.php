@extends('app')

@section('page-title')
    Contact | {{Config::get('app.name')}}
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10">


                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert"><p class="text-center white-font">{{ Session::get('message') }}</p></div>
                    @endif

                    @if (Session::has('errors'))
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h2>Contact Us</h2>
                    <p>Questions, comments, concerns? Post 'em below, we'll get back to you as soon as we can.</p>

                    <div class="panel panel-default">
                        <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/contact-us') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Your Email</label>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Message</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="message" rows="10">{{ old('message') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary" id="submit-contact-us">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div> {{--Inner row--}}

		</div>
	</div> {{--Outter row--}}
</div>
@endsection
