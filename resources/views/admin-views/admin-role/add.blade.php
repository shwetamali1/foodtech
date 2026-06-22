@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Add User</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
              <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <!-- <div class="card-header"><div class="card-title">Horizontal Form</div></div> -->
                  <!--end::Header-->
                  <!--begin::Form-->
                    <form action="add" method="post">
										<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										<div class="card-body">
											<div class="row g-3">
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">User ID <span class="text-red">*</span></label>
														<input type="text" name="user_profile_id" class="form-control" placeholder="User Id" value="{{old('user_profile_id')}}">
														<span class="text-danger">{{ $errors->first('user_profile_id') }}</span>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">Employee Code <span class="text-red">*</span></label>
														<input type="text" name="employee_code" class="form-control" placeholder="Employee Code" value="{{old('employee_code')}}">
														<span class="text-danger">{{ $errors->first('employee_code') }}</span>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">First Name <span class="text-red">*</span></label>
														<input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{old('first_name')}}">
														<span class="text-danger">{{ $errors->first('first_name') }}</span>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">Last Name <span class="text-red">*</span></label>
														<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}">
														<span class="text-danger">{{ $errors->first('last_name') }}</span>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">Email <span class="text-red">*</span></label>
														<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{old('email')}}">
														<span class="text-danger">{{ $errors->first('email') }}</span>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">Password <span class="text-red">*</span></label>
														<input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
														<span class="text-danger">{{ $errors->first('password') }}</span>
													</div>
												</div>
												
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">User Role <span class="text-red">*</span></label>
														<select id="user_role_id" name="user_role_id" class="form-control select2">
															<option value="">Select User Role</option>
															
														</select>
														<span class="text-danger">{{ $errors->first('user_role_id') }}</span>
													</div>
												</div>
												
												<div class="col-6">
													<div class="form-group">
														<label class="form-label">Status</label>													
														<select name="status" class="form-control select2">
															<option value="active">active</option>
															<option value="inactive">inactive</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type='submit' class="btn btn-primary" value="Create" />
											<!--<a href="#" class="btn btn-primary">Create</a>-->
											<a href="{{URL::to('/users/list/')}}" class="btn btn-danger">Cancel</a>
										</div>
									</form>
                  <!--end::Form-->
                </div>
            </div>
        
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      <!--end::App Main-->
      <!--begin::Footer-->
      
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @endsection
