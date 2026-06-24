@extends('layouts.master')

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-shield-lock me-2" style="color:var(--ft-gold);"></i>User Roles</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Roles</li>
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
        <i class="bi bi-person-badge-fill me-2"></i>
        All Roles
      </span>
      <a class="btn-add" href="{{ URL::to('/roles/add') }}">
        <i class="bi bi-plus-lg"></i>Add Role
      </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="reports" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Role Name</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(!$roleList->isEmpty())
              @foreach($roleList as $key => $role)
                @php
                  $isActive = $role->status == 'active';
                  $message  = $isActive
                    ? 'Are you sure you want to deactivate "'.$role->role_name.'"?'
                    : 'Are you sure you want to activate "'.$role->role_name.'"?';
                @endphp
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>
                    <span class="fw-semibold" style="color:var(--ft-navy);">{{ $role->role_name }}</span>
                  </td>
                  <td>
                    @if($isActive)
                      <span class="badge-ft badge-active"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Active</span>
                    @else
                      <span class="badge-ft badge-inactive"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Inactive</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ URL::to('/roles/edit/'.$role->id) }}"
                       class="btn-icon btn-icon-edit" title="Edit">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a href="{{ URL::to('/roles/delete/'.$role->id) }}"
                       class="btn-icon {{ $isActive ? 'btn-icon-delete' : 'btn-icon-view' }}"
                       onclick="return confirm('{{ $message }}')"
                       title="{{ $isActive ? 'Deactivate' : 'Activate' }}">
                      <i class="bi bi-{{ $isActive ? 'person-x-fill' : 'person-check-fill' }}"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            @endif
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
  $('#reports').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: { search: '', searchPlaceholder: 'Search roles...' },
    columnDefs: [{ orderable: false, targets: [3] }],
  });
});
</script>

@endsection
