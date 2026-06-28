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
.admin-comment-box{background:#fffbeb;border:1px solid #fde68a;border-radius:10px;padding:1rem 1.1rem;}
.final-label-box{background:#f0fdf4;border:1px solid #86efac;border-radius:10px;padding:1rem 1.1rem;}
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
        <li class="breadcrumb-item"><a href="{{ route('label-validation.index') }}">Label Validation</a></li>
        <li class="breadcrumb-item active">View</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  {{-- Alerts --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
  @endif

  <div class="row">

    {{-- Left column: submission details --}}
    <div class="col-lg-8">

      {{-- Status bar --}}
      <div class="info-card" style="padding:.75rem 1.25rem;display:flex;align-items:center;gap:1rem;flex-wrap:wrap;">
        <span style="font-size:.82rem;color:#64748b;font-weight:500;">Status:</span>
        @php
          $statusMap = ['submitted'=>'Submitted','under_review'=>'Under Review','completed'=>'Completed'];
          $statusClass = 'status-' . $record->status;
          $statusIcon  = ['submitted'=>'bi-send-fill','under_review'=>'bi-hourglass-split','completed'=>'bi-check-circle-fill'][$record->status] ?? 'bi-circle';
        @endphp
        <span class="status-pill {{ $statusClass }}">
          <i class="bi {{ $statusIcon }}"></i>{{ $statusMap[$record->status] ?? $record->status }}
        </span>
        <span class="ms-auto" style="font-size:.78rem;color:#94a3b8;">Submitted {{ $record->created_at->format('d M Y, h:i A') }}</span>
      </div>

      {{-- Product Details --}}
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-box-seam-fill me-1"></i>Product Details</div>
        <div class="info-row"><span class="info-key">Product Name</span><span class="info-val">{{ $record->product_name }}</span></div>
        <div class="info-row"><span class="info-key">Product Category</span><span class="info-val">{{ $record->product_category }}</span></div>
        <div class="info-row"><span class="info-key">Business Category</span><span class="info-val">{{ $record->business_category }}</span></div>
        <div class="info-row"><span class="info-key">FSSAI License No.</span><span class="info-val">{{ $record->fssai_license_no }}</span></div>
        <div class="info-row"><span class="info-key">Net Weight / Qty</span><span class="info-val">{{ $record->net_quantity }}</span></div>
        <div class="info-row"><span class="info-key">Manufacturer Address</span><span class="info-val">{{ $record->manufacturer_name_address }}</span></div>
      </div>

      {{-- Lab Report --}}
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-file-earmark-medical-fill me-1"></i>Lab Report</div>
        @if($record->lab_report_path)
          <div style="display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;">
            <i class="bi bi-file-earmark-check-fill" style="color:#16a34a;font-size:1.4rem;"></i>
            <div>
              <div style="font-weight:600;color:#15803d;font-size:.85rem;">{{ $record->lab_report_original_name }}</div>
              <div style="font-size:.75rem;color:#6c757d;">Stored securely &nbsp;·&nbsp; <i class="bi bi-shield-lock-fill"></i> Private</div>
            </div>
            <a href="{{ route('label-validation.lab-report', $record->id) }}"
               class="btn btn-sm ms-auto"
               style="background:var(--ft-navy);color:#fff;border-radius:8px;padding:.3rem .85rem;font-size:.78rem;">
              <i class="bi bi-download me-1"></i>Download
            </a>
          </div>
        @else
          <div class="no-file-badge"><i class="bi bi-file-earmark-x"></i> No lab report uploaded</div>
          @if(in_array($record->status, ['submitted','under_review']))
            <div class="mt-2">
              <a href="{{ route('label-validation.edit', $record->id) }}"
                 style="font-size:.78rem;color:var(--ft-navy);font-weight:600;">
                <i class="bi bi-plus-circle me-1"></i>Upload via Edit
              </a>
            </div>
          @endif
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

    {{-- Right column: admin response --}}
    <div class="col-lg-4">

      {{-- Admin Comments --}}
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-chat-square-text-fill me-1"></i>Admin Comments</div>
        @if($record->admin_comments)
          <div class="admin-comment-box">
            <p style="font-size:.85rem;margin:0;color:#374151;white-space:pre-line;">{{ $record->admin_comments }}</p>
          </div>
        @else
          <div class="no-file-badge"><i class="bi bi-chat-square-dots"></i> No comments yet</div>
        @endif
      </div>

      {{-- Final Validated Label --}}
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-patch-check-fill me-1"></i>Validated Label</div>
        @if($record->final_label_path)
          <div class="final-label-box">
            <div style="font-size:.82rem;color:#15803d;font-weight:600;margin-bottom:.5rem;">
              <i class="bi bi-check-circle-fill me-1"></i>Your validated label is ready!
            </div>
            <div style="font-size:.78rem;color:#374151;margin-bottom:.75rem;">{{ $record->final_label_original_name }}</div>
            <a href="{{ route('label-validation.download', $record->id) }}"
               class="btn btn-success btn-sm w-100">
              <i class="bi bi-download me-1"></i>Download Validated Label
            </a>
          </div>
        @else
          <div class="no-file-badge"><i class="bi bi-hourglass-split"></i> Pending — admin will upload once reviewed</div>
        @endif
      </div>

      {{-- Actions --}}
      <div class="info-card">
        <div class="info-card-title"><i class="bi bi-tools me-1"></i>Actions</div>
        <div class="d-grid gap-2">
          @if(in_array($record->status, ['submitted','under_review']))
            <a href="{{ route('label-validation.edit', $record->id) }}"
               class="btn btn-sm" style="background:var(--ft-navy);color:#fff;border-radius:8px;">
              <i class="bi bi-pencil-fill me-1"></i>Edit Submission
            </a>
          @endif
          <a href="{{ route('label-validation.index') }}"
             class="btn btn-sm btn-outline-secondary" style="border-radius:8px;">
            <i class="bi bi-arrow-left me-1"></i>Back to List
          </a>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
