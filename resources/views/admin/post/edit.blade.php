@extends('admin.partials.master') 
@section('title', 'Insert posts')

<!--Page specific stylesheet -->
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
    {{-- <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script> --}}
@endsection

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Laravel blog <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit post here</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                {{-- Code below --}}
                @include('admin.partials._messages')

                <form role="form" action="{{route('post.update', $post->id)}}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="title">Post title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Provide post title data..." value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Sub title</label>
                                <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Provide subtitle data..." value="{{ $post->subtitle }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Post slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" placeholder="Provide slug data..." value="{{ $post->slug }}">
                            </div>
                            <div class="form-group">
                                <label for="posted_by">Posted by</label>
                                <input type="text" name="posted_by" class="form-control" id="posted_by" placeholder="Provide posted by data..." value="{{ $post->posted_by }}">
                            </div>   
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Select category</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a category(s)" style="width: 100%;" name="categories[]">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @foreach ($post->categories as $postCategory)
                                                @if ($postCategory->id == $category->id)
                                                   selected 
                                                @endif
                                            @endforeach
                                            >
                                            {{ $category->name }}</option>
                                    @endforeach   
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select tags</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a tag(s)" style="width: 100%;" name="tags[]">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            @foreach ($post->tags as $postTag)
                                               @if ($postTag->id == $tag->id)
                                                   selected
                                               @endif 
                                            @endforeach
                                            >
                                            {{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Post Image</label>
                                <input type="file" name="image" class="form-control" id="image" value="{{ $post->image }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Post status</label><br>
                                <input type="checkbox" name="status" id="status" value="1" @if ($post->status == '1') checked @endif> Check to Publish
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="editor1" cols="30" rows="10" >
                            {{ $post->body }} 
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('post.index') }}" class="btn btn-md btn-info">Go back</a>
                    </div>
                </form>
                {{-- Code above --}}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">Footer</div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
@endsection
 
<!--Page specific scripts if necessary -->
@section('scripts') 
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

    <script>
        $(function () { 
        //Initialize Select2 Elements 
        $('.select2').select2();
        });
    </script>
    <!--CK EDITOR FUNCTION TO SELECT-->
    <script>
        $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    
    </script>
@endsection