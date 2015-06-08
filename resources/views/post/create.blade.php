@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-offset-1 col-sm-10">



                <form class="form-horizontal" role="form" method="POST" action="{{ url('/post/create') }}">
                    <h1>Submit a Post</h1>
                    <hr>
                    <h4>Some basic info...</h4>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="title">Title<span class="required">*</span></label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" id="title" placeholder="Enter title" value="{{ old('title') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="content-type">Post Type<span class="required">*</span></label>

                        <div class="col-md-7">
                            <select id="content-type" class="form-control">
                                <option value="0">Image</option>
                                <option value="1">Short Text (~100 characters)</option>
                                <option value="2">List</option>
                                <option value="3">Article</option>
                            </select>
                        </div>
                    </div>

                    <h4>Now for the content...</h4>

                    <div id="container-image"> {{--Image container start--}}

                    </div> {{--Image container end--}}

                    <div id="container-short-text">

                    </div>

                    <ol id="container-list">

                        <div id="container-list-items">

                        </div>
                        <a class="btn btn-success pull-right" onclick="addImageItemToContainerList();"><span class="glyphicon glyphicon-plus"></span>List Item</a>
                    </ol>

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

@endsection

@section('scripts')
    <script src="/js/postCreationHelper.js"></script>
@endsection