<a href="/post/{{$post->slug}}" style="text-decoration : none">
    <div class="home-thumbnail-wrapper">

        <div href="#" style="background-image: url('/upload/{{$post->thumbnail_image}}')" class="home-thumbnail-image-section stylized" >
            <div class="home-thumbnail-image-stylized-overlay">


                <div class="home-thumbnail-title stylized">
                    <div class="home-thumbnail-category">{{$post->category}}</div>
                    {{$post->title}}

                    <div class="home-thumbnail-summary stylized">
                        {{$post->getStrippedContent()}}
                    </div>

                    <div class="home-thumbnail-info stylized">
                        {{$post->views}} <b>VIEWS </b>|
                        {{strtoupper(date_format($post->updated_at, "F j, Y"))}}
                    </div>


                </div>

            </div>
        </div>


    </div>

</a>