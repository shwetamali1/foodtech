@extends('layouts.master')

@section('content')

<style>
/* ── Stat Cards ── */
.flv-stat-card {
  border-radius: 14px;
  padding: 1.1rem 1.25rem;
  display: flex;
  align-items: center;
  gap: 1rem;
  box-shadow: var(--ft-shadow-sm);
  border: 1px solid transparent;
}
.flv-stat-card .stat-icon {
  width: 48px; height: 48px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.35rem;
  flex-shrink: 0;
}
.flv-stat-card .stat-num  { font-size: 1.7rem; font-weight: 800; line-height: 1; }
.flv-stat-card .stat-label { font-size: .72rem; font-weight: 600; text-transform: uppercase; letter-spacing: .05em; margin-top: 2px; }

/* ── User cell avatar ── */
.user-avatar {
  width: 34px; height: 34px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--ft-navy), var(--ft-navy-mid));
  color: #FFD21B;
  font-weight: 700;
  font-size: .72rem;
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
  letter-spacing: -.5px;
}
.user-name  { font-size: .82rem; font-weight: 700; color: var(--ft-navy); line-height: 1.2; }
.user-email { font-size: .72rem; color: var(--ft-muted); }

/* ── Status pill (inline, no icon circle) ── */
.status-pill {
  display: inline-block;
  padding: 3px 11px;
  border-radius: 50px;
  font-size: .71rem;
  font-weight: 700;
  letter-spacing: .04em;
  text-transform: uppercase;
  white-space: nowrap;
}
.pill-submitted   { background: #fff3cd; color: #856404; }
.pill-under-review{ background: #ede9fe; color: #5b21b6; }
.pill-completed   { background: #dcfce7; color: #166534; }

/* ── File badge ── */
.file-badge {
  display: inline-flex; align-items: center; gap: 5px;
  padding: 3px 10px; border-radius: 50px;
  font-size: .71rem; font-weight: 700;
}
.file-badge-uploaded  { background: #dcfce7; color: #166534; }
.file-badge-pending   { background: #f1f5f9; color: #64748b; }
</style>

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>Food Label Validations</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Label Validations</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success mb-4"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
  @endif

  {{-- ── Stat Cards ── --}}
  @php
    $total     = $records->count();
    $submitted = $records->where('status','submitted')->count();
    $reviewing = $records->where('status','under_review')->count();
    $completed = $records->where('status','completed')->count();
  @endphp

  <div class="row g-3 mb-4">
    <div class="col-6 col-xl-3">
      <div class="flv-stat-card" style="background:#f0f4ff;border-color:#dde3f0;">
        <div class="stat-icon" style="background:#e0e7ff;color:var(--ft-navy);">
          <i class="bi bi-collection-fill"></i>
        </div>
        <div>
          <div class="stat-num" style="color:var(--ft-navy);">{{ $total }}</div>
          <div class="stat-label" style="color:var(--ft-muted);">Total</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-xl-3">
      <div class="flv-stat-card" style="background:#fffbeb;border-color:#fde68a;">
        <div class="stat-icon" style="background:#fef3c7;color:#b45309;">
          <i class="bi bi-hourglass-split"></i>
        </div>
        <div>
          <div class="stat-num" style="color:#b45309;">{{ $submitted }}</div>
          <div class="stat-label" style="color:#b45309;">Submitted</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-xl-3">
      <div class="flv-stat-card" style="background:#f5f3ff;border-color:#ddd6fe;">
        <div class="stat-icon" style="background:#ede9fe;color:#5b21b6;">
          <i class="bi bi-search"></i>
        </div>
        <div>
          <div class="stat-num" style="color:#5b21b6;">{{ $reviewing }}</div>
          <div class="stat-label" style="color:#5b21b6;">Under Review</div>
        </div>
      </div>
    </div>
    <div class="col-6 col-xl-3">
      <div class="flv-stat-card" style="background:#f0fdf4;border-color:#bbf7d0;">
        <div class="stat-icon" style="background:#dcfce7;color:#166534;">
          <i class="bi bi-patch-check-fill"></i>
        </div>
        <div>
          <div class="stat-num" style="color:#166534;">{{ $completed }}</div>
          <div class="stat-label" style="color:#166534;">Completed</div>
        </div>
      </div>
    </div>
  </div>

  {{-- ── Main Table ── --}}
  <div class="card">
    <div class="card-header">
      <span><i class="bi bi-list-check me-2"></i>All Label Validation Requests</span>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="adminLabelTable" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th style="width:45px;">#</th>
              <th>User Info</th>
              <th>Product</th>
              <th>Category</th>
              <th>FSSAI License</th>
              <th>Date</th>
              <th>Status</th>
              <th>Label File</th>
              <th style="width:90px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1; @endphp
            @forelse($records as $rec)
              @php
                $firstName = $rec->user->first_name ?? '';
                $lastName  = $rec->user->last_name  ?? '';
                $initials  = strtoupper(substr($firstName,0,1) . substr($lastName,0,1)) ?: 'U';
                $fullName  = trim($firstName . ' ' . $lastName) ?: 'Unknown';
              @endphp
              <tr>
                <td>{{ $i++ }}</td>

                {{-- User Info --}}
                <td>
                  <div class="d-flex align-items-center gap-2" style="min-width:160px;">
                    <div class="user-avatar">{{ $initials }}</div>
                    <div>
                      <div class="user-name">{{ $fullName }}</div>
                      <div class="user-email">{{ $rec->user->email ?? '—' }}</div>
                      @if($rec->user->mobile ?? null)
                        <div class="user-email"><i class="bi bi-phone me-1"></i>{{ $rec->user->mobile }}</div>
                      @endif
                    </div>
                  </div>
                </td>

                {{-- Product --}}
                <td>
                  <div class="fw-semibold" style="color:var(--ft-navy);font-size:.84rem;max-width:160px;white-space:normal;line-height:1.3;">
                    {{ $rec->product_name }}
                  </div>
                  @if($rec->brand_name)
                    <div style="font-size:.72rem;color:var(--ft-muted);">{{ $rec->brand_name }}</div>
                  @endif
                </td>

                {{-- Category --}}
                <td>
                  <div style="font-size:.81rem;max-width:120px;white-space:normal;line-height:1.3;">
                    {{ $rec->product_category }}
                    @if($rec->sub_category)
                      <div style="font-size:.7rem;color:var(--ft-muted);">{{ $rec->sub_category }}</div>
                    @endif
                  </div>
                </td>

                {{-- FSSAI --}}
                <td>
                  <code style="font-size:.77rem;background:#f0f4ff;padding:2px 7px;border-radius:5px;color:var(--ft-navy);">
                    {{ $rec->fssai_license_no }}
                  </code>
                </td>

                {{-- Date --}}
                <td style="font-size:.8rem;white-space:nowrap;color:var(--ft-muted);">
                  <i class="bi bi-calendar3 me-1"></i>{{ $rec->created_at->format('d M Y') }}
                </td>

                {{-- Status --}}
                <td>
                  @if($rec->status === 'completed')
                    <span class="status-pill pill-completed"><i class="bi bi-check-circle-fill me-1"></i>Completed</span>
                  @elseif($rec->status === 'under_review')
                    <span class="status-pill pill-under-review"><i class="bi bi-search me-1"></i>Under Review</span>
                  @else
                    <span class="status-pill pill-submitted"><i class="bi bi-send me-1"></i>Submitted</span>
                  @endif
                </td>

                {{-- Final Label File --}}
                <td>
                  @if($rec->final_label_path)
                    <span class="file-badge file-badge-uploaded">
                      <i class="bi bi-file-earmark-check-fill"></i>Uploaded
                    </span>
                  @else
                    <span class="file-badge file-badge-pending">
                      <i class="bi bi-dash-circle"></i>Pending
                    </span>
                  @endif
                </td>

                {{-- Actions --}}
                <td>
                  <a href="{{ route('admin-food-labels.view', $rec->id) }}"
                     class="btn-icon btn-icon-view" title="View & Respond">
                    <i class="bi bi-eye-fill"></i>
                  </a>
                  <a href="{{ route('admin-food-labels.delete', $rec->id) }}"
                     class="btn-icon btn-icon-delete" title="Delete"
                     onclick="return confirm('Delete this label validation request?')">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-center py-5" style="color:var(--ft-muted);">
                  <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:.5rem;"></i>
                  No label validation requests yet.
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
  $('#adminLabelTable').DataTable({
    paging:      true,
    lengthChange:true,
    searching:   true,
    ordering:    true,
    info:        true,
    autoWidth:   false,
    responsive:  true,
    language: {
      search: '',
      searchPlaceholder: 'Search by user, product, FSSAI…',
      lengthMenu: 'Show _MENU_ entries',
    },
    columnDefs: [
      { orderable: false, targets: [8] },
      { responsivePriority: 1, targets: [1] },   // user always visible
      { responsivePriority: 2, targets: [2] },   // product name
      { responsivePriority: 3, targets: [6] },   // status
      { responsivePriority: 4, targets: [8] },   // actions
    ],
    order: [[5, 'desc']],  // newest first
  });
});
</script>

@endsection
