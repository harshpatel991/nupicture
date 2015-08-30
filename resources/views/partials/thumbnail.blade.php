<span itemscope itemtype="http://schema.org/Article">
<a href="/post/{{$post->slug}}" style="text-decoration : none">
    <div class="home-thumbnail-wrapper">

        <div href="#" style="background-image: url('http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}')" class="home-thumbnail-image-section" ></div>
        <meta itemprop="image" content="http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}" />

        <div class="home-thumbnail-text-section">

            <div class="home-thumbnail-title">
                <div class="home-thumbnail-category">{{$post->category}}</div>
                <div itemprop="headline">{{$post->title}}</div>

                @if($lg)
                    <div class="home-thumbnail-summary" itemprop="text">
                        {{clean($post->summary)}}
                    </div>
                @else
                    <div class="home-thumbnail-summary visible-xs-block" itemprop="text">
                        {{clean($post->summary)}}
                    </div>
                @endif


            </div>

            <div class="home-thumbnail-info">
                <span class="glyphicon glyphicon-fire"></span> {{$post->views}} VIEWS|
                <span class="glyphicon glyphicon-time"></span> {{strtoupper($post->posted_at->diffForHumans())}}
                <meta itemprop="datePublished" content="{{$post->posted_at}}" />
            </div>

        </div>

    </div>

</a>
    </span>