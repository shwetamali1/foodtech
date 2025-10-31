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
                    <form action="add_submit" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="card-body">
							<div class="row g-3">
								<!--<div class="col-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">User ID <span class="text-red">*</span></label>-->
								<!--		<input type="text" name="user_id" class="form-control" placeholder="User Id" value="{{old('user_id')}}">-->
								<!--		<span class="text-danger">{{ $errors->first('user_id') }}</span>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Employee Code <span class="text-red">*</span></label>-->
								<!--		<input type="text" name="employee_code" class="form-control" placeholder="Employee Code" value="{{old('employee_code')}}">-->
								<!--		<span class="text-danger">{{ $errors->first('employee_code') }}</span>-->
								<!--	</div>-->
								<!--</div>-->
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
										<label class="form-label">Mobile <span class="text-red">*</span></label>
										<input type="number" name="mobile" class="form-control" placeholder="Mobile" value="{{old('mobile')}}">
										<span class="text-danger">{{ $errors->first('mobile') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Business Category <span class="text-red">*</span></label>
										<select id="business_category" name="business_category" class="form-control select2">
											<option value="">Select Business Category</option>
											@foreach ($business_category as $category)
											<option value="{{$category->id}}" {{ (old('category_id') == $category->id) ? 'selected' : ''; }} >{{ $category->category}}</option>
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
											@foreach ($records as $role)
											<option value="{{$role->id}}" {{ (old('user_role_id') == $role->id) ? 'selected' : ''; }} >{{ $role->role_name}}</option>
											@endforeach
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
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap.bundle.min.js') }}"></script>
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
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
<script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <
    <script src="{{ URL::asset('assets/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
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
	  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let uploadedFiles = [];
        let uploadedPDF = [];
        Dropzone.autoDiscover = false;

        if (!Dropzone.instances.length) {
            new Dropzone("#image-upload", {
                url: "/upload",
                paramName: "file", 
                maxFilesize: 2, // in MB
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
                headers: {
                  "X-CSRF-TOKEN": token
                },
                addRemoveLinks: true,
                success: function (file, response) {
                    file.uploaded_filename = response.success;
                    uploadedFiles.push(response.success);
                    document.getElementById('uploaded_video').value = JSON.stringify(uploadedFiles);
                },
                removedfile: function(file) {
                  uploadedFiles = uploadedFiles.filter(f => f !== file.uploaded_filename);
                  document.getElementById('uploaded_video').value = JSON.stringify(uploadedFiles);

                  file.previewElement.remove();
                  fetch("/remove", {
                      method: 'POST',
                      headers: {
                          'X-CSRF-TOKEN': "{{ csrf_token() }}",
                          'Content-Type': 'application/json'
                      },
                      body: JSON.stringify({ filename: file.uploaded_filename })
                  });
              }
            });
        }
       // if (!Dropzone.instances.length) {
            new Dropzone("#image-pdf", {
                url: "/upload",
                paramName: "file", 
                maxFilesize: 2, // in MB
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
                headers: {
                  "X-CSRF-TOKEN": token
                },
                addRemoveLinks: true,
                success: function (file, response) {
                    file.uploaded_file_pdf = response.success;
                    uploadedPDF.push(response.success);
                    document.getElementById('uploaded_pdf').value = JSON.stringify(uploadedPDF);
                },
                removedfile: function(file) {
                  uploadedPDF = uploadedPDF.filter(f => f !== file.uploaded_file_pdf);
                  document.getElementById('uploaded_pdf').value = JSON.stringify(uploadedPDF);

                  file.previewElement.remove();
                  fetch("/remove", {
                      method: 'POST',
                      headers: {
                          'X-CSRF-TOKEN': "{{ csrf_token() }}",
                          'Content-Type': 'application/json'
                      },
                      body: JSON.stringify({ filename: file.uploaded_file_pdf })
                  });
              }
            });
        
      function click_new(url){
        window.location.href = url;
      }
</script>
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @endsection
