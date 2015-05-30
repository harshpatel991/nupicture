@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">

                    <div class="panel-heading">Create Post</div>

                    <div class="panel-body">




                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/post/create') }}">

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="title">Title</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="content-type">Post Type</label>

                                <div class="col-md-7">
                                    <select id="content-type" class="form-control">
                                        <option>Image</option>
                                        <option>Short Text (~100 characters)</option>
                                        <option>List</option>
                                        <option>Article</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label" for="content">Content</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" id="title" placeholder="Enter content" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
