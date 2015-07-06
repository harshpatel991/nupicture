@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10">


                        <h1>Exposure Guide</h1>
                        <p>Here are some tips to increase the number of page views that your post receives. Posts that are made specifically to try to earn page views will almost never do well; post content that is funny or interesting to your target audience and allow social media to do the rest. Above all, do not spam your post on the internet as it will decrease the reputation  of {{Config::get('app.name')}} and result in lower payouts for everyone. </p>

                        <ul>
                            <li><p><b>Facebook</b> - You probably already share interesting content on Facebook. Post a link to {{Config::get('app.name')}}. Be careful to not post too many links too frequently or else you may annoy your friends.</p></li>
                            <li><p><b>Twitter</b> - If you have a large Twitter following relating to items you post on {{Config::get('app.name')}},it may be appropriate to tweet links to {{Config::get('app.name')}} multiple times a day. Otherwise, if you have a personal account, your friends and family may enjoy the funny/interesting things you’ve posted on {{Config::get('app.name')}}.</p></li>
                            <li><p><b>Stumbleupon</b> -</p></li>
                            <li><p><b>Reddit</b> - Similar to Stumbleupon, allow the community to decide if your content is funny/interesting enough to promote. You will probably not get a lot of exposure through the larger default subreddits. Instead, find a smaller subreddit that relates to your post and post it there.</p></li>
                            <li><p><b>Pinrest</b> - Pintrest users tend to like more visually appealing posts. </p></li>
                            <li><p><b>Get ranked in Google</b> - Writing lists or articles about topics that are frequently searched for but do not have many search results can lead to a gold mine of page views. (See long tail for more)</p></li>
                            <li><p><b>Email</b> - It's old school but if your targeted audience is an older population, many older folks will forward emails they find interesting or funny to many of their friends who will again forward the email resulting in potentially many users viewing your content.</p></li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection


