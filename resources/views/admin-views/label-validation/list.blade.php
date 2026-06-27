@extends('layouts.master')

@section('content')

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>Food Label Validation</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Label Validation</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success mb-4"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger mb-4"><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}</div>
  @endif

  <div class="card">
    <div class="card-header">
      <span><i class="bi bi-patch-check me-2"></i>My Label Validations</span>
      <a class="btn-add" href="{{ route('label-validation.create') }}">
        <i class="bi bi-plus-circle-fill"></i>New Label Validation
      </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="labelTable" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Category</th>
              <th>FSSAI License</th>
              <th>Submitted On</th>
              <th>Status</th>
              <th>Final Label</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1; @endphp
            @forelse($records as $rec)
              <tr>
                <td>{{ $i++ }}</td>
                <td><span class="fw-semibold" style="color:var(--ft-navy);">{{ $rec->product_name }}</span></td>
                <td>{{ $rec->product_category }}</td>
                <td><code style="font-size:.8rem;">{{ $rec->fssai_license_no }}</code></td>
                <td>{{ $rec->created_at->format('d M Y') }}</td>
                <td>
                  @if($rec->status === 'completed')
                    <span class="badge-ft badge-active"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Completed</span>
                  @elseif($rec->status === 'under_review')
                    <span class="badge-ft badge-plan"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Under Review</span>
                  @else
                    <span class="badge-ft" style="background:#fff3cd;color:#856404;"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Submitted</span>
                  @endif
                </td>
                <td>
                  @if($rec->final_label_path)
                    <a href="{{ route('label-validation.download', $rec->id) }}"
                       class="btn-icon btn-icon-download" title="Download Final Label"
                       style="width:auto;padding:5px 12px;gap:5px;font-size:.78rem;">
                      <i class="bi bi-download"></i> Download
                    </a>
                  @else
                    <span style="color:var(--ft-muted);font-size:.8rem;">Pending</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('label-validation.view', $rec->id) }}"
                     class="btn-icon btn-icon-view" title="View Details">
                    <i class="bi bi-eye-fill"></i>
                  </a>
                  @if($rec->status !== 'completed')
                  <a href="{{ route('label-validation.edit', $rec->id) }}"
                     class="btn-icon btn-icon-edit" title="Edit">
                    <i class="bi bi-pencil-fill"></i>
                  </a>
                  <a href="{{ route('label-validation.delete', $rec->id) }}"
                     class="btn-icon btn-icon-delete" title="Delete"
                     onclick="return confirm('Delete this label validation request?')">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center py-4" style="color:var(--ft-muted);">
                  <i class="bi bi-inbox fs-4 d-block mb-2"></i>No label validations yet.
                  <a href="{{ route('label-validation.create') }}" class="ms-2" style="color:var(--ft-navy);font-weight:600;">Submit your first label</a>
                </td>
              </tr>
            @endforelse
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
  $('#labelTable').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: { search: '', searchPlaceholder: 'Search labels...' },
    columnDefs: [{ orderable: false, targets: [7] }],
  });
});
</script>
@endsection
