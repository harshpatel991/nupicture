@extends('app')

@section('page-title')
    Thanks for Registering
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

                <div class="row">

                    <div class="col-md-6 col-md-offset-1 col-sm-7">
                        <h3>While you're waiting, check out these handy pages to help you get started</h3>
                        <ul>
                            <li><p><a href="/sign-up-beta">{{Config::get('app.name')}} Explained</a></p></li>
                            <li><p><a href="/exposure-guide">Exposure Guide</a></p></li>
                        </ul>

                        <h3>Recent posts on {{Config::get('app.name')}}</h3>
                        <ul>
                            @foreach($recentPosts as $recentPost)
                                <li><p><a href="/post/{{$recentPost->slug}}">{{$recentPost->title}}</a></p></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-4 col-sm-5">
                        <br>
                        <a class="twitter-timeline" href="https://twitter.com/RainingZombies" data-widget-id="624012209023115264">Tweets by @RainingZombies</a>
                        <br>
                        <h3>For the latest updates, follow us on social media</h3>
                            {{-- TODO: links--}}
                        <div class="row">
                            <div class="col-xs-3"><a href=""><img src="/images/twitter.png" class="sign-up-success-social-media-icons"></a></div>
                            <div class="col-xs-3"><a href=""><img src="/images/facebook.png" class="sign-up-success-social-media-icons"></a></div>
                            <div class="col-xs-3"><a href=""><img src="/images/google-plus.png" class="sign-up-success-social-media-icons"></a></div>
                            <div class="col-xs-3"><a href=""><img src="/images/pintrest.png" class="sign-up-success-social-media-icons"></a></div>
                        </div>

                    </div>

                </div>

			</div> {{--End white background--}}
		</div>

	</div>
@endsection

@section('scripts')
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 @endsection