<div class="container-fluid footer">
    <div class="row">
        <div class="col-md-offset-1 col-md-4 col-sm-4 col-xs-12">
            <a class="navbar-brand small" href="/" style="font-size: 2em;">{{strtoupper(Config::get('app.name'))}}</a>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 footer-column">
            <h6>
            <a href="/auth/login">Login</a> <br> <br>
            <a href="/auth/register">Register</a> <br> <br>
            <a href="/how-it-works">About</a> <br> <br>
            <a href="/privacy-policy">Privacy Policy</a> <br> <br>
            <a href="/terms-conditions">Terms of Use</a> <br> <br>
            <a href="/increase-views">Gaining Readers</a> <br> <br>
            <a href="/post-ideas">Post Ideas</a>
            </h6>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 footer-column">
            <h6>
            <a href="https://www.pinterest.com/topicloop/">Pintrest</a> <br> <br>
            <a href="https://twitter.com/topicloop">Twitter</a> <br> <br>
            <a href="https://instagram.com/topicloop/">Instagram</a>
            </h6>
        </div>


    </div>

    <div class="row">
        <div class="col-xs-12">
            <br>
            <h6 class="text-center"><a href=""><span class="glyphicon glyphicon-copyright-mark"></span> Copyright 2015 {{ Config::get('app.name') }} </a></h6>
        </div>
    </div>

</div>