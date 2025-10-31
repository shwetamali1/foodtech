@extends('layouts.master')
@section('css')
		<!-- Data table css -->
		<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
		<!-- Slect2 css -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Roles</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}"><i class="fe fe-layers mr-2 fs-14"></i>Home</a></li>
									<?php
									$url = '';
									$count = count(Request::segments());
									for($i = 1; $i <= $count; $i++) {
										$segments = Request::segment($i);
										$url .= '/'.$segments;
									?>
										<li class="breadcrumb-item <?= ($i == $count)? 'active': '' ?>">
											<a href="{{$url}}" class="text-capitalize"><?= str_replace('-', ' ', $segments); ?></a>
										</li>
									<?php } ?>
								</ol>
							</div>
						</div>
                        <!--End Page header-->
@endsection
@section('content')

						@include('layouts.alert')

						<!-- Row -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title w-50"></div>
										<div class="text-right w-50">
											<a href="{{URL::to('/roles/add')}}"class="btn btn-primary">Add Role</a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered text-nowrap" id="example1">
												<thead>
													<tr>														
														<th class="wd-15p border-bottom-0">No.</th>
														<th class="wd-20p border-bottom-0">Role Name</th>
														<th class="wd-15p border-bottom-0">Status</th>
														<th class="wd-10p border-bottom-0">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach($records as $record) {
															$status = 'active';
															$txtColor = 'text-secondary';
															$message = 'Are you sure you want to active '.$record->roles.' ?';
															if($record->status == 'active') {
																$status = 'inactive';
																$txtColor = 'text-success';
																$message = 'Are you sure you want to inactive '.$record->roles.' ?';
															}
													?>
														<tr>
															<td>{{ $record->id }}</td>
															<td>{{ $record->roles }}</td>
															<td>{{ $record->status }}</td>
															<td>
																<!--<a href="{{URL::to('/roles/view/'.$record->id)}}" class="icon-circle-list"><i class="fa fa-eye" style="font-size: 18px;"></i></a>-->
																<a href="{{URL::to('/roles/edit/'.$record->id)}}" class="icon-circle-list"><i class="fa fa-edit" style="font-size: 18px;"></i></a>
																<a href="{{URL::to('/roles/delete/'.$record->id.'/'.$status)}}" class="icon-circle-list {{$txtColor}}" onclick="return confirm('{{$message}}')"><i class="fa fa-trash-o" style="font-size: 18px;"></i></a>
															</td>
														</tr>
													<?php
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!--div-->
								
							</div>
						</div>
						<!-- /Row -->

					</div>
				</div><!-- end app-content-->
            </div>
@endsection
@section('js')
		<!-- INTERNAL Data tables -->
		<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>

		<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/datatables.js')}}"></script>

		<!-- INTERNAL Select2 js -->
		<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
@endsection