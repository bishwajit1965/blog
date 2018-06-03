@extends('admin.partials.master')
 
@section('title', 'Show posts')

<!--Page specific stylesheet -->
@section('stylesheet')
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Laravel blog <small>it all starts here</small></h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="#">Examples</a>
            </li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Post index page</h3>
                @can('posts.create', Auth::user())
                    <a href="{{ route('post.create') }}" class="btn btn-xs btn-primary"> Create post</a>
                @endcan
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                {{-- Code below --}}
                @include('admin.partials._messages')
                <table id="example1" class="table table-bordered table-striped table-hover table-responsive table-condensed">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Body</th>
                            <th>Status</th>
                            <th>Posted by</th>
                            <th>Likes</th>
                            <th>Dislikes</th>
                            <th>Created at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post )
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->subtitle }}</td>
                                <td>{{ $post->slug }}</td>
                                <td> {!! substr($post->body, 0 , 50) !!} 
                                    {!! strlen($post->body) > 50 ? "..." : "" !!}
                                </td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->posted_by }}</td>
                                <td>{{ $post->likes }}</td>
                                <td>{{ $post->dislikes }}</td>
                                <td>{{ date('M j,Y H:i:s A', strtotime( $post->created_at)) }}</td>
                                <td>
                                    @can('posts.update', Auth::user())
                                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit post !"><span class="glyphicon glyphicon-edit"></span></a>
                                    @endcan
                                </td>
                                <td>
                                    @can('posts.delete', Auth::user())
                                        <form id="delete-form-{{ $post->id }}" 
                                            action="{{ route('post.destroy', $post->id)}}" method="POST" style="display:none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>

                                        <a href="" onclick="if(confirm('Are you sure, you want to delete it ?'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $post->id }}').submit();
                                        }
                                        else{
                                            event.preventDefault();
                                        }" 
                                        class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete post !">  <span class="glyphicon glyphicon-trash"></span></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Slug</th>
                            <th>Body</th>
                            <th>Status</th>
                            <th>Posted by</th>
                            <th>Likes</th>
                            <th>Dislikes</th>
                            <th>Created at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
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
    <!-- DataTables -->
    <script src="{{asset ('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : true
            })
          })
    </script>
@endsection