@extends('app')

@section('page-title')
    {{$post->title}} | Nu Picture
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-offset-1 col-md-7 col-sm-8 post-main-column white-background"> {{--Main content column--}}


                <a href="https://twitter.com/intent/tweet?url={{Request::url()}}&text={{$post->title}}"><img src="/images/twitter.png" class="social-media-icons"></a>
                <a href="http://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"><img src="/images/facebook.png" class="social-media-icons"></a>
                <a href="https://plus.google.com/share?url={{Request::url()}}"><img src="/images/google-plus.png" class="social-media-icons "></a>
                <a href="http://pinterest.com/pin/create/button/?url={{Request::url()}}&media={{Request::root()}}/upload/{{$post->thumbnail_image}}&description={{$post->title}}"><img src="/images/pintrest.png" class="social-media-icons"></a>

                <h1>{{ $post->title or 'Title' }}</h1>

                <p>
                    {!! $post->content or 'Content goes in here...' !!}
                </p>

                <h6>Posted by <b>{{ $postedBy->username or 'Username' }}</b> in <b>{{ $post->category or 'Category' }}</b> on <b>{{$postedDate or 'Date' }}</b>  </h6>

                <h6><span class="glyphicon glyphicon-fire"></span> {{ $post->views or '0' }} Views </h6>
                <hr>

                <h4 class="section-intro-heading">RELATED POSTS</h4>
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12 home-column-padding">
                        @include('partials/thumbnail', ['post' => $relatedPosts[0], 'lg' => false])
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6 home-column-padding">
                        @include('partials/thumbnail', ['post' => $relatedPosts[1], 'lg' => false])
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6 home-column-padding">
                        @include('partials/thumbnail', ['post' => $relatedPosts[2], 'lg' => false])
                    </div>
                </div>

                @include('partials.comments', ['id' => $post->id, 'title' => $post->title])

            </div>

            <div class="col-md-3 col-sm-4 post-sidebar "> {{--Side bar--}}
                <div class="white-background">
                    <h4 class="section-intro-heading">POPULAR POSTS</h4>

                    @foreach($popularPosts as $popularPost)
                        @include('partials/horizontalPost', ['post' => $popularPost])
                    @endforeach
                </div>

            </div>

        </div>
    </div>
@endsection

