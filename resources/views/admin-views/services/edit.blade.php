@extends('layouts.master')
  <style>
    .ck-editor__editable_inline {
        min-height: 400px; /* Adjust as needed */
    }
</style>
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Edit Services</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Services</li>
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
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Services Type <span class="text-red">*</span></label>
										<select id="services_type" name="services_type" class="form-control select2">
											<option value="">Select Service Type</option>
											@foreach ($records as $service)
											<option value="{{$service->id}}" {{ ($service->id == $editRec->service_type_id) ? 'selected' : '' }} >{{ $service->type}}</option>
											@endforeach
										</select>
										<span class="text-danger">{{ $errors->first('service_type_id') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Title <span class="text-red">*</span></label>
										<input type="text" name="title" class="form-control" placeholder="Services Title" value="{{$editRec->services}}">
										<span class="text-danger">{{ $errors->first('services') }}</span>
									</div>
								</div>
                <div class="col-12">
                  <div class="form-group">
                      <label class="form-label">Meta Title <span class="text-red">*</span></label>
                      <input 
                          type="text" 
                          name="meta_title" 
                          class="form-control" 
                          placeholder="Meta Title (Max 60 chars)"
                          maxlength="60"
                          value="{{ old('meta_title', $editRec->meta_title) }}"
                      >
                      <small class="text-muted">Recommended: 50–60 characters</small>
                      <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                  </div>
              </div>
              
              <div class="col-12">
                  <div class="form-group">
                      <label class="form-label">Meta Description <span class="text-red">*</span></label>
                      <textarea 
                          name="meta_description" 
                          class="form-control" 
                          rows="3"
                          maxlength="160"
                          placeholder="Meta Description (Max 160 chars)"
                      >{{ old('meta_description', $editRec->meta_description) }}</textarea>
                      <small class="text-muted">Recommended: 150–160 characters</small>
                      <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                  </div>
              </div>
              
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Price</label>
										<input type="text" name="price" class="form-control" placeholder="Services Price" value="{{$editRec->price}}">
										<span class="text-danger">{{ $errors->first('price') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Description <span class="text-red">*</span></label>
										<textarea class="form-control" name="description" id="description">{{$editRec->description}}</textarea>
										<span class="text-danger">{{ $errors->first('description') }}</span>
									</div>
								</div>
								<div class="col-12">
                                    <div class="form-group">
                                      <label class="form-label">Upload Image File Only </label>
                                      <div id="image-upload" class="dropzone">
                                        <h4>Upload Image File Only <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i></h4>
                                      </div>
                                      <input type="hidden" name="uploaded_file" id="uploaded_file" value="{{$editRec->uploaded_file}}">
                                    </div>
                                  </div>
								
	
							</div>
						</div>
						<div class="card-footer text-right">
							<input type='submit' class="btn btn-primary" value="Update" />
							<a href="{{URL::to('/services/list/')}}" class="btn btn-danger">Cancel</a>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
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
                        document.getElementById('uploaded_file').value = JSON.stringify(uploadedFiles);
                    },
                    removedfile: function(file) {
                      uploadedFiles = uploadedFiles.filter(f => f !== file.uploaded_filename);
                      document.getElementById('uploaded_file').value = JSON.stringify(uploadedFiles);
    
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
    	   });
    </script>
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @endsection
