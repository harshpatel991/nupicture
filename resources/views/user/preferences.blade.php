@extends('app')

@section('page-title')
    Preferences | {{Config::get('app.name')}}
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert"><p class="text-center white-font">{{ Session::get('message') }}</p></div>
                        @endif

                        @if (Session::has('errors'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('errors')->first() }}</div>
                        @endif

                        <h2>Preferences</h2>
                        <hr>

                        <h3>Email</h3>

                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p>Send me these messages</p>
                            </div>

                            <div class="col-md-9 col-sm-8">

                                {!! Form::open(array('url' => '/preferences', 'class' => 'form', 'files'=>true, 'id' => 'post-creation')) !!}

                                    <input name="email-post-reminders" type="hidden" value="false">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="email-post-reminders" value="true" {{$email_preferences[0]}}> Post Reminders
                                            <p class="small">Sent once in a while if you haven't created a post in a while.</p>
                                        </label>
                                    </div>

                                    <input name="email-post-submitted" type="hidden" value="false">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="email-post-submitted" value="true" {{$email_preferences[1]}}> Post Submitted
                                            <p class="small">Sent after your post has been submitted.</p>
                                        </label>
                                    </div>

                                    <input name="email-post-published" type="hidden" value="false">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="email-post-published" value="true" {{$email_preferences[2]}}> Post Published/Rejected
                                            <p class="small">Sent after your post has been published on the site or rejected.</p>
                                        </label>
                                    </div>

                                    <input name="email-news" type="hidden" value="false">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="email-news" value="true" {{$email_preferences[3]}}> Topic Loop News & Updates
                                            <p class="small">Sent approximately every 2 weeks with updates to the site.</p>
                                        </label>
                                    </div>

                                    {!! Form::submit('Save', array('class'=>'btn btn-primary', 'id' => 'submit-form')) !!}

                                {!! Form::close() !!}

                            </div>
                        </div>

                        <hr>

                    </div>
                </div> {{--Inner row end--}}

            </div>
        </div> {{--Outer row end--}}

    </div>

@endsection
