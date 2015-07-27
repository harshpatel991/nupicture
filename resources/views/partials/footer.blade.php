<div class="container-fluid footer">
    <div class="row">
        <div class="col-md-offset-1 col-md-4 col-sm-4 col-xs-12">
            <a class="navbar-brand small" href="/" style="font-size: 2em;">{{strtoupper(Config::get('app.name'))}}</a>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 footer-column">
            <h6>
            <a href="/auth/login">Login</a> <br> <br>
            <a href="/auth/register">Register</a> <br> <br>
            <a href="/sign-up-beta">About</a> <br> <br>
            <a href="#">Privacy Policy</a> <br> <br>
            <a href="#">Terms of Use</a>
            </h6>
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 footer-column">
            <h6>
            <a href="#">Pintrest</a> <br> <br>
            <a href="#">Twitter</a> <br> <br>
            <a href="#">Facebook</a> <br> <br>
            <a href="#">Google Plus</a>
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