@extends('layouts.master')

<style>
  .ck-editor__editable_inline { min-height: 300px; }
</style>

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-file-earmark-arrow-up me-2" style="color:var(--ft-gold);"></i>Upload Report</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/reports/list') }}">Business Plans</a></li>
        <li class="breadcrumb-item active">Upload</li>
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
    <div class="col-xl-9 col-lg-11">

      <div class="form-card card">

        {{-- Header --}}
        <div class="form-card-header">
          <div class="icon-box">
            <i class="bi bi-bar-chart-steps"></i>
          </div>
          <div>
            <h5>New Business Plan / Report</h5>
            <p>PDFs are stored securely — download links require authentication</p>
          </div>
        </div>

        {{-- Form --}}
        <form action="add_submit" method="POST">
          @csrf

          <div class="form-body">

            <span class="field-section-label">Plan Details</span>

            <div class="row g-3 mb-4">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="form-label">Plan Title <span class="text-danger">*</span></label>
                  <input type="text" name="title" class="form-control"
                         placeholder="e.g. FSSAI Food Safety Compliance 2025"
                         value="{{ old('title') }}">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-label">Price (₹) <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text" style="border-radius:10px 0 0 10px;border:1.5px solid var(--ft-border);background:var(--ft-navy-soft);color:var(--ft-navy);font-weight:700;">₹</span>
                    <input type="text" name="price" class="form-control"
                           placeholder="999" value="{{ old('price') }}"
                           style="border-radius:0 10px 10px 0;">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Category <span class="text-danger">*</span></label>
                  <select name="category_id" class="form-control">
                    <option value="">— Select Category —</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label">Description <span class="text-danger">*</span></label>
              <textarea name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <span class="field-section-label">SEO (optional)</span>

            <div class="row g-3 mb-4 mt-1">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Meta Title</label>
                  <input type="text" name="meta_title" class="form-control"
                         placeholder="Page title for search engines" value="{{ old('meta_title') }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Meta Description</label>
                  <textarea name="meta_description" class="form-control" rows="2"
                            placeholder="Brief summary for search engines">{{ old('meta_description') }}</textarea>
                </div>
              </div>
            </div>

            <span class="field-section-label">Media Uploads</span>

            <div class="row g-3 mt-1">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">Cover Image / Video</label>
                  <div id="image-upload" class="dropzone">
                    <div class="dz-message">
                      <i class="bi bi-image" style="font-size:1.8rem;color:var(--ft-gold);display:block;margin-bottom:6px;"></i>
                      <strong style="font-size:.88rem;">Image or Video</strong>
                      <span style="display:block;font-size:.76rem;color:var(--ft-muted);margin-top:3px;">
                        JPG, PNG, MP4, MOV — max 20 MB
                      </span>
                    </div>
                  </div>
                  <input type="hidden" name="uploaded_video" id="uploaded_video">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-label">
                    Report PDF
                    <span class="badge-ft badge-plan ms-1" style="font-size:.65rem;">
                      <i class="bi bi-lock-fill" style="font-size:.6rem;"></i>Private
                    </span>
                  </label>
                  <div id="image-pdf" class="dropzone">
                    <div class="dz-message">
                      <i class="bi bi-file-earmark-pdf" style="font-size:1.8rem;color:#dc2626;display:block;margin-bottom:6px;"></i>
                      <strong style="font-size:.88rem;">PDF / Word Document</strong>
                      <span style="display:block;font-size:.76rem;color:var(--ft-muted);margin-top:3px;">
                        PDF, DOC, DOCX — max 20 MB
                      </span>
                    </div>
                  </div>
                  <input type="hidden" name="uploaded_pdf" id="uploaded_pdf">
                  <p class="mt-2" style="font-size:.75rem;color:var(--ft-muted);">
                    <i class="bi bi-shield-lock me-1"></i>
                    Stored securely — never publicly accessible
                  </p>
                </div>
              </div>
            </div>

          </div>{{-- /form-body --}}

          {{-- Footer --}}
          <div class="form-footer">
            <a href="{{ URL::to('/reports/list') }}" class="btn btn-outline-secondary">
              <i class="bi bi-x-lg me-1"></i>Cancel
            </a>
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-cloud-upload me-1"></i>Create Plan
            </button>
          </div>

        </form>
      </div>{{-- /form-card --}}

    </div>
  </div>

</div>

{{-- CKEditor 5 --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>

<script>
Dropzone.autoDiscover = false;
const csrfToken = '{{ csrf_token() }}';
let uploadedFiles = [];
let uploadedPDF   = [];

document.addEventListener('DOMContentLoaded', function () {

  ClassicEditor.create(document.querySelector('#description'), {
    ckfinder: { uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}" },
    toolbar: ['heading','|','bold','italic','link','bulletedList','numberedList','|',
              'uploadImage','insertTable','blockQuote','undo','redo']
  }).then(editor => {
    editor.plugins.get('Notification').on('show:warning', evt => evt.stop());
    document.querySelector('form').addEventListener('submit', function () {
      document.querySelector('#description').value = editor.getData();
    });
  }).catch(console.error);

});

new Dropzone("#image-upload", {
  url: "/upload",
  paramName: "file",
  maxFilesize: 20,
  acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4,.avi,.mov",
  headers: { 'X-CSRF-TOKEN': csrfToken },
  addRemoveLinks: true,
  success: function (file, response) {
    file.uploaded_filename = response.success;
    uploadedFiles.push(response.success);
    document.getElementById('uploaded_video').value = JSON.stringify(uploadedFiles);
  },
  removedfile: function (file) {
    uploadedFiles = uploadedFiles.filter(f => f !== file.uploaded_filename);
    document.getElementById('uploaded_video').value = JSON.stringify(uploadedFiles);
    file.previewElement.remove();
    fetch("/remove", { method:'POST',
      headers:{'X-CSRF-TOKEN':csrfToken,'Content-Type':'application/json'},
      body: JSON.stringify({ filename: file.uploaded_filename })
    });
  }
});

new Dropzone("#image-pdf", {
  url: "/upload-private",
  paramName: "file",
  maxFilesize: 20,
  acceptedFiles: ".pdf,.doc,.docx",
  headers: { 'X-CSRF-TOKEN': csrfToken },
  addRemoveLinks: true,
  success: function (file, response) {
    file.uploaded_file_pdf = response.success;
    uploadedPDF.push(response.success);
    document.getElementById('uploaded_pdf').value = JSON.stringify(uploadedPDF);
  },
  removedfile: function (file) {
    uploadedPDF = uploadedPDF.filter(f => f !== file.uploaded_file_pdf);
    document.getElementById('uploaded_pdf').value = JSON.stringify(uploadedPDF);
    file.previewElement.remove();
  }
});
</script>

@endsection
