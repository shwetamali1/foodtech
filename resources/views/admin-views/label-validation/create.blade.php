@extends('layouts.master')

@section('content')

<style>
.flv-stepper{display:flex;align-items:flex-start;justify-content:center;margin-bottom:2rem;overflow-x:auto;padding-bottom:.5rem;}
.flv-step{display:flex;flex-direction:column;align-items:center;flex:1;min-width:100px;position:relative;}
.flv-step:not(:last-child)::after{content:'';position:absolute;top:18px;left:50%;width:100%;height:2px;background:#dee2e6;z-index:0;}
.flv-step-circle{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.85rem;z-index:1;background:#dee2e6;color:#6c757d;border:2px solid #dee2e6;transition:.3s;}
.flv-step.active .flv-step-circle{background:var(--ft-navy);color:#fff;border-color:var(--ft-navy);}
.flv-step.done   .flv-step-circle{background:var(--ft-gold);color:var(--ft-navy);border-color:var(--ft-gold);}
.flv-step.done::after,.flv-step.active::after{background:var(--ft-gold);}
.flv-step-label{font-size:.72rem;margin-top:.4rem;color:#6c757d;text-align:center;font-weight:500;}
.flv-step.active .flv-step-label{color:var(--ft-navy);font-weight:700;}
.flv-step.done   .flv-step-label{color:var(--ft-gold-dark);}
.flv-panel{display:none;}
.flv-panel.active{display:block;}
.flv-section-title{font-size:1rem;font-weight:700;color:var(--ft-navy);border-bottom:2px solid var(--ft-gold);padding-bottom:.4rem;margin-bottom:1.25rem;}
.flv-label{font-size:.82rem;font-weight:600;color:var(--ft-navy);margin-bottom:.28rem;}
.flv-input{font-size:.88rem;border-color:#d0d5dd;}
.flv-input:focus{border-color:var(--ft-navy);box-shadow:0 0 0 .15rem rgba(10,36,99,.12);}

/* Lab report upload box */
.lab-upload-box{border:2px dashed #c9d4e8;border-radius:12px;padding:2rem 1.5rem;text-align:center;background:#f8faff;transition:border-color .2s,background .2s;cursor:pointer;}
.lab-upload-box:hover,.lab-upload-box.dragover{border-color:var(--ft-navy);background:#eef3ff;}
.lab-upload-box i{font-size:2.2rem;color:#c0cadd;display:block;margin-bottom:.5rem;}
.lab-upload-box .upload-label{font-size:.85rem;font-weight:600;color:var(--ft-navy);}
.lab-upload-box .upload-hint{font-size:.75rem;color:#6c757d;margin-top:.25rem;}
.lab-file-selected{background:#f0fdf4;border-color:#86efac;border-radius:10px;padding:.65rem 1rem;display:none;align-items:center;gap:.6rem;margin-top:.75rem;font-size:.83rem;}
.lab-file-selected i{color:#16a34a;font-size:1.1rem;}

/* Review */
.review-section{background:#f8faff;border:1px solid #dde3f0;border-radius:10px;padding:.9rem 1.1rem;margin-bottom:.9rem;}
.review-section h6{font-size:.78rem;font-weight:800;color:var(--ft-navy);text-transform:uppercase;letter-spacing:.05em;margin-bottom:.6rem;display:flex;align-items:center;justify-content:space-between;}
.review-row{display:flex;gap:.5rem;font-size:.82rem;border-bottom:1px solid #edf0f7;padding:.28rem 0;}
.review-row:last-child{border-bottom:none;}
.review-key{width:46%;color:#6c757d;font-weight:500;}
.review-val{width:54%;color:#1a2545;font-weight:600;}
.edit-step-btn{font-size:.72rem;padding:2px 9px;border-radius:5px;border:1px solid var(--ft-navy);color:var(--ft-navy);background:transparent;cursor:pointer;}
.edit-step-btn:hover{background:var(--ft-navy);color:#fff;}
</style>

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>Food Label Validation</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('label-validation.index') }}">Label Validation</a></li>
        <li class="breadcrumb-item active">New</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4">
      <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if(isset($quota))
    @if($quota['unlimited'])
      {{-- no message shown when plan has no specific limit --}}
    @elseif($quota['remaining'] > 0)
      <div class="alert alert-info d-flex align-items-center gap-2 mb-4">
        <i class="bi bi-patch-check-fill"></i>
        {{ $quota['used'] }} of {{ $quota['limit'] }} label validation{{ $quota['limit'] > 1 ? 's' : '' }} used this billing period &mdash; <strong>{{ $quota['remaining'] }} remaining</strong>.
      </div>
    @else
      <div class="alert alert-warning d-flex align-items-center gap-2 mb-4">
        <i class="bi bi-exclamation-triangle-fill"></i>
        You've used all {{ $quota['limit'] }} label validations included in your plan.
        @if(($addonCredits ?? 0) > 0)
          You have <strong>{{ $addonCredits }} add-on credit{{ $addonCredits > 1 ? 's' : '' }}</strong> available to continue.
        @else
          <a href="{{ url('subscriptions/list') }}">Upgrade your plan</a> or
          <a href="{{ url('addon-services/list') }}">purchase an add-on service</a> to continue.
        @endif
      </div>
    @endif
  @elseif(($addonCredits ?? 0) > 0)
    <div class="alert alert-info d-flex align-items-center gap-2 mb-4">
      <i class="bi bi-patch-check-fill"></i>
      You have <strong>{{ $addonCredits }} add-on credit{{ $addonCredits > 1 ? 's' : '' }}</strong> available. You can submit a label validation using your add-on credits.
    </div>
  @else
    <div class="alert alert-warning d-flex align-items-center gap-2 mb-4">
      <i class="bi bi-exclamation-triangle-fill"></i>
      You don't have an active subscription plan. Please <a href="{{ url('subscriptions/list') }}">purchase a plan</a> or an <a href="{{ url('addon-services/list') }}">add-on credit</a> to submit a label validation.
    </div>
  @endif

  <div class="card">
    <div class="card-body pt-4">

      {{-- Step Indicator --}}
      <div class="flv-stepper" id="stepIndicator">
        <div class="flv-step active" data-step="1">
          <div class="flv-step-circle">1</div>
          <div class="flv-step-label">Product<br>Details</div>
        </div>
        <div class="flv-step" data-step="2">
          <div class="flv-step-circle">2</div>
          <div class="flv-step-label">Lab<br>Report</div>
        </div>
        <div class="flv-step" data-step="3">
          <div class="flv-step-circle">3</div>
          <div class="flv-step-label">Other<br>Declarations</div>
        </div>
        <div class="flv-step" data-step="4">
          <div class="flv-step-circle">4</div>
          <div class="flv-step-label">Review &amp;<br>Submit</div>
        </div>
      </div>

      <form id="flvForm" method="POST" action="{{ route('label-validation.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- ════ STEP 1: Product Details ════ --}}
        <div class="flv-panel active" id="panel1">
          <div class="flv-section-title"><i class="bi bi-box-seam-fill me-2"></i>Product Details</div>
          <div class="row g-3">

            <div class="col-md-6">
              <label class="flv-label">Product Name <span class="text-danger">*</span></label>
              <input type="text" name="product_name" class="form-control flv-input"
                     placeholder="Enter product name" required>
            </div>

            <div class="col-md-6">
              <label class="flv-label">Product Category <span class="text-danger">*</span></label>
              <select name="product_category" class="form-select flv-input" required>
                <option value="">Select category</option>
                @foreach(['Beverages','Dairy Products','Bakery & Confectionery','Snacks & Namkeens','Cereals & Pulses','Spices & Condiments','Ready-to-Eat / RTE','Oils & Fats','Fruits & Vegetables','Meat & Poultry','Seafood','Health & Nutrition','Infant Foods','Other'] as $cat)
                  <option>{{ $cat }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6">
              <label class="flv-label">Business Category <span class="text-danger">*</span></label>
              <select name="business_category" class="form-select flv-input" required>
                <option value="">Select business category</option>
                <option value="Manufacturer">Manufacturer</option>
                <option value="Labeller">Labeller</option>
                <option value="Other">Other</option>
              </select>
            </div>

            <div class="col-md-6">
              <label class="flv-label">FSSAI License No. <span class="text-danger">*</span></label>
              <input type="text" name="fssai_license_no" class="form-control flv-input"
                     placeholder="Enter FSSAI license no." required>
            </div>

            <div class="col-md-6">
              <label class="flv-label">Net Weight / Quantity <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="text" name="net_quantity" class="form-control flv-input"
                       placeholder="e.g. 200" required>
                <select name="net_quantity_unit" class="form-select flv-input" style="max-width:80px;">
                  <option value="g">g</option>
                  <option value="ml">ml</option>
                  <option value="kg">kg</option>
                  <option value="L">L</option>
                </select>
              </div>
            </div>

            <div class="col-12">
              <label class="flv-label">Manufacturer Name &amp; Address <span class="text-danger">*</span></label>
              <textarea name="manufacturer_name_address" class="form-control flv-input" rows="3"
                        placeholder="Enter complete manufacturer name and address" required></textarea>
            </div>

          </div>
          <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-primary px-4" onclick="goToStep(2)">
              Next <i class="bi bi-arrow-right-short"></i>
            </button>
          </div>
        </div>

        {{-- ════ STEP 2: Lab Report Upload ════ --}}
        <div class="flv-panel" id="panel2">
          <div class="flv-section-title"><i class="bi bi-file-earmark-medical-fill me-2"></i>Lab Report</div>

          <div class="lab-upload-box" id="labUploadBox" onclick="document.getElementById('lab_report').click()">
            <i class="bi bi-cloud-arrow-up-fill"></i>
            <div class="upload-label">Click to upload Lab Report</div>
            <div class="upload-hint">PDF, DOC, DOCX, JPG, PNG &nbsp;·&nbsp; Max 10 MB</div>
          </div>

          <input type="file" id="lab_report" name="lab_report"
                 accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                 style="display:none;" onchange="onLabFileChange(this)">

          <div class="lab-file-selected" id="labFileInfo">
            <i class="bi bi-file-earmark-check-fill"></i>
            <span id="labFileName"></span>
            <button type="button" class="btn btn-sm btn-outline-danger ms-auto"
                    onclick="clearLabFile()" style="font-size:.72rem;padding:2px 8px;">
              <i class="bi bi-x"></i> Remove
            </button>
          </div>

          <p class="mt-3 mb-0" style="font-size:.78rem;color:#6c757d;">
            <i class="bi bi-shield-lock-fill me-1" style="color:var(--ft-gold-dark);"></i>
            Your lab report is stored securely in private storage and is only accessible by authorised admins.
          </p>

          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(1)">
              <i class="bi bi-arrow-left-short"></i> Back
            </button>
            <button type="button" class="btn btn-primary px-4" onclick="goToStep(3)">
              Next <i class="bi bi-arrow-right-short"></i>
            </button>
          </div>
        </div>

        {{-- ════ STEP 3: Other Declarations ════ --}}
        <div class="flv-panel" id="panel3">
          <div class="flv-section-title"><i class="bi bi-journal-check me-2"></i>Other Declarations</div>
          <div class="row g-3">
            <div class="col-12">
              <label class="flv-label">Storage Conditions</label>
              <select name="storage_conditions" class="form-select flv-input">
                <option value="">Select storage condition</option>
                <option>Store in a cool &amp; dry place</option>
                <option>Refrigerate after opening</option>
                <option>Store below 18°C</option>
                <option>Store below 25°C</option>
                <option>Keep away from direct sunlight</option>
                <option>Do not freeze</option>
                <option>Other</option>
              </select>
            </div>
            <div class="col-12">
              <label class="flv-label">Ingredients</label>
              <textarea name="ingredients" class="form-control flv-input" rows="3"
                        placeholder="List ingredients in descending order of weight (optional)"></textarea>
            </div>
            <div class="col-12">
              <label class="flv-label">Instructions for Use</label>
              <textarea name="instructions_for_use" class="form-control flv-input" rows="2"
                        placeholder="Enter instructions for use (optional)"></textarea>
            </div>
            <div class="col-12">
              <label class="flv-label">Caution / Warning</label>
              <textarea name="caution_warning" class="form-control flv-input" rows="2"
                        placeholder="Enter caution or warning if any (optional)"></textarea>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(2)">
              <i class="bi bi-arrow-left-short"></i> Back
            </button>
            <button type="button" class="btn btn-primary px-4" onclick="buildReview()">
              Next <i class="bi bi-arrow-right-short"></i>
            </button>
          </div>
        </div>

        {{-- ════ STEP 4: Review & Submit ════ --}}
        <div class="flv-panel" id="panel4">
          <div class="flv-section-title"><i class="bi bi-clipboard2-check-fill me-2"></i>Review &amp; Submit</div>
          <div class="row">
            <div class="col-lg-8">

              <div class="review-section">
                <h6>Product Details <button type="button" class="edit-step-btn" onclick="goToStep(1)"><i class="bi bi-pencil-fill"></i> Edit</button></h6>
                <div id="reviewProductBody"></div>
              </div>

              <div class="review-section">
                <h6>Lab Report <button type="button" class="edit-step-btn" onclick="goToStep(2)"><i class="bi bi-pencil-fill"></i> Edit</button></h6>
                <div id="reviewLabBody"></div>
              </div>

              <div class="review-section">
                <h6>Other Declarations <button type="button" class="edit-step-btn" onclick="goToStep(3)"><i class="bi bi-pencil-fill"></i> Edit</button></h6>
                <div id="reviewDeclBody"></div>
              </div>

            </div>
            <div class="col-lg-4">
              <div class="review-section" style="border-color:var(--ft-gold);">
                <h6 style="color:var(--ft-gold-dark);justify-content:flex-start;gap:.4rem;">
                  <i class="bi bi-shield-check-fill"></i>Declaration
                </h6>
                <label style="font-size:.83rem;display:flex;gap:.6rem;align-items:flex-start;cursor:pointer;">
                  <input type="checkbox" id="declarationCheck" style="margin-top:3px;flex-shrink:0;" required>
                  <span>I hereby declare that the information provided is true, correct and in accordance with FSSAI regulations.</span>
                </label>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(3)">
              <i class="bi bi-arrow-left-short"></i> Back
            </button>
            <button type="submit" class="btn btn-success px-5 fw-bold">
              <i class="bi bi-send-fill me-2"></i>Submit for Validation
            </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

<script>
let currentStep = 1;

function goToStep(step) {
  if (step > currentStep) {
    const panel = document.getElementById('panel' + currentStep);
    for (let el of panel.querySelectorAll('[required]')) {
      if (!el.value.trim()) { el.focus(); el.classList.add('is-invalid'); return; }
      el.classList.remove('is-invalid');
    }
  }
  document.getElementById('panel' + currentStep).classList.remove('active');
  currentStep = step;
  document.getElementById('panel' + step).classList.add('active');
  updateIndicator();
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updateIndicator() {
  document.querySelectorAll('.flv-step').forEach((el, i) => {
    el.classList.remove('active', 'done');
    if (i + 1 < currentStep) el.classList.add('done');
    if (i + 1 === currentStep) el.classList.add('active');
  });
}

function onLabFileChange(input) {
  if (input.files && input.files[0]) {
    document.getElementById('labFileName').textContent = input.files[0].name;
    const info = document.getElementById('labFileInfo');
    info.style.display = 'flex';
    document.getElementById('labUploadBox').style.borderColor = 'var(--ft-navy)';
  }
}

function clearLabFile() {
  document.getElementById('lab_report').value = '';
  document.getElementById('labFileInfo').style.display = 'none';
  document.getElementById('labUploadBox').style.borderColor = '#c9d4e8';
}

function rRow(k, v) {
  return `<div class="review-row"><span class="review-key">${k}</span><span class="review-val">${v || '<em style="color:#aaa">—</em>'}</span></div>`;
}

function buildReview() {
  const f = document.getElementById('flvForm');
  document.getElementById('reviewProductBody').innerHTML =
    rRow('Product Name',       f.product_name.value) +
    rRow('Product Category',   f.product_category.value) +
    rRow('Business Category',  f.business_category.value) +
    rRow('FSSAI License No.',  f.fssai_license_no.value) +
    rRow('Net Weight/Qty',     f.net_quantity.value + ' ' + f.net_quantity_unit.value) +
    rRow('Manufacturer Address', f.manufacturer_name_address.value);

  const labFile = document.getElementById('lab_report').files[0];
  document.getElementById('reviewLabBody').innerHTML = labFile
    ? `<div class="review-row"><span class="review-key">Lab Report</span><span class="review-val"><i class="bi bi-file-earmark-check-fill me-1" style="color:#16a34a;"></i>${labFile.name}</span></div>`
    : `<div class="review-row"><span class="review-key">Lab Report</span><span class="review-val"><em style="color:#aaa;">Not uploaded — you can add it later via Edit</em></span></div>`;

  document.getElementById('reviewDeclBody').innerHTML =
    rRow('Storage Conditions',   f.storage_conditions.value) +
    rRow('Ingredients',          f.ingredients.value) +
    rRow('Instructions for Use', f.instructions_for_use.value) +
    rRow('Caution / Warning',    f.caution_warning.value);

  goToStep(4);
}

document.getElementById('flvForm').addEventListener('submit', function(e) {
  if (!document.getElementById('declarationCheck').checked) {
    e.preventDefault();
    alert('Please accept the declaration before submitting.');
  }
});
</script>

@endsection
