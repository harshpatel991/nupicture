@extends('app')

@section('page-title')
    {{$post->title}} | {{Config::get('app.name')}}
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">

            <article class="col-md-offset-1 col-md-7 col-sm-8 post-main-column white-background post-body" itemscope itemtype ="http://schema.org/Article"> {{--Main content column--}}
                <meta itemprop="image" content="http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}" />

                <span class="h6 highlight-blue pull-right" itemprop="articleSection">{{ $post->category or 'Category' }}</span>

                <h6 style="margin-bottom: 0px;">Tell yo friends</h6>
                <a href="https://twitter.com/intent/tweet?url={{Request::url()}}&text={{$post->title}}"><img src="/images/twitter.png" class="social-media-icons"></a>
                <a href="http://www.facebook.com/sharer/sharer.php?u={{Request::url()}}"><img src="/images/facebook.png" class="social-media-icons"></a>
                <a href="https://plus.google.com/share?url={{Request::url()}}"><img src="/images/google-plus.png" class="social-media-icons "></a>
                <a href="http://pinterest.com/pin/create/button/?url={{Request::url()}}&media=http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}&description={{$post->title}}"><img src="/images/pintrest.png" class="social-media-icons"></a>

                <h1 itemprop="headline">{!! clean($post->title) !!}</h1>

                <span itemprop="articleBody">
                @foreach ($sections as $section)

                    @if($section->isTextSection())
                        @if($section->optional_content) <h3>{!! clean($section->optional_content) !!}</h3> @endif
                        @if(strlen($section->content) > 0)<p class="post-text-section">{!! str_replace( "\n", '<br />', clean($section->content) );  !!}</p>@endif
                    @elseif($section->isImageSection())
                        <img src="http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$section->content}}" class="post-image" itemprop="image">
                        @if(strlen($section->optional_content) > 0)
                            <h6 class="text-center"><a target="_blank" href="{!! clean($section->optional_content) !!}" itemprop="citation" rel="nofollow">Image Source</a></h6>
                        @endif
                    @elseif($section->isYoutubeSection())
                        @if($section->optional_content) <h3>{!! clean($section->optional_content) !!}</h3> @endif
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item youtube-section" src="https://www.youtube.com/embed/{{$section->content}}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @elseif($section->isListNumberSection())
                        <div><h3>{{$listNumberCounter++}}. {!! clean($section->optional_content) !!}</h3></div>
                    @endif

                @endforeach
                </span>

                @if(count($sources) > 0)

                    <h4>Sources</h4>
                    @foreach($sources as $source)
                        @if($source->isSourceSection())
                            <p><a target="_blank" href="{{$source->content}}" itemprop="citation" rel="nofollow">{{$source->content}}</a></p>
                        @endif
                    @endforeach

                @endif

                <div class="background-gray"> {{--Post meta data--}}
                    <div class="row">
                        <div class="col-sm-4"> <h6 class="text-center"><span class="glyphicon glyphicon-user"></span> <span itemprop="author">{{ $postedBy->username or 'Username' }}</span> </h6></div>
                        <div class="col-sm-4"> <h6 class="text-center"><span class="glyphicon glyphicon-time"></span> <span itemprop="datePublished"> {{$postedDate or 'Date' }}</span> </h6></div>
                        <div class="col-sm-4"> <h6 class="text-center"><span class="glyphicon glyphicon-fire"></span> {{ $post->views or '0' }} Views </h6> </div>
                    </div>
                </div>


                @include('partials/leaderboard', ['publisherId' => $publisherId])


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
            </article>

            <aside class="col-md-3 col-sm-4 post-sidebar"> {{--Side bar--}}
                <div class="white-background post-main-column post-news-letter">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert"><p class="text-center white-font">{{ Session::get('message') }}</p></div>
                    @endif
                    @if (Session::has('errors'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('errors')->first() }}</div>
                    @endif
                    <h6 div class="text-center" style="color:#c3ced1;">Never miss a post</h6>
                    <h3 div class="text-center" style="color:#475062; margin-top: 10px;">GET ON THE NEWSLETTER</h3>

                    {!! Form::open(array('route' => 'sign-up-notifications', 'class' => 'form')) !!}
                        <div class="input-group">
                            {!! Form::email('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'YOUR EMAIL', 'type'=>'email', 'style' => 'height: 36px;')) !!}
                            <span class="input-group-btn">
                                {!! Form::submit('Join!', array('class'=>'btn btn-danger', 'id' => 'submit-email-form')) !!}
                            </span>
                        </div>
                    {!! Form::close() !!}

                </div>

                <div class="white-background post-main-column">
                    @include('partials/large-rectangle', ['publisherId' => $publisherId])
                    <br>
                    <h4 class="section-intro-heading">POPULAR POSTS</h4>

                    @foreach($popularPosts as $popularPost)
                        @include('partials/horizontalPost', ['post' => $popularPost])
                    @endforeach

                    @include('partials/large-skyscraper', ['publisherId' => $publisherId])
                </div>
            </aside>

        </div>
    </div>
@endsection

