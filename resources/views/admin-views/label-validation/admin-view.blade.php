@extends('layouts.master')

@section('content')

<style>
.status-pill{display:inline-flex;align-items:center;gap:.35rem;padding:.25rem .8rem;border-radius:999px;font-size:.75rem;font-weight:700;letter-spacing:.04em;}
.status-submitted  {background:#fef9c3;color:#854d0e;}
.status-under_review{background:#dbeafe;color:#1d4ed8;}
.status-completed  {background:#dcfce7;color:#15803d;}
.info-card{background:#fff;border:1px solid #e8edf5;border-radius:12px;padding:1.1rem 1.25rem;margin-bottom:1rem;}
.info-card-title{font-size:.72rem;font-weight:800;color:var(--ft-navy);text-transform:uppercase;letter-spacing:.08em;margin-bottom:.75rem;border-bottom:2px solid var(--ft-gold);padding-bottom:.35rem;}
.info-row{display:flex;align-items:flex-start;gap:.5rem;padding:.35rem 0;border-bottom:1px solid #f1f5f9;font-size:.83rem;}
.info-row:last-child{border-bottom:none;}
.info-key{min-width:170px;max-width:170px;color:#64748b;font-weight:500;}
.info-val{color:#0f172a;font-weight:600;word-break:break-word;}
.user-hero{background:linear-gradient(135deg,var(--ft-navy) 0%,#162d6e 100%);border-radius:12px;padding:1.1rem 1.3rem;margin-bottom:1rem;display:flex;align-items:center;gap:1rem;color:#fff;}
.user-avatar-sm{width:46px;height:46px;border-radius:50%;background:var(--ft-gold);display:flex;align-items:center;justify-content:center;font-size:1.1rem;font-weight:800;color:var(--ft-navy);flex-shrink:0;}
.lab-download-box{background:#f0fdf4;border:1px solid #86efac;border-radius:10px;padding:.85rem 1rem;display:flex;align-items:center;gap:.75rem;}
.no-file-badge{background:#f8faff;border:1px dashed #c9d4e8;border-radius:8px;padding:.5rem .9rem;font-size:.8rem;color:#94a3b8;display:inline-flex;align-items:center;gap:.4rem;}
</style>

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>Label Validation — #{{ $record->id }}</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin-food-labels.index') }}">Label Validations</a></li>
        <li class="breadcrumb-item active">View #{{ $record->id }}</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  @endif

  <div class="row">

    {{-- Left column --}}
    <div class="col-lg-8">

      {{-- User info --}}
      @php $u = $record->user; @endphp
      <div class="user-hero">
        <div class="user-avatar-sm">
          {{ strtoupper(substr($u->name ?? 'U', 0, 1)) }}
        </div>
        <div style="flex:1;min-width:0;">
          <div style="font-weight:700;font-size:.95rem;">{{ $u->name ?? '—' }}</div>
          <div style="font-size:.78rem;color:#a5b4d8;">{{ $u->email ?? '' }}</div>
          @if($u->mobile ?? null)
            <div style="font-size:.75rem;color:#8ea3c9;margin-top:2px;"><i class="bi bi-telephone-fill me-1"></i>{{ $u->mobile }}</div>
          @endif
        </div>
        <div style="text-align:right;font-size:.72rem;color:#a5b4d8;">Submitted<br>{{ $record->created_at->format('d M Y') }}</div>
      </div>

      {{-- Status --}}
      <div class="info-card" style="padding:.65rem 1.1rem;display:flex;align-items:center;gap:.75rem;">
        <span style="font-size:.82rem;color:#64748b;font-weight:500;">Status:</span>
        @php
          $statusMap   = ['submitted'=>'Submitted','under_review'=>'Under Review','completed'=>'Completed'];
          $statusClass = 'status-' . $record->status;
          $statusIcon  = ['submitted'=>'bi-send-fill','under_review'=>'bi-hourglass-split','completed'=>'bi-check-circle-fill'][$record->status] ?? 'bi-circle';
        @endphp
        <span class="status-pill {{ $statusClass }}">
          <i class="bi {{ $statusIcon }}"></i>{{ $statusMap[$record->status] ?? $record->status }}
        </span>
      </div>

      {{-- Product Details --}}
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-box-seam-fill me-1"></i>Product Details</div>
        <div class="info-row"><span class="info-key">Product Name</span><span class="info-val">{{ $record->product_name }}</span></div>
        <div class="info-row"><span class="info-key">Product Category</span><span class="info-val">{{ $record->product_category }}</span></div>
        <div class="info-row"><span class="info-key">Business Category</span><span class="info-val">{{ $record->business_category }}</span></div>
        <div class="info-row"><span class="info-key">FSSAI License No.</span><span class="info-val">{{ $record->fssai_license_no }}</span></div>
        <div class="info-row"><span class="info-key">Net Weight / Qty</span><span class="info-val">{{ $record->net_quantity }}</span></div>
        <div class="info-row"><span class="info-key">Manufacturer Address</span><span class="info-val" style="white-space:pre-line;">{{ $record->manufacturer_name_address }}</span></div>
      </div>

      {{-- Lab Report --}}
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-file-earmark-medical-fill me-1"></i>Lab Report (User Uploaded)</div>
        @if($record->lab_report_path)
          <div class="lab-download-box">
            <i class="bi bi-file-earmark-check-fill" style="color:#16a34a;font-size:1.4rem;flex-shrink:0;"></i>
            <div style="flex:1;min-width:0;">
              <div style="font-weight:700;color:#15803d;font-size:.85rem;">{{ $record->lab_report_original_name }}</div>
              <div style="font-size:.73rem;color:#6c757d;margin-top:1px;">
                <i class="bi bi-shield-lock-fill me-1"></i>Private storage &nbsp;·&nbsp; Uploaded {{ $record->created_at->format('d M Y') }}
              </div>
            </div>
            <a href="{{ route('admin-food-labels.lab-report', $record->id) }}"
               class="btn btn-sm btn-success" style="font-size:.78rem;white-space:nowrap;">
              <i class="bi bi-download me-1"></i>Download
            </a>
          </div>
        @else
          <div class="no-file-badge"><i class="bi bi-file-earmark-x"></i> No lab report uploaded by user</div>
        @endif
      </div>

      {{-- Other Declarations --}}
      @if($record->storage_conditions || $record->ingredients || $record->instructions_for_use || $record->caution_warning)
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-journal-check me-1"></i>Other Declarations</div>
        @if($record->storage_conditions)
          <div class="info-row"><span class="info-key">Storage Conditions</span><span class="info-val">{{ $record->storage_conditions }}</span></div>
        @endif
        @if($record->ingredients)
          <div class="info-row"><span class="info-key">Ingredients</span><span class="info-val" style="white-space:pre-line;">{{ $record->ingredients }}</span></div>
        @endif
        @if($record->instructions_for_use)
          <div class="info-row"><span class="info-key">Instructions for Use</span><span class="info-val">{{ $record->instructions_for_use }}</span></div>
        @endif
        @if($record->caution_warning)
          <div class="info-row"><span class="info-key">Caution / Warning</span><span class="info-val">{{ $record->caution_warning }}</span></div>
        @endif
      </div>
      @endif

    </div>

    {{-- Right column: admin actions --}}
    <div class="col-lg-4">

      {{-- Admin Response Form --}}
      <div class="info-card" style="border-color:var(--ft-gold);">
        <div class="info-card-title" style="border-color:var(--ft-gold);"><i class="bi bi-shield-check-fill me-1"></i>Admin Response</div>

        <form method="POST" action="{{ route('admin-food-labels.update', $record->id) }}" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label style="font-size:.8rem;font-weight:700;color:var(--ft-navy);margin-bottom:.35rem;display:block;">Update Status</label>
            <select name="status" class="form-select form-select-sm">
              <option value="submitted"    @selected($record->status==='submitted')>Submitted</option>
              <option value="under_review" @selected($record->status==='under_review')>Under Review</option>
              <option value="completed"    @selected($record->status==='completed')>Completed</option>
            </select>
          </div>

          <div class="mb-3">
            <label style="font-size:.8rem;font-weight:700;color:var(--ft-navy);margin-bottom:.35rem;display:block;">Admin Comments</label>
            <textarea name="admin_comments" class="form-control form-control-sm" rows="4"
                      placeholder="Enter review comments, corrections or approval notes…">{{ old('admin_comments', $record->admin_comments) }}</textarea>
          </div>

          <div class="mb-3">
            <label style="font-size:.8rem;font-weight:700;color:var(--ft-navy);margin-bottom:.35rem;display:block;">Upload Validated Label</label>
            @if($record->final_label_path)
              <div style="background:#f0fdf4;border:1px solid #86efac;border-radius:8px;padding:.5rem .75rem;margin-bottom:.5rem;font-size:.78rem;">
                <i class="bi bi-check-circle-fill me-1" style="color:#16a34a;"></i>
                {{ $record->final_label_original_name }}
                <a href="{{ route('admin-food-labels.download', $record->id) }}"
                   class="ms-2" style="font-size:.72rem;color:var(--ft-navy);">
                  <i class="bi bi-download"></i> Download
                </a>
              </div>
              <div style="font-size:.72rem;color:#6c757d;margin-bottom:.4rem;">Upload a new file to replace the current validated label.</div>
            @endif
            <input type="file" name="final_label" class="form-control form-control-sm"
                   accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            <div style="font-size:.72rem;color:#6c757d;margin-top:.3rem;">PDF, DOC, JPG, PNG &nbsp;·&nbsp; Max 10 MB &nbsp;·&nbsp; <i class="bi bi-shield-lock-fill"></i> Private</div>
          </div>

          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-sm"
                    style="background:var(--ft-navy);color:#fff;border-radius:8px;font-weight:700;">
              <i class="bi bi-save-fill me-1"></i>Save Response
            </button>
          </div>
        </form>
      </div>

      {{-- Navigation --}}
      <div class="info-card">
        <div class="d-grid gap-2">
          <a href="{{ route('admin-food-labels.index') }}"
             class="btn btn-sm btn-outline-secondary" style="border-radius:8px;">
            <i class="bi bi-arrow-left me-1"></i>Back to List
          </a>
          <a href="{{ route('admin-food-labels.delete', $record->id) }}"
             class="btn btn-sm btn-outline-danger" style="border-radius:8px;"
             onclick="return confirm('Delete this record permanently?')">
            <i class="bi bi-trash3-fill me-1"></i>Delete Record
          </a>
        </div>
      </div>

    </div>

  </div>
</div>

@endsection
