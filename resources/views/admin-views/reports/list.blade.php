@extends('layouts.master')

@section('content')

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-bar-chart-line me-2" style="color:var(--ft-gold);"></i>Business Plans</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Business Plans</li>
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
        <i class="bi bi-file-earmark-bar-graph-fill me-2"></i>
        Upload Reports / Business Plans
      </span>
      @if($userRole == 1 || $userRole == 6)
        <a class="btn-add" href="{{ URL::to('/reports/add') }}">
          <i class="bi bi-plus-lg"></i>Add New Plan
        </a>
      @else
        <a class="btn-add" target="_blank" href="{{ URL::to('/business-plans') }}">
          <i class="bi bi-arrow-up-right-circle"></i>View Plans
        </a>
      @endif
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table id="reports" class="ft-table table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Business Plan Title</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @php $rowNum = 1; @endphp
            @foreach($showRec as $record)
              @php $message = 'Are you sure you want to delete "'.$record->reports_title.'"?'; @endphp
              <tr>
                <td>{{ $rowNum++ }}</td>
                <td>
                  <span class="fw-semibold" style="color:var(--ft-navy);">{{ $record->reports_title }}</span>
                </td>
                <td>
                  <span class="badge-ft badge-plan">
                    <i class="bi bi-currency-rupee" style="font-size:.75rem;"></i>{{ $record->price }}
                  </span>
                </td>
                <td>
                  @if($userRole == 1 || $userRole == 6)
                    <a href="{{ URL::to('/reports/edit/'.$record->id) }}"
                       class="btn-icon btn-icon-edit" title="Edit">
                      <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a href="{{ URL::to('/reports/delete/'.$record->id) }}"
                       class="btn-icon btn-icon-delete"
                       onclick="return confirm('{{ $message }}')" title="Delete">
                      <i class="bi bi-trash-fill"></i>
                    </a>
                  @else
                    <a href="/reports/view-report/{{ $record->id }}"
                       class="btn-icon btn-icon-view" title="View">
                      <i class="bi bi-eye-fill"></i>
                    </a>
                  @endif
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
  $('#reports').DataTable({
    paging: true, lengthChange: true, searching: true,
    ordering: true, info: true, autoWidth: false, responsive: true,
    language: {
      search: '',
      searchPlaceholder: 'Search plans...',
    },
    columnDefs: [{ orderable: false, targets: [3] }],
  });
});
</script>

@endsection
