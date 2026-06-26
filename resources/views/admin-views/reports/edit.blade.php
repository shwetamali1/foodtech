@extends('layouts.master')

@section('content')

<style>
.ck-editor__editable_inline { min-height: 280px; }

/* ── Report Edit Form ────────────────────────────────── */
.re-card {
  background: #fff; border-radius: 18px;
  box-shadow: 0 6px 32px rgba(2,43,80,.09);
  border: 1px solid #e8f0f9; overflow: hidden;
}
.re-card-header {
  background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
  padding: 22px 28px; display: flex; align-items: center; gap: 14px;
  position: relative;
}
.re-card-header::before {
  content:''; position:absolute; left:0; top:0; bottom:0;
  width:4px; background:#ffd200;
}
.re-header-icon {
  width:48px; height:48px; border-radius:12px;
  background:rgba(255,210,27,.15); border:1px solid rgba(255,210,27,.3);
  display:flex; align-items:center; justify-content:center; flex-shrink:0;
}
.re-header-icon i { color:#ffd200; font-size:20px; }
.re-card-header h5 { color:#fff; font-weight:700; font-size:1.05rem; margin:0 0 2px; }
.re-card-header p  { color:rgba(255,255,255,.55); font-size:.8rem; margin:0; }

.re-body   { padding:28px; }
.re-footer {
  padding:16px 28px; background:#f8fafc;
  border-top:1px solid #e8f0f9;
  display:flex; align-items:center; gap:10px;
}

/* Section labels */
.re-section-label {
  font-size:.7rem; font-weight:800; text-transform:uppercase;
  letter-spacing:.1em; color:#e6a800;
  border-bottom:2px solid #ffd200;
  padding-bottom:5px; margin:0 0 1.1rem; display:block;
}

/* Side panel */
.re-side-card {
  background:#f8fafc; border-radius:14px;
  border:1.5px solid #e8f0f9; padding:18px;
  margin-bottom:1.2rem;
}
.re-side-card-title {
  font-size:.78rem; font-weight:800; text-transform:uppercase;
  letter-spacing:.08em; color:#022B50;
  margin-bottom:14px; display:flex; align-items:center; gap:.4rem;
}
.re-side-card-title i { color:#ffd200; }

/* Current file strip */
.re-file-strip {
  display:flex; align-items:center; gap:10px;
  background:#f0f5ff; border:1.5px solid #c7d8f8;
  border-radius:9px; padding:8px 12px; margin-bottom:8px;
  font-size:.82rem; color:#022B50; font-weight:600;
}
.re-file-strip i { font-size:1.2rem; color:#3b82f6; flex-shrink:0; }
.re-file-strip a { margin-left:auto; white-space:nowrap; }

/* SEO char counters */
.seo-counter {
  font-size:.72rem; color:#94a3b8;
  text-align:right; margin-top:3px;
}
.seo-counter.warn { color:#f59e0b; }
.seo-counter.over { color:#dc2626; }
</style>

<!-- Page Header -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0">Edit Business Plan / Report</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/reports/list') }}">Reports</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-4">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <form action="{{ $editRec->id }}" method="post">
      @csrf

      <div class="row g-4 align-items-start">

        {{-- ══ LEFT: Main Details ══════════════════════════ --}}
        <div class="col-lg-8">
          <div class="re-card">
            <div class="re-card-header">
              <div class="re-header-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
              <div>
                <h5>Report Details</h5>
                <p>Update the core information for this business plan</p>
              </div>
            </div>

            <div class="re-body">

              @if($errors->any())
                <div class="alert alert-danger d-flex align-items-center gap-2 mb-4">
                  <i class="bi bi-exclamation-triangle-fill"></i>
                  Please fix the errors below and try again.
                </div>
              @endif

              <span class="re-section-label">Basic Information</span>

              <div class="row g-3 mb-3">
                <div class="col-md-8">
                  <div class="form-group">
                    <label class="form-label">Report Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control"
                           placeholder="e.g. FSSAI Market Research Report"
                           value="{{ $editRec->reports_title }}">
                    <span class="text-danger small">{{ $errors->first('report_title') }}</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="form-label">Price (₹) <span class="text-danger">*</span></label>
                    <div style="position:relative;">
                      <span style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#64748b;font-weight:700;">₹</span>
                      <input type="text" name="price" class="form-control"
                             style="padding-left:26px;"
                             placeholder="0.00" value="{{ $editRec->price }}">
                    </div>
                    <span class="text-danger small">{{ $errors->first('price') }}</span>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control">
                      <option value="">Select Category</option>
                      @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                          {{ $editRec->category_id == $category->id ? 'selected' : '' }}>
                          {{ $category->category }}
                        </option>
                      @endforeach
                    </select>
                    <span class="text-danger small">{{ $errors->first('category_id') }}</span>
                  </div>
                </div>
              </div>

              <span class="re-section-label">Description</span>
              <div class="form-group">
                <textarea name="description" id="description" class="form-control">{{ $editRec->description }}</textarea>
                <span class="text-danger small">{{ $errors->first('description') }}</span>
              </div>

            </div>

            <div class="re-footer">
              <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check2-circle me-1"></i> Update Report
              </button>
              <a href="{{ url('/reports/list') }}" class="btn btn-outline-secondary">
                <i class="bi bi-x-circle me-1"></i> Cancel
              </a>
            </div>
          </div>
        </div>

        {{-- ══ RIGHT: SEO + Media ══════════════════════════ --}}
        <div class="col-lg-4">

          {{-- SEO --}}
          <div class="re-side-card">
            <div class="re-side-card-title">
              <i class="bi bi-search"></i> SEO Settings
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Meta Title <span style="font-weight:400;color:#94a3b8;text-transform:none;letter-spacing:0;">(max 60 chars)</span></label>
              <input type="text" name="meta_title" id="meta_title" class="form-control"
                     placeholder="Enter meta title"
                     maxlength="80"
                     value="{{ old('meta_title', $editRec->meta_title) }}">
              <div class="seo-counter" id="meta-title-counter">0 / 60</div>
              <span class="text-danger small">{{ $errors->first('meta_title') }}</span>
            </div>
            <div class="form-group">
              <label class="form-label">Meta Description <span style="font-weight:400;color:#94a3b8;text-transform:none;letter-spacing:0;">(max 160 chars)</span></label>
              <textarea name="meta_description" id="meta_description" class="form-control" rows="4"
                        maxlength="200"
                        placeholder="Enter meta description">{{ old('meta_description', $editRec->meta_description) }}</textarea>
              <div class="seo-counter" id="meta-desc-counter">0 / 160</div>
              <span class="text-danger small">{{ $errors->first('meta_description') }}</span>
            </div>
          </div>

          {{-- Image / Video Upload --}}
          <div class="re-side-card">
            <div class="re-side-card-title">
              <i class="bi bi-image-fill"></i> Cover Image / Video
            </div>
            @if(!empty($editRec->uploaded_video))
              @php
                $vfiles = is_string($editRec->uploaded_video) ? json_decode($editRec->uploaded_video, true) : [];
                $vfiles = is_array($vfiles) ? $vfiles : [];
              @endphp
              @foreach($vfiles as $vf)
                <div class="re-file-strip mb-2">
                  <i class="bi bi-camera-video-fill"></i>
                  <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;flex:1;font-size:.78rem;">{{ basename($vf) }}</span>
                  <a href="{{ asset('images/'.$vf) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-eye"></i>
                  </a>
                </div>
              @endforeach
            @endif
            <div id="image-upload" class="dropzone" style="min-height:80px;">
              <div class="dz-message">
                <i class="bi bi-cloud-arrow-up" style="font-size:1.6rem;color:#94a3b8;display:block;margin-bottom:.3rem;"></i>
                <span style="font-size:.82rem;color:#64748b;">Drop image/video or click</span>
              </div>
            </div>
            <input type="hidden" name="uploaded_video" id="uploaded_video" value="{{ $editRec->uploaded_video }}">
          </div>

          {{-- PDF Upload --}}
          <div class="re-side-card">
            <div class="re-side-card-title">
              <i class="bi bi-file-earmark-pdf-fill"></i> Report PDF
            </div>
            @if(!empty($editRec->uploaded_pdf))
              @php
                $pfiles = is_string($editRec->uploaded_pdf) ? json_decode($editRec->uploaded_pdf, true) : [];
                $pfiles = is_array($pfiles) ? $pfiles : [];
              @endphp
              @foreach($pfiles as $pf)
                <div class="re-file-strip mb-2">
                  <i class="bi bi-file-earmark-pdf-fill" style="color:#dc2626;"></i>
                  <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;flex:1;font-size:.78rem;">{{ basename($pf) }}</span>
                  <a href="{{ asset('images/'.$pf) }}" target="_blank" class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-eye"></i>
                  </a>
                </div>
              @endforeach
            @endif
            <div id="image-pdf" class="dropzone" style="min-height:80px;">
              <div class="dz-message">
                <i class="bi bi-file-earmark-arrow-up" style="font-size:1.6rem;color:#94a3b8;display:block;margin-bottom:.3rem;"></i>
                <span style="font-size:.82rem;color:#64748b;">Drop PDF or click to upload</span>
              </div>
            </div>
            <input type="hidden" name="uploaded_pdf" id="uploaded_pdf" value="{{ $editRec->uploaded_pdf }}">
          </div>

        </div>
        {{-- /RIGHT --}}

      </div>
    </form>

  </div>
</div>

{{-- CKEditor 5 --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
{{-- Dropzone --}}
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
<script>
$(function () {
  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  Dropzone.autoDiscover = false;

  // ── CKEditor ──────────────────────────────────────────
  let ckEditor;
  ClassicEditor.create(document.querySelector('#description'))
    .then(editor => {
      ckEditor = editor;
      document.querySelector('form').addEventListener('submit', function() {
        document.querySelector('#description').value = editor.getData();
      });
    })
    .catch(console.error);

  // ── Dropzone factory ──────────────────────────────────
  function makeDropzone(selector, hiddenId, accept) {
    let files = [];
    return new Dropzone(selector, {
      url: "/upload",
      paramName: "file",
      maxFilesize: 20,
      acceptedFiles: accept,
      headers: { "X-CSRF-TOKEN": token },
      addRemoveLinks: true,
      dictRemoveFile: "Remove",
      success: function(file, response) {
        file.uploaded_filename = response.success;
        files.push(response.success);
        document.getElementById(hiddenId).value = JSON.stringify(files);
      },
      removedfile: function(file) {
        files = files.filter(f => f !== file.uploaded_filename);
        document.getElementById(hiddenId).value = JSON.stringify(files);
        file.previewElement.remove();
        fetch("/remove", {
          method: 'POST',
          headers: { 'X-CSRF-TOKEN': token, 'Content-Type': 'application/json' },
          body: JSON.stringify({ filename: file.uploaded_filename })
        });
      }
    });
  }

  makeDropzone("#image-upload", "uploaded_video", ".jpeg,.jpg,.png,.gif,.mp4,.mov,.avi");
  makeDropzone("#image-pdf",    "uploaded_pdf",   ".pdf");

  // ── SEO char counters ─────────────────────────────────
  function seoCounter(inputId, counterId, max) {
    const el = document.getElementById(inputId);
    const counter = document.getElementById(counterId);
    if (!el || !counter) return;
    function update() {
      const len = el.value.length;
      counter.textContent = len + ' / ' + max;
      counter.className = 'seo-counter' + (len > max ? ' over' : len > max * 0.85 ? ' warn' : '');
    }
    el.addEventListener('input', update);
    update();
  }
  seoCounter('meta_title',       'meta-title-counter', 60);
  seoCounter('meta_description', 'meta-desc-counter',  160);
});
</script>

@endsection
