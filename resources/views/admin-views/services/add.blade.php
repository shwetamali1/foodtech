@extends('layouts.master')
  <style>
    .ck-editor__editable_inline {
        min-height: 400px; /* Adjust as needed */
    }
</style>
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Add Services</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Services</li>
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
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Services Type <span class="text-red">*</span></label>
										<select id="services_type" name="services_type" class="form-control select2">
											<option value="">Select Service Type</option>
											@foreach ($records as $service)
											<option value="{{$service->id}}" {{ (old('service_type_id') == $service->id) ? 'selected' : ''; }} >{{ $service->type}}</option>
											@endforeach
										</select>
										<span class="text-danger">{{ $errors->first('service_type_id') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Service Title <span class="text-red">*</span></label>
										<input type="text" name="title" class="form-control" placeholder="Services Title" value="{{old('services')}}">
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
                          placeholder="Enter Meta Title (60 characters max)"
                          maxlength="60"
                          value="{{ old('meta_title') }}"
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
                          placeholder="Enter Meta Description (160 characters max)"
                          maxlength="160"
                      >{{ old('meta_description') }}</textarea>
                      <small class="text-muted">Recommended: 150–160 characters</small>
                      <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                  </div>
              </div>
              
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Price</label>
										<input type="text" name="price" class="form-control" placeholder="Services Price" value="{{old('price')}}">
										<span class="text-danger">{{ $errors->first('price') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Description <span class="text-red">*</span></label>
										<textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
										<span class="text-danger">{{ $errors->first('description') }}</span>
									</div>
								</div>
								<div class="col-12">
                                    <div class="form-group">
                                      <label class="form-label">Upload Image File Only </label>
                                      <div id="image-upload" class="dropzone">
                                        <h4>Upload Image File Only <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i></h4>
                                      </div>
                                      <input type="hidden" name="uploaded_file" id="uploaded_file" value="">
                                    </div>
                                  </div>
								
								
							</div>
						</div>
						<div class="card-footer text-right">
							<input type='submit' class="btn btn-primary" value="Create" />
							<!--<a href="#" class="btn btn-primary">Create</a>-->
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
<script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
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
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
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
	