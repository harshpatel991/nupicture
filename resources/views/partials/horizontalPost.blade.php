<div class="media">
    <div class="media-left">
        <a href="#">
            <div class="horizontal-post-image" style="background-image: url('/upload/{{$post->content}}')"></div>
        </a>
    </div>
    <div class="media-body">
        <h5>{{$post->title or 'Post Title'}}</h5>

        <h6>{{ $postedBy->username or 'Username' }} | Posted On {{ $post->posted_at or 'Date' }}  </h6>
        <h6><span class="badge"><span class="glyphicon glyphicon-fire"></span> {{ $post->total_views or 'Content goes in here...' }} Views </span></h6>
    </div>
</div>