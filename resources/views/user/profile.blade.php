@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">

                <h1>{{$user->username}}'s Profile</h1>

                @if($user->status != 'payment_requested')
                    <button class="btn btn-success pull-right"><span class="glyphicon glyphicon-usd"></span> Request Payment</button>
                @endif

                <h6>Status: {{$user->getEnglishStatus()}}</h6> <br>


                <div class="table-responsive">
                <table class="table table-striped">

                    <tr>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Total Views</th>
                        <th>Views Since Last Payment</th>
                        <th>Created At</th>
                        <th>Posted At</th>
                        <th>Link</th>
                    </tr>

                    @foreach($usersPosts as $post)
                        <tr>
                            <td><h6><span class="label label-{{$post->status}} post-status">{{$statusToEnglish[$post->status]}}</span></h6></td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->admin_message}}</td>
                            <td>{{$post->total_views}}</td>
                            <td>{{$post->views_since_payment}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->posted_at or 'Not Posted'}}</td>
                            @if($post->status == 'posted')
                                <td><a href="/post/{{$post->slug}}">View</a></td>
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
