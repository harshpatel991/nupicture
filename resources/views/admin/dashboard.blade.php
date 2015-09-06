@extends('app')

@section('page-title')
    Dashboard | {{Config::get('app.name')}}
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="row">
                            <div class="col-xs-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Recent Users</h3>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="text-center">{{$recentUsersCount}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Recent Pending Posts</h3>
                                    </div>
                                    <div class="panel-body">
                                        <h1 class="text-center">{{$recentPendingPostsCount}}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">

                            </div>
                        </div>

                        <h3>Recent Users</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tr>
                                    <th>Status</th>
                                    <th>Username</th>
                                    <th>Created At</th>
                                </tr>

                                @foreach($recentUsers as $recentUser)
                                    <tr>
                                        <td><div class="label label-primary">{{strtoupper($recentUser->status)}}</div></td>
                                        <td>{{$recentUser->username}}</td>
                                        <td>{{$recentUser->created_at}}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <h3>Recent Pending Posts</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tr>
                                    <th>Status</th>
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>Views</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                @foreach($recentPendingPosts as $recentPost)
                                    <tr>
                                        <td><div class="label label-primary">{{strtoupper($recentPost->status)}}</div></td>
                                        <td>{{$recentPost->title}}</td>
                                        <td>{{$recentPost->user_id}}</td>
                                        <td>{{$recentPost->views}}</td>
                                        <td><a href="/preview/{{$recentPost->slug}}" class="btn btn-primary">Preview</a></td>
                                        <td><a href="/post/approve/{{$recentPost->id}}" class="btn btn-success">Approve</a></td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseAllUsers">
                                            <h3><span class="glyphicon glyphicon-chevron-down"></span> All Users</h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseAllUsers" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">

                                                <tr>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                </tr>

                                                @foreach($allUsers as $allUser)
                                                    <tr>
                                                        <td>{{$allUser->username}}</td>
                                                        <td>{{$allUser->status}}</td>
                                                        <td>{{$allUser->created_at}}</td>
                                                    </tr>
                                                @endforeach

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            <h3><span class="glyphicon glyphicon-chevron-down"></span> All Posts</h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <div class="table-responsive">
                                            <table class="table table-striped">

                                                <tr>
                                                    <th>Username</th>
                                                    <th>User ID</th>
                                                    <th>Views</th>
                                                </tr>

                                                @foreach($allPosts as $allPost)
                                                    <tr>
                                                        <td>{{$allPost->title}}</td>
                                                        <td>{{$allPost->user_id}}</td>
                                                        <td>{{$allPost->views}}</td>
                                                    </tr>
                                                @endforeach

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div> {{--Inner row end--}}

            </div>
        </div> {{--Outer row end--}}

    </div>

@endsection
