<div class="media">
    <div class="media-left">
        <a href="/post/{{$post->slug}}">
            <div class="horizontal-post-image" style="background-image: url('/upload/{{$post->thumbnail_image}}')"></div>
        </a>
    </div>
    <div class="media-body">
        <h5><a href="/post/{{$post->slug}}" class="horizontal-post-title">{{$post->title or 'Post Title'}}</a></h5>

        <h6>{{ $postedBy->username or 'Username' }}  </h6>
        <h6><span class="badge"><span class="glyphicon glyphicon-fire"></span> {{ $post->total_views or 'Content goes in here...' }} Views </span></h6>
    </div>
</div>
