@extends('layouts.master')

@section('content')

<style>
.lic-page-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8a 100%);
    border-radius: 18px;
    padding: 26px 30px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    position: relative;
    overflow: hidden;
}
.lic-page-header::after {
    content: '';
    position: absolute;
    bottom: -40px; right: -40px;
    width: 150px; height: 150px;
    background: rgba(255,210,27,0.08);
    border-radius: 50%;
}
.lic-page-header h2 { color: #fff; font-weight: 700; font-size: 1.3rem; margin: 0; }
.lic-page-header .breadcrumb { margin: 0; }
.lic-page-header .breadcrumb-item a { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.85rem; }
.lic-page-header .breadcrumb-item.active { color: #FFD21B; font-size: 0.85rem; }
.lic-page-header .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.35); }

.lic-section-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(2,43,80,.09);
    border: 1px solid #e8f0f9;
    overflow: hidden;
    margin-bottom: 1.5rem;
}
.lic-section-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
    padding: 1rem 1.4rem;
    display: flex; align-items: center; justify-content: space-between;
    position: relative;
}
.lic-section-header::before {
    content: ''; position: absolute; left: 0; top: 0; bottom: 0;
    width: 4px; background: #ffd200;
}
.lic-section-title { color: #fff; font-weight: 700; font-size: .95rem; display: flex; align-items: center; gap: .5rem; }
.lic-section-title i { color: #ffd200; }
.lic-table th, .lic-table td { vertical-align: middle; font-size: .875rem; }
.lic-table th {
    background: #f8fafc !important; color: #022B50;
    font-weight: 700; font-size: .75rem; text-transform: uppercase; letter-spacing: .06em;
}
.btn-dl {
    display: inline-flex; align-items: center; gap: 5px;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff; border: none; border-radius: 8px;
    padding: 6px 14px; font-size: .8rem; font-weight: 700;
    text-decoration: none; transition: all .2s;
}
.btn-dl:hover { background: linear-gradient(135deg, #011f3d, #022B50); color: #FFD21B; text-decoration: none; }
.empty-state { text-align: center; padding: 48px 20px; color: #94a3b8; }
.empty-state i { font-size: 2.8rem; display: block; margin-bottom: 12px; }
.empty-state p { font-size: .9rem; margin: 0; }
</style>

<div class="app-content-header">
    <div class="container-fluid">
        <div class="lic-page-header">
            <div>
                <h2><i class="bi bi-file-earmark-check-fill me-2" style="color:#FFD21B;"></i>My Documents / Licenses</h2>
                <ol class="breadcrumb mt-1">
                    <li class="breadcrumb-item"><a href="{{ url('user-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">My Documents</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="lic-section-card">
            <div class="lic-section-header">
                <div class="lic-section-title">
                    <i class="bi bi-folder-fill"></i> Uploaded Documents
                </div>
            </div>
            <div class="table-responsive">
                <table id="feature_table" class="table lic-table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width:50px">#</th>
                            <th>Description</th>
                            <th>File Name</th>
                            <th>Uploaded On</th>
                            <th style="width:120px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($documents as $key => $doc)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="fw-semibold">{{ $doc->feature_text }}</td>
                                <td>
                                    <i class="bi bi-file-earmark me-1 text-muted"></i>{{ $doc->original_name }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($doc->created_at)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('feature.documents.download', $doc->id) }}" class="btn-dl">
                                        <i class="bi bi-download"></i> Download
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-folder2-open"></i>
                                        <p>No documents have been uploaded yet.</p>
                                    </div>
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
$(function () {
    $('#feature_table').DataTable({
        paging: true, lengthChange: true, searching: true,
        ordering: true, info: true, autoWidth: false, responsive: true,
    });
});
</script>

@endsection
