@extends('admin.partials.master') 
@section('title', 'create role') 
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
                <h3 class="box-title">Role creation</h3>
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

                    <form role="form" action="{{route('role.store')}}" method="POST" accept-charset="utf-8">
                        @csrf
                        <div class="form-group">
                            <label for="role">Admin role name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Admin role name...">
                        </div>
                        <!-- Permissions area-->
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="role" style="border:1px solid#DDD;padding:1px 5px;border-radius:3px;background:#ECF0F5;">Post Permissions</label>
                                @foreach ($permissions as $permission)
                                    @if ($permission->for == 'post')   
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}
                                            </label>
                                        </div>
                                    @endif  
                                @endforeach
                            </div>
                            <div class="col-sm-4">
                                <label for="role" style="border:1px solid#DDD;padding:1px 5px;border-radius:3px;background:#ECF0F5;">User Permissions</label>
                                @foreach ($permissions as $permission)
                                    @if ($permission->for == 'user')   
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}
                                            </label>
                                        </div>
                                    @endif  
                                @endforeach
                            </div>
                            <div class="col-sm-4">
                                <label for="role" style="border:1px solid#DDD;padding:1px 5px;border-radius:3px;background:#ECF0F5;">Other Permissions</label>
                                @foreach ($permissions as $permission)
                                    @if ($permission->for == 'other')   
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="{{ $permission->id }}">{{ $permission->name }}
                                            </label>
                                        </div>
                                    @endif  
                                @endforeach
                            </div>
                        </div>
                        <!-- /Permissions area-->
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('role.index') }}" class="btn btn-md btn-info">Go back</a>
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