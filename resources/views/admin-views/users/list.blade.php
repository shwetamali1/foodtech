@extends('layouts.master')

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-people-fill me-2" style="color:var(--ft-gold);"></i>User Management</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
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
        <i class="bi bi-person-lines-fill me-2"></i>
        All Users
      </span>
      <a class="btn-add" href="{{ URL::to('/users/add') }}">
        <i class="bi bi-person-plus-fill"></i>Add User
      </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="users" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Role</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $rowNum = 1; @endphp
            @foreach($showRec as $record)
              @php
                $isActive = $record->status == 'active';
                $message  = $isActive
                  ? 'Are you sure you want to deactivate this user?'
                  : 'Are you sure you want to activate this user?';
              @endphp
              <tr>
                <td>{{ $rowNum++ }}</td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <div style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,var(--ft-navy),var(--ft-navy-mid));display:flex;align-items:center;justify-content:center;color:#FFD21B;font-weight:700;font-size:.75rem;flex-shrink:0;">
                      {{ strtoupper(substr($record->first_name,0,1).substr($record->last_name,0,1)) }}
                    </div>
                    <span class="fw-semibold" style="color:var(--ft-navy);">
                      {{ $record->first_name.' '.$record->last_name }}
                    </span>
                  </div>
                </td>
                <td>{{ $record->user_name }}</td>
                <td>
                  <a href="mailto:{{ $record->email }}" style="color:var(--ft-navy);text-decoration:none;font-size:.83rem;">
                    {{ $record->email }}
                  </a>
                </td>
                <td>{{ $record->mobile }}</td>
                <td>
                  <span class="badge-ft badge-plan">{{ $record->role_name }}</span>
                </td>
                <td>
                  @if($isActive)
                    <span class="badge-ft badge-active">
                      <i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Active
                    </span>
                  @else
                    <span class="badge-ft badge-inactive">
                      <i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Inactive
                    </span>
                  @endif
                </td>
                <td>
                  <a href="{{ URL::to('/users/edit/'.$record->id) }}"
                     class="btn-icon btn-icon-edit" title="Edit">
                    <i class="bi bi-pencil-fill"></i>
                  </a>
                  <a href="{{ URL::to('/users/delete/'.$record->id) }}"
                     class="btn-icon {{ $isActive ? 'btn-icon-delete' : 'btn-icon-view' }}"
                     onclick="return confirm('{{ $message }}')"
                     title="{{ $isActive ? 'Deactivate' : 'Activate' }}">
                    <i class="bi bi-{{ $isActive ? 'person-x-fill' : 'person-check-fill' }}"></i>
                  </a>
                  <a href="{{ URL::to('/users/view/'.$record->id) }}"
                     class="btn-icon btn-icon-view" title="View Profile">
                    <i class="bi bi-eye-fill"></i>
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
  $('#users').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: {
      search: '',
      searchPlaceholder: 'Search users...',
    },
    columnDefs: [{ orderable: false, targets: [7] }],
  });
});
</script>

@endsection
