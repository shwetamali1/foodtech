@extends('layouts.master')

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-grid-3x3-gap me-2" style="color:var(--ft-gold);"></i>Services</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Services</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success mb-4"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-header">
      <span>
        <i class="bi bi-list-check me-2"></i>
        All Services
      </span>
      <a class="btn-add" href="{{ URL::to('/services/add') }}">
        <i class="bi bi-plus-lg"></i>Add Service
      </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="reports" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Service Name</th>
              <th>Price</th>
              <th style="text-align:center;">Files</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $rowNum = 1; @endphp
            @foreach($showRec as $record)
              @php $message = 'Are you sure you want to delete "'.$record->services.'"?'; @endphp
              <tr>
                <td>{{ $rowNum++ }}</td>
                <td>
                  <span class="fw-semibold" style="color:var(--ft-navy);">{{ $record->services }}</span>
                </td>
                <td>
                  <span class="badge-ft badge-plan">
                    <i class="bi bi-currency-rupee" style="font-size:.75rem;"></i>{{ $record->price }}
                  </span>
                </td>
                <td style="text-align:center;">
                  @if(!empty($record->uploaded_file))
                    @php $filenames = json_decode($record->uploaded_file, true); @endphp
                    @if($filenames && is_array($filenames))
                      @foreach($filenames as $file)
                        <a href="{{ asset('images/'.$file) }}" target="_blank"
                           title="{{ $file }}" class="btn-icon btn-icon-download" style="display:inline-flex;">
                          <i class="bi bi-file-pdf-fill"></i>
                        </a>
                      @endforeach
                    @endif
                  @else
                    <span class="text-muted" style="font-size:.78rem;">—</span>
                  @endif
                </td>
                <td>
                  <a href="{{ URL::to('/services/edit/'.$record->id) }}"
                     class="btn-icon btn-icon-edit" title="Edit">
                    <i class="bi bi-pencil-fill"></i>
                  </a>
                  <a href="{{ URL::to('/services/delete/'.$record->id) }}"
                     class="btn-icon btn-icon-delete"
                     onclick="return confirm('{{ $message }}')" title="Delete">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
$(function () {
  $('#reports').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: { search: '', searchPlaceholder: 'Search services...' },
    columnDefs: [{ orderable: false, targets: [3, 4] }],
  });
});
</script>

@endsection
