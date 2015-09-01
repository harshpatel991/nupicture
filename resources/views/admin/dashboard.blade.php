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

                        <h3>Recent Users</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tr>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>

                                @foreach($recentUsers as $recentUser)
                                    <tr>
                                        <td>{{$recentUser->username}}</td>
                                        <td>{{$recentUser->status}}</td>
                                        <td>{{$recentUser->created_at}}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>




                        <h3>Recent Posts</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <tr>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>

                                @foreach($recentPosts as $recentPost)
                                    <tr>
                                        <td>{{$recentPost->title}}</td>
                                        <td>{{$recentPost->user_id}}</td>
                                        <td>{{$recentPost->views}}</td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseAllUsers">
                                            <h3>All Users</h3>
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
                                            <h3>All Posts</h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <div class="table-responsive">
                                            <table class="table table-striped">

                                                <tr>
                                                    <th>Username</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
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
