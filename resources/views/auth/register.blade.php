@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-offset-1 col-md-10 white-background">

            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h2>Register</h2>

                        <div class="panel panel-default">
                            <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">User Name <span class="glyphicon glyphicon-user"></span></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">E-Mail Address <span class="glyphicon glyphicon-envelope"></span></label>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password <span class="glyphicon glyphicon-lock"></span></label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Confirm Password <span class="glyphicon glyphicon-lock"></span></label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Adsense Publisher ID
                                        <a href="#" data-toggle="tooltip" title="When logged into Adsense, click your email in the top right to find your Publisher ID." data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="publisher_id" placeholder="pub-xxxxxxxxxxxxxxxx">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>{{--End inner row--}}

		</div>
	</div>{{--End outer row--}}
</div>
@endsection


@section('scripts')
    <script src="/js/registration.js"></script>
@endsection