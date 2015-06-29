@extends('app')

@section('page-title')
    {{$user->username}}'s Profile
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <hr>

                <h2>{{$user->username}}'s Profile</h2>
                <h5>{{$points}} Points</h5>

                    {!! Form::open() !!}
                        {!! Form::submit('Request Payment', ['class'=> 'btn btn-success']) !!}
                    {!! Form::close() !!}




                <div class="table-responsive">
                <table class="table table-striped">

                    <tr>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Posting Points</th>
                        <th>Total Views</th>
                        <th>Views Since Last Payment</th>
                        <th>Posted</th>
                        <th>Points</th>
                        <th></th>
                    </tr>

                    @foreach($usersPosts as $post)
                        <tr>
                            <td><h6><span class="label label-{{$post->status}} post-status">{{$statusToEnglish[$post->status]}}</span></h6></td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->admin_message}}</td>
                            <td>{{$post->posting_payment or 0}}</td>
                            <td>{{$post->total_views}}</td>
                            <td>{{$post->views_since_payment}}</td>

                            @if($post->posted_at != null)
                                <td>{{date_format(new DateTime($post->posted_at), "F j, Y")}}</td>
                            @else
                                <td>Not Posted</td>
                            @endif

                            <td>{{$post->posting_payment + ($post->views_since_payment*$pointsPerView[$post->content_type])}}</td>

                            @if($post->status == 'posted')
                                <td><a href="/post/{{$post->slug}}"><span class="glyphicon glyphicon-link"></span></a></td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                    @endforeach

                </table>
                </div>
            </div>
        </div>
    </div>

@endsection
