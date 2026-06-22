@extends('layouts.master')

<style>
  .bp-card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,.07); }
  .bp-card .card-header { background: transparent; border-bottom: 1px solid #f0f0f0; font-weight: 600; font-size: .95rem; }
  #bp_table td, #bp_table th { vertical-align: middle; font-size: .875rem; }
  .badge-ok { background:#d1fae5; color:#065f46; border-radius:20px; padding:3px 10px; font-size:.75rem; }
  .badge-pending { background:#fef3c7; color:#92400e; border-radius:20px; padding:3px 10px; font-size:.75rem; }
</style>

@section('content')

<!-- Page header -->
<div class="row mb-1">
  <div class="col-sm-6"><h4 class="mb-0 fw-bold">My Business Plans</h4></div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end mb-0">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">My Business Plans</li>
    </ol>
  </div>
</div>
</div></div>

<div class="app-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="bp-card card mb-4">
          <div class="card-header">
            <i class="bi bi-file-earmark-bar-graph-fill me-2 text-primary"></i>My Business Plans
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table id="bp_table" class="table table-hover mb-0">
                <thead class="table-light">
                  <tr>
                    <th>#</th>
                    <th>Plan Title</th>
                    <th>Amount (₹)</th>
                    <th>Payment Status</th>
                    <th>Purchase Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i = 1; @endphp
                  @foreach($records as $record)
                    @php
                      $price = number_format((float)str_replace('RS','',$record->amount));
                      $badge = $record->p_status == 'success' ? 'badge-ok' : 'badge-pending';
                    @endphp
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td class="fw-medium">{{ $record->report_title }}</td>
                      <td class="fw-semibold">{{ $price }}</td>
                      <td><span class="{{ $badge }}">{{ ucfirst($record->p_status) }}</span></td>
                      <td>{{ \Carbon\Carbon::parse($record->payment_date)->format('d M Y') }}</td>
                      <td>
                        @if(!empty($record->uploaded_pdf))
                          @php $files = json_decode($record->uploaded_pdf, true); @endphp
                          @if($files && is_array($files))
                            @foreach($files as $file)
                              <a href="{{ asset('images/'.$file) }}" target="_blank"
                                 class="btn btn-sm btn-outline-danger me-1" title="View PDF">
                                <i class="bi bi-file-pdf"></i>
                              </a>
                              <a href="{{ asset('images/'.$file) }}"
                                 download="{{ $record->report_title }}"
                                 class="btn btn-sm btn-outline-success" title="Download">
                                <i class="bi bi-download"></i>
                              </a>
                            @endforeach
                          @endif
                        @else
                          <span class="text-muted" style="font-size:.8rem">No file</span>
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
    </div>
  </div>
</div>

</main></div>

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
  $(function(){
    $('#bp_table').DataTable({ paging:true, lengthChange:true, searching:true, ordering:true, info:true, autoWidth:false, responsive:true });
  });
</script>

@endsection
