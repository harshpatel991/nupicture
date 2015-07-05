<div class="media">

    <div class="media-left media-middle">
        <a href="#">
            <img class="media-object horizontal-post-image" style="background-image: url('/upload/{{$post->thumbnail_image}}')">
        </a>
    </div>

    <div class="media-body">
        <h5 class="media-heading">{{$post->title}}</h5>

        <div class="horizontal-info">
            {{$post->views}} <b>VIEWS </b> <br>
            {{strtoupper(date_format($post->updated_at, "F j, Y"))}}
        </div>
    </div>

</div>
