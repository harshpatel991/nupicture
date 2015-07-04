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

                    <h2>Login</h2>

                        <div class="panel panel-default">
                            <div class="panel-body">

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">E-Mail Address</label>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-7 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Login</button>

                                        <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
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
