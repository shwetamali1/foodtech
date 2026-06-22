@extends('layouts.master')
  
  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">User Documents</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Documents</li>
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
              <!-- <div class="card-header">
                  <div class="card-title w-50"></div>
                  <div style="float:right">
                    <a href="{{URL::to('/users/add')}}"class="btn btn-primary">Add User</a>
                  </div>
              </div> -->
              
              <div class="card-body">
                <table id="documents" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Document</th>
                    <th>Email</th>
                    <th>Mobile</th>
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
                      <td style="width:30%">{{ $record->document }}</td>
                      <td>{{ $record->email }}</td>
                      <td>{{ $record->mobile ?? '' }}</td>
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
                        <a href="{{URL::to('/users/docedit/'.$record->id)}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
                        <a href="{{URL::to('/users/docdelete/'.$record->id)}}" class="icon-circle-list {{$txtColor}}" onclick="return confirm('{{$message}}')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
                         <?php if(!empty($record->uploaded_file)) {
                          
                          $filenames = json_decode($record->uploaded_file, true);
                          if ($filenames && is_array($filenames)) {
                          foreach($filenames as $file){
                          ?>
                            <a href="{{URL::to('/users/downloaddoc/'.$file)}}" class="icon-circle-list"><i class="bi bi-download" style="font-size: 18px;"></i></a>
                          <?php } } } ?>
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
     
    </div>
   
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
    </script>
@endsection
    