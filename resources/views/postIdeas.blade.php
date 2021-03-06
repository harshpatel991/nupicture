@extends('app')

@section('page-title')
    Post Ideas | {{Config::get('app.name')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background blog-post-main-column">

                <div class="row">
                    <div class="col-lg-2 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-3">
                        @include('partials/quickLinks', ['active' =>[false, false, false, true]])
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-9">

                        <h1>Post Ideas</h1>
                        <h4>Here are some categories for posts that we have found our readers to enjoy</h4>
                        <br>
                        <p>Above all, write about things you are passionate about. Chances are if you are really into something, our readers will be too.</p>
                        <ul>
                            <li><b>Geek Culture</b> - Technology, the Internet, comic books, movies, and video games.</li> <a href="/post/telsa-demos-prototype-charger">Example</a>
                            <li><b>'Cutesy' Things</b> - Pets, animal friendships, and babies.</li> <a href="/post/dad-creates-star-wars-speeder-for-d">Example</a>
                            <li><b>Lists</b> - For example, "10 Best Workout Songs" or "5 Things You Learned Growing Up [some common element of your childhood]" or "What Your Taste In Fast Food Says About Your Personality".</li> <a href="/post/11-android-home-screens">Example</a>
                            <li><b>Nostalgia</b> - Anything that relates with the "90s kid": The Fresh Prince of Bel Air, parachute pants, Power Rangers, and old video games. </li> <a href="/post/michael-jordans-jersey-from-space-0">Example</a>
                            <li><b>Geo-relatable content</b> - Users love reading about their own city/state/country/school and comparing it to other locations. For example, "Top 10 School Campuses" or "Top 10 States To Win In A Modern Day Civil War" or "Greatest Inventions that [country] Has Given The World".</li>
                        </ul>


                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection


