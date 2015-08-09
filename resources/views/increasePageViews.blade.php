@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background blog-post-main-column">

                <div class="row">
                    <div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3">
                        @include('partials/quickLinks', ['active' =>[false, false, true, false]])
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-9">

                        <h1>Increasing Your Readers</h1>
                        <h4>Here are some tips to increase the number of page views that your post receives</h4>
                        <br>
                        <p>Posts that are made specifically to try to earn page views will almost never do well; post content that is funny or interesting to your target audience and allow social media to do the rest.</p>
                        <p>Above all, do not spam your post links on the internet.</p>

                        <ul>
                            <li><b>Facebook</b> - You probably already share interesting content on Facebook. Be careful to not post too many links too frequently or else you may annoy your friends.</li>
                            <li><b>Twitter</b> - If you have a large Twitter following relating to items you post on {{Config::get('app.name')}},it may be appropriate to tweet links to your post on {{Config::get('app.name')}}. Otherwise, if you have a personal account, your friends and family may enjoy the funny/interesting things you’ve posted.</li>
                            <li><b>Stumbleupon</b> -</li>
                            <li><b>Reddit</b> - Similar to Stumbleupon, allow the community to decide if your content is funny/interesting enough to promote. You will probably not get a lot of exposure through the larger default subreddits. Instead, find a smaller subreddit that highly relates to your post and would be found interesting by the community.</li>
                            <li><b>Pinrest</b> - Pintrest users tend to like more visually appealing posts. </li>
                            <li><b>Ranking On Google</b> - Writing lists or articles about topics that are frequently searched for but do not have many search results can lead to a gold mine of page views. (See long tail for more)</li>
                            <li><b>Email</b> - It's old school but if your targeted audience is an older population, many older folks will forward emails they find interesting or funny to many of their friends who will again forward the email resulting in potentially many users viewing your content.</li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection


