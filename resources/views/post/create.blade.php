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
                                        <option value="0">Image</option>
                                        <option value="1">Short Text (~100 characters)</option>
                                        <option value="2">List</option>
                                        <option value="3">Article</option>
                                    </select>
                                </div>
                            </div>





                            <div id="container-image"> {{--Image container start--}}

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="image-post-image">Image</label>

                                    <div class="col-md-7">

                                            {{--<input class='btn-file' type="file" id="image-post-image" value="{{ old('image-post-image') }}">--}}

                                        <div style="position:relative;">
                                            <a class='btn btn-default btn-file' href='javascript:;'>
                                                Choose File...
                                                <input type="file" class="input-file" name="file_source" size="40" onchange="chooseFileInput(event, this)">
                                            </a>

                                            <span class='label label-info' id="upload-file-info"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="image-post-caption">Caption</label>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="image-post-caption" placeholder="Enter caption" value="{{ old('image-post-caption') }}">
                                    </div>
                                </div>

                            </div> {{--Image container end--}}

                            <div id="container-short-text">
                                short text container
                            </div>

                            <div id="container-list">
                                list container
                            </div>

                            <div id="container-article">
                                article container
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

@section('scripts')
    <script src="/js/postCreationHelper.js"></script>
@endsection