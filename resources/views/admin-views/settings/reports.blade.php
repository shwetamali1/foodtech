@extends('layouts.master')

@section('content')

<style>
  /* ── My Business Plans ─────────────────────────────── */
  .bp-section-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(2,43,80,.09);
    border: 1px solid #e8f0f9;
    overflow: hidden;
  }
  .bp-section-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
    padding: 1rem 1.4rem;
    display: flex; align-items: center; justify-content: space-between;
    position: relative;
  }
  .bp-section-header::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; background: #ffd200;
  }
  .bp-section-title {
    color: #fff; font-weight: 700; font-size: .95rem;
    display: flex; align-items: center; gap: .5rem;
  }
  .bp-section-title i { color: #ffd200; }
  #bp_table th {
    background: #f8fafc !important; color: #022B50;
    font-weight: 700; font-size: .73rem;
    text-transform: uppercase; letter-spacing: .06em;
  }
  #bp_table td { vertical-align: middle; font-size: .875rem; }
  .bp-badge-ok      { background: #dcfce7; color: #15803d; border-radius: 50px; padding: 3px 12px; font-size: .72rem; font-weight: 700; display: inline-block; }
  .bp-badge-pending { background: #fef9c3; color: #854d0e; border-radius: 50px; padding: 3px 12px; font-size: .72rem; font-weight: 700; display: inline-block; }
</style>

<!-- Page Header Banner -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <h4 class="mb-0">My Business Plans</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/user-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">My Business Plans</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    <div class="bp-section-card mb-4">
      <div class="bp-section-header">
        <div class="bp-section-title">
          <i class="bi bi-file-earmark-bar-graph-fill"></i> My Business Plans
        </div>
        <a href="{{ url('/subscriptions/list') }}" class="btn-add">
          <i class="bi bi-plus-lg"></i> Buy New Plan
        </a>
      </div>
      <div class="table-responsive">
        <table id="bp_table" class="table table-hover mb-0">
          <thead>
            <tr>
              <th style="width:50px">#</th>
              <th>Plan Title</th>
              <th>Amount (₹)</th>
              <th>Payment Status</th>
              <th>Purchase Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php $i = 1; @endphp
            @forelse($records as $record)
              @php
                $price = number_format((float)str_replace('RS','',$record->amount));
                $isOk  = $record->p_status == 'success';
              @endphp
              <tr>
                <td class="fw-bold text-navy">{{ $i++ }}</td>
                <td class="fw-semibold">{{ $record->report_title }}</td>
                <td class="fw-bold">₹{{ $price }}</td>
                <td>
                  <span class="{{ $isOk ? 'bp-badge-ok' : 'bp-badge-pending' }}">
                    {{ $isOk ? 'Success' : ucfirst($record->p_status) }}
                  </span>
                </td>
                <td>{{ \Carbon\Carbon::parse($record->payment_date)->format('d M Y') }}</td>
                <td>
                  @if(!empty($record->uploaded_pdf))
                    @php $files = json_decode($record->uploaded_pdf, true); @endphp
                    @if($files && is_array($files))
                      @foreach($files as $file)
                        <a href="{{ asset('images/'.$file) }}" target="_blank"
                           class="btn-icon btn-icon-view me-1" title="View PDF">
                          <i class="bi bi-file-pdf"></i>
                        </a>
                        <a href="{{ asset('images/'.$file) }}"
                           download="{{ $record->report_title }}"
                           class="btn-icon btn-icon-download" title="Download">
                          <i class="bi bi-download"></i>
                        </a>
                      @endforeach
                    @endif
                  @else
                    <span class="text-muted" style="font-size:.8rem">
                      <i class="bi bi-hourglass-split me-1"></i>Pending upload
                    </span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center py-5">
                  <i class="bi bi-file-earmark-bar-graph" style="font-size:2.5rem; color:#cbd5e1;"></i>
                  <p class="mt-2 text-muted mb-1">No business plans purchased yet.</p>
                  <a href="{{ url('/business-plans') }}" class="btn btn-primary btn-sm mt-1">
                    <i class="bi bi-bag me-1"></i> Browse Plans
                  </a>
                </td>
              </tr>
            @endforelse
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
  $(function(){
    $('#bp_table').DataTable({
      paging: true, lengthChange: true, searching: true,
      ordering: true, info: true, autoWidth: false, responsive: true
    });
  });
</script>

@endsection
