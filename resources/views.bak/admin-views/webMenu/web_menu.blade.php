@extends('layouts.master')
  
  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">User Menu</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Menu</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
             <div class="card">
              <div class="card-header">
                  <div class="card-title w-50"></div>
                  <div style="float:right">
                    <a class="btn btn-primary" href="{{URL::to('/web-menu/add')}}">
                    Add Menu
                    </a>
                  </div>
              </div>
             <!--<div class="DTTT_container" id="new_button" >-->
             <!--   <a class="btn btn-primary" href="{{URL::to('/web-menu/add')}}">-->
             <!--       Add Menu-->
             <!--       </a>-->
             <!-- </div>-->
                <!--<div class="d-flex justify-content-between align-items-center flex-wrap">-->
                <!--    <h4></h4>-->
                <!--    <a class="btn btn-primary" href="{{URL::to('/web-menu/add')}}">-->
                <!--    Add Menu-->
                <!--    </a>-->
                <!--  </div>-->
              <div class="card-body">
                <table id="menu" class="table table-bordered table-striped">
                  <thead>
                  <tr>														
                        <th class="wd-15p border-bottom-0">No.</th>
                        <th class="wd-20p border-bottom-0">Title</th>
                        <th class="wd-15p border-bottom-0">Parents</th>
                        <th class="wd-15p border-bottom-0">Orders</th>
                        <th class="wd-10p border-bottom-0">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
						foreach($records as $record) {
							$status = 1;
							$txtColor = 'text-secondary';
							$message = 'Are you sure you want to active '.$record->title.' ?';
							if($record->status == 1) {
								$status = 0;
								$txtColor = 'text-success';
								$message = 'Are you sure you want to Inactive '.$record->title.' ?';
							}
					?>
						<tr>
							<td>{{ $record->id }}</td>
							<td>{{ $record->title }}</td>
							<td>Main Menu</td>
							<td>{{ $record->orders }}</td>
							<td>
								<!-- <a href="{{URL::to('/web-menu/view/'.$record->id)}}" class="icon-circle-list"><i class="fa fa-eye" style="font-size: 18px;"></i></a> -->
								<a href="{{URL::to('/web-menu/edit/'.$record->id)}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
								<a href="{{URL::to('/web-menu/delete/'.$record->id.'/'.$status)}}" class="icon-circle-list {{$txtColor}}" onclick="return confirm('{{$message}}')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
							</td>
						</tr>
					<?php
						}
					?>
                  </tbody>
                  
                </table>
              </div></div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>     
      </main>
     
    </div>
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
        
        $('#menu').DataTable({
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
</script>
    @endsection
    