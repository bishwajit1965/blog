@extends('admin.partials.master') 
@section('title', 'Create permisssions') 
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
                <h3 class="box-title">Permission creation</h3>
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

                    <form role="form" action="{{route('permission.store')}}" method="POST" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label for="role">Permission name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Permission name...">
                        </div>
                        <div class="form-group">
                            <label for="for"> Permission for</label>
                            <select name="for" id="for" class="form-control">
                                <option selected disabled>Select permission for</option>
                                <option value="user">User</option>
                                <option value="post">Post</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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