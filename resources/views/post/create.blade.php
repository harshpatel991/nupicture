@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">

                <h1>Create Post</h1>

                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter title">
                    </div>

                    <div class="form-group">
                        <label for="content-type">Post Type</label>
                        <select id="content-type" class="form-control">
                            <option>Image</option>
                            <option>Short Text (~100 characters)</option>
                            <option>List</option>
                            <option>Article</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" id="title" placeholder="Enter content" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

            </div>
        </div>
    </div>

@endsection
