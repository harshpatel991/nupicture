@extends('app')

@section('page-title')
    Learn More
@endsection

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <div class="row">
                    <div class="col-md-8 col-sm-7 col-md-offset-3">
                        <h1>{{Config::get('app.name')}} Explained</h1>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-2 col-sm-3">
                        <img src="/images/User-Profile-256.png" width="130" height="130" style="margin-top: 20px;" class="center-block">
                    </div>

                    <div class="col-md-8 col-sm-9"> {{--Right column--}}
                        <h3>Who We Are Looking For</h3>
                        <p>Anyone can write for {{Config::get('app.name')}}. We recommend that you should</p>
                        <ul>
                            <li><p>Be able to write fluently in English</p></li>
                            <li><p>Keep up with modern trends in news, entertainment, and technology</p></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-2 col-sm-3">
                        <img src="/images/Note-Information-256.png" width="130" height="130" style="margin-top: 20px;" class="center-block">
                    </div>

                    <div class="col-md-8 col-sm-9"> {{--Right column--}}
                        <h3>Content We Are Looking For</h3>
                        <p>We are different from other sites in that we allow all types of content.</p>
                        <p>We are looking for original, modern, and interesting content.</p>

                        <p>Specifically, we encourage content that is</p>
                        <ul>
                            <li><p>targeted towards readers from ages 16-40 years</p></li>
                            <li><p>relevant to popular culture (such as TV shows, movies, music, and large news stories)</p></li>
                            <li><p>interesting (such as funny, timely, and relevant) </p></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-2 col-sm-3">
                        <img src="/images/Graph-01-256.png" width="130" height="130" style="margin-top: 20px;" class="center-block">
                    </div>

                    <div class="col-md-8 col-sm-9"> {{--Right column--}}
                        <h3>How it Works</h3>
                        <p>Once logged in, you will see a button in the top right to post content. Submit content such as articles, lists, images, and videos. We are looking for funny, interesting, and cool content. Check out the <a href="/">frontpage</a> for inspiration.</p>
                        <p>Your first 5 posts will be manually approved by a human. After this, your posts will automatically go live on the website when you post.</p>
                        <p>Posts will checked for</p>
                        <ul>
                            <li><p>Severe grammatical errors</p></li>
                            <li><p>Spam/inappropriate content</p></li>
                        </ul>
                        <p>After submitting, your post will be approved in less than 12 hours.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-offset-1 col-md-2 col-sm-3">
                        <img src="/images/Donate-256.png" width="130" height="130" style="margin-top: 20px;" class="center-block">
                    </div>

                    <div class="col-md-8 col-sm-9"> {{--Right column--}}
                        <h3>Revenue</h3>
                        <p>When users visit your post, Adsense advertisements will displayed on the page. <b>{{100-Config::get('app.ad_weight')}}% of the time, advertisements with your Publisher ID will be loaded, allowing you to generate revenue.</b></p>
                        <p>You will be able to keep track your generated revenue through Adsense</p>
                        <p>Once a post is listed, you can start sharing your post with your friends and family. For help gaining exposure to your site, take a look our <a href="exposure-guide">exposure guide</a>.</p>
                    </div>
                </div>

			</div>
		</div> {{--End white background--}}


	</div>
@endsection