@extends('layouts.master')

<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
</style>

@section('content')

<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0">Upload Report</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Upload Report</li>
        </ol>
    </div>
</div>

<div class="app-content">
<div class="container-fluid">
<div class="row">
<div class="card card-warning card-outline mb-4">

<form action="add_submit" method="POST">
@csrf

<div class="card-body">
<div class="row g-3">

<div class="col-12">
    <label class="form-label">Title *</label>
    <input type="text" name="title" class="form-control">
</div>

<div class="col-12">
    <label class="form-label">Price *</label>
    <input type="text" name="price" class="form-control">
</div>

<div class="col-12">
    <label class="form-label">Category *</label>
    <select name="category_id" class="form-control">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category }}</option>
        @endforeach
    </select>
</div>

<div class="col-12">
    <label class="form-label">Description *</label>
    <textarea name="description" id="description"></textarea>
</div>

<div class="col-12">
    <label class="form-label">Meta Title</label>
    <input type="text" name="meta_title" class="form-control">
</div>

<div class="col-12">
    <label class="form-label">Meta Description</label>
    <textarea name="meta_description" class="form-control"></textarea>
</div>

<div class="col-12">
    <label class="form-label">Upload Image / Video</label>
    <div id="image-upload" class="dropzone"></div>
    <input type="hidden" name="uploaded_video" id="uploaded_video">
</div>

<div class="col-12">
    <label class="form-label">Upload PDF</label>
    <div id="image-pdf" class="dropzone"></div>
    <input type="hidden" name="uploaded_pdf" id="uploaded_pdf">
</div>

</div>
</div>

<div class="card-footer text-end">
    <button class="btn btn-primary">Create</button>
</div>

</form>
</div>
</div>
</div>
</div>

{{-- ✅ SCRIPTS (FIXED & CLEAN) --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/plugins/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.min.js') }}"></script>

{{-- CKEDITOR 5 --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
  
      ClassicEditor.create(document.querySelector('#description'), {
          ckfinder: {
              uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}"
          },
          toolbar: [
              'heading','|',
              'bold','italic','link',
              'bulletedList','numberedList','|',
              'uploadImage','insertTable','blockQuote',
              'undo','redo'
          ]
      }).then(editor => {

          // 🔕 Stop CKEditor warning popup
          const notification = editor.plugins.get('Notification');
          notification.on('show:warning', evt => {
              evt.stop();
          });

          document.querySelector('form').addEventListener('submit', function() {
              document.querySelector('#description').value = editor.getData();
          });

      }).catch(error => {
          console.error(error);
      });
  
  });
  </script>
  

<script>
Dropzone.autoDiscover = false;

const csrfToken = '{{ csrf_token() }}';
let uploadedFiles = [];
let uploadedPDF = [];

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
        fetch("/remove", {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' },
            body: JSON.stringify({ filename: file.uploaded_filename })
        });
    }
});

new Dropzone("#image-pdf", {
    url: "/upload",
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
        fetch("/remove", {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' },
            body: JSON.stringify({ filename: file.uploaded_file_pdf })
        });
    }
});
</script>

@endsection
