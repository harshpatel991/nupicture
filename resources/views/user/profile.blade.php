@extends('app')

@section('page-title')
    {{$user->username}}'s Profile
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <hr>

                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif

                @if (Session::has('errors'))
                    <div class="alert alert-danger" role="alert">{{ Session::get('errors')->first() }}</div>
                @endif

                <h2>{{$user->username}}'s Profile</h2>

                @if($user->status == App\User::$statusGood)
                    {!! Form::open() !!}
                        {!! Form::submit('Request Payment', ['class'=> 'btn btn-success']) !!}
                    {!! Form::close() !!}
                @elseif ($user->status == App\User::$statusPaymentRequested)
                    <h6>Payment Requested</h6>
                @endif


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
            </div>
        </div>
    </div>

@endsection
