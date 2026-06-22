@extends('layouts.master')
@section('css')
		<!-- Data table css -->
		<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}"  rel="stylesheet">
		<link href="{{URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Web Menu</h4>
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
						<!-- Row -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title">View Menu Details</h5>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-12 col-lg-4 mb-4 mb-md-0">
												<div class="shadow-sm font-weight-bold mb-1 border p-4">
													<h6 class="mt-2">Menu Title :<span class="font-weight-normal pl-5"><?= (!empty($showRec->title))? $showRec->title : 'N/A'; ?></span></h6>
													<hr>
													<h6>Menu Order :<span class="font-weight-normal pl-5"><?= (!empty($showRec->orders))? $showRec->orders : 'N/A'; ?></span></h6>
												</div>
											</div>
											<div class="col-12 col-lg-4 mb-4 mb-md-0">
												<div class="shadow-sm font-weight-bold mb-1 border p-4">
													<h6 class="mt-2">Menu Type :<span class="font-weight-normal pl-5">Parent Menu</span></h6>
													<hr>
													<h6>URL :<span class="font-weight-normal pl-5"><?= (!empty($showRec->url))? $showRec->url : 'N/A'; ?></span></h6>
												</div>
											</div>
											<div class="col-12 col-lg-4 mb-4 mb-md-0">
												<div class="shadow-sm font-weight-bold mb-1 border p-4">
													<h6 class="mt-2">Controller :<span class="font-weight-normal pl-5"><?= (!empty($showRec->controller))? $showRec->controller : 'N/A'; ?></span></h6>
													<hr>
													<h6>User Action Method :<span class="font-weight-normal pl-5"><?= (!empty($showRec->action))? $showRec->action : 'N/A'; ?></span></h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="main-content-body main-content-body-profile card">
									<div class="main-profile-body">
										<div class="card-header">
											<h5 class="card-title">Submenu Details</h5>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table table-bordered text-nowrap dataTable no-footer" id="example1">
													<thead>
														<tr>
															<th class="border-bottom-0">Title</th>
															<th class="border-bottom-0">URL</th>
															<th class="border-bottom-0">User Controller</th>
															<th class="border-bottom-0">User Action</th>
															<th class="border-bottom-0">Order</th>
															<th class="border-bottom-0">Action</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															foreach($childMenuRec as $childMenu) { 
																$status = 1;
																$txtColor = 'text-secondary';
																$message = 'Are you sure you want to active '.$childMenu->title.' ?';
																if($childMenu->status == 1) {
																	$status = 0;
																	$txtColor = 'text-success';
																	$message = 'Are you sure you want to Inactive '.$childMenu->title.' ?';
																}
														?>
														<tr>
															<td><?= $childMenu->title; ?></td>
															<td><?= $childMenu->url; ?></td>
															<td><?= $childMenu->controller; ?></td>
															<td><?= $childMenu->action; ?></td>
															<td><?= $childMenu->orders; ?></td>
															<td>
																<a href="{{URL::to('/web-menu/edit/'.$childMenu->id)}}" class="icon-circle-list"><i class="fa fa-edit" style="font-size: 18px;"></i></a>
																<a href="{{URL::to('/web-menu/delete/'.$childMenu->id.'/'.$status)}}" class="icon-circle-list {{$txtColor}}" onclick="return confirm('{{$message}}')"><i class="fa fa-trash-o" style="font-size: 18px;"></i></a>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- end app-content-->
            </div>
<!-- DataTables  & Plugins -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
