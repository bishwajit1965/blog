@extends('admin.partials.master')

@section('title', 'Edit permission')

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
                <h3 class="box-title">Edit permission herec.</h3>
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
                <div class="col-sm-6 col-sm-offset-3">
                    {{-- Form validation --}} 
                    @include('admin.partials._messages')

                    <form role="form" action="{{route('permission.update', $permission->id)}}" method="POST" accept-charset="utf-8">
                        @csrf 
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Permission name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $permission->name }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>

                        <a href="{{ route('permission.index') }}" class="btn btn-md btn-info">Go back</a>
                    </form>
                </div>
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

@endsection