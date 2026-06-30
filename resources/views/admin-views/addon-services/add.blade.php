@extends('layouts.master')

@section('content')

<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-puzzle me-2" style="color:var(--ft-gold);"></i>Add Add-on Service</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/addon-services/list') }}">Add-on Services</a></li>
        <li class="breadcrumb-item active">Add</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if($errors->any())
    <div class="alert alert-danger mb-4">
      <i class="bi bi-exclamation-triangle-fill me-2"></i>
      Please fix the errors below before submitting.
    </div>
  @endif

  <div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10">
      <div class="form-card card">

        <div class="form-card-header">
          <div class="icon-box">
            <i class="bi bi-lightning-charge-fill"></i>
          </div>
          <div>
            <h5>New Add-on Service</h5>
            <p>A one-off purchase that grants extra label validation credits</p>
          </div>
        </div>

        <form action="add_submit" method="post">
          @csrf

          <div class="form-body">

            <span class="field-section-label">Service Details</span>

            <div class="row g-3 mb-4 mt-1">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-label">Service Title <span class="text-danger">*</span></label>
                  <input type="text" name="title" class="form-control"
                         placeholder="e.g. Extra Label Validation" value="{{ old('title') }}">
                  @error('title')<span class="text-danger small d-block mt-1">{{ $message }}</span>@enderror
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label">Price (₹) <span class="text-danger">*</span></label>
                  <input type="text" name="price" class="form-control"
                         placeholder="500" value="{{ old('price') }}">
                  @error('price')<span class="text-danger small d-block mt-1">{{ $message }}</span>@enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Label Validation Credits</label>
                  <input type="number" name="label_validation_credit" class="form-control" min="1"
                         placeholder="Leave blank if not applicable" value="{{ old('label_validation_credit') }}">
                  <small class="text-muted" style="font-size:0.75rem;">Optional — only set this if the service grants extra label validation submissions</small>
                  @error('label_validation_credit')<span class="text-danger small d-block mt-1">{{ $message }}</span>@enderror
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label">Description</label>
              <textarea name="description" class="form-control" rows="4"
                        placeholder="Describe what this add-on covers">{{ old('description') }}</textarea>
            </div>

          </div>

          <div class="form-footer">
            <a href="{{ URL::to('/addon-services/list') }}" class="btn btn-outline-secondary">
              <i class="bi bi-x-lg me-1"></i>Cancel
            </a>
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-check-lg me-1"></i>Create Service
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>

@endsection
