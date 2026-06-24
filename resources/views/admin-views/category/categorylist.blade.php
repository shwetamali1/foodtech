@extends('layouts.master')

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-collection me-2" style="color:var(--ft-gold);"></i>Plan Categories</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Plan Categories</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success mb-4"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-header">
      <span>
        <i class="bi bi-folder-fill me-2"></i>
        Business Plan Categories
      </span>
      <a class="btn-add" href="{{ URL::to('/category/add-report-category') }}">
        <i class="bi bi-plus-lg"></i>Add Category
      </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="category" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $rowNum = 1; @endphp
            @foreach($showRec as $record)
              <tr>
                <td>{{ $rowNum++ }}</td>
                <td>
                  <span class="fw-semibold" style="color:var(--ft-navy);">{{ $record->category }}</span>
                </td>
                <td>
                  <a href="{{ URL::to('/category/edit-report-category/'.$record->id) }}"
                     class="btn-icon btn-icon-edit" title="Edit">
                    <i class="bi bi-pencil-fill"></i>
                  </a>
                  <a href="{{ URL::to('/category/delete-report-category/'.$record->id) }}"
                     class="btn-icon btn-icon-delete"
                     onclick="return confirm('Are you sure you want to delete this category?')" title="Delete">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
$(function () {
  $('#category').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: { search: '', searchPlaceholder: 'Search categories...' },
    columnDefs: [{ orderable: false, targets: [2] }],
  });
});
</script>

@endsection
