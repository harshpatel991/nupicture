@extends('app')

@section('page-title')
    {{$user->username}}'s Profile
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


                        <h2>{{$user->username}}'s Profile</h2>
                        @if($user->status === 'unconfirmed')
                            <h5><span class="label label-warning">{{strtoupper($user->status)}}</span></h5>
                        @endif
                        <h5>Joined On: {{date_format(new \DateTime($user->created_on), "F j, Y")}}</h5>
                        <h5>Adsense Publisher ID: {{$user->publisher_id or 'Not Set'}}</h5>


                        <h3>My Posts</h3>
                        @if(count($usersPosts) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <tr>
                                        <th>Status</th>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Views</th>
                                        <th>Posted On</th>
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
                                                <td>-</td>
                                            @endif


                                            @if($post->status == 'posted')
                                                <td><a href="/post/{{$post->slug}}"><span class="glyphicon glyphicon-link"></span></a></td>
                                            @else
                                                <td></td>
                                            @endif

                                        </tr>
                                    @endforeach

                                    @for($i = count($usersPosts); $i < 7; $i++)
                                        <tr>
                                            <td>‌‌</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    @endfor

                                </table>
                            </div>
                        @else

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <br>
                                    <h2 class="text-center"><div class="font-light-gray">There's nothing here!</div><br><a href="/post/create" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-plus-sign"></span> Post</a> </h2>
                                    <br>
                                </div>
                            </div>
                        @endif

                    </div>
                </div> {{--Inner row end--}}

            </div>
        </div> {{--Outer row end--}}

    </div>

@endsection
