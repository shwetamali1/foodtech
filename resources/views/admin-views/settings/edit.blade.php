@extends('layouts.master')
  
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
										<label class="form-label">Price <span class="text-red">*</span></label>
										<input type="text" name="price" class="form-control" placeholder="Services Price" value="{{$editRec->price}}">
										<span class="text-danger">{{ $errors->first('price') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Description <span class="text-red">*</span></label>
										<textarea class="form-control" name="description">{{$editRec->description}}</textarea>
										<span class="text-danger">{{ $errors->first('description') }}</span>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label class="form-label">Upload PDF </label>
										<div id="image-upload" class="dropzone">
											<h4>Upload PDF <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i></h4>
										</div>
										<input type="hidden" name="uploaded_video" id="uploaded_video" value="{{$editRec->uploaded_pdf}}">
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
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
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
