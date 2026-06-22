@extends('layouts.master')
  
  @section('content')
<div class="app-content-header"> 
  <!--begin::Container-->
  <div class="container-fluid"> 
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Services</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Services</li>
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
        <div class="DTTT_container" id="new_button" style="padding-left: 854px;"> <a class="btn btn-primary" href="{{URL::to('/services/add')}}"> + Add New Service </a> </div>
        <div class="card-body">
          <table id="reports" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Service</th>
                <th>Price</th>
                <th>PDF</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                      foreach($showRec as $record) {
                        $txtColor = 'text-secondary';
                        $message = 'Are you sure you want to delete '.$record->id.' ?';
                    ?>
              <tr>
                <td>{{ $record->id }}</td>
                <td style="width:60%">{{ $record->services }}</td>
                <td>{{ $record->price }}</td>
                <td style="text-align:center"><?php if(!empty($record->uploaded_pdf)) {
                          
                          $filenames = json_decode($record->uploaded_pdf, true);
                          if ($filenames && is_array($filenames)) {
                          foreach($filenames as $file){
                          ?>
                  <a href="{{ asset('images/'.$file) }}" target="_blank"> <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i> </a>
                  <?php } } } ?></td>
                <td><a href="{{URL::to('/services/edit/'.$record->id)}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a> <a href="{{URL::to('/services/delete/'.$record->id)}}" class="icon-circle-list {{$txtColor}}" onclick="return confirm('{{$message}}')"><i class="bi bi-trash" style="font-size: 18px;"></i></a></td>
              </tr>
              <?php
                      }
                    ?>
            </tbody>
          </table>
        </div>
      </div>
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
</script>
@endsection 