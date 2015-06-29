<a href="/post/{{$post->slug}}">
    <div class="home-thumbnail-wrapper {{$thumbnailClass or $post->determineThumbnailBucket()}}">

        <div class="home-thumbnail-title">
            {{$post->title}}
            <div class="home-thumbnail-info">
                {{$post->total_views}} <b>VIEWS </b>|
                {{strtoupper(date_format($post->updated_at, "F j, Y"))}}
            </div>
        </div>

        <div class="thumbnail-hover-background">
            {{--<div class="thumbnail-go">GO <span class="glyphicon glyphicon-arrow-right"></span>--}}
            {{--</div>--}}
        </div>

        <div href="#" style="background-image: url('/upload/{{$post->thumbnail_image}}')" class="home-thumbnail" ></div>

    </div>
</a>
