@extends('layouts.master')
  
  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Documents</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Documents</li>
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
                      <?php if(!$subscription->isEmpty()) { ?>
                    <a class="btn btn-primary" href="{{URL::to('/documents/add')}}">
                        + New Document
                    </a>
                    <?php } if($role_id == 1 || $role_id == 6) { ?>
                        <a class="btn btn-primary" href="{{URL::to('/documents/add')}}">
                        + New Document
                        </a>
                    <?php } ?>
                  </div>
              </div>
              <!--<div class="DTTT_container" id="new_button" style="padding-left: 854px;">-->
              <!--  <a class="btn btn-primary" href="{{URL::to('/documents/add')}}">-->
              <!--  + New Document-->
              <!--  </a>-->
              <!--</div>-->
              <div class="card-body">
                <table id="documents" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Document</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Files</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($showRec as $record) {
                        $txtColor = 'text-secondary';
                        $message = 'Are you sure you want to delete '.$record->document.' ?';
                    ?>
                    <tr>
                      <td>{{ $record->id }}</td>
                      <td style="width:40%">{{ $record->document }}</td>
                      <td>{{ $record->type }}</td>
                      <td>{{ $record->status }}</td>
                      <td style="text-align:center">
                        <?php if(!empty($record->uploaded_file)) {
                          
                          $filenames = json_decode($record->uploaded_file, true);
                          if ($filenames && is_array($filenames)) {
                          foreach($filenames as $file){
                          ?>
                          <a href="{{ asset('images/'.$file) }}" target="_blank">
                            <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i>
                          </a>
                        <?php } } } ?>
                      </td>
                      <td>
                        <a href="{{URL::to('/documents/edit/'.$record->id)}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
                        <a href="{{URL::to('/documents/delete/'.$record->id)}}" class="icon-circle-list {{$txtColor}}" onclick="return confirm('{{$message}}')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
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
       
      $('#documents').DataTable({
          "paging": true,
          "lengthChange": true,
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
                maxFilesize: 2, // in MB
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
                maxFilesize: 2, // in MB
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
    @endsection
    