@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background">

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-sm-12">


                            {!! Form::open(array('route' => '/post/create', 'class' => 'form', 'files'=>true)) !!}
                            <h2>Submit a Post</h2>
                            <hr>
                            <div class="row form-group">
                                <label class="col-md-3 control-label" for="title">Title<span class="required">*</span></label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ old('title') }}">
                                </div>

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-8">

                                    <h4>Content</h4>


                                        <h3 id="post-builder-help-text" class="post-builder-help-text text-center">You don't have any content yet. <br>Build your post by clicking the buttons on the right</h3>
                                        <ol>
                                            <div id="content-bottom"></div>
                                        </ol>

                                        <hr>

                                        <h4 id="source-title">Sources</h4>
                                        <h3 id="sources-builder-help-text" class="post-builder-help-text text-center">(optional)<br>Add sources using the button on the right</h3>
                                        <div id="source-bottom"></div>

                                        {!! Form::submit('Submit', array('class'=>'btn btn-success')) !!}


                                </div>

                                <div class="col-sm-4">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Add Content</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div id="add-text-section" class="btn btn-default center-block"> <span class="glyphicon glyphicon-font"></span> Text</div >
                                            <div id="add-image-section" class="btn btn-default center-block"> <span class="glyphicon glyphicon-picture"></span> Picture</div>
                                            <hr>
                                            <div id="add-list-number-section" class="btn btn-default center-block"> <span class="glyphicon glyphicon-list-alt"></span> List Number</div>
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div id="add-source-section" class="btn btn-default center-block"> <span class="glyphicon glyphicon-book"></span> Source</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        {!! Form::close() !!}


                    </div>
                </div> {{--End inner row--}}

            </div>
        </div> {{--End outer row--}}

    </div>

@endsection

@section('scripts')
    <script src="/js/postCreationHelper.js"></script>
@endsection