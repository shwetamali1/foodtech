@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
        <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">User Subscriptions</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Subscription</li>
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
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#my_liencense" data-toggle="tab">User Subscriptions</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="my_liencense">
                  	<table id="liecense_table" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                             <th>User</th>
                             <th>Email</th>
                             <th>Mobile</th>
                            <th>Plan</th>
                            <th>Liecense</th>
                            <th>Payment Id</th>
                            <th>Method</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                                  foreach($records as $record) {
                                   
                                ?>
                          <tr>
                             <td>{{ $record->first_name }} {{ $record->last_name }}</td>
                             <td>{{ $record->user_email }}</td>
                             <td>{{ $record->user_phone }}</td>
                            <td>{{ $record->payment_plan }}</td>
                            <?php if(!empty($record->subscription_name)){
                                $title = $record->subscription_name;
                            }else{
                                $title = $record->report_title;
                            }
                            ?>
                            <td>{{ $title }}</td>
                            <td>{{ $record->r_payment_id }}</td>
                           	<td>{{ $record->payment_method }}/{{ $record->method }}</td>
                            <td><?php 
                              $price = str_replace('RS', '',  $record->amount);
                              echo number_format($price).' RS';
                              ?></td>
                              <td>{{ $record->p_status }}</td>
                              <td>{{ $record->payment_date }}</td>
                          </tr>
                          <?php
                                  }
                                ?>
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
        <div class="modal-header">
          <h4 class="modal-title">Notification Details</h4>
          
        </div>
        <div class="modal-body">
          <p id="notification_detils"></p>
          <p id="notification_date"></p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
        
        $('#liecense_table').DataTable({
          "paging": true,
          "lengthChange": true,
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
	function notification(id){
		$.ajax({
			url: 'getNotification',
			method: 'post',
			data: { id: id,  "_token": "{{ csrf_token() }}" },
			success: function(response) {
				$("#notification_detils").html(response.notification);
				$("#notification_date").html(response.sent_date);
				$("#notification_model").modal();
			}
		});
	}
</script>
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    @endsection
	