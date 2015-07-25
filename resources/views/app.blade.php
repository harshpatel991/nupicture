<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('page-title')</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <!-- Scripts -->
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script src="/js/analyticsTracking.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="row">

                @yield('navColumn', '<div class="col-sm-12 col-md-offset-1 col-md-10 white-background" style="padding: 10px 10px;">')
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="/">{{strtoupper(Config::get('app.name'))}}</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">

                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">CATEGORIES <span class="caret"></span></a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a class="category" href="/">ALL</a></li>--}}
                                    {{--<li><a class="category" href="/art">ART</a></li>--}}
                                    {{--<li><a class="category" href="/cute">CUTE</a></li>--}}
                                    {{--<li><a class="category" href="/funny">FUNNY</a></li>--}}
                                    {{--<li><a class="category" href="/interesting">INTERESTING</a></li>--}}
                                    {{--<li><a class="category" href="/movies">MOVIES</a></li>--}}
                                    {{--<li><a class="category" href="/news">NEWS</a></li>--}}
                                    {{--<li><a class="category" href="/photography">PHOTOGRAPHY</a></li>--}}
                                    {{--<li><a class="category" href="/tv">TV</a></li>--}}
                                    {{--<li><a class="category" href="/woah">WOAH</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}

							<li>
								<form action="{{ url('/post/create') }}" class="display-inline">
									<button type="submit" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-plus-sign"></span> Post</button>
								</form>
							</li>

							<li>
								<form action="{{ url('/sign-up-beta') }}" class="display-inline">
									<button href="/sign-up-beta" class="btn btn-default navbar-btn">Learn More & Sign Up</button>
								</form>

							</li>

                            @if (Auth::guest())
                                {{--<li><a href="{{ url('/auth/login') }}" class="category"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>--}}
                                {{--<li><a href="{{ url('/auth/register') }}" class="category"><span class="glyphicon glyphicon-edit"></span> Register</a></li>--}}
                            @else
                                <li>
                                    <div class="btn-group navbar-btn">
                                        <a href="/profile" type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }}</a>
                                        <button type="button" class="btn btn-default dropdown-toggle" id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('/auth/logout') }}" class="category" id="logout-button">Logout</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @endif

						</ul>

					</div> {{--End collapse--}}


				</div> {{--End column--}}
			</div> {{--End row--}}
		</div> {{--End container fluid--}}
	</nav>

	@yield('content')

	@include('partials/footer')


	@yield('scripts')
</body>
</html>
