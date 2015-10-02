<div class="media" itemscope itemtype="http://schema.org/Article">

    <div class=" media-middle">
        <a href="/post/{{$post->slug}}">
            <div class="media-object horizontal-post-image" style="background-image: url('http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}')"></div>
            <meta itemprop="image" content="http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}" />
        </a>
    </div>

    <div class="media-body">
        <a href="/post/{{$post->slug}}" class="horizontal-post-title"><h5 class="media-heading" itemprop="headline">{{$post->title}}</h5></a>

        <div class="horizontal-info">
            <span class="glyphicon glyphicon-fire"></span> {{$post->views}} VIEWS |
            <span class="glyphicon glyphicon-time"></span> {{strtoupper($post->posted_at->diffForHumans())}}
            <meta itemprop="datePublished" content="{{$post->posted_at}}" />
        </div>
    </div>

</div>
