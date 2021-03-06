@extends('layouts.app')

@section('header_css')
<!-- data tables css -->
<link rel="stylesheet" href="{{ URL::to('assets/plugins/data-tables/css/datatables.min.css') }}">
@stop
@section('content')
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
	<div class="pcoded-wrapper">
		<div class="pcoded-content">
			<div class="pcoded-inner-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									{{--  --}}
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										@if(auth()->user()->load('organisation'))
										<a href="{{ route('outlet.index', auth()->user()->organisation_id) }}"><i class="feather icon-home"></i></a>
										@endif
									</li>
									<li class="breadcrumb-item"><a href="#!">employee</a></li>
									<li class="breadcrumb-item"><a href="#!">list</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<div class="main-body">
					<div class="page-wrapper">
						<!-- [ Main Content ] start -->
						<div class="row">
							@include('messages.flash')
							<!-- [ configuration table ] start -->
							<div class="col-sm-12">
								<div class="card">
									<div class="card-header">
										<h5>Employee List</h5>
										<div class="float-right">
											<a href="#" id="addrole" class=" btn btn-md btn-primary hidden-xs Note-add md-trigger" data-toggle="modal" data-target="#addoutletCenter">Add New +</a>
										</div>
									</div>
									<div class="card-block">
										<div class="table-responsive">
											<table id="responsive-table" class="Legendary display table dt-responsive nowrap" style="width:100%">
												<thead>
													<tr>
														<th>N/S</th>
														<th>Name</th>
														<th>Email Address</th>
														<th>Phone Number</th>
														<th>Outlet</th>
														<th>Role</th>
														<th>Created</th>
														<th>Edit</th>
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
													@include('organUsers._table')	
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- [ configuration table ] end -->	
							
						</div>
						<!-- [ Main Content ] end -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- [ Main Content ] end -->

{{-- ADD NEW EMPLOYEE --}}
<div class="card-body">
	<div class="card">
		<div id="addoutletCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="card-header">
						<h5 class="modal-title " id="exampleModalCenterTitle">Create Employee</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="card-body">
						<form id="validation-form123" method="post" action="{{ route('user.store') }}">
							{{ csrf_field() }}
							@include('organUsers.create')
							<br>
							<div class="modal-footer">
								<button style="margin-bottom: -6%" type="submit" class="btn btn-primary">Save</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

{{-- UPDATE OUTLET --}}
<div class="col-sm-12">
	<div class="card-body">
		<div class="card">
			<div id="UserModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="card-header">
							<h5 class="modal-title " id="exampleModalCenterTitle">Update Employee</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="card-body">
							<form id="validation-form123" method="post" action="{{ route('user.update', 'user') }}">
								{{ csrf_field() }}
								{{ method_field('put') }}
								@include('organUsers.update')
								<br>
								<div class="modal-footer">
									<button style="margin-bottom: -6%" type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="md-overlay"></div>
@stop
@section('footer_js')
<script>
	$('#exampleModal').on('show.bs.modal', function(event) {
		console.log(event.target);

	});
</script>
<!-- jquery-validation Js -->
<script src="{{ URL::to('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
<!-- form-picker-custom Js -->
<script src="{{ URL::to('assets/js/pages/form-validation.js') }}"></script>
@stop