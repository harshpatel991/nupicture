<a href="/post/{{$post->slug}}" style="text-decoration : none">
    <div class="home-thumbnail-wrapper">

        <div href="#" style="background-image: url('/upload/{{$post->thumbnail_image}}')" class="home-thumbnail-image-section stylized" >
            <div class="home-thumbnail-image-stylized-overlay">


                <div class="home-thumbnail-title stylized">
                    <div class="home-thumbnail-category"><span class="white-highlight">{{$post->category}}</span></div>
                    {{$post->title}}

                    <div class="home-thumbnail-summary stylized">
                        {{$post->getStrippedContent()}}
                    </div>

                    <div class="home-thumbnail-info stylized">
                        <span class="glyphicon glyphicon-fire"></span> {{$post->views}} <b>VIEWS </b>|
                        <span class="glyphicon glyphicon-time"></span> {{strtoupper($post->posted_at->diffForHumans())}}
                    </div>

                </div>

            </div>
        </div>


    </div>

</a>