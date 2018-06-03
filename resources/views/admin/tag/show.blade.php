@extends('admin.partials.master') 
@section('title', 'Show categories')
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
                <h3 class="box-title"><a href="{{ route('tag.create') }}" class="btn btn-xs btn-primary"> Insert tag</a> Tag index page</h3>
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
                
                <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Tag name</th>
                            <th>Tag slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag )
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td>
                                <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit tag !"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                             <td>
                                <form id="delete-form-{{ $tag->id }}" 
                                    action="{{ route('tag.destroy', $tag->id)}}" method="POST" style="display:none;">
                                    @method('DELETE')
                                    @csrf
                                </form>

                                <a href="" onclick="if(confirm('Are you sure, you want to delete it ?'))
                                {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $tag->id }}').submit();
                                }
                                else{
                                    event.preventDefault();
                                }" 
                                class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete tag !">  <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Category name</th>
                            <th>Category slug</th>
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
              'autoWidth'   : false
            })
          })
    </script>
@endsection