@extends('layouts.master')

@section('content')

<style>
.cat-edit-wrap { max-width: 560px; margin: 0 auto; }
.cat-edit-card {
  background: #fff; border-radius: 18px;
  box-shadow: 0 6px 32px rgba(2,43,80,.09);
  border: 1px solid #e8f0f9; overflow: hidden;
}
.cat-edit-header {
  background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
  padding: 22px 28px; display: flex; align-items: center; gap: 14px;
  position: relative;
}
.cat-edit-header::before {
  content:''; position:absolute; left:0; top:0; bottom:0;
  width:4px; background:#ffd200;
}
.cat-header-icon {
  width:46px; height:46px; border-radius:12px;
  background:rgba(255,210,27,.15); border:1px solid rgba(255,210,27,.3);
  display:flex; align-items:center; justify-content:center; flex-shrink:0;
}
.cat-header-icon i { color:#ffd200; font-size:19px; }
.cat-edit-header h5 { color:#fff; font-weight:700; font-size:1rem; margin:0 0 2px; }
.cat-edit-header p  { color:rgba(255,255,255,.55); font-size:.78rem; margin:0; }
.cat-edit-body   { padding:26px 28px; }
.cat-edit-footer {
  padding:14px 28px; background:#f8fafc;
  border-top:1px solid #e8f0f9;
  display:flex; align-items:center; gap:10px;
}
</style>

<!-- Page Header -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6"><h4 class="mb-0">Edit Report Category</h4></div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/category/list') }}">Categories</a></li>
          <li class="breadcrumb-item active">Edit Report Category</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">
    <div class="cat-edit-wrap">

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
          <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="cat-edit-card">
        <div class="cat-edit-header">
          <div class="cat-header-icon"><i class="bi bi-tag-fill"></i></div>
          <div>
            <h5>Edit Report Category</h5>
            <p>Update the report / business plan category name below</p>
          </div>
        </div>

        <form action="{{ $editRec->id }}" method="post">
          @csrf
          <div class="cat-edit-body">
            <div class="form-group">
              <label class="form-label">Category Name <span class="text-danger">*</span></label>
              <input type="text" name="category" class="form-control"
                     placeholder="Enter report category name"
                     value="{{ $editRec->category }}">
              <span class="text-danger small">{{ $errors->first('category') }}</span>
            </div>
          </div>
          <div class="cat-edit-footer">
            <button type="submit" class="btn btn-primary px-4">
              <i class="bi bi-check2-circle me-1"></i> Update Category
            </button>
            <a href="{{ url('/category/list') }}" class="btn btn-outline-secondary">
              <i class="bi bi-x-circle me-1"></i> Cancel
            </a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection
