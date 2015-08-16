@extends('app')

@section('page-title')
    Thanks for Registering | {{Config::get('app.name')}}
@endsection

@section('content')
	<div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">
                <br>
                <h1 class="text-center">You're almost there! Check your inbox</h1>
                <br>
                <img src="/images/mail-sleeping.png" width="130" height="130" class="center-block">
                <br>

                <b><p class="text-center">A verification link has been sent to {{$email}}.</p></b>
                <hr>
                <div class="row">

                    <div class="col-md-5 col-md-offset-1 col-sm-6">
                        <h4>Check out These Handy Pages to Get You Started</h4>
                        <ul>
                            <li><p><a href="/how-it-works">{{Config::get('app.name')}} Explained</a></p></li>
                            <li><p><a href="/increase-views">Increasing Your Readers</a></p></li>
                        </ul>

                        <h4>For the Latest Updates, Follow Us on Social Media</h4>
                        {{-- TODO: links--}}
                        <div class="row">
                            <div class="col-xs-4"><a href="https://www.pinterest.com/topicloop/"><img src="/images/pintrest.png" class="sign-up-success-social-media-icons"></a></div>
                            <div class="col-xs-4"><a href="https://twitter.com/topicloop"><img src="/images/twitter.png" class="sign-up-success-social-media-icons"></a></div>
                            <div class="col-xs-4"><a href="https://instagram.com/topicloop/"><img src="/images/instagram.png" class="sign-up-success-social-media-icons"></a></div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-6">
                        <h4>Recent Posts on {{Config::get('app.name')}}</h4>
                        <ul>
                            @foreach($recentPosts as $recentPost)
                                <li><p><a href="/post/{{$recentPost->slug}}">{{$recentPost->title}}</a></p></li>
                            @endforeach
                        </ul>
                    </div>

                </div>

			</div> {{--End white background--}}
		</div>

	</div>
@endsection