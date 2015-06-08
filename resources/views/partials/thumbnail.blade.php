<a href="/post/{{$post->slug}}">
    <div class="home-thumbnail-wrapper {{$thumbnailClass or $post->determineThumbnailBucket()}}">

        <div class="home-thumbnail-title">
            {{$post->title}}
            <div class="home-thumbnail-info">
                {{$post->total_views}} VIEWS |
                POSTED {{strtoupper(date_format($post->updated_at, "F j, Y, g a"))}}
            </div>
        </div>

        <div class="thumbnail-hover-background">
            <div class="thumbnail-go">GO <span class="glyphicon glyphicon-arrow-right"></span>
            </div>
        </div>

        <div href="#" style="background-image: url('/upload/{{$post->content}}')" class="home-thumbnail" ></div>

    </div>
</a>
