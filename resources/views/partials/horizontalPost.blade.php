<div class="media">

    <div class="media-left media-middle">
        <a href="/post/{{$post->slug}}">
            <img class="media-object horizontal-post-image" style="background-image: url('/upload/{{$post->thumbnail_image}}')">
        </a>
    </div>

    <div class="media-body">
        <a href="/post/{{$post->slug}}" class="horizontal-post-title"><h5 class="media-heading">{{$post->title}}</h5></a>

        <div class="horizontal-info">
            {{$post->views}} <b>VIEWS </b> <br>
            {{strtoupper(date_format($post->updated_at, "F j, Y"))}}
        </div>
    </div>

</div>
