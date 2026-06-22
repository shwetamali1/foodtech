@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Subscription</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Subscription</li>
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
                 
                   <div class="card-header"><div class="card-title">Billing Details</div></div> 
                 
                    <form action="{{$editRec->id}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="card-body">
							<div class="row g-3">
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">First Name <span class="text-red">*</span></label>
										<input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $userData->first_name }}">
										<span class="text-danger">{{ $errors->first('first_name') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Last Name <span class="text-red">*</span></label>
										<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $userData->last_name }}">
										<span class="text-danger">{{ $errors->first('last_name') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Email <span class="text-red">*</span></label>
										<input type="email" name="email" class="form-control" placeholder="Email" value="{{ $userData->email }}">
										<span class="text-danger">{{ $errors->first('email') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="form-label">Mobile <span class="text-red">*</span></label>
										<input type="number" name="mobile" class="form-control" placeholder="Mobile" value="{{ $userData->mobile }}">
										<span class="text-danger">{{ $errors->first('mobile') }}</span>
									</div>
								</div>
								<!--<div class="col-12">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Country <span class="text-red">*</span></label>-->
								<!--		<select id="country" name="country" class="form-control select2">-->
								<!--			<option value="">Select Country</option>-->
								<!--			<option value="india">India</option>-->
								<!--		</select>-->
								<!--		<span class="text-danger">{{ $errors->first('country') }}</span>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-12">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Payment Method <span class="text-red">*</span></label>-->
								<!--		<select id="payment_method" name="payment_method" class="form-control select2">-->
								<!--			<option value="">Select Payment Method</option>-->
								<!--			<option value="Online">Online</option>-->
											<!--<option value="Bank">Bank Pay</option>-->
								<!--		</select>-->
								<!--		<span class="text-danger">{{ $errors->first('payment_method') }}</span>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-12">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Card Number</label>-->
								<!--		<input type="text" name="card_number" class="form-control" placeholder="Per Month">-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-3">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Date</label>-->
								<!--		<select id="date" name="date" class="form-control select2">-->
								<!--			<option value="">Date</option>-->
								<!--			<?php for($i=1; $i<=31; $i++){ ?>-->
								<!--			    <option value="{{$i}}">{{$i}}</option>-->
								<!--			 <?php } ?>-->
								<!--		</select>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-3">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Month</label>-->
								<!--		<select id="month" name="month" class="form-control select2">-->
								<!--			<option value="">Month</option>-->
								<!--			<?php for($i=1; $i<=12; $i++){ ?>-->
								<!--			    <option value="{{$i}}">{{$i}}</option>-->
								<!--			 <?php } ?>-->
								<!--		</select>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-3">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Year</label>-->
								<!--		<select id="Year" name="year" class="form-control select2">-->
								<!--			<option value="">Year</option>-->
								<!--			<?php for($i=2010; $i<=2030; $i++){ ?>-->
								<!--			    <option value="{{$i}}">{{$i}}</option>-->
								<!--			 <?php } ?>-->
								<!--		</select>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-3">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Country Code</label>-->
								<!--		<input type="text" name="country_code" class="form-control" placeholder="Country Code" value="+91">-->
								<!--	</div>-->
								<!--</div>-->
							
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
