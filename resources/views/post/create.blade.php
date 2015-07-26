@extends('app')

@section('page-title')
    Create A Post | {{strtoupper(Config::get('app.name'))}}
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-offset-1 col-md-10 white-background post-main-column">

                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-10 col-md-offset-1 col-sm-12">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(array('route' => '/post/create', 'class' => 'form', 'files'=>true)) !!}
                        <div class="pull-right">
                            <p>* = required </p>
                        </div>

                        <h2>Submit a Post</h2>
                        <hr>

                        <div class="row form-group">
                            <label class="col-md-3 control-label" for="title">Title*</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" placeholder="Enter title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="row form-group">

                            <label class="col-md-3 control-label" for="category">Category*</label>

                            <div class="col-md-9">
                                <select name="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        @if(old('category') == $category)
                                            <option value="{{$category}}" selected="selected">{{ucfirst($category)}}</option>
                                        @else
                                            <option value="{{$category}}">{{ucfirst($category)}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 control-label" for="summary">Summary*
                                <a href="#" data-toggle="tooltip" title="The summary will appear when your post is featured on the home page or on the sidebar." data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                            </label>

                            <div class="col-md-9">
                                <textarea cols="2" class="form-control" name="summary" placeholder="Enter 1 sentence summary">{{ old('summary') }}</textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-3 control-label" for="thumbnail">Thumbnail*
                                <a href="#" data-toggle="tooltip" title="The image will appear when your post is featured on the home page or on the sidebar." data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                            </label>

                            <div class="col-md-9">
                                <input type="file" name="thumbnail">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-9">

                                <h4>Content</h4>
                                    <h3 id="post-builder-help-text" class="post-builder-help-text text-center">You don't have any content yet. <br>Build your post by clicking the buttons on the right</h3>
                                    <ol>
                                        <div id="content-bottom"></div>
                                    </ol>
                                    <hr>
                                    <h4 id="source-title">Sources</h4>
                                    <h3 id="sources-builder-help-text" class="post-builder-help-text text-center">(optional)<br>Add sources using the button on the right</h3>
                                    <ol>
                                        <div id="source-bottom"></div>
                                    </ol>
                                    {!! Form::submit('Submit', array('class'=>'btn btn-primary', 'id' => 'submit-form')) !!}
                            </div>

                            <div class="col-sm-3"> {{--Add content buttons--}}

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add Content</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div id="add-text-section" class="btn btn-default btn-block post-builder-add-button">Text </div>
                                        <div id="add-image-section" class="btn btn-default btn-block post-builder-add-button">Picture </div>
                                        <div id="add-youtube-section" class="btn btn-default btn-block post-builder-add-button">YouTube </div>
                                        <hr>
                                        <div id="add-list-number-section" class="btn btn-default btn-block post-builder-add-button">List Number</div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add Sources</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div id="add-source-section" class="btn btn-default btn-block post-builder-add-button">Source</div>
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

    {{--Load any rejecrted post content--}}
    <script>
        @foreach($oldSectionsByJS as $oldSection)
            {{$oldSection->createByJS}}("{{$oldSection->optional_content}}", "{{$oldSection->content}}")();
        @endforeach
    </script>
@endsection