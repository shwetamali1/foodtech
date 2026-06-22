@extends('layouts.master')
@section('css')
		<!-- INTERNAL Select2 css -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
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
										<div class="card-title">Add Menu</div>
									</div>
									<form action="add" method="post">
										<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										<div class="card-body">
											<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Menu Title <span class="text-red">*</span></label>
														<input type="text" name="title" class="form-control" placeholder="menu title" value="{{old('title')}}">
														<span class="text-danger">{{ $errors->first('title') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Parent</label>
														<select name="parent_id" class="form-control select2">
															<option value="0">-- select parent--</option>
															<?php foreach($parentRec as $parent) {?>
															<option value="<?= $parent->id; ?>"><?= $parent->title; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Menu URL</label>
														<input type="text" name="url" class="form-control" placeholder="menu url" value="{{old('url')}}">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Use Controller</label>
														<input type="text" name="controller" class="form-control" placeholder="controller" value="{{old('controller')}}">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">User Action Method</label>
														<input type="text" name="action" class="form-control" placeholder="action method" value="{{old('action')}}">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Menu Orders <span class="text-red">*</span></label>
														<input type="text" name="orders" class="form-control" placeholder="menu orders" value="{{old('orders')}}">
														<span class="text-danger">{{ $errors->first('orders') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Nav-Item/Link <span class="text-red">*</span></label>
														<input type="text" name="nav_item" class="form-control" placeholder="nav link" value="{{old('nav_item')}}">
														<span class="text-danger">{{ $errors->first('nav_item') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Menu Icon</label>
														<input type="text" name="menu_icon" class="form-control" placeholder="menu icon" value="{{old('menu_icon')}}">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Permission Tag</label>
														<input type="text" name="permission_tag" class="form-control" placeholder="permission" value="{{old('permission_tag')}}">
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Is Submenu?</label>													
														<select name="is_submenu" class="form-control select2">
															<option value="Yes">Yes</option>
															<option value="No">No</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type='submit' class="btn btn-primary" value="Create" />
											<!--<a href="#" class="btn btn-primary">Create</a>-->
											<a href="#" class="btn btn-danger">Cancel</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- End Row-->

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
