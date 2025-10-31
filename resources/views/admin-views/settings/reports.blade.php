@extends('layouts.master')
  
  @section('content')    
            <!--begin::Row-->
        <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">My Reports</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">My Reports</li>
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
                  <li class="nav-item"><a class="nav-link" href="#my_liencense" data-toggle="tab">My Reports</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="my_liencense">
                  	<table id="liecense_table" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Liecense Title</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Payment Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                                  foreach($records as $record) {
                                   
                                ?>
                          <tr>
                            
                            <td>{{ $record->report_title }}</td>
                            <td><?php 
                              $price = str_replace('RS', '',  $record->amount);
                              echo number_format($price).' RS';
                              ?></td>
                              <td>{{ $record->p_status }}</td>
                              <td>{{ $record->payment_date }}</td>
                              <td style="text-align:center">
                                <?php if(!empty($record->uploaded_pdf)) {
                                  
                                  $filenames = json_decode($record->uploaded_pdf, true);
                                  if ($filenames && is_array($filenames)) {
                                  foreach($filenames as $file){
                                  ?>
                                  <a href="{{ asset('images/'.$file) }}" target="_blank">
                                    <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i>
                                  </a>
                                  <a href="{{ asset('images/'.$file) }}" 
                                       download="{{ $record->report_title }}" 
                                       class="me-2">
                                        <i class="bi bi-download" style="font-size: 25px; color: #ffd21b;"></i>
                                    </a>
                                <?php } } } ?>
                              </td>
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
	