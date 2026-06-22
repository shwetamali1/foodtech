@extends('layouts.master')
  
  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Business Plans</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Business Plans</li>
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
                      <?php if($userRole == 1 || $userRole ==6) { ?>
                    <a class="btn btn-primary" href="{{URL::to('/reports/add')}}">
                + Add New Reports
                </a>
                <?php } else { ?>
                <a class="btn btn-primary" target="_blank" href="{{URL::to('/business-plans')}}">
                + View Business Plans
                </a>
                 <?php } ?>
                  </div>
              </div>
              
              <div class="card-body">
                <table id="reports" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Business Plan</th>
                    <th>Price</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($showRec as $record) {
                        $txtColor = 'text-secondary';
                        $message = 'Are you sure you want to active '.$record->reports_title.' ?';
                    ?>
                    <tr>
                      <td>{{ $record->id }}</td>
                      <td style="width:60%">{{ $record->reports_title }}</td>
                      <td>{{ $record->price }}</td>
                     
                      <td>
                        <?php if($userRole == 1 || $userRole == 6) { ?>
                        <a href="{{URL::to('/reports/edit/'.$record->id)}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
                        <a href="{{URL::to('/reports/delete/'.$record->id)}}" class="icon-circle-list {{$txtColor}}" onclick="return confirm('{{$message}}')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
                        <?php } else{ ?>
                           
                            <a href="/reports/view-report/{{$record->id}}" class="icon-circle-list"><i class="bi bi-eye" style="font-size: 24px;"></i></a>
                            
                        <?php } ?>
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
        $('#reports').DataTable({
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
    