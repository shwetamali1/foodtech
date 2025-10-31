@extends('layouts.master')
@section('css')
		<!-- INTERNAL Select2 css -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Edit Profile</h4>
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
						<form action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
							<div class="row">								
								<div class="col-12">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Edit Profile</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">First Name <span class="text-red">*</span></label>
														<input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$editRec->first_name}}">
														<span class="text-danger">{{ $errors->first('first_name') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Last Name <span class="text-red">*</span></label>
														<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$editRec->last_name}}">
														<span class="text-danger">{{ $errors->first('last_name') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Email address <span class="text-red">*</span></label>
														<input type="email" name="email" class="form-control" placeholder="Email" value="{{$editRec->email}}" readonly>
														<span class="text-danger">{{ $errors->first('email') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Phone Number <span class="text-red">*</span></label>
														<input type="number" name="phone_number" class="form-control" placeholder="Number" value="{{$editRec->phone_number}}">
														<span class="text-danger">{{ $errors->first('phone_number') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Profile Image</label>														
														<div class="input-group file-browser">
															<input type="text" class="form-control border-right-0 browse-file" placeholder="Profile image" readonly>
															<label class="input-group-btn">
																<span class="btn btn-primary">
																	Browse <input type="file" name="profile_image" style="display: none;" multiple>
																</span>
															</label>
														</div>
														<span class="text-danger">{{ $errors->first('profile_image') }}</span>
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type='submit' class="btn btn-primary" value="Update" />
											<!--<a href="#" class="btn  btn-primary">Updated</a>-->
											<a href="#" class="btn btn-danger">Cancle</a>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- End Row-->

					</div>
				</div><!-- end app-content-->
            </div>
@endsection
@section('js')
		<!-- INTERNAL Select2 js -->
		<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/select2.js')}}"></script>
		<script src="{{URL::asset('assets/js/file-upload.js')}}"></script>
@endsection