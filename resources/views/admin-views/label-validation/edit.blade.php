@extends('layouts.master')

@section('content')

<style>
.flv-stepper{display:flex;align-items:flex-start;justify-content:center;gap:0;margin-bottom:2rem;overflow-x:auto;padding-bottom:.5rem;}
.flv-step{display:flex;flex-direction:column;align-items:center;flex:1;min-width:90px;position:relative;}
.flv-step:not(:last-child)::after{content:'';position:absolute;top:18px;left:50%;width:100%;height:2px;background:#dee2e6;z-index:0;}
.flv-step-circle{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.85rem;z-index:1;background:#dee2e6;color:#6c757d;border:2px solid #dee2e6;transition:.3s;}
.flv-step.active .flv-step-circle{background:var(--ft-navy);color:#fff;border-color:var(--ft-navy);}
.flv-step.done .flv-step-circle{background:var(--ft-gold);color:var(--ft-navy);border-color:var(--ft-gold);}
.flv-step.done::after,.flv-step.active::after{background:var(--ft-gold);}
.flv-step-label{font-size:.72rem;margin-top:.4rem;color:#6c757d;text-align:center;font-weight:500;}
.flv-step.active .flv-step-label{color:var(--ft-navy);font-weight:700;}
.flv-step.done .flv-step-label{color:var(--ft-gold-dark);}
.flv-panel{display:none;}
.flv-panel.active{display:block;}
.flv-section-title{font-size:1.05rem;font-weight:700;color:var(--ft-navy);border-bottom:2px solid var(--ft-gold);padding-bottom:.4rem;margin-bottom:1.2rem;}
.flv-label{font-size:.82rem;font-weight:600;color:var(--ft-navy);margin-bottom:.25rem;}
.flv-input{font-size:.88rem;border-color:#d0d5dd;}
.flv-input:focus{border-color:var(--ft-navy);box-shadow:0 0 0 .15rem rgba(10,36,99,.12);}
.flv-unit-select{width:80px;flex-shrink:0;font-size:.82rem;border-color:#d0d5dd;}
.allergen-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:.5rem .75rem;}
.allergen-item{display:flex;align-items:center;gap:.5rem;font-size:.83rem;padding:.35rem .5rem;border-radius:6px;border:1px solid #e5e7eb;}
.review-section{background:#f8faff;border:1px solid #dde3f0;border-radius:10px;padding:1rem 1.25rem;margin-bottom:1rem;}
.review-section h6{font-size:.82rem;font-weight:700;color:var(--ft-navy);text-transform:uppercase;letter-spacing:.04em;margin-bottom:.6rem;}
.review-row{display:flex;gap:.5rem;font-size:.83rem;border-bottom:1px solid #edf0f7;padding:.3rem 0;}
.review-row:last-child{border-bottom:none;}
.review-key{width:48%;color:#6c757d;font-weight:500;}
.review-val{width:52%;color:#1a2545;font-weight:600;}
.edit-step-btn{font-size:.75rem;padding:3px 10px;border-radius:5px;border:1px solid var(--ft-navy);color:var(--ft-navy);background:transparent;cursor:pointer;float:right;}
.edit-step-btn:hover{background:var(--ft-navy);color:#fff;}
</style>

@php
  $ni = $record->nutritional_info ?? [];
  $selectedAllergens = $record->allergens ?? [];
@endphp

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-patch-check-fill me-2" style="color:var(--ft-gold);"></i>Edit Label Validation</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('label-validation.index') }}">Label Validation</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card">
    <div class="card-body pt-4">

      <div class="flv-stepper" id="stepIndicator">
        <div class="flv-step active" data-step="1"><div class="flv-step-circle">1</div><div class="flv-step-label">Product<br>Details</div></div>
        <div class="flv-step" data-step="2"><div class="flv-step-circle">2</div><div class="flv-step-label">Nutritional<br>Information</div></div>
        <div class="flv-step" data-step="3"><div class="flv-step-circle">3</div><div class="flv-step-label">Ingredients</div></div>
        <div class="flv-step" data-step="4"><div class="flv-step-circle">4</div><div class="flv-step-label">Allergen<br>Information</div></div>
        <div class="flv-step" data-step="5"><div class="flv-step-circle">5</div><div class="flv-step-label">Other<br>Declarations</div></div>
        <div class="flv-step" data-step="6"><div class="flv-step-circle">6</div><div class="flv-step-label">Review &amp;<br>Submit</div></div>
      </div>

      <form id="flvForm" method="POST" action="{{ route('label-validation.update', $record->id) }}">
        @csrf
        @method('POST')

        {{-- STEP 1 --}}
        <div class="flv-panel active" id="panel1">
          <div class="flv-section-title"><i class="bi bi-box-seam me-2"></i>Product Details</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="flv-label">Product Name <span class="text-danger">*</span></label>
              <input type="text" name="product_name" class="form-control flv-input" value="{{ old('product_name', $record->product_name) }}" required>
            </div>
            <div class="col-md-6">
              <label class="flv-label">Product Category <span class="text-danger">*</span></label>
              <select name="product_category" class="form-select flv-input" required>
                <option value="">Select category</option>
                @foreach(['Beverages','Dairy Products','Bakery & Confectionery','Snacks & Namkeens','Cereals & Pulses','Spices & Condiments','Ready-to-Eat / RTE','Oils & Fats','Fruits & Vegetables','Meat & Poultry','Seafood','Health & Nutrition','Infant Foods','Other'] as $cat)
                  <option value="{{ $cat }}" {{ $record->product_category === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="flv-label">Brand Name</label>
              <input type="text" name="brand_name" class="form-control flv-input" value="{{ old('brand_name', $record->brand_name) }}">
            </div>
            <div class="col-md-6">
              <label class="flv-label">Sub-Category</label>
              <input type="text" name="sub_category" class="form-control flv-input" value="{{ old('sub_category', $record->sub_category) }}">
            </div>
            <div class="col-md-6">
              <label class="flv-label">FSSAI License No. <span class="text-danger">*</span></label>
              <input type="text" name="fssai_license_no" class="form-control flv-input" value="{{ old('fssai_license_no', $record->fssai_license_no) }}" required>
            </div>
            <div class="col-md-6">
              <label class="flv-label">Net Quantity <span class="text-danger">*</span></label>
              <input type="text" name="net_quantity" class="form-control flv-input" value="{{ old('net_quantity', $record->net_quantity) }}" required>
            </div>
            <div class="col-md-6">
              <label class="flv-label">Country of Origin <span class="text-danger">*</span></label>
              <select name="country_of_origin" class="form-select flv-input" required>
                @foreach(['India','USA','UK','Australia','Germany','China','Other'] as $c)
                  <option {{ $record->country_of_origin === $c ? 'selected' : '' }}>{{ $c }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="flv-label">Vegetarian / Non-Vegetarian <span class="text-danger">*</span></label>
              <select name="vegetarian_type" class="form-select flv-input" required>
                @foreach(['vegetarian','non-vegetarian','vegan','egg'] as $vt)
                  <option value="{{ $vt }}" {{ $record->vegetarian_type === $vt ? 'selected' : '' }}>{{ ucfirst($vt) }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label class="flv-label">Manufacturer Name &amp; Address <span class="text-danger">*</span></label>
              <textarea name="manufacturer_name_address" class="form-control flv-input" rows="3" required>{{ old('manufacturer_name_address', $record->manufacturer_name_address) }}</textarea>
            </div>
          </div>
          <div class="d-flex justify-content-end mt-4">
            <button type="button" class="btn btn-primary px-4" onclick="goToStep(2)">Next <i class="bi bi-arrow-right-short"></i></button>
          </div>
        </div>

        {{-- STEP 2: Nutritional Info --}}
        <div class="flv-panel" id="panel2">
          <div class="flv-section-title"><i class="bi bi-table me-2"></i>Nutritional Information <small class="fw-normal text-muted ms-1">(Per 100g / 100ml)</small></div>
          <div class="row g-3">
            @php
              $nutrients = [
                ['label'=>'Energy (kcal)','name'=>'energy_kcal','units'=>['kcal']],
                ['label'=>'Total Fat (g)','name'=>'total_fat','units'=>['g']],
                ['label'=>'Protein (g)','name'=>'protein','units'=>['g']],
                ['label'=>'Saturated Fat (g)','name'=>'saturated_fat','units'=>['g']],
                ['label'=>'Carbohydrate (g)','name'=>'carbohydrate','units'=>['g']],
                ['label'=>'Trans Fat (g)','name'=>'trans_fat','units'=>['g']],
                ['label'=>'Total Sugars (g)','name'=>'total_sugars','units'=>['g']],
                ['label'=>'Cholesterol (mg)','name'=>'cholesterol','units'=>['mg']],
                ['label'=>'Added Sugars (g)','name'=>'added_sugars','units'=>['g']],
                ['label'=>'Sodium (mg)','name'=>'sodium','units'=>['mg']],
                ['label'=>'Dietary Fibre (g)','name'=>'dietary_fibre','units'=>['g']],
                ['label'=>'Vitamin A (mcg)','name'=>'vitamin_a','units'=>['mcg','mg','IU']],
                ['label'=>'Calcium (mg)','name'=>'calcium','units'=>['mg','g']],
                ['label'=>'Vitamin C (mg)','name'=>'vitamin_c','units'=>['mg','mcg']],
                ['label'=>'Iron (mg)','name'=>'iron','units'=>['mg','mcg']],
                ['label'=>'Vitamin D (mcg)','name'=>'vitamin_d','units'=>['mcg','IU']],
                ['label'=>'Potassium (mg)','name'=>'potassium','units'=>['mg','g']],
              ];
            @endphp
            @foreach($nutrients as $n)
            <div class="col-md-6">
              <label class="flv-label">{{ $n['label'] }}</label>
              <div class="input-group">
                <input type="number" step="0.01" min="0" name="{{ $n['name'] }}"
                       class="form-control flv-input"
                       value="{{ old($n['name'], $ni[$n['name']]['value'] ?? '') }}">
                <select name="{{ $n['name'] }}_unit" class="flv-unit-select form-select">
                  @foreach($n['units'] as $u)
                    <option {{ ($ni[$n['name']]['unit'] ?? '') === $u ? 'selected' : '' }}>{{ $u }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            @endforeach
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(1)"><i class="bi bi-arrow-left-short"></i> Back</button>
            <button type="button" class="btn btn-primary px-4" onclick="goToStep(3)">Next <i class="bi bi-arrow-right-short"></i></button>
          </div>
        </div>

        {{-- STEP 3: Ingredients --}}
        <div class="flv-panel" id="panel3">
          <div class="flv-section-title"><i class="bi bi-list-ul me-2"></i>Ingredients</div>
          <div class="row g-3">
            <div class="col-12">
              <label class="flv-label">Ingredient List</label>
              <textarea name="ingredients" class="form-control flv-input" rows="5" maxlength="3000" id="ingredientsTA">{{ old('ingredients', $record->ingredients) }}</textarea>
              <div class="text-end mt-1" style="font-size:.75rem;color:var(--ft-muted);"><span id="ingredientsCount">{{ strlen($record->ingredients ?? '') }}</span> / 3000</div>
            </div>
            <div class="col-12">
              <label class="flv-label">Additives (INS No.)</label>
              <textarea name="additives_ins_no" class="form-control flv-input" rows="3" maxlength="1000" id="additivesTA">{{ old('additives_ins_no', $record->additives_ins_no) }}</textarea>
              <div class="text-end mt-1" style="font-size:.75rem;color:var(--ft-muted);"><span id="additivesCount">{{ strlen($record->additives_ins_no ?? '') }}</span> / 1000</div>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(2)"><i class="bi bi-arrow-left-short"></i> Back</button>
            <button type="button" class="btn btn-primary px-4" onclick="goToStep(4)">Next <i class="bi bi-arrow-right-short"></i></button>
          </div>
        </div>

        {{-- STEP 4: Allergens --}}
        <div class="flv-panel" id="panel4">
          <div class="flv-section-title"><i class="bi bi-exclamation-triangle-fill me-2"></i>Allergen Information</div>
          @php
            $allergenList = ['Cereals containing Gluten','Crustaceans','Peanuts and Peanuts products','Milk and Milk products','Fish','Tree nuts','Soybeans and Soyabean products','Eggs and Egg products','Sesame seeds','Celery','Sulphur dioxide & Sulphites (>10 mg/kg or mg/l)','Molluscs','Mustard','Lupin','Nuts'];
          @endphp
          <div class="allergen-grid">
            @foreach($allergenList as $a)
            <label class="allergen-item">
              <input type="checkbox" name="allergens[]" value="{{ $a }}" {{ in_array($a, $selectedAllergens) ? 'checked' : '' }}>
              <span>{{ $a }}</span>
            </label>
            @endforeach
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(3)"><i class="bi bi-arrow-left-short"></i> Back</button>
            <button type="button" class="btn btn-primary px-4" onclick="goToStep(5)">Next <i class="bi bi-arrow-right-short"></i></button>
          </div>
        </div>

        {{-- STEP 5: Other Declarations --}}
        <div class="flv-panel" id="panel5">
          <div class="flv-section-title"><i class="bi bi-journal-text me-2"></i>Other Declarations</div>
          <div class="row g-3">
            <div class="col-12">
              <label class="flv-label">Storage Conditions <span class="text-danger">*</span></label>
              <select name="storage_conditions" class="form-select flv-input" required>
                <option value="">Select storage condition</option>
                @foreach(['Store in a cool & dry place','Refrigerate after opening','Store below 18°C','Store below 25°C','Keep away from direct sunlight','Do not freeze','Other'] as $sc)
                  <option {{ $record->storage_conditions === $sc ? 'selected' : '' }}>{{ $sc }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-12">
              <label class="flv-label">Instructions for Use</label>
              <textarea name="instructions_for_use" class="form-control flv-input" rows="3">{{ old('instructions_for_use', $record->instructions_for_use) }}</textarea>
            </div>
            <div class="col-12">
              <label class="flv-label">Caution / Warning</label>
              <textarea name="caution_warning" class="form-control flv-input" rows="3">{{ old('caution_warning', $record->caution_warning) }}</textarea>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(4)"><i class="bi bi-arrow-left-short"></i> Back</button>
            <button type="button" class="btn btn-primary px-4" onclick="buildReview()">Next <i class="bi bi-arrow-right-short"></i></button>
          </div>
        </div>

        {{-- STEP 6: Review --}}
        <div class="flv-panel" id="panel6">
          <div class="flv-section-title"><i class="bi bi-clipboard2-check-fill me-2"></i>Review &amp; Update</div>
          <div class="row">
            <div class="col-lg-8">
              <div class="review-section"><h6>Product Details <button type="button" class="edit-step-btn" onclick="goToStep(1)"><i class="bi bi-pencil-fill"></i> Edit</button></h6><div id="reviewProductBody"></div></div>
              <div class="review-section"><h6>Nutritional Information <button type="button" class="edit-step-btn" onclick="goToStep(2)"><i class="bi bi-pencil-fill"></i> Edit</button></h6><div id="reviewNutritionBody"></div></div>
              <div class="review-section"><h6>Ingredients <button type="button" class="edit-step-btn" onclick="goToStep(3)"><i class="bi bi-pencil-fill"></i> Edit</button></h6><div id="reviewIngredientsBody"></div></div>
              <div class="review-section"><h6>Allergen Information <button type="button" class="edit-step-btn" onclick="goToStep(4)"><i class="bi bi-pencil-fill"></i> Edit</button></h6><div id="reviewAllergenBody"></div></div>
              <div class="review-section"><h6>Other Declarations <button type="button" class="edit-step-btn" onclick="goToStep(5)"><i class="bi bi-pencil-fill"></i> Edit</button></h6><div id="reviewDeclarationsBody"></div></div>
            </div>
          </div>
          <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-outline-secondary px-4" onclick="goToStep(5)"><i class="bi bi-arrow-left-short"></i> Back</button>
            <button type="submit" class="btn btn-success px-5 fw-bold">
              <i class="bi bi-check-circle-fill me-2"></i>Update Label Validation
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
    const required = panel.querySelectorAll('[required]');
    for (let el of required) {
      if (!el.value.trim()) { el.focus(); el.classList.add('is-invalid'); return; }
      else el.classList.remove('is-invalid');
    }
  }
  document.getElementById('panel' + currentStep).classList.remove('active');
  currentStep = step;
  document.getElementById('panel' + step).classList.add('active');
  updateStepIndicator();
  window.scrollTo({ top: 0, behavior: 'smooth' });
}

function updateStepIndicator() {
  document.querySelectorAll('.flv-step').forEach((el, i) => {
    const s = i + 1;
    el.classList.remove('active', 'done');
    if (s < currentStep) el.classList.add('done');
    if (s === currentStep) el.classList.add('active');
  });
}

function reviewRow(key, val) {
  return `<div class="review-row"><span class="review-key">${key}</span><span class="review-val">${val || '<em style="color:#aaa">—</em>'}</span></div>`;
}

function buildReview() {
  const f = document.getElementById('flvForm');
  document.getElementById('reviewProductBody').innerHTML =
    reviewRow('Product Name', f.product_name.value) + reviewRow('Category', f.product_category.value) +
    reviewRow('Brand Name', f.brand_name.value) + reviewRow('FSSAI License', f.fssai_license_no.value) +
    reviewRow('Net Quantity', f.net_quantity.value) + reviewRow('Country', f.country_of_origin.value) +
    reviewRow('Veg Type', f.vegetarian_type.value) + reviewRow('Manufacturer', f.manufacturer_name_address.value);

  const nutrients = ['energy_kcal','total_fat','protein','saturated_fat','carbohydrate','trans_fat','total_sugars','cholesterol','added_sugars','sodium','dietary_fibre','vitamin_a','calcium','vitamin_c','iron','vitamin_d','potassium'];
  const nutrientLabels = {'energy_kcal':'Energy','total_fat':'Total Fat','protein':'Protein','saturated_fat':'Saturated Fat','carbohydrate':'Carbohydrate','trans_fat':'Trans Fat','total_sugars':'Total Sugars','cholesterol':'Cholesterol','added_sugars':'Added Sugars','sodium':'Sodium','dietary_fibre':'Dietary Fibre','vitamin_a':'Vitamin A','calcium':'Calcium','vitamin_c':'Vitamin C','iron':'Iron','vitamin_d':'Vitamin D','potassium':'Potassium'};
  let nh = '';
  nutrients.forEach(n => {
    const val = f[n] ? f[n].value : '';
    const unit = f[n+'_unit'] ? f[n+'_unit'].value : '';
    if (val) nh += reviewRow(nutrientLabels[n], val + ' ' + unit);
  });
  document.getElementById('reviewNutritionBody').innerHTML = nh || '<em style="color:#aaa;font-size:.8rem;">No nutritional data.</em>';

  document.getElementById('reviewIngredientsBody').innerHTML = reviewRow('Ingredients', f.ingredients.value) + reviewRow('Additives', f.additives_ins_no.value);

  const checked = [...document.querySelectorAll('input[name="allergens[]"]:checked')].map(c=>c.value);
  document.getElementById('reviewAllergenBody').innerHTML = checked.length ? checked.map(a=>`<span class="badge bg-warning text-dark me-1 mb-1">${a}</span>`).join('') : '<em style="color:#aaa;font-size:.8rem;">None</em>';

  document.getElementById('reviewDeclarationsBody').innerHTML = reviewRow('Storage', f.storage_conditions.value) + reviewRow('Instructions', f.instructions_for_use.value) + reviewRow('Caution', f.caution_warning.value);

  goToStep(6);
}

document.getElementById('ingredientsTA').addEventListener('input', function() {
  document.getElementById('ingredientsCount').textContent = this.value.length;
});
document.getElementById('additivesTA').addEventListener('input', function() {
  document.getElementById('additivesCount').textContent = this.value.length;
});
</script>
@endsection
