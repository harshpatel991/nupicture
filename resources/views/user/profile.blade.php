@extends('app')

@section('page-title')
    {{$user->username}}'s Profile
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">


                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif

                        @if (Session::has('errors'))
                            <div class="alert alert-danger" role="alert">{{ Session::get('errors')->first() }}</div>
                        @endif

                        <h2>{{$user->username}}'s Profile</h2>
                        <h5>Joined On: {{date_format(new \DateTime($user->created_on), "F j, Y")}}</h5>
                        <h5>Adsense Publisher ID: {{$user->publisher_id or 'Not Set'}}</h5>


                        @if(count($usersPosts) > 0)
                            <h3>My Posts</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <tr>
                                        <th>Status</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Views</th>
                                        <th>Posted</th>
                                        <th></th>
                                    </tr>

                                    @foreach($usersPosts as $post)
                                        <tr>
                                            <td><h6><span class="label label-{{$post->status}} post-status">{{$statusToEnglish[$post->status]}}</span></h6></td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->admin_message}}</td>
                                            <td>{{$post->views}}</td>

                                            @if($post->posted_at != null)
                                                <td>{{date_format(new DateTime($post->posted_at), "F j, Y")}}</td>
                                            @else
                                                <td>Not Posted</td>
                                            @endif


                                            @if($post->status == 'posted')
                                                <td><a href="/post/{{$post->slug}}"><span class="glyphicon glyphicon-link"></span></a></td>
                                            @else
                                                <td></td>
                                            @endif

                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        @else

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h2 class="text-center">You have not posted anything yet!<br><br><a href="/post/create" class="btn btn-primary btn-lg">Create a post</a> </h2>
                                </div>
                            </div>
                        @endif

                    </div>
                </div> {{--Inner row end--}}

            </div>
        </div> {{--Outer row end--}}

    </div>

@endsection
