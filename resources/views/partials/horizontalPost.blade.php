<div class="media">

    <div class=" media-middle">
        <a href="/post/{{$post->slug}}">
            <img class="media-object horizontal-post-image" style="background-image: url('/upload/{{$post->thumbnail_image}}')">
        </a>
    </div>

    <div class="media-body">
        <a href="/post/{{$post->slug}}" class="horizontal-post-title"><h5 class="media-heading">{{$post->title}}</h5></a>

        <div class="horizontal-info">
            <span class="glyphicon glyphicon-fire"></span> {{$post->views}} VIEWS |
            <span class="glyphicon glyphicon-time"></span> {{strtoupper($post->created_at->diffForHumans())}}
        </div>
    </div>

</div>
