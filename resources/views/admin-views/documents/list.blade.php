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
        <!--end::App Content-->

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $('#documents').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endsection
    