@extends('layouts.master')

@section('content')

<style>
/* ── Section cards ── */
.flv-card {
  background: #fff;
  border: 1px solid #e8edf5;
  border-radius: 12px;
  margin-bottom: 1.1rem;
  overflow: hidden;
  box-shadow: 0 1px 6px rgba(2,43,80,.05);
}
.flv-card-header {
  display: flex;
  align-items: center;
  gap: .55rem;
  padding: .7rem 1.1rem;
  background: linear-gradient(90deg,#f4f7fb,#eef2f9);
  border-bottom: 1px solid #e2e8f3;
  font-size: .78rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: .07em;
  color: var(--ft-navy);
}
.flv-card-header i { color: var(--ft-gold-dark); font-size: .95rem; }
.flv-card-body { padding: .85rem 1.1rem; }

/* ── Key/value rows ── */
.kv-row {
  display: flex;
  align-items: baseline;
  gap: .5rem;
  padding: .4rem 0;
  border-bottom: 1px solid #f0f4fa;
  font-size: .83rem;
}
.kv-row:last-child { border-bottom: none; }
.kv-key  { width: 44%; color: #6c757d; font-weight: 500; flex-shrink: 0; }
.kv-val  { color: #1a2545; font-weight: 600; word-break: break-word; }

/* ── Nutrition table ── */
.nut-table { width: 100%; border-collapse: collapse; font-size: .82rem; }
.nut-table thead th {
  background: var(--ft-navy);
  color: #FFD21B;
  font-size: .7rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .06em;
  padding: .45rem .75rem;
  text-align: left;
}
.nut-table tbody tr { border-bottom: 1px solid #f0f4fa; }
.nut-table tbody tr:last-child { border-bottom: none; }
.nut-table tbody tr:nth-child(even) { background: #f9fbff; }
.nut-table td { padding: .38rem .75rem; color: #1a2545; }
.nut-table td:first-child { color: #6c757d; font-weight: 500; }
.nut-table td:last-child  { font-weight: 700; text-align: right; }

/* ── Allergen chips ── */
.allergen-chip {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  background: #fff8e1;
  border: 1px solid #ffe082;
  color: #7a5a00;
  font-size: .75rem;
  font-weight: 600;
  padding: 3px 11px;
  border-radius: 50px;
  margin: 3px;
}

/* ── Status pill ── */
.status-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 5px 14px;
  border-radius: 50px;
  font-size: .76rem;
  font-weight: 700;
  letter-spacing: .04em;
  text-transform: uppercase;
}
.pill-submitted    { background:#fff3cd; color:#856404; }
.pill-under-review { background:#ede9fe; color:#5b21b6; }
.pill-completed    { background:#dcfce7; color:#166534; }

/* ── Right panel ── */
.right-panel-card {
  border-radius: 12px;
  margin-bottom: 1rem;
  overflow: hidden;
  border: 1px solid #e8edf5;
  box-shadow: 0 1px 6px rgba(2,43,80,.05);
}
.right-panel-header {
  padding: .65rem 1rem;
  font-size: .76rem;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: .07em;
  display: flex;
  align-items: center;
  gap: .4rem;
}
.right-panel-body { padding: .9rem 1rem; background: #fff; }

/* ── Timeline bar ── */
.timeline-bar {
  display: flex;
  gap: 0;
  align-items: stretch;
  background: #f4f7fb;
  border: 1px solid #e2e8f3;
  border-radius: 10px;
  margin-bottom: 1.1rem;
  overflow: hidden;
  flex-wrap: wrap;
}
.timeline-cell {
  flex: 1;
  min-width: 120px;
  padding: .65rem 1rem;
  border-right: 1px solid #e2e8f3;
}
.timeline-cell:last-child { border-right: none; }
.timeline-cell .tc-label { font-size: .68rem; color: #6c757d; font-weight: 600; text-transform: uppercase; letter-spacing: .05em; }
.timeline-cell .tc-val   { font-size: .85rem; font-weight: 700; color: var(--ft-navy); margin-top: 2px; }
</style>

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>Label Validation Details</h3>
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

  {{-- ── Top info bar ── --}}
  <div class="timeline-bar">
    <div class="timeline-cell">
      <div class="tc-label">Product</div>
      <div class="tc-val">{{ $record->product_name }}</div>
    </div>
    <div class="timeline-cell">
      <div class="tc-label">Status</div>
      <div class="tc-val" style="margin-top:4px;">
        @if($record->status === 'completed')
          <span class="status-pill pill-completed"><i class="bi bi-check-circle-fill"></i>Completed</span>
        @elseif($record->status === 'under_review')
          <span class="status-pill pill-under-review"><i class="bi bi-search"></i>Under Review</span>
        @else
          <span class="status-pill pill-submitted"><i class="bi bi-send"></i>Submitted</span>
        @endif
      </div>
    </div>
    <div class="timeline-cell">
      <div class="tc-label">Submitted On</div>
      <div class="tc-val">{{ $record->created_at->format('d M Y') }}</div>
    </div>
    <div class="timeline-cell">
      <div class="tc-label">Last Updated</div>
      <div class="tc-val">{{ $record->updated_at->format('d M Y') }}</div>
    </div>
    <div class="timeline-cell" style="display:flex;align-items:center;gap:.5rem;flex:0 0 auto;padding:.65rem .9rem;">
      @if($record->status !== 'completed')
        <a href="{{ route('label-validation.edit', $record->id) }}" class="btn btn-sm btn-primary">
          <i class="bi bi-pencil-fill me-1"></i>Edit
        </a>
      @endif
      <a href="{{ route('label-validation.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>Back
      </a>
    </div>
  </div>

  <div class="row g-3">

    {{-- ══════════ LEFT COLUMN ══════════ --}}
    <div class="col-lg-8">

      {{-- Product Details --}}
      <div class="flv-card">
        <div class="flv-card-header">
          <i class="bi bi-box-seam-fill"></i>Product Details
        </div>
        <div class="flv-card-body">
          <div class="row g-0">
            <div class="col-md-6">
              <div class="kv-row"><span class="kv-key">Product Name</span><span class="kv-val">{{ $record->product_name }}</span></div>
              <div class="kv-row"><span class="kv-key">Brand Name</span><span class="kv-val">{{ $record->brand_name ?: '—' }}</span></div>
              <div class="kv-row"><span class="kv-key">FSSAI License No.</span>
                <span class="kv-val">
                  <code style="background:#eef2ff;color:var(--ft-navy);padding:2px 7px;border-radius:5px;font-size:.8rem;">{{ $record->fssai_license_no }}</code>
                </span>
              </div>
              <div class="kv-row"><span class="kv-key">Country of Origin</span><span class="kv-val">{{ $record->country_of_origin }}</span></div>
            </div>
            <div class="col-md-6">
              <div class="kv-row"><span class="kv-key">Category</span><span class="kv-val">{{ $record->product_category }}</span></div>
              <div class="kv-row"><span class="kv-key">Sub-Category</span><span class="kv-val">{{ $record->sub_category ?: '—' }}</span></div>
              <div class="kv-row"><span class="kv-key">Net Quantity</span><span class="kv-val">{{ $record->net_quantity }}</span></div>
              <div class="kv-row"><span class="kv-key">Vegetarian Type</span>
                <span class="kv-val">
                  @php
                    $vtIcon = match($record->vegetarian_type) {
                      'vegetarian'     => ['🟢', '#166534'],
                      'non-vegetarian' => ['🔴', '#991b1b'],
                      'vegan'          => ['🌿', '#065f46'],
                      default          => ['🥚', '#7a5a00'],
                    };
                  @endphp
                  <span style="font-size:.82rem;">{{ $vtIcon[0] }}</span>
                  <span style="color:{{ $vtIcon[1] }};">{{ ucfirst($record->vegetarian_type) }}</span>
                </span>
              </div>
            </div>
            <div class="col-12">
              <div class="kv-row" style="align-items:flex-start;">
                <span class="kv-key">Manufacturer Name &amp; Address</span>
                <span class="kv-val" style="white-space:pre-wrap;line-height:1.5;">{{ $record->manufacturer_name_address }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- Nutritional Information --}}
      @php
        $ni = $record->nutritional_info ?? [];
        $nutrientLabels = [
          'energy_kcal'   => 'Energy',
          'total_fat'     => 'Total Fat',
          'saturated_fat' => 'Saturated Fat',
          'trans_fat'     => 'Trans Fat',
          'carbohydrate'  => 'Carbohydrate',
          'total_sugars'  => 'Total Sugars',
          'added_sugars'  => 'Added Sugars',
          'protein'       => 'Protein',
          'dietary_fibre' => 'Dietary Fibre',
          'sodium'        => 'Sodium',
          'cholesterol'   => 'Cholesterol',
          'vitamin_a'     => 'Vitamin A',
          'vitamin_c'     => 'Vitamin C',
          'vitamin_d'     => 'Vitamin D',
          'calcium'       => 'Calcium',
          'iron'          => 'Iron',
          'potassium'     => 'Potassium',
        ];
        $filledNutrients = array_filter($nutrientLabels, fn($k) => !empty($ni[$k]['value']), ARRAY_FILTER_USE_KEY);
      @endphp

      <div class="flv-card">
        <div class="flv-card-header">
          <i class="bi bi-bar-chart-fill"></i>Nutritional Information
          <span style="font-size:.68rem;color:#6c757d;font-weight:500;text-transform:none;letter-spacing:0;margin-left:.25rem;">(Per 100g / 100ml)</span>
        </div>
        <div class="flv-card-body" style="padding:.6rem;">
          @if(count($filledNutrients))
            <table class="nut-table">
              <thead>
                <tr>
                  <th>Nutrient</th>
                  <th style="text-align:right;">Amount per 100g/ml</th>
                </tr>
              </thead>
              <tbody>
                @foreach($filledNutrients as $key => $label)
                  <tr>
                    <td>{{ $label }}</td>
                    <td>{{ $ni[$key]['value'] }} {{ $ni[$key]['unit'] ?? '' }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            <p class="text-center py-3 mb-0" style="color:#aaa;font-size:.83rem;font-style:italic;">No nutritional data provided.</p>
          @endif
        </div>
      </div>

      {{-- Ingredients --}}
      <div class="flv-card">
        <div class="flv-card-header">
          <i class="bi bi-list-ul"></i>Ingredients
        </div>
        <div class="flv-card-body">
          @if($record->ingredients)
            <p style="font-size:.84rem;color:#1a2545;white-space:pre-wrap;line-height:1.7;margin-bottom:{{ $record->additives_ins_no ? '.75rem' : '0' }};">{{ $record->ingredients }}</p>
          @else
            <p style="color:#aaa;font-size:.83rem;font-style:italic;margin:0;">No ingredients listed.</p>
          @endif

          @if($record->additives_ins_no)
            <div style="background:#f4f7fb;border-radius:8px;padding:.6rem .85rem;border:1px solid #e2e8f3;">
              <div style="font-size:.72rem;font-weight:800;color:var(--ft-navy);text-transform:uppercase;letter-spacing:.06em;margin-bottom:.3rem;">
                <i class="bi bi-flask me-1" style="color:var(--ft-gold-dark);"></i>Additives (INS No.)
              </div>
              <div style="font-size:.83rem;color:#1a2545;">{{ $record->additives_ins_no }}</div>
            </div>
          @endif
        </div>
      </div>

      {{-- Allergens --}}
      <div class="flv-card">
        <div class="flv-card-header">
          <i class="bi bi-exclamation-triangle-fill"></i>Allergen Information
        </div>
        <div class="flv-card-body">
          @php $allergens = $record->allergens ?? []; @endphp
          @if(count($allergens))
            <div style="margin: -.15rem;">
              @foreach($allergens as $a)
                <span class="allergen-chip">
                  <i class="bi bi-exclamation-circle-fill" style="font-size:.7rem;"></i>{{ $a }}
                </span>
              @endforeach
            </div>
          @else
            <div style="display:flex;align-items:center;gap:.5rem;padding:.35rem 0;">
              <i class="bi bi-check-circle-fill" style="color:#16a34a;font-size:1rem;"></i>
              <span style="font-size:.83rem;color:#6c757d;">No allergens declared — product contains none of the listed allergens.</span>
            </div>
          @endif
        </div>
      </div>

      {{-- Other Declarations --}}
      <div class="flv-card">
        <div class="flv-card-header">
          <i class="bi bi-journal-check"></i>Other Declarations
        </div>
        <div class="flv-card-body">
          <div class="kv-row">
            <span class="kv-key">Storage Conditions</span>
            <span class="kv-val">{{ $record->storage_conditions ?: '—' }}</span>
          </div>
          <div class="kv-row" style="align-items:flex-start;">
            <span class="kv-key">Instructions for Use</span>
            <span class="kv-val" style="white-space:pre-wrap;">{{ $record->instructions_for_use ?: '—' }}</span>
          </div>
          <div class="kv-row" style="align-items:flex-start;">
            <span class="kv-key">Caution / Warning</span>
            <span class="kv-val" style="white-space:pre-wrap;">{{ $record->caution_warning ?: '—' }}</span>
          </div>
        </div>
      </div>

    </div>

    {{-- ══════════ RIGHT COLUMN ══════════ --}}
    <div class="col-lg-4">

      {{-- Admin Comments --}}
      <div class="right-panel-card">
        <div class="right-panel-header" style="background:linear-gradient(135deg,#fffbea,#fff3c4);border-bottom:1px solid #ffe082;color:#7a5a00;">
          <i class="bi bi-chat-quote-fill" style="color:#b45309;"></i>Admin Comments
        </div>
        <div class="right-panel-body">
          @if($record->admin_comments)
            <div style="background:#fffdf0;border-left:3px solid var(--ft-gold);border-radius:0 8px 8px 0;padding:.7rem .9rem;">
              <p style="font-size:.85rem;color:#1a2545;white-space:pre-wrap;line-height:1.6;margin:0;">{{ $record->admin_comments }}</p>
            </div>
          @else
            <div class="text-center py-3">
              <i class="bi bi-hourglass-split" style="font-size:1.6rem;color:#d0d5dd;display:block;margin-bottom:.4rem;"></i>
              <p style="font-size:.82rem;color:#aaa;font-style:italic;margin:0;">No comments yet.<br>Our team will review and respond soon.</p>
            </div>
          @endif
        </div>
      </div>

      {{-- Final Label Download --}}
      @if($record->final_label_path)
        <div class="right-panel-card" style="border-color:#bbf7d0;">
          <div class="right-panel-header" style="background:linear-gradient(135deg,#f0fdf4,#dcfce7);border-bottom:1px solid #bbf7d0;color:#166534;">
            <i class="bi bi-file-earmark-check-fill" style="color:#16a34a;"></i>Final Label Ready
          </div>
          <div class="right-panel-body text-center">
            <div style="width:56px;height:56px;background:#dcfce7;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto .75rem;">
              <i class="bi bi-file-earmark-arrow-down-fill" style="font-size:1.5rem;color:#16a34a;"></i>
            </div>
            <p style="font-size:.8rem;color:#6c757d;margin-bottom:.3rem;">Your validated label is ready</p>
            <p style="font-size:.78rem;color:#1a2545;font-weight:600;word-break:break-all;margin-bottom:.9rem;">
              <i class="bi bi-paperclip me-1" style="color:#16a34a;"></i>{{ $record->final_label_original_name }}
            </p>
            <a href="{{ route('label-validation.download', $record->id) }}"
               class="btn btn-success w-100 fw-bold" style="font-size:.88rem;">
              <i class="bi bi-download me-2"></i>Download Final Label
            </a>
          </div>
        </div>
      @else
        <div class="right-panel-card" style="border-color:#e5e7eb;">
          <div class="right-panel-header" style="background:#f9fafb;border-bottom:1px solid #e5e7eb;color:#6c757d;">
            <i class="bi bi-clock" style="color:#d0d5dd;"></i>Final Label
          </div>
          <div class="right-panel-body text-center">
            <div style="width:56px;height:56px;background:#f1f5f9;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto .75rem;">
              <i class="bi bi-hourglass" style="font-size:1.5rem;color:#d0d5dd;"></i>
            </div>
            <p style="font-size:.82rem;color:#aaa;font-style:italic;margin:0;line-height:1.6;">
              Your validated label will appear here once our team completes the review.
            </p>
          </div>
        </div>
      @endif

      {{-- Submission Summary --}}
      <div class="right-panel-card">
        <div class="right-panel-header" style="background:linear-gradient(90deg,#f4f7fb,#eef2f9);border-bottom:1px solid #e2e8f3;color:var(--ft-navy);">
          <i class="bi bi-info-circle-fill" style="color:var(--ft-gold-dark);"></i>Submission Summary
        </div>
        <div class="right-panel-body">
          <div class="kv-row"><span class="kv-key">FSSAI No.</span><span class="kv-val" style="font-size:.8rem;"><code style="background:#eef2ff;color:var(--ft-navy);padding:1px 6px;border-radius:4px;">{{ $record->fssai_license_no }}</code></span></div>
          <div class="kv-row"><span class="kv-key">Net Quantity</span><span class="kv-val">{{ $record->net_quantity }}</span></div>
          <div class="kv-row"><span class="kv-key">Category</span><span class="kv-val">{{ $record->product_category }}</span></div>
          <div class="kv-row"><span class="kv-key">Submitted</span><span class="kv-val">{{ $record->created_at->format('d M Y') }}</span></div>
          <div class="kv-row" style="border-bottom:none;"><span class="kv-key">Last Updated</span><span class="kv-val">{{ $record->updated_at->format('d M Y') }}</span></div>
        </div>
      </div>

      {{-- Edit / Delete actions --}}
      @if($record->status !== 'completed')
        <div class="d-flex gap-2">
          <a href="{{ route('label-validation.edit', $record->id) }}"
             class="btn btn-primary flex-fill">
            <i class="bi bi-pencil-fill me-1"></i>Edit Label
          </a>
          <a href="{{ route('label-validation.delete', $record->id) }}"
             class="btn btn-danger"
             onclick="return confirm('Delete this label validation?')"
             style="padding:.5rem .9rem;">
            <i class="bi bi-trash-fill"></i>
          </a>
        </div>
      @endif

    </div>
  </div>

</div>
@endsection
