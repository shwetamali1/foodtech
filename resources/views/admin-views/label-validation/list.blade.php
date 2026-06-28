@extends('layouts.master')

@section('content')

<style>
.status-pill{display:inline-flex;align-items:center;gap:.3rem;padding:.22rem .75rem;border-radius:999px;font-size:.72rem;font-weight:700;letter-spacing:.03em;}
.status-submitted   {background:#fef9c3;color:#854d0e;}
.status-under_review{background:#dbeafe;color:#1d4ed8;}
.status-completed   {background:#dcfce7;color:#15803d;}
.ft-action-btn{width:30px;height:30px;border-radius:6px;display:inline-flex;align-items:center;justify-content:center;font-size:.8rem;text-decoration:none;border:none;transition:.15s;}
.ft-action-btn:hover{filter:brightness(.88);}
</style>

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>My Label Validations</h3>
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
    <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  @endif
  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show"><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  @endif

  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="mb-0" style="color:var(--ft-navy);font-weight:700;">
          All Submissions &nbsp;<span class="badge" style="background:var(--ft-navy);color:#fff;font-size:.72rem;">{{ $records->count() }}</span>
        </h6>
        <a href="{{ route('label-validation.create') }}"
           class="btn btn-sm" style="background:var(--ft-navy);color:#fff;border-radius:8px;padding:.35rem .9rem;">
          <i class="bi bi-plus-circle me-1"></i>New Submission
        </a>
      </div>

      <div class="table-responsive">
        <table class="table ft-table" id="labelTable" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Category</th>
              <th>Business Category</th>
              <th>FSSAI No.</th>
              <th>Status</th>
              <th>Lab Report</th>
              <th>Submitted</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($records as $r)
            <tr>
              <td style="font-weight:700;color:var(--ft-navy);">#{{ $r->id }}</td>
              <td style="font-weight:600;">{{ $r->product_name }}</td>
              <td><span style="font-size:.78rem;">{{ $r->product_category }}</span></td>
              <td><span style="font-size:.78rem;">{{ $r->business_category }}</span></td>
              <td style="font-size:.78rem;">{{ $r->fssai_license_no }}</td>
              <td>
                @php $sc = 'status-'.$r->status; $si = ['submitted'=>'bi-send-fill','under_review'=>'bi-hourglass-split','completed'=>'bi-check-circle-fill'][$r->status] ?? ''; @endphp
                <span class="status-pill {{ $sc }}"><i class="bi {{ $si }}"></i>{{ ucwords(str_replace('_',' ',$r->status)) }}</span>
              </td>
              <td>
                @if($r->lab_report_path)
                  <a href="{{ route('label-validation.lab-report', $r->id) }}"
                     class="ft-action-btn" style="background:#dcfce7;color:#15803d;" title="Download Lab Report">
                    <i class="bi bi-file-earmark-check-fill"></i>
                  </a>
                @else
                  <span style="font-size:.72rem;color:#94a3b8;">—</span>
                @endif
              </td>
              <td style="font-size:.78rem;color:#6c757d;">{{ $r->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('label-validation.view', $r->id) }}"
                   class="ft-action-btn" style="background:#eff6ff;color:#2563eb;" title="View">
                  <i class="bi bi-eye-fill"></i>
                </a>
                @if(in_array($r->status, ['submitted','under_review']))
                  <a href="{{ route('label-validation.edit', $r->id) }}"
                     class="ft-action-btn" style="background:#fef3c7;color:#b45309;" title="Edit">
                    <i class="bi bi-pencil-fill"></i>
                  </a>
                @endif
                @if($r->final_label_path)
                  <a href="{{ route('label-validation.download', $r->id) }}"
                     class="ft-action-btn" style="background:#f0fdf4;color:#16a34a;" title="Download Validated Label">
                    <i class="bi bi-download"></i>
                  </a>
                @endif
                <a href="{{ route('label-validation.delete', $r->id) }}"
                   class="ft-action-btn" style="background:#fef2f2;color:#dc2626;" title="Delete"
                   onclick="return confirm('Delete this record?')">
                  <i class="bi bi-trash3-fill"></i>
                </a>
              </td>
            </tr>
            @empty
            <tr><td colspan="9" class="text-center py-4" style="color:#94a3b8;">No submissions yet. <a href="{{ route('label-validation.create') }}">Create one</a>.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
$(function(){
  $('#labelTable').DataTable({
    responsive:true,
    order:[[0,'desc']],
    pageLength:25,
    language:{search:'<i class="bi bi-search"></i>',searchPlaceholder:'Search submissions...'}
  });
});
</script>

@endsection
