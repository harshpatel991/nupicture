@extends('app')

@section('page-title')
    Home | {{Config::get('app.name')}}
@endsection

@section('navColumn')
    <div class="col-sm-12 col-lg-offset-1 col-lg-10 white-background" style="padding: 10px 10px;">
@endsection

@section('content')
	<div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 col-lg-10 col-lg-offset-1">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @elseif (Session::has('errors'))
                    <div class="alert alert-danger" role="alert">{{ Session::get('errors')->first('confirmation') }}</div>
                @endif
            </div>
        </div>

        @include('partials/hero', ['post' => $heroPost])

        <div class="row">

            <div class="col-sm-9 col-lg-8 col-lg-offset-1"> {{--Left main column--}}

                <div class="row">
                        <div class="col-sm-12 col-md-6 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[0], 'lg' => true])
                        </div>
                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[1], 'lg' => false])
                        </div>
                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail-stylized', ['post' => $posts[2], 'lg' => false])
                        </div>
                </div>

                <div class="row">
                        <div class="col-sm-12 col-md-3 home-column-padding">
                                @include('partials/thumbnail-stylized', ['post' => $posts[3], 'lg' => false])
                        </div>
                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[4], 'lg' => false])
                        </div>
                        <div class="col-sm-6 col-md-6 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[5], 'lg' => true])
                        </div>
                </div>

                <div class="row">
                        <div class="col-sm-12 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[6], 'lg' => false])
                        </div>

                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[7], 'lg' => false])
                        </div>

                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[8], 'lg' => false])
                        </div>

                        <div class="col-sm-12 col-md-3 home-column-padding">
                                @include('partials/thumbnail-stylized', ['post' => $posts[9], 'lg' => false])
                        </div>
                </div>

            </div>


            <div class="col-sm-3 col-md-3 col-lg-2 home-sidebar"> {{--Side bar column--}}
                <div class="white-background">

                    <div style="background-image: url('images/woman-laptop.jpg'); background-position: center center; background-repeat: no-repeat; background-size: cover;width: 100%; height; 250px; padding: 10px;">
                        <center><h1 style="color: #fff; margin-top: 5px; margin-bottom: 5px;">Write & Earn</h1>
                        <h3 style="color: #fff; padding-bottom: 10px;">Earn money for writing articles on {{ Config::get('app.name') }}</h3>
                        <a href="/auth/register" class="btn btn-default btn" style="margin: 0 auto;">Join <span class="glyphicon glyphicon-chevron-right"></span></a></center>
                    </div>

                    <h4 class="section-intro-heading">POPULAR POSTS</h4>

                    @foreach($popularPosts as $popularPost)
                        @include('partials/horizontalPost', ['post' => $popularPost])
                    @endforeach

                </div>

            </div>


        </div>
	</div>
@endsection
