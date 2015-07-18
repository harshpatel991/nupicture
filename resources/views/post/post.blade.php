@extends('app')

@section('page-title')
    {{$post->title}} | {{strtoupper(Config::get('app.name'))}}
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-offset-1 col-md-7 col-sm-8 post-main-column white-background"> {{--Main content column--}}

                <a href="https://twitter.com/intent/tweet?url={{Request::url()}}&text={{$post->title}}"><img src="/images/twitter.png" class="social-media-icons"></a>
                <a href="http://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"><img src="/images/facebook.png" class="social-media-icons"></a>
                <a href="https://plus.google.com/share?url={{Request::url()}}"><img src="/images/google-plus.png" class="social-media-icons "></a>
                <a href="http://pinterest.com/pin/create/button/?url={{Request::url()}}&media={{Request::root()}}/upload/{{$post->thumbnail_image}}&description={{$post->title}}"><img src="/images/pintrest.png" class="social-media-icons"></a>

                <h6>{{ $post->category or 'Category' }}</h6>
                <h1>{!! clean($post->title) !!}</h1>

                @foreach ($sections as $section)

                    @if($section->isTextSection())
                        <h3>{!! clean($section->optional_content) !!}</h3>
                        <p>{!! clean($section->content) !!}</p>
                    @elseif($section->isImageSection())
                        <img src="/upload/{{$section->content}}" class="post-image">
                    @elseif($section->isListNumberSection())
                        <div><h3>{{$listNumberCounter++}}. {!! clean($section->optional_content) !!}</h3></div>
                    @endif

                @endforeach

                @if(count($sources) > 0)

                    <h4>Sources</h4>
                    @foreach($sources as $source)
                        @if($source->isSourceSection())
                            <p><a href="{{$source->content}}">{{$source->content}}</a></p>
                        @endif
                    @endforeach

                @endif

                <div class="background-gray"> {{--Post meta data--}}
                    <div class="row">
                        <div class="col-sm-4"> <h6 class="text-center"><span class="glyphicon glyphicon-user"></span> {{ $postedBy->username or 'Username' }} </h6></div>
                        <div class="col-sm-4"> <h6 class="text-center"><span class="glyphicon glyphicon-time"></span> {{$postedDate or 'Date' }} </h6></div>
                        <div class="col-sm-4"> <h6 class="text-center"><span class="glyphicon glyphicon-fire"></span> {{ $post->views or '0' }} Views </h6> </div>
                    </div>


                </div>

                <hr>
                    @include('partials/leaderboard', ['publisherId' => $publisherId])
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
                    @include('partials/large-rectangle', ['publisherId' => $publisherId])

                    <h4 class="section-intro-heading">POPULAR POSTS</h4>

                    @foreach($popularPosts as $popularPost)
                        @include('partials/horizontalPost', ['post' => $popularPost])
                    @endforeach

                    @include('partials/large-skyscraper', ['publisherId' => $publisherId])
                </div>

            </div>

        </div>
    </div>
@endsection

