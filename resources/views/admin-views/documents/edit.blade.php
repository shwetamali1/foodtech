@extends('layouts.master')

@section('content')

<style>
/* ── Document Edit Page ──────────────────────────────── */
.doc-form-card {
  background: #fff; border-radius: 18px;
  box-shadow: 0 6px 32px rgba(2,43,80,.09);
  border: 1px solid #e8f0f9; overflow: hidden;
  max-width: 760px; margin: 0 auto;
}
.doc-form-header {
  background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
  padding: 22px 28px; display: flex; align-items: center; gap: 14px;
  position: relative;
}
.doc-form-header::before {
  content: ''; position: absolute; left: 0; top: 0; bottom: 0;
  width: 4px; background: #ffd200;
}
.doc-header-icon {
  width: 48px; height: 48px; border-radius: 12px;
  background: rgba(255,210,27,.15); border: 1px solid rgba(255,210,27,.3);
  display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.doc-header-icon i { color: #ffd200; font-size: 20px; }
.doc-form-header h5 { color: #fff; font-weight: 700; font-size: 1.05rem; margin: 0 0 2px; }
.doc-form-header p  { color: rgba(255,255,255,.55); font-size: .8rem; margin: 0; }

.doc-form-body   { padding: 28px; }
.doc-form-footer {
  padding: 16px 28px; background: #f8fafc;
  border-top: 1px solid #e8f0f9;
  display: flex; align-items: center; gap: 10px;
}

/* Current file preview */
.current-file {
  display: flex; align-items: center; gap: 10px;
  background: #f0f5ff; border: 1.5px solid #c7d8f8;
  border-radius: 10px; padding: 10px 14px; margin-bottom: 10px;
  font-size: .85rem; color: #022B50; font-weight: 600;
}
.current-file i { font-size: 1.3rem; color: #3b82f6; }

/* Status badge preview */
.status-preview {
  display: inline-flex; align-items: center; gap: 5px;
  border-radius: 50px; padding: 4px 12px; font-size: .78rem; font-weight: 700;
}
.status-preview.pending  { background: #fef9c3; color: #854d0e; }
.status-preview.approve  { background: #dcfce7; color: #15803d; }
.status-preview.rejected { background: #fee2e2; color: #991b1b; }
</style>

<!-- Page Header -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0">Edit Document</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/documents/list') }}">Documents</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-4" style="max-width:760px;margin:0 auto 1rem;">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="doc-form-card">

      <!-- Header -->
      <div class="doc-form-header">
        <div class="doc-header-icon"><i class="bi bi-file-earmark-text-fill"></i></div>
        <div>
          <h5>Edit Document</h5>
          <p>Update document details and re-upload if needed</p>
        </div>
      </div>

      <!-- Form -->
      <form action="{{ $editRec->id }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="doc-form-body">

          @if($errors->any())
            <div class="alert alert-danger d-flex align-items-center gap-2 mb-4">
              <i class="bi bi-exclamation-triangle-fill"></i>
              Please fix the errors below and try again.
            </div>
          @endif

          <div class="row g-3">

            <!-- Document Type -->
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Document Type <span class="text-danger">*</span></label>
                <select name="document_type" class="form-control">
                  <option value="">Select Document Type</option>
                  @foreach($records as $doc)
                    <option value="{{ $doc->id }}" {{ $doc->id == $editRec->doc_type_id ? 'selected' : '' }}>
                      {{ $doc->type }}
                    </option>
                  @endforeach
                </select>
                <span class="text-danger small">{{ $errors->first('doc_type_id') }}</span>
              </div>
            </div>

            <!-- Title -->
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Document Title <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control"
                       placeholder="Enter document title" value="{{ $editRec->document }}">
                <span class="text-danger small">{{ $errors->first('document') }}</span>
              </div>
            </div>

            <!-- Document Status (admin only) -->
            @if($role_id != 8)
              <div class="col-12">
                <div class="form-group">
                  <label class="form-label">Document Status <span class="text-danger">*</span></label>
                  <select name="document_status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="pending"  {{ $editRec->status == 'pending'  ? 'selected' : '' }}>Pending</option>
                    <option value="approve"  {{ $editRec->status == 'approve'  ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $editRec->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                  </select>
                  <div class="mt-2">
                    @php $st = $editRec->status ?? 'pending'; @endphp
                    <span class="status-preview {{ $st }}">
                      @if($st === 'approve')
                        <i class="bi bi-check-circle-fill"></i> Approved
                      @elseif($st === 'rejected')
                        <i class="bi bi-x-circle-fill"></i> Rejected
                      @else
                        <i class="bi bi-clock-fill"></i> Pending
                      @endif
                    </span>
                    <small class="text-muted ms-2">Current status</small>
                  </div>
                </div>
              </div>
            @else
              <input type="hidden" name="document_status" value="pending">
            @endif

            <!-- Upload Document -->
            <div class="col-12">
              <div class="form-group">
                <label class="form-label">Upload Document</label>

                @if(!empty($editRec->uploaded_file))
                  <div class="current-file">
                    <i class="bi bi-file-earmark-check-fill"></i>
                    <div>
                      <div style="font-size:.8rem;color:#64748b;font-weight:400;">Current file</div>
                      <div>{{ is_string($editRec->uploaded_file) ? basename(json_decode($editRec->uploaded_file)[0] ?? $editRec->uploaded_file) : 'Uploaded' }}</div>
                    </div>
                    <a href="{{ asset('images/'.ltrim(json_decode($editRec->uploaded_file)[0] ?? $editRec->uploaded_file, '/')) }}"
                       target="_blank" class="btn btn-sm btn-outline-primary ms-auto">
                      <i class="bi bi-eye me-1"></i> View
                    </a>
                  </div>
                @endif

                <div id="image-upload">
                  <div class="dz-message">
                    <i class="bi bi-cloud-arrow-up-fill" style="font-size:2rem;color:#94a3b8;display:block;margin-bottom:.5rem;"></i>
                    <span class="fw-semibold" style="color:#022B50;">Drop file here or click to upload</span><br>
                    <small class="text-muted">PDF, JPG, PNG · Max 10 MB</small>
                  </div>
                </div>
                <input type="hidden" name="uploaded_file" id="uploaded_file" value="{{ $editRec->uploaded_file }}">
              </div>
            </div>

          </div>
        </div>

        <div class="doc-form-footer">
          <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check2-circle me-1"></i> Update Document
          </button>
          <a href="{{ url('/documents/list') }}" class="btn btn-outline-secondary">
            <i class="bi bi-x-circle me-1"></i> Cancel
          </a>
        </div>

      </form>
    </div>

  </div>
</div>

<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script>
Dropzone.autoDiscover = false;
$(function () {
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  let uploadedFiles = [];

  if (!Dropzone.instances.length) {
    document.getElementById('image-upload').classList.add('dropzone');
    new Dropzone("#image-upload", {
      url: "/upload",
      paramName: "file",
      maxFilesize: 10,
      acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
      headers: { "X-CSRF-TOKEN": token },
      addRemoveLinks: true,
      dictRemoveFile: "Remove",
      success: function(file, response) {
        file.uploaded_filename = response.success;
        uploadedFiles.push(response.success);
        document.getElementById('uploaded_file').value = JSON.stringify(uploadedFiles);
      },
      removedfile: function(file) {
        uploadedFiles = uploadedFiles.filter(f => f !== file.uploaded_filename);
        document.getElementById('uploaded_file').value = JSON.stringify(uploadedFiles);
        file.previewElement.remove();
        fetch("/remove", {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': token, 'Content-Type': 'application/json' },
          body: JSON.stringify({ filename: file.uploaded_filename })
        });
      }
    });
  }

  // Live status badge preview
  const statusSelect = document.querySelector('select[name="document_status"]');
  const statusPreview = document.querySelector('.status-preview');
  if (statusSelect && statusPreview) {
    statusSelect.addEventListener('change', function() {
      const val = this.value;
      statusPreview.className = 'status-preview ' + (val || 'pending');
      const icons = { approve: 'bi-check-circle-fill', rejected: 'bi-x-circle-fill', pending: 'bi-clock-fill' };
      const labels = { approve: 'Approved', rejected: 'Rejected', pending: 'Pending' };
      statusPreview.innerHTML = `<i class="bi ${icons[val] || icons.pending}"></i> ${labels[val] || labels.pending}`;
    });
  }
});
</script>

@endsection
