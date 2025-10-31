@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Service Request</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Service Request</li>
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
                 
                   <div class="card-header"><div class="card-title">Fill Details</div></div> 
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="add_submit" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="card-body">
							<div class="row g-3">
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">First Name <span class="text-red">*</span></label>
										<input type="text" name="first_name" class="form-control" placeholder="First Name">
										<span class="text-danger">{{ $errors->first('first_name') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Last Name <span class="text-red">*</span></label>
										<input type="text" name="last_name" class="form-control" placeholder="Last Name">
										<span class="text-danger">{{ $errors->first('last_name') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Email <span class="text-red">*</span></label>
										<input type="email" name="email" class="form-control" placeholder="Email">
										<span class="text-danger">{{ $errors->first('email') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">License <span class="text-red">*</span></label>
										<select id="service_id" name="service_id" class="form-control select2">
											<option value="">Select License</option>
											<?php foreach ($services as $service) { ?>
											    <option value="<?php echo $service->id ?>"><?php echo $service->services ?></option>
											<?php } ?>
										</select>
										<span class="text-danger">{{ $errors->first('country') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Mobile Number <span class="text-red">*</span></label>
										<input type="text" name="mobile" class="form-control" placeholder="Mobile Number">
										<span class="text-danger">{{ $errors->first('mobile') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Adhar Card Number <span class="text-red">*</span></label>
										<input type="number" maxlength="12" name="adharcard" class="form-control" placeholder="Adharcard Number">
										<span class="text-danger">{{ $errors->first('adharcard') }}</span>
									</div>
								</div>
								
								
								<div class="col-4">
									<div class="form-group">
										<label class="form-label">Start Date</label>
										<select id="startdate" name="startdate" class="form-control select2">
											<option value="">Date</option>
											<?php for($i=1; $i<=31; $i++){ ?>
											    <option value="{{$i}}">{{$i}}</option>
											 <?php } ?>
										</select>
										<span class="text-danger">{{ $errors->first('startdate') }}</span>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label class="form-label">Start Month</label>
										<select id="startmonth" name="startmonth" class="form-control select2">
											<option value="">Month</option>
											<?php for($i=1; $i<=12; $i++){ ?>
											    <option value="{{$i}}">{{$i}}</option>
											 <?php } ?>
										</select>
										<span class="text-danger">{{ $errors->first('startmonth') }}</span>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label class="form-label">Start Year</label>
										<select id="startyear" name="startyear" class="form-control select2">
											<option value="">Year</option>
											<?php for($i=2010; $i<=2030; $i++){ ?>
											    <option value="{{$i}}">{{$i}}</option>
											 <?php } ?>
										</select>
										<span class="text-danger">{{ $errors->first('startyear') }}</span>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label class="form-label">End Date</label>
										<select id="enddate" name="enddate" class="form-control select2">
											<option value="">Date</option>
											<?php for($i=1; $i<=31; $i++){ ?>
											    <option value="{{$i}}">{{$i}}</option>
											 <?php } ?>
										</select>
										<span class="text-danger">{{ $errors->first('enddate') }}</span>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label class="form-label">End Month</label>
										<select id="endmonth" name="endmonth" class="form-control select2">
											<option value="">Month</option>
											<?php for($i=1; $i<=12; $i++){ ?>
											    <option value="{{$i}}">{{$i}}</option>
											 <?php } ?>
										</select>
										<span class="text-danger">{{ $errors->first('endmonth') }}</span>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label class="form-label">End Year</label>
										<select id="endyear" name="endyear" class="form-control select2">
											<option value="">Year</option>
											<?php for($i=2010; $i<=2030; $i++){ ?>
											    <option value="{{$i}}">{{$i}}</option>
											 <?php } ?>
										</select>
										<span class="text-danger">{{ $errors->first('endyear') }}</span>
									</div>
								</div>
								
							
							</div>
						</div>
						<div class="card-footer text-right">
							<input type='submit' class="btn btn-primary" value="Buy Subscription →" />
							<!--<a href="#" class="btn btn-primary">Create</a>-->
							<a href="{{URL::to('/subscription/list/')}}" class="btn btn-danger">Cancel</a>
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
