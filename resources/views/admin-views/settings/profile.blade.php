@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
        <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">User Profiles</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ URL::asset('assets/img/avatar5.png') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $editRec->first_name }} {{ $editRec->last_name }}</h3>

                <p class="text-muted text-center">{{ $editRec->email }}</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="active nav-link" href="#settings" data-bs-toggle="tab">Profile Update</a></li>
                  <li class="nav-item"><a class="nav-link" href="#notifications" data-bs-toggle="tab">Notifications</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="settings">
                    <form action="updateRecord" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="card-body">
						    @if (session('success'))
                                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
							<div class="row g-3">
								<!--<div class="col-6">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">User ID <span class="text-red">*</span></label>-->
								<!--		<input type="text" name="user_id" disabled="disabled" class="form-control" placeholder="User Id" value="{{$editRec->user_id}}">-->
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
										<input type="email" disabled="disabled" name="email" class="form-control" placeholder="Email Address" value="{{$editRec->email}}">
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
										<label for="phone" class="form-label">Phone Number</label>
                                          <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter phone number" value="{{$editRec->mobile}}">
                                          <span class="text-danger">{{ $errors->first('mobile') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="phone" class="form-label">Company Name</label>
                                          <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Company Name" value="{{$editRec->company_name}}">
                                          <span class="text-danger">{{ $errors->first('cname') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="category" class="form-label">Business Category</label>
                                          <select class="form-control" name="category">
                                              <option value="">Select Category</option>
                                              <?php foreach ($business_category as $category){ ?>
                                                <option <?php if($category->id == $editRec->category_id){ ?> selected <?php } ?> value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
                                              <?php } ?>
                                          </select>
                                          <span class="text-danger">{{ $errors->first('category') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="category" class="form-label">Country</label>
                                          <select class="form-control" name="country">
                                             <option value="">Select Country</option>
                                            <option value="india" selected="">India</option>
                                          </select>
                                          <span class="text-danger">{{ $errors->first('country') }}</span>
									</div>
								</div>
								
								<div class="col-6">
									<div class="form-group">
										<label for="phone" class="form-label">State</label>
                                          <input type="text" class="form-control" id="state" name="state" placeholder="Enter state" value="{{$editRec->state}}">
                                          <span class="text-danger">{{ $errors->first('state') }}</span>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="phone" class="form-label">City</label>
                                          <input type="tel" class="form-control" id="city" name="city" placeholder="Enter city" value="{{$editRec->city}}">
                                          <span class="text-danger">{{ $errors->first('city') }}</span>
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
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="notifications">
                    @php
                      $unreadCount = $notifications->where('status', 'unread')->count();
                    @endphp

                    @if($unreadCount > 0)
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <span class="badge bg-danger">{{ $unreadCount }} unread</span>
                      <form action="{{ url('settings/notifications/mark-all-read') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-check2-all me-1"></i>Mark all as read
                        </button>
                      </form>
                    </div>
                    @endif

                  	<table id="notification_table" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Notification</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php $notifNum = 1; @endphp
                          @foreach($notifications as $record)
                          <tr class="{{ $record->status === 'unread' ? 'table-warning' : '' }}">
                            <td>{{ $notifNum++ }}</td>
                            <td style="width:50%">{{ $record->notification }}</td>
                            <td>{{ \Carbon\Carbon::parse($record->sent_date)->format('d M Y, h:i A') }}</td>
                            <td>
                              @if($record->status === 'unread')
                                <span class="badge bg-warning text-dark">Unread</span>
                              @else
                                <span class="badge bg-success">Read</span>
                              @endif
                            </td>
                            <td>
                              <a href="javascript:;" onclick="viewNotification({{ $record->id }}, '{{ addslashes($record->notification) }}', '{{ $record->sent_date }}')" class="icon-circle-list" title="View">
                                <i class="bi bi-eye" style="font-size: 18px;"></i>
                              </a>
                              @if($record->status === 'unread')
                              <form action="{{ url('settings/notifications/mark-read/'.$record->id) }}" method="POST" style="display:inline;" class="mark-read-form">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-link p-0 ms-1" title="Mark as read" style="color:#28a745;">
                                  <i class="bi bi-check2-circle" style="font-size:18px;"></i>
                                </button>
                              </form>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="notification_model">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background:#022B50; color:#fff;">
          <h5 class="modal-title"><i class="bi bi-bell me-2"></i>Notification Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="notification_detils" style="font-size:1rem; color:#1f2937; line-height:1.6;"></p>
          <hr>
          <small class="text-muted"><i class="bi bi-clock me-1"></i><span id="notification_date"></span></small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.modal -->
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
        
        $('#notification_table').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      
    });
        
      function click_new(url){
        window.location.href = url;
      }
	function viewNotification(id, message, date) {
		$("#notification_detils").html(message);
		$("#notification_date").html(date);
		var myModal = new bootstrap.Modal(document.getElementById('notification_model'));
        myModal.show();
	}
</script>
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @endsection
	