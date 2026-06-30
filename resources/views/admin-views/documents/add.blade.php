@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-file-earmark-plus me-2" style="color:var(--ft-gold);"></i>Add Document</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/documents/list') }}">Documents</a></li>
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

        {{-- Card Header --}}
        <div class="form-card-header">
          <div class="icon-box">
            <i class="bi bi-folder-plus"></i>
          </div>
          <div>
            <h5>New Document</h5>
            <p>Fill in the details below to add a document</p>
          </div>
        </div>

        {{-- Form --}}
        <form action="add_submit" method="post">
          @csrf

          <div class="form-body">

            @if($role_id != 8)
              <div class="mb-4">
                <span class="field-section-label">Assignment</span>
                <div class="form-group">
                  <label class="form-label">Assign to User <span class="text-danger">*</span></label>
                  <select id="user_id" name="user_id" class="form-control select2">
                    <option value="">— Select a user —</option>
                    @foreach ($userData as $user)
                      <option value="{{ $user->id }}">
                        {{ $user->first_name.' '.$user->last_name }} ({{ $user->email }})
                      </option>
                    @endforeach
                  </select>
                  @error('user_id')
                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            @endif

            <span class="field-section-label">Document Details</span>

            <div class="row g-3 mb-4 mt-1">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Document Type <span class="text-danger">*</span></label>
                  <select id="document_type" name="document_type" class="form-control">
                    <option value="">— Select Type —</option>
                    @foreach ($records as $doc)
                      <option value="{{ $doc->id }}" {{ old('doc_type_id') == $doc->id ? 'selected' : '' }}>
                        {{ $doc->type }}
                      </option>
                    @endforeach
                  </select>
                  @error('service_type_id')
                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Document Title <span class="text-danger">*</span></label>
                  <input type="text" name="title" class="form-control"
                         placeholder="e.g. FSSAI License Application"
                         value="{{ old('services') }}">
                  @error('document')
                    <span class="text-danger small d-block mt-1">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              @if($role_id != 8)
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Document Status <span class="text-danger">*</span></label>
                    <select id="document_status" name="document_status" class="form-control">
                      <option value="">— Select Status —</option>
                      <option value="pending">Pending</option>
                      <option value="approve">Approved</option>
                      <option value="rejected">Rejected</option>
                    </select>
                  </div>
                </div>
              @else
                <input type="hidden" name="document_status" value="pending">
              @endif
            </div>

            <span class="field-section-label">File Upload</span>

            <div class="form-group mt-2">
              <label class="form-label">Upload Document</label>
              <div id="image-upload">
                <div class="dz-message">
                  <i class="bi bi-cloud-arrow-up-fill" style="font-size:2rem;color:var(--ft-gold);display:block;margin-bottom:8px;"></i>
                  <strong>Drag &amp; drop files here</strong>
                  <span style="display:block;font-size:.8rem;margin-top:4px;color:var(--ft-muted);">
                    Supports JPG, PNG, PDF — max 10 MB
                  </span>
                </div>
              </div>
              <input type="hidden" name="uploaded_file" id="uploaded_file" value="">
            </div>

          </div>{{-- /form-body --}}

          {{-- Footer --}}
          <div class="form-footer">
            <a href="{{ URL::to('/documents/list') }}" class="btn btn-outline-secondary">
              <i class="bi bi-x-lg me-1"></i>Cancel
            </a>
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-check-lg me-1"></i>Create Document
            </button>
          </div>

        </form>
      </div>{{-- /form-card --}}

    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script>Dropzone.autoDiscover = false;</script>
<script>
$(function () {
  $('.select2').select2();

  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  let uploadedFiles = [];

  document.getElementById('image-upload').classList.add('dropzone');
  new Dropzone("#image-upload", {
    url: "/upload",
    paramName: "file",
    maxFilesize: 10,
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
    headers: { "X-CSRF-TOKEN": token },
    addRemoveLinks: true,
    success: function (file, response) {
      file.uploaded_filename = response.success;
      uploadedFiles.push(response.success);
      document.getElementById('uploaded_file').value = JSON.stringify(uploadedFiles);
    },
    removedfile: function (file) {
      uploadedFiles = uploadedFiles.filter(f => f !== file.uploaded_filename);
      document.getElementById('uploaded_file').value = JSON.stringify(uploadedFiles);
      file.previewElement.remove();
    }
  });
});
</script>

@endsection
