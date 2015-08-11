<a href="/post/{{$post->slug}}" style="text-decoration : none">
    <div class="home-thumbnail-wrapper">

        <div href="#" style="background-image: url('/upload/{{$post->thumbnail_image}}')" class="home-thumbnail-image-section" ></div>

        <div class="home-thumbnail-text-section">

            <div class="home-thumbnail-title">
                <div class="home-thumbnail-category">{{$post->category}}</div>
                <div>{{$post->title}}</div>

                @if($lg)
                    <div class="home-thumbnail-summary">
                        {{clean($post->summary)}}
                    </div>
                @else
                    <div class="home-thumbnail-summary visible-xs-block">
                        {{clean($post->summary)}}
                    </div>
                @endif


            </div>

            <div class="home-thumbnail-info">
                <span class="glyphicon glyphicon-fire"></span> {{$post->views}} VIEWS|
                <span class="glyphicon glyphicon-time"></span> {{strtoupper($post->posted_at->diffForHumans())}}
            </div>

        </div>

    </div>

</a>