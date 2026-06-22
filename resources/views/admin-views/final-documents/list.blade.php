@extends('layouts.master')

  @section('content')
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Final Documents</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Final Documents</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="container-fluid p-3">
            <div class="card">
                <div class="card-header">
                    <h5>Your Final Documents</h5>
                </div>

                <div class="card-body">
                    <table id="documents" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Feature Text</th>
                            <th>File Name</th>
                            <th>Download</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach($documents as $doc)
                            <tr>
                                <td>{{ $doc->id }}</td>
                                <td>{{ $doc->feature_text }}</td>
                                <td>{{ $doc->original_name }}</td>

                                <td>
                                    <a href="{{ route('finaldocument.download', $doc->id) }}"
                                        class="btn btn-success btn-sm">
                                         Download
                                     </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
