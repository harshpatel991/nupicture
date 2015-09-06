<footer class="container-fluid footer">
    <div class="row">
        <div class="col-md-offset-1 col-md-4 col-sm-4 col-xs-12">
            <a class="navbar-brand small" href="/" style="font-size: 2em;">{{strtoupper(Config::get('app.name'))}}</a>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">
            <h6><span style="color:#fff">Site</span><br><br></h6>
            <div class="footer-column">
                <h6>
                    <a href="/auth/login">Login</a> <br> <br>
                    <a href="/auth/register">Register</a> <br> <br>
                    <a href="/how-it-works">About</a> <br> <br>
                    <a href="/privacy-policy">Privacy Policy</a> <br> <br>
                    <a href="/terms-conditions">Terms of Use</a> <br> <br>
                    <a href="/contact-us">Contact Us</a>
                </h6>
            </div>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6">
            <h6><span style="color:#fff">Social</span><br><br></h6>
            <div class="footer-column">
                <h6>
                    <a href="https://www.pinterest.com/topicloop/">Pintrest</a> <br> <br>
                    <a href="https://twitter.com/topicloop">Twitter</a> <br> <br>
                    <a href="http://topicloop.tumblr.com">Tumblr</a> <br> <br>
                    <a href="http://topicloop.blogspot.com/">Blog</a>
                </h6>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <br>
            <h6 class="text-center"><a href=""><span class="glyphicon glyphicon-copyright-mark"></span> Copyright 2015 {{ Config::get('app.name') }} </a></h6>
        </div>
    </div>

</footer>