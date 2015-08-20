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

        @include('partials/hero', ['post' => $posts[3]])

        <div class="row">

            <div class="col-sm-9 col-lg-8 col-lg-offset-1"> {{--Left main column--}}

                <div class="row">
                        <div class="col-sm-12 col-md-6 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[5], 'lg' => true])
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
                                @include('partials/thumbnail-stylized', ['post' => $posts[0], 'lg' => false])
                        </div>
                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[4], 'lg' => false])
                        </div>
                        <div class="col-sm-6 col-md-6 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[6], 'lg' => true])
                        </div>
                </div>

                <div class="row">
                        <div class="col-sm-12 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[7], 'lg' => false])
                        </div>

                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[8], 'lg' => false])
                        </div>

                        <div class="col-sm-6 col-md-3 home-column-padding">
                                @include('partials/thumbnail', ['post' => $posts[9], 'lg' => false])
                        </div>

                        <div class="col-sm-12 col-md-3 home-column-padding">
                                @include('partials/thumbnail-stylized', ['post' => $posts[10], 'lg' => false])
                        </div>
                </div>

            </div>


            <div class="col-sm-3 col-md-3 col-lg-2 home-sidebar"> {{--Side bar column--}}
                <div class="white-background">

                    <div style="background-color: #6BAAD9; width: 100%; height; 250px; padding: 10px;">
                        <h2 style="color: #fff; margin-top: 5px; margin-bottom: 5px;">Write & Earn</h2>
                        <h4 style="color: #fff;">Write articles on {{ Config::get('app.name') }} and earn money</h4>
                        <a href="/auth/register" class="btn btn-default" style="margin: 0 auto;">Join <span class="glyphicon glyphicon-chevron-right"></span></a>
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
