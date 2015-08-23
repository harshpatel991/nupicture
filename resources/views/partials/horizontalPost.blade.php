<div class="media">

    <div class=" media-middle">
        <a href="/post/{{$post->slug}}">
            <div class="media-object horizontal-post-image" style="background-image: url('http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}')"></div>
        </a>
    </div>

    <div class="media-body">
        <a href="/post/{{$post->slug}}" class="horizontal-post-title"><h5 class="media-heading">{{$post->title}}</h5></a>

        <div class="horizontal-info">
            <span class="glyphicon glyphicon-fire"></span> {{$post->views}} VIEWS |
            <span class="glyphicon glyphicon-time"></span> {{strtoupper($post->posted_at->diffForHumans())}}
        </div>
    </div>

</div>
