<div class="row" itemscope itemtype="http://schema.org/Article">
    <div class="hero-wrapper">
        <div class="col-sm-12 col-lg-10 col-lg-offset-1 hero home-column-padding" style="background-image: url('http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}');">
            <meta itemprop="image" content="http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}" />
            <a href="/post/{{$post->slug}}">
                <div class="hero-overlay">
                    <div class="hero-title">
                        <span itemprop="headline">{{$post->title}}</span>
                        <div class="hero-info">
                            <span class="glyphicon glyphicon-fire"></span> {{$post->views}} VIEWS |
                            <span class="glyphicon glyphicon-time"></span> {{strtoupper(date_format($post->posted_at, "F j, Y"))}}
                            <meta itemprop="datePublished" content="{{$post->posted_at}}" />
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>