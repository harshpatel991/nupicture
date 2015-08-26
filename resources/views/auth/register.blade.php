@extends('app')

@section('page-title')
    Register | {{Config::get('app.name')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="/images/User-Add-256.png" width="50" height="50" style="margin-top: 20px;" class="center-block">
                        <h3 class="text-center">1. Register</h3>
                        <p>Simple enough, enter your details below.</p>
                    </div>

                    <div class="col-sm-4">
                        <img src="/images/Note-Information-256.png" width="50" height="50" style="margin-top: 20px;" class="center-block">
                        <h3 class="text-center">2. Write Posts</h3>
                        <p>Use our post builder to write about recent events, opinions, or anything else. If you're not sure what to write about, check out these <a hre="/post-ideas">post ideas</a>.</p>
                    </div>

                    <div class="col-sm-4">
                        <img src="/images/Donate-256.png" width="50" height="50" style="margin-top: 20px;" class="center-block">
                        <h3 class="text-center">3. Earn</h3>
                        <p>When users visit your post and click on advertisements, you'll earn <b>{{100-Config::get('app.ad_weight')}}%</b> of the Adsense revenue generated.</p>
                        <a class="btn btn-success pull-right" href="/how-it-works">Learn More</a>
                    </div>
                </div>

                <br>

                <div class="row blog-post-main-column" style="background-color: #ECEFF5;">
                    <div class="col-md-offset-3 col-md-6 col-sm-10 col-sm-offset-1">

                        <h1>Ready To Get Started?</h1>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4"><span class="glyphicon glyphicon-user"></span> Username</label>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4"><span class="glyphicon glyphicon-envelope"></span> Email Address</label>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4"><span class="glyphicon glyphicon-lock"></span> Password</label>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4"><span class="glyphicon glyphicon-lock"></span> Confirm Password</label>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4"><span class="glyphicon glyphicon-usd"></span> Adsense Publisher ID
                                    <a href="#" data-toggle="tooltip" title="When logged into Adsense, click your email in the top right to find your Publisher ID." data-placement="bottom">
                                        <span class="glyphicon glyphicon-question-sign"></span>
                                    </a>
                                </label>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="publisher_id" placeholder="pub-xxxxxxxxxxxxxxxx">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button type="submit" id="submit-register" class="btn btn-primary center-block">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div> {{--End white background--}}

    </div>
@endsection

@section('scripts')
    <script src="/js/registration.js"></script>
@endsection