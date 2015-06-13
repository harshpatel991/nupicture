<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('page-title')</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-12 col-md-offset-1 col-md-10">

					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
							<span class="glyphicon glyphicon-filter"></span>
						</button>

						<a class="navbar-brand" href="/">NU PICTURE</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							@if (Auth::guest())
								<li><a href="{{ url('/auth/login') }}" class="category"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
								<li><a href="{{ url('/auth/register') }}" class="category"><span class="glyphicon glyphicon-edit"></span> Register</a></li>
							@else
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="{{ url('/auth/logout') }}" class="category">Logout</a></li>
									</ul>
								</li>
							@endif

							<li>
								<form action="{{ url('/post/create') }}" class="display-inline">
									<button type="submit" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-plus-sign"></span> Post</button>
								</form>
							</li>

							<li>
								<form action="{{ url('/sign-up-beta') }}" class="display-inline">
									<button href="/sign-up-beta" class="btn btn-primary navbar-btn">Learn More & Sign Up</button>
								</form>

							</li>
						</ul>

					</div> {{--End collapse--}}

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
						<ul class="nav navbar-nav">
							<li><a class="category" href="/">ALL</a></li>
							<li><a class="category" href="/art">ART</a></li>
							<li><a class="category" href="/cute">CUTE</a></li>
							<li><a class="category" href="/funny">FUNNY</a></li>
							<li><a class="category" href="/interesting">INTERESTING</a></li>
							<li><a class="category" href="/photography">PHOTOGRAPHY</a></li>
							<li><a class="category" href="/woah">WOAH</a></li>
						</ul>

					</div>

					<hr class="clear-both" style="margin-top: 0px;">

				</div> {{--End column--}}
			</div> {{--End row--}}
		</div> {{--End container fluid--}}
	</nav>

	@yield('content')

	@include('partials/footer')

	<!-- Scripts -->
	<script src="/js/jquery-2.1.4.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	@yield('scripts')
</body>
</html>
