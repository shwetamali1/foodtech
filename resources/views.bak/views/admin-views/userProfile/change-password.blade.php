@extends('layouts.master')
@section('css')
		<!-- INTERNAL Select2 css -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Change Password</h4>
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
							<div class="col-lg-4"></div>
							<div class="col-12 col-lg-4">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Change Password</div>
									</div>
									<form action="/change-password" method="post">
										<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										<div class="card-body">
											<div class="form-group">
												<div class="text-center">
													@if(session()->has('success'))
														<span class="text-success">
															{{ session()->get('success') }}
														</span>
													@endif
												</div>
												<label class="form-label">Current Password <span class="text-red">*</span></label>
												<input type="password" class="form-control" id="current_password" name="current_password" value="{{old('current_password')}}">
												<span class="text-danger">{{ $errors->first('current_password') }}</span>
											</div>
											<div class="form-group">
												<label class="form-label">New Password <span class="text-red">*</span></label>
												<input type="password" class="form-control" id="new_password" name="new_password" value="{{old('new_password')}}">
												<span class="text-danger">{{ $errors->first('new_password') }}</span>
											</div>
											<div class="form-group">
												<label class="form-label">Confirm Password <span class="text-red">*</span></label>
												<input type="password" class="form-control"  id="confirm_password" name="confirm_password" value="{{old('confirm_password')}}">
												<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
											</div>
										</div>
										<div class="card-footer text-right">
											<button type="submit" class="btn btn-primary">Updated</button>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-4"></div>
						</div>
						<!-- End Row-->

					</div>
				</div><!-- end app-content-->
            </div>
@endsection
@section('js')
		<!-- INTERNAL Select2 js -->
		<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection