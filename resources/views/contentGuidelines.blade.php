@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background blog-post-main-column">

                <div class="row">
                    <div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3">
                        @include('partials/quickLinks', ['active' =>[false, true, false, false]])
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-9">

                        <h1>Content Guidelines</h1>
                        <h4>Follow these simple guidelines to ensure that your submitted posts are approved quickly</h4>
                        <br>
                        <p>Users who submit 5 posts that meet these content guidelines will have their submitted posts automatically approved and made live on the site.</p>

                        <ol>
                            <li>Content should be written in clear English, free of any major grammatical or spelling errors.</li>
                            <li>Our readers are looking for quality content. Content should not exist for the sole purpose of spamming links.</li>
                            <li>Our targeted readers are 16-40 years old. As such, content should be free of inappropriate links or images.</li>
                            <li>Your post should not encourage users to click on ads or to engage in activity that is against the <a href="https://support.google.com/adsense/topic/1261918?hl=en&ref_topic=1250104">Adsense Program Policies</a>. </li>
                            <li>Use high quality, relevant images. <a href="https://unsplash.com/">Unsplash</a> has royalty free images you can use.</li>
                        </ol>

                        <p>There is no minimum posting length. Use your best judgement to appropriately size your post.</p>


                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection


