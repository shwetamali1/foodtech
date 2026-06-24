@extends('layouts.master')

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-folder2-open me-2" style="color:var(--ft-gold);"></i>User Documents</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Documents</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success mb-4"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger mb-4"><i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}</div>
  @endif

  <div class="card">
    <div class="card-header">
      <span>
        <i class="bi bi-file-earmark-text me-2"></i>
        All Documents
      </span>
      @if(!$subscription->isEmpty() || $role_id == 1 || $role_id == 6)
        <a class="btn-add" href="{{ URL::to('/documents/add') }}">
          <i class="bi bi-plus-lg"></i>New Document
        </a>
      @endif
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="documents" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Document Title</th>
              <th>Type</th>
              <th>Status</th>
              <th>Files</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $rowNum = 1; @endphp
            @foreach($showRec as $record)
              @php
                $message = 'Are you sure you want to delete "'.$record->document.'"?';
              @endphp
              <tr>
                <td>{{ $rowNum++ }}</td>
                <td>
                  <span class="fw-semibold" style="color:var(--ft-navy);">{{ $record->document }}</span>
                </td>
                <td>
                  <span class="badge-ft badge-plan">{{ $record->type }}</span>
                </td>
                <td>
                  @if($record->status == 'active')
                    <span class="badge-ft badge-active"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Active</span>
                  @elseif($record->status == 'approve')
                    <span class="badge-ft badge-approved"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Approved</span>
                  @elseif($record->status == 'pending')
                    <span class="badge-ft badge-pending"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Pending</span>
                  @else
                    <span class="badge-ft badge-inactive"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Inactive</span>
                  @endif
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
                  <a href="{{ URL::to('/documents/edit/'.$record->id) }}"
                     class="btn-icon btn-icon-edit" title="Edit">
                    <i class="bi bi-pencil-fill"></i>
                  </a>
                  <a href="{{ URL::to('/documents/delete/'.$record->id) }}"
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
  $('#documents').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: {
      search: '',
      searchPlaceholder: 'Search documents...',
      lengthMenu: 'Show _MENU_ entries',
    },
    columnDefs: [{ orderable: false, targets: [4, 5] }],
  });
});
</script>

@endsection
