@extends('layouts.master')

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-file-earmark-check me-2" style="color:var(--ft-gold);"></i>Final Documents</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Final Documents</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  <div class="card">
    <div class="card-header">
      <span>
        <i class="bi bi-file-earmark-check-fill me-2"></i>
        Your Final Documents
      </span>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="documents" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Feature</th>
              <th>File Name</th>
              <th>Download</th>
            </tr>
          </thead>
          <tbody>
            @php $rowNum = 1; @endphp
            @foreach($documents as $doc)
              <tr>
                <td>{{ $rowNum++ }}</td>
                <td>
                  <span class="fw-semibold" style="color:var(--ft-navy);">{{ $doc->feature_text }}</span>
                </td>
                <td>
                  <span class="d-flex align-items-center gap-1" style="font-size:.83rem;color:var(--ft-muted);">
                    <i class="bi bi-file-earmark" style="color:var(--ft-gold-dark);"></i>
                    {{ $doc->original_name }}
                  </span>
                </td>
                <td>
                  <a href="{{ route('finaldocument.download', $doc->id) }}"
                     class="btn-icon btn-icon-download" title="Download"
                     style="width:auto;padding:6px 14px;gap:6px;font-size:.8rem;font-weight:700;">
                    <i class="bi bi-download"></i>
                    <span>Download</span>
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
  $('#documents').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: {
      search: '',
      searchPlaceholder: 'Search documents...',
    },
    columnDefs: [{ orderable: false, targets: [3] }],
  });
});
</script>

@endsection
