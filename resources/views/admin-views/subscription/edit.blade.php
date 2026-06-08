@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Edit Plan</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Plan</li>
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
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Plan Title <span class="text-red">*</span></label>
										<input type="text" name="title" class="form-control" placeholder="Plan Title" value="{{ $editRec->title }}">
										<span class="text-danger">{{ $errors->first('title') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Plan Offer <span class="text-red">*</span></label>
										<input type="text" name="offer" class="form-control" placeholder="Plan Offer" value="{{ $editRec->offer }}">
										<span class="text-danger">{{ $errors->first('offer') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Description <span class="text-red">*</span></label>
										<input type="text" name="description" class="form-control" placeholder="Description" value="{{ $editRec->description }}">
										<span class="text-danger">{{ $errors->first('description') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Plan Price (Ex. 1000 RS) <span class="text-red">*</span></label>
										<input type="text" name="price" class="form-control" placeholder="Plan Price (Ex. 1000 RS)" value="{{ $editRec->price }}">
										<span class="text-danger">{{ $errors->first('price') }}</span>
									</div>
								</div>
                      <div class="col-6">
    <div class="form-group">
        <label class="form-label">Government Fee</label>
        <input type="number" name="government_fee" class="form-control" placeholder="Government Fee" value="{{ $editRec->government_fee }}">
        <span class="text-danger">{{ $errors->first('government_fee') }}</span>
    </div>
</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Discount Rate</label>
										<input type="number" name="discount" class="form-control" placeholder="Discount Rate" value="{{ $editRec->discount }}">
									</div>
								</div>
								<!--<div class="col-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Per Month</label>-->
								<!--		<input type="text" name="per" class="form-control" placeholder="Per Month" value="{{ $editRec->per }}">-->
								<!--	</div>-->
								<!--</div>-->
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Credits</label>
										<input type="text" name="credits" class="form-control" placeholder="Credits" value="{{ $editRec->credits }}">
									</div>
								</div>
								
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Features (one per line) <span class="text-red">*</span></label>
										<textarea name="features[]" class="form-control" rows="7">{{ implode("\n", json_decode($editRec->features, true)) }}</textarea>
										<span class="text-danger">{{ $errors->first('features') }}</span>
									</div>
								</div>
								<!--@if(isset($plan)){{ implode("\n", json_decode($plan->features, true)) }}@endif-->
							
							</div>
						</div>
						<div class="card-footer text-right">
							<input type='submit' class="btn btn-primary" value="Create" />
							<!--<a href="#" class="btn btn-primary">Create</a>-->
							<a href="{{URL::to('/subscriptions/list/')}}" class="btn btn-danger">Cancel</a>
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
                maxFilesize: 10, // in MB
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
                maxFilesize: 10, // in MB
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
