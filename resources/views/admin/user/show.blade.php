@extends('admin.partials.master')
@section('title', 'Admin users')
@section('stylesheet')
<!-- DataTable -->
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> @endsection @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add user page
            <small>Upload Users data here!</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">Editors</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            <a href="{{ route('user.create') }}" class="btn btn-xs btn-primary"> Add new admin</a> Admin users page</h3>
                        <h3 class="box-title">Upload users here
                            <small>Advanced and full of features</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body pad">

                        @include('admin.partials._messages')

                        <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User name</th>
                                    <th>Status</th>
                                    <th>Assigned roles</th>
                                    <th>Created on</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->status ? 'Active' : 'Not Active'}}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }} ,
                                        @endforeach
                                    </td>
                                    <td>{{ date('M j , Y H:i:s a', strtotime($user->created_at)) }}</td>

                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit user !">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id)}}" method="POST" style="display:none;">
                                            @method('DELETE') @csrf
                                        </form>

                                        <a href="" onclick="if(confirm('Are you sure, you want to delete it ?'))
                                            {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{ $user->id }}').submit();
                                            }
                                            else{
                                                event.preventDefault();
                                            }" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete user !">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>User name</th>
                                    <th>Status</th>
                                    <th>Assigned roles</th>
                                    <th>Created on</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <div class="box-footer"> </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection @section('scripts')
<!-- DataTables -->
<script src="{{asset ('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection