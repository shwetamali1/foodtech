@extends('layouts.master')

@section('content')

<style>
.detail-card{background:#f8faff;border:1px solid #dde3f0;border-radius:10px;padding:1rem 1.25rem;margin-bottom:1rem;}
.detail-card h6{font-size:.82rem;font-weight:700;color:var(--ft-navy);text-transform:uppercase;letter-spacing:.04em;border-bottom:1px solid #e5ebf5;padding-bottom:.5rem;margin-bottom:.75rem;}
.detail-row{display:flex;gap:.5rem;font-size:.83rem;border-bottom:1px solid #edf0f7;padding:.32rem 0;}
.detail-row:last-child{border-bottom:none;}
.detail-key{width:45%;color:#6c757d;font-weight:500;}
.detail-val{width:55%;color:#1a2545;font-weight:600;}
.admin-panel{background:#fff;border:1.5px solid var(--ft-navy);border-radius:12px;padding:1.25rem;}
.admin-panel-title{font-size:.9rem;font-weight:700;color:var(--ft-navy);border-bottom:2px solid var(--ft-gold);padding-bottom:.5rem;margin-bottom:1rem;}
</style>

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>Label Validation — Admin View</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin-food-labels.index') }}">Label Validations</a></li>
        <li class="breadcrumb-item active">View</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
  @endif

  {{-- User info bar --}}
  <div class="d-flex align-items-center gap-3 mb-3 p-3 rounded" style="background:#f0f4ff;border:1px solid #dde3f0;">
    <div style="width:42px;height:42px;border-radius:50%;background:linear-gradient(135deg,var(--ft-navy),var(--ft-navy-mid));display:flex;align-items:center;justify-content:center;color:#FFD21B;font-weight:700;font-size:.9rem;flex-shrink:0;">
      {{ strtoupper(substr($record->user->first_name ?? 'U', 0, 1) . substr($record->user->last_name ?? '', 0, 1)) }}
    </div>
    <div>
      <div class="fw-bold" style="color:var(--ft-navy);">{{ ($record->user->first_name ?? '') . ' ' . ($record->user->last_name ?? '') }}</div>
      <div style="font-size:.8rem;color:#6c757d;">{{ $record->user->email ?? '' }} &nbsp;|&nbsp; {{ $record->user->mobile ?? '' }}</div>
    </div>
    <div class="ms-auto d-flex align-items-center gap-3">
      <div>
        <div style="font-size:.72rem;color:#6c757d;">Submitted</div>
        <div style="font-size:.82rem;font-weight:600;color:var(--ft-navy);">{{ $record->created_at->format('d M Y') }}</div>
      </div>
      <div>
        <div style="font-size:.72rem;color:#6c757d;">Status</div>
        @if($record->status === 'completed')
          <span class="badge-ft badge-active">Completed</span>
        @elseif($record->status === 'under_review')
          <span class="badge-ft badge-plan">Under Review</span>
        @else
          <span class="badge-ft" style="background:#fff3cd;color:#856404;">Submitted</span>
        @endif
      </div>
      <a href="{{ route('admin-food-labels.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Back
      </a>
    </div>
  </div>

  <div class="row">

    {{-- Left: Submitted Details --}}
    <div class="col-lg-8">

      <div class="detail-card">
        <h6><i class="bi bi-box-seam me-1"></i>Product Details</h6>
        <div class="detail-row"><span class="detail-key">Product Name</span><span class="detail-val">{{ $record->product_name }}</span></div>
        <div class="detail-row"><span class="detail-key">Category</span><span class="detail-val">{{ $record->product_category }}</span></div>
        <div class="detail-row"><span class="detail-key">Brand Name</span><span class="detail-val">{{ $record->brand_name ?: '—' }}</span></div>
        <div class="detail-row"><span class="detail-key">Sub-Category</span><span class="detail-val">{{ $record->sub_category ?: '—' }}</span></div>
        <div class="detail-row"><span class="detail-key">FSSAI License No.</span><span class="detail-val"><code>{{ $record->fssai_license_no }}</code></span></div>
        <div class="detail-row"><span class="detail-key">Net Quantity</span><span class="detail-val">{{ $record->net_quantity }}</span></div>
        <div class="detail-row"><span class="detail-key">Country of Origin</span><span class="detail-val">{{ $record->country_of_origin }}</span></div>
        <div class="detail-row"><span class="detail-key">Vegetarian Type</span><span class="detail-val">{{ ucfirst($record->vegetarian_type) }}</span></div>
        <div class="detail-row"><span class="detail-key">Manufacturer Address</span><span class="detail-val">{{ $record->manufacturer_name_address }}</span></div>
      </div>

      <div class="detail-card">
        <h6><i class="bi bi-table me-1"></i>Nutritional Information (Per 100g / 100ml)</h6>
        @php
          $ni = $record->nutritional_info ?? [];
          $nutrientLabels = [
            'energy_kcal'=>'Energy','total_fat'=>'Total Fat','protein'=>'Protein',
            'saturated_fat'=>'Saturated Fat','carbohydrate'=>'Carbohydrate','trans_fat'=>'Trans Fat',
            'total_sugars'=>'Total Sugars','cholesterol'=>'Cholesterol','added_sugars'=>'Added Sugars',
            'sodium'=>'Sodium','dietary_fibre'=>'Dietary Fibre','vitamin_a'=>'Vitamin A',
            'calcium'=>'Calcium','vitamin_c'=>'Vitamin C','iron'=>'Iron',
            'vitamin_d'=>'Vitamin D','potassium'=>'Potassium',
          ];
        @endphp
        <div class="row">
          @foreach($nutrientLabels as $key => $label)
            @if(!empty($ni[$key]['value']))
            <div class="col-6">
              <div class="detail-row">
                <span class="detail-key">{{ $label }}</span>
                <span class="detail-val">{{ $ni[$key]['value'] }} {{ $ni[$key]['unit'] ?? '' }}</span>
              </div>
            </div>
            @endif
          @endforeach
          @if(empty(array_filter(array_column($ni, 'value'))))
            <div class="col-12"><em style="font-size:.82rem;color:#aaa;">No nutritional data provided.</em></div>
          @endif
        </div>
      </div>

      <div class="detail-card">
        <h6><i class="bi bi-list-ul me-1"></i>Ingredients</h6>
        <p style="font-size:.84rem;white-space:pre-wrap;margin-bottom:.5rem;color:#1a2545;">{{ $record->ingredients ?: '—' }}</p>
        @if($record->additives_ins_no)
          <div style="font-size:.78rem;font-weight:700;color:var(--ft-navy);margin-top:.5rem;">Additives (INS No.):</div>
          <p style="font-size:.83rem;">{{ $record->additives_ins_no }}</p>
        @endif
      </div>

      <div class="detail-card">
        <h6><i class="bi bi-exclamation-triangle-fill me-1"></i>Allergen Information</h6>
        @php $allergens = $record->allergens ?? []; @endphp
        @if(count($allergens))
          @foreach($allergens as $a)
            <span class="badge bg-warning text-dark me-1 mb-1" style="font-size:.78rem;">{{ $a }}</span>
          @endforeach
        @else
          <em style="font-size:.82rem;color:#aaa;">No allergens declared.</em>
        @endif
      </div>

      <div class="detail-card">
        <h6><i class="bi bi-journal-text me-1"></i>Other Declarations</h6>
        <div class="detail-row"><span class="detail-key">Storage Conditions</span><span class="detail-val">{{ $record->storage_conditions ?: '—' }}</span></div>
        <div class="detail-row"><span class="detail-key">Instructions for Use</span><span class="detail-val">{{ $record->instructions_for_use ?: '—' }}</span></div>
        <div class="detail-row"><span class="detail-key">Caution / Warning</span><span class="detail-val">{{ $record->caution_warning ?: '—' }}</span></div>
      </div>

    </div>

    {{-- Right: Admin Response Panel --}}
    <div class="col-lg-4">
      <div class="admin-panel mb-3">
        <div class="admin-panel-title"><i class="bi bi-shield-check me-2" style="color:var(--ft-gold);"></i>Admin Response</div>

        <form method="POST" action="{{ route('admin-food-labels.update', $record->id) }}" enctype="multipart/form-data">
          @csrf

          {{-- Status --}}
          <div class="mb-3">
            <label class="flv-label" style="font-size:.82rem;font-weight:600;color:var(--ft-navy);">Update Status</label>
            <select name="status" class="form-select" style="font-size:.85rem;">
              <option value="submitted"    {{ $record->status === 'submitted'    ? 'selected' : '' }}>Submitted</option>
              <option value="under_review" {{ $record->status === 'under_review' ? 'selected' : '' }}>Under Review</option>
              <option value="completed"    {{ $record->status === 'completed'    ? 'selected' : '' }}>Completed</option>
            </select>
          </div>

          {{-- Admin Comments --}}
          <div class="mb-3">
            <label class="flv-label" style="font-size:.82rem;font-weight:600;color:var(--ft-navy);">Comments / Feedback</label>
            <textarea name="admin_comments" class="form-control" rows="6"
              placeholder="Write your review comments, corrections needed, or approval notes..."
              style="font-size:.85rem;border-color:#d0d5dd;">{{ $record->admin_comments }}</textarea>
          </div>

          {{-- Upload Final Label --}}
          <div class="mb-3">
            <label class="flv-label" style="font-size:.82rem;font-weight:600;color:var(--ft-navy);">
              Upload Final Label
              <span style="font-size:.72rem;font-weight:400;color:#6c757d;">(PDF / DOC / Image)</span>
            </label>
            @if($record->final_label_path)
              <div class="mb-2 d-flex align-items-center gap-2 p-2 rounded" style="background:#f0fff4;border:1px solid #c3e6cb;">
                <i class="bi bi-file-earmark-check-fill" style="color:#198754;"></i>
                <span style="font-size:.8rem;color:#198754;font-weight:600;">{{ $record->final_label_original_name }}</span>
                <a href="{{ route('admin-food-labels.download', $record->id) }}"
                   class="ms-auto btn btn-sm btn-outline-success" style="font-size:.75rem;padding:2px 8px;">
                  <i class="bi bi-download"></i>
                </a>
              </div>
              <label style="font-size:.75rem;color:#6c757d;">Upload a new file to replace the existing one:</label>
            @endif
            <input type="file" name="final_label" class="form-control" style="font-size:.83rem;"
              accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            <div style="font-size:.72rem;color:#6c757d;margin-top:.25rem;">Max 10MB. Stored in private secure storage — only accessible by the user.</div>
          </div>

          <button type="submit" class="btn btn-primary w-100 fw-bold" style="font-size:.88rem;">
            <i class="bi bi-save-fill me-2"></i>Save Response
          </button>
        </form>
      </div>

      {{-- Download button for admin --}}
      @if($record->final_label_path)
      <div class="detail-card" style="border-color:var(--ft-gold);">
        <h6 style="color:var(--ft-gold-dark);"><i class="bi bi-file-earmark-arrow-down-fill me-1"></i>Current Final Label</h6>
        <p style="font-size:.82rem;margin-bottom:.75rem;">
          <i class="bi bi-file-earmark me-1" style="color:var(--ft-gold-dark);"></i>
          {{ $record->final_label_original_name }}
        </p>
        <a href="{{ route('admin-food-labels.download', $record->id) }}"
           class="btn btn-sm btn-outline-success w-100">
          <i class="bi bi-download me-1"></i>Download
        </a>
      </div>
      @endif

    </div>
  </div>
</div>
@endsection
