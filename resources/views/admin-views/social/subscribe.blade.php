@extends('layouts.master')
  
  @section('content')
<div class="app-content-header"> 
  <!--begin::Container-->
  <div class="container-fluid"> 
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Subscribe Email List</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Subscribe</li>
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
        
        <div class="card-body">
          <table id="contact" class="table table-bordered table-striped">
            <thead>
              <tr>
              	<th scope="col" style="width: 10px;">No.</th>
                <th>Email</th>
                <th>Created Date</th>
              </tr>
            </thead>
            <tbody>
             @if (!$showRec->isEmpty())
                @foreach ($showRec as $key => $contact)
               
              <tr>
                <td scope="row">{{ $key + 1 }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->created_date }}</td>
              </tr>
              @endforeach
                @endif
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
        
        $('#contact').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
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