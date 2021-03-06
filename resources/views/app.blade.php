<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/images/favicon.png" />
	<title>@yield('page-title')</title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <link href='http://fonts.googleapis.com/css?family=Montserrat:400' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->

</head>
<body>
	<nav class="navbar navbar-default" itemscope itemtype="http://schema.org/WPHeader">
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

						{{--<a class="navbar-brand" href="/">{{strtoupper(Config::get('app.name'))}}</a>--}}

                        <a href="/">
                            <img src="/images/logo.jpg" class="navbar-brand-image" alt="{{Config::get('app.name')}}">
                        </a>

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

                            @if (Auth::guest())

                                <li>
                                    <form action="{{ url('/auth/login') }}" class="display-inline">
                                        <button type="submit" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-log-in"></span> <span itemscope itemtype="http://schema.org/SiteNavigationElement">Login</span></button>
                                    </form>
                                </li>

                                <li>
                                    <form action="{{ url('/auth/register') }}" class="display-inline">
                                        <button href="/sign-up-beta" class="btn btn-primary navbar-btn" itemscope itemtype="http://schema.org/SiteNavigationElement"><span class="glyphicon glyphicon-usd"></span> Write and Earn</button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <form action="{{ url('/post/create') }}" class="display-inline">
                                        <button type="submit" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-plus-sign"></span> <span itemscope itemtype="http://schema.org/SiteNavigationElement">Post</span></button>
                                    </form>
                                </li>

                                <li>
                                    <div class="btn-group navbar-btn">
                                        <a href="/profile" type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> <span itemscope itemtype="http://schema.org/SiteNavigationElement">{{ Auth::user()->username }}</span></a>
                                        <button type="button" class="btn btn-default dropdown-toggle" id="profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('/preferences') }}" class="category" id="logout-button"><span itemscope itemtype="http://schema.org/SiteNavigationElement"><span class="glyphicon glyphicon-cog"></span> Preferences</span></a></li>
                                            <li><a href="{{ url('/auth/logout') }}" class="category" id="logout-button"><span itemscope itemtype="http://schema.org/SiteNavigationElement"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>
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

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>


	@include('partials/footer')

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

	@yield('scripts')

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-66631637-1', 'auto');
        ga('send', 'pageview');

    </script>

</body>
</html>
