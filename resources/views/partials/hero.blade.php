<div class="row">
    <div class="hero-wrapper">
        <div class="col-sm-12 col-lg-10 col-lg-offset-1 hero home-column-padding" style="background-image: url('http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}');">
            <a href="/post/{{$post->slug}}">
                <div class="hero-overlay">
                    <div class="hero-title">
                        {{$post->title}}
                        <div class="hero-info">
                            <span class="glyphicon glyphicon-fire"></span> {{$post->views}} VIEWS |
                            <span class="glyphicon glyphicon-time"></span> {{strtoupper(date_format($post->updated_at, "F j, Y"))}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>