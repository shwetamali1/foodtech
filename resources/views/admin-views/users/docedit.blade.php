@extends('layouts.master')
  
  @section('content') 
<!--begin::Row-->
<div class="row">
  <div class="col-sm-6">
    <h3 class="mb-0">Edit Document</h3>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Document</li>
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
                  <label class="form-label">Documents Type <span class="text-red">*</span></label>
                  <select id="document_type" name="document_type" class="form-control select2">
                    <option value="">Select Document Type</option>
                        @foreach ($records as $doc)
                            <option value="{{$doc->id}}" {{ ($doc->id == $editRec->doc_type_id) ? 'selected' : '' }} >{{ $doc->type}}</option>
                        @endforeach
                  </select>
                  <span class="text-danger">{{ $errors->first('doc_type_id') }}</span> </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label">Title <span class="text-red">*</span></label>
                  <input type="text" name="title" class="form-control" placeholder="Document Title" value="{{$editRec->document}}">
                  <span class="text-danger">{{ $errors->first('document') }}</span> </div>
              </div>
              <?php if($role_id != 8){ ?>
				<div class="col-12">
					<div class="form-group">
						<label class="form-label">Document Status <span class="text-red">*</span></label>
						<select id="document_status" name="document_status" class="form-control select2">
							<option value="">Select Document Status</option>
							<option value="pending" {{ ($editRec->status =='pending') ? 'selected' : '' }}>Pending</option>
							<option value="approve" {{ ($editRec->status =='approve') ? 'selected' : '' }}>Approved</option>
							<option value="rejected" {{ ($editRec->status =='rejected') ? 'selected' : '' }}>Rejected</option>
						</select>
						
					</div>
				</div>
			<?php } else{ ?>
			    <input type="hidden" name="document_status" id="document_status" value="pending">
			<?php } ?>
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label">Upload Document </label>
                  <div id="image-upload" class="dropzone">
                    <h4>Upload Document <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i></h4>
                  </div>
                  <input type="hidden" name="uploaded_file" id="uploaded_file" value="{{$editRec->uploaded_file}}">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <input type='submit' class="btn btn-primary" value="Update" />
            <a href="{{URL::to('/users/document')}}" class="btn btn-danger">Cancel</a> </div>
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
<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
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