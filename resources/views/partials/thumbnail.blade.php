
    <a href="/post/{{$post->slug}}">
        <div class="home-thumbnail-wrapper {{$thumbnailClass or $post->determineThumnailBucket()}}">

            <div class="home-thumbnail-title">
                {{$post->title}}
                <div class="home-thumbnail-info">
                    {{$post->total_views}} VIEWS |
                    POSTED: {{$post->updated_at}}
                </div>
            </div>

            <div href="#" style="background-image: url('/upload/{{$post->content}}')" class="home-thumbnail" ></div>

        </div>
    </a>
