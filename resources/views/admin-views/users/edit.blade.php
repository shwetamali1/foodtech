@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Edit User</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                    <form action="{{$editRec->id}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="card-body">
							<div class="row g-3">
								<!--<div class="col-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">User ID <span class="text-red">*</span></label>-->
								<!--		<input type="text" name="user_id" class="form-control" placeholder="User Id" value="{{$editRec->user_id}}">-->
								<!--		<span class="text-danger">{{ $errors->first('user_id') }}</span>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Employee Code <span class="text-red">*</span></label>-->
								<!--		<input type="text" name="employee_code" class="form-control" placeholder="Employee Code" value="{{$editRec->employee_code}}">-->
								<!--		<span class="text-danger">{{ $errors->first('employee_code') }}</span>-->
								<!--	</div>-->
								<!--</div>-->
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">First Name <span class="text-red">*</span></label>
										<input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{$editRec->first_name}}">
										<span class="text-danger">{{ $errors->first('first_name') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Last Name <span class="text-red">*</span></label>
										<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{$editRec->last_name}}">
										<span class="text-danger">{{ $errors->first('last_name') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Email <span class="text-red">*</span></label>
										<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{$editRec->email}}" readonly="readonly">
										<span class="text-danger">{{ $errors->first('email') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Password <span class="text-red">*</span></label>
										<input type="password" name="password" class="form-control" placeholder="Password" value="{{$editRec->password}}">
										<span class="text-danger">{{ $errors->first('password') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Mobile <span class="text-red">*</span></label>
										<input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{$editRec->mobile}}">
										<span class="text-danger">{{ $errors->first('mobile') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Business Category <span class="text-red">*</span></label>
										<select id="business_category" name="business_category" class="form-control select2">
											<option value="">Select Business Category</option>
											@foreach ($business_category as $category)
											<option value="{{$category->id}}" {{ ($editRec->category_id == $category->id) ? 'selected' : ''; }} >{{ $category->category}}</option>
											@endforeach
										</select>
										<span class="text-danger">{{ $errors->first('business_category') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">User Role <span class="text-red">*</span></label>
										<select id="user_role_id" name="user_role_id" class="form-control select2">
											<option value="">Select User Role</option>
											@foreach ($roleRec as $role)
											<option value="{{$role->id}}" {{ ($role->id == $editRec->user_role_id) ? 'selected' : '' }}>{{ $role->role_name}}</option>
											@endforeach
										</select>
										<span class="text-danger">{{ $errors->first('user_role_id') }}</span>
									</div>
								</div>
								
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Status</label>													
										<select name="status" class="form-control select2">
											<option value="active" {{ $editRec->status == 'active' ? 'selected' : '' }} >active</option>
											<option value="inactive" {{ $editRec->status == 'inactive' ? 'selected' : '' }} >inactive</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer text-right">
							<input type='submit' class="btn btn-primary" value="Update" />
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
<script>
    $(function () {
		
        $("#new_button").addClass('cssforchuji1');
        
        $('#users').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      $('#reports').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
      });
      $('#menu').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
      $("#admins").DataTable({
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    </script>
@endsection
