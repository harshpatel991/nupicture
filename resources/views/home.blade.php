@extends('app')

@section('page-title')
    {{Config::get('app.name')}} | Home
@endsection

@section('content')
	<div class="container-fluid">

        @include('partials/hero', ['post' => $posts[3]])


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

                    <div style="background-color: #bdc3c7; width: 100%; height; 250px; padding: 10px;">
                        <h2 style="color: #fff;">Write & Earn</h2>
                        <h4 style="color: #fff;">Write articles on Nu Picture and earn cash</h4>
                        <div class="btn btn-primary" style="margin: 0 auto;">Join <span class="glyphicon glyphicon-chevron-right"></span></div>
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
