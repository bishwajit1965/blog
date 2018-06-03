@extends('admin.partials.master')
@section('title', 'Update admin')
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Add admin user page
			<small>Upload admin user here!</small>
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
						<h3 class="box-title">Upload admin data here
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
						<div class="row">
							<div class="col-md-6 col-md-offset-3">
								{{-- Form validation --}} @include('admin.partials._messages')

								<form role="form" action="{{route('user.update', $user->id)}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    @method('PATCH')
									<div class="form-group">
										<label for="name">Admin name</label>
										<input type="text" name="name" class="form-control" id="name" placeholder="Admin name..." value="@if (old('name')){{ old('name') }}
                                            @else{{ $user->name}}
                                        @endif">
									</div>
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" name="email" class="form-control" id="email" placeholder="Admin email address..." value="@if (old('email')){{ old('email') }} @else{{ $user->email}} @endif">
									</div>
									<div class="form-group">
										<label for="phone">Phone</label>
										<input type="phone" name="phone" class="form-control" id="phone" placeholder="Admin phone address..." value="@if (old('phone')){{ old('phone') }} @else{{ $user->phone}} @endif">
									</div>
									
									<div class="form-group">
										<label for="status">Status</label>
										<div class="check-box">
											<label><input type="checkbox" name="status" @if (old('status')== 1 || $user->status == 1)
												checked
											@endif value="1"> </label>	
										</div>
									</div>
									<div class="form-group">
										<label for="role">Assign role</label>
										<div class="row">
											@foreach ($roles as $role)
												<div class="col-sm-2">
													<div class="checkbox">
														<label>
															<input type="checkbox" name="role[]" value="{{ $role->id }}" @foreach ($user->roles as $user_role)
																@if ($user_role->id == $role->id)
																	checked		
																@endif
															@endforeach >{{ $role->name }}
														</label>
													</div>
												</div>	
											@endforeach	 
										</div>	 
									</div>

									<button type="submit" class="btn btn-primary">Submit</button>
									<a href="{{ route('user.index') }}" class="btn btn-md btn-info">Go back</a>	 
								</form>
							</div>
						</div>
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
{{-- If necessary for this page use javascript here --}}
@endsection @section('scripts') 

@endsection