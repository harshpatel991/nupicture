<span itemscope itemtype="http://schema.org/Article">
    <a href="/post/{{$post->slug}}" style="text-decoration : none">
        <div class="home-thumbnail-wrapper">

            <div href="#" style="background-image: url('http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}')" class="home-thumbnail-image-section stylized" >
                <meta itemprop="image" content="http://s3-us-west-2.amazonaws.com/topicloop-upload2/{{$post->thumbnail_image}}" />
                <div class="home-thumbnail-image-stylized-overlay">


                    <div class="home-thumbnail-title stylized">
                        <div class="home-thumbnail-category"><span class="white-highlight">{{$post->category}}</span></div>
                        <span itemprop="headline">{{$post->title}}</span>

                        <div class="home-thumbnail-summary stylized" itemprop="text">
                            {{clean($post->summary)}}
                        </div>

                        <div class="home-thumbnail-info stylized">
                            <span class="glyphicon glyphicon-fire"></span> {{$post->views}} <b>VIEWS </b>|
                            <span class="glyphicon glyphicon-time"></span> {{strtoupper($post->posted_at->diffForHumans())}}
                            <meta itemprop="datePublished" content="{{$post->posted_at}}" />
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </a>
</span>