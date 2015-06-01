@extends('app')

@section('page-title')
    {{$post->title}} | Nu Picture
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-1 col-md-7 col-sm-offset-1 col-sm-6">

                <div class="category">{{ $post->category or 'Category' }}</div>

                <h1>{{ $post->title or 'Title' }}</h1>
                <h6>{{ $postedBy->username or 'Username' }} | Posted On {{ $post->posted_at or 'Date' }}  </h6>

                <h6><span class="badge"><span class="glyphicon glyphicon-fire"></span> {{ $post->total_views or 'Content goes in here...' }} Views </span></h6>


                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    {{ $post->content or 'Content goes in here...' }}
                </p>


                <hr>
                <h4 class="section-intro-heading">RELATED POSTS</h4>


                <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-12 home-column-padding">
                        @include('partials/thumbnail', ['post' => $relatedPosts[0], 'thumbnailClass' => 'sm'])
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6 home-column-padding">
                        @include('partials/thumbnail', ['post' => $relatedPosts[1], 'thumbnailClass' => 'sm'])
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-6 home-column-padding">
                        @include('partials/thumbnail', ['post' => $relatedPosts[2], 'thumbnailClass' => 'sm'])
                    </div>

                </div>


                @include('partials.comments', ['id' => $post->id, 'title' => $post->title])

            </div>



            <div class="col-md-3 col-sm-4">
                <h4 class="section-intro-heading">POPULAR POSTS</h4>

                @foreach($popularPosts as $popularPost)
                    @include('partials/horizontalPost', ['post' => $popularPost])
                @endforeach

            </div>

        </div>
    </div>
@endsection

