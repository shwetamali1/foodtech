@extends('layouts.master')

<style>
/* ── Page Header ─────────────────────────────────── */
.enq-page-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8a 100%);
    border-radius: 18px;
    padding: 28px 32px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    position: relative;
    overflow: hidden;
}
.enq-page-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 200px; height: 200px;
    background: rgba(255,210,27,0.07);
    border-radius: 50%;
}
.enq-page-header::after {
    content: '';
    position: absolute;
    bottom: -40px; left: 22%;
    width: 140px; height: 140px;
    background: rgba(255,255,255,0.04);
    border-radius: 50%;
}
.enq-page-header h2 {
    color: #fff;
    font-weight: 700;
    font-size: 1.35rem;
    margin: 0;
    position: relative;
    z-index: 1;
}
.enq-page-header .breadcrumb {
    margin: 4px 0 0;
    position: relative;
    z-index: 1;
}
.enq-page-header .breadcrumb-item a  { color: rgba(255,255,255,0.6); text-decoration: none; font-size: 0.84rem; }
.enq-page-header .breadcrumb-item.active { color: #FFD21B; font-size: 0.84rem; }
.enq-page-header .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,0.35); }
.header-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,210,27,0.18);
    border: 1px solid rgba(255,210,27,0.38);
    color: #FFD21B;
    padding: 5px 16px;
    border-radius: 50px;
    font-size: 0.76rem;
    font-weight: 700;
    letter-spacing: 0.8px;
    position: relative;
    z-index: 1;
}

/* ── Stat Cards ──────────────────────────────────── */
.stat-card {
    background: #fff;
    border-radius: 16px;
    padding: 22px 24px;
    box-shadow: 0 4px 20px rgba(2,43,80,0.07);
    display: flex;
    align-items: center;
    gap: 16px;
    border: 1.5px solid transparent;
    transition: all 0.3s;
    margin-bottom: 24px;
}
.stat-card:hover {
    border-color: rgba(2,43,80,0.12);
    transform: translateY(-3px);
    box-shadow: 0 8px 28px rgba(2,43,80,0.1);
}
.stat-icon {
    width: 52px; height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.stat-icon.blue  { background: linear-gradient(135deg, #022B50, #0a4a8a); }
.stat-icon.gold  { background: linear-gradient(135deg, #e6a800, #FFD21B); }
.stat-icon.green { background: linear-gradient(135deg, #28a745, #20c997); }
.stat-icon i { color: #fff; font-size: 20px; }
.stat-num   { font-size: 1.75rem; font-weight: 800; color: #022B50; line-height: 1; margin-bottom: 4px; }
.stat-label { font-size: 0.82rem; color: #6c757d; font-weight: 600; text-transform: uppercase; letter-spacing: 0.6px; }

/* ── Table Card ──────────────────────────────────── */
.enq-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(2,43,80,0.07);
    overflow: hidden;
    margin-bottom: 28px;
}
.enq-card-header {
    background: #f8fafc;
    border-bottom: 1.5px solid #e9ecef;
    padding: 18px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
}
.enq-card-header h5 {
    font-weight: 700;
    color: #022B50;
    font-size: 0.98rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
}
.count-chip {
    background: rgba(2,43,80,0.08);
    color: #022B50;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 3px 12px;
    border-radius: 50px;
}

/* ── DataTable overrides ─────────────────────────── */
#enquiryTable_wrapper .dataTables_filter input {
    border: 1.5px solid #e4eaf2;
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 0.87rem;
    font-family: 'Quicksand', sans-serif;
    outline: none;
    transition: border-color 0.2s;
}
#enquiryTable_wrapper .dataTables_filter input:focus {
    border-color: #022B50;
    box-shadow: 0 0 0 3px rgba(2,43,80,0.06);
}
#enquiryTable_wrapper .dataTables_length select {
    border: 1.5px solid #e4eaf2;
    border-radius: 8px;
    padding: 6px 10px;
    font-size: 0.85rem;
    font-family: 'Quicksand', sans-serif;
    outline: none;
}
#enquiryTable_wrapper .dataTables_info,
#enquiryTable_wrapper .dataTables_length { font-size: 0.83rem; color: #6c757d; }
#enquiryTable_wrapper .dt-buttons .btn {
    border-radius: 8px !important;
    font-size: 0.82rem !important;
    padding: 6px 14px !important;
    font-family: 'Quicksand', sans-serif !important;
    font-weight: 600 !important;
}
#enquiryTable_wrapper .dataTables_paginate .paginate_button {
    border-radius: 8px !important;
    font-size: 0.84rem !important;
    padding: 5px 12px !important;
    font-family: 'Quicksand', sans-serif !important;
}
#enquiryTable_wrapper .dataTables_paginate .paginate_button.current {
    background: linear-gradient(135deg, #022B50, #0a4a8a) !important;
    color: #FFD21B !important;
    border-color: transparent !important;
    font-weight: 700 !important;
}
#enquiryTable_wrapper .dataTables_paginate .paginate_button:hover {
    background: #f4f7fb !important;
    color: #022B50 !important;
    border-color: #e4eaf2 !important;
}

/* Table */
#enquiryTable { border-collapse: separate; border-spacing: 0; width: 100% !important; }
#enquiryTable thead tr { background: linear-gradient(135deg, #022B50, #0a4a8a); }
#enquiryTable thead th {
    color: #FFD21B !important;
    font-size: 0.78rem !important;
    font-weight: 700 !important;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    padding: 14px 16px !important;
    border: none !important;
    white-space: nowrap;
}
#enquiryTable tbody tr { transition: background 0.15s; }
#enquiryTable tbody tr:hover { background: #f8fafc !important; }
#enquiryTable tbody td {
    padding: 13px 16px !important;
    font-size: 0.88rem !important;
    color: #4B4B4B !important;
    vertical-align: middle !important;
    border-bottom: 1px solid #f0f2f5 !important;
    border-top: none !important;
}
#enquiryTable tbody tr:last-child td { border-bottom: none !important; }

/* Cells */
.row-idx {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 28px; height: 28px;
    background: rgba(2,43,80,0.07);
    color: #022B50;
    border-radius: 8px;
    font-size: 0.78rem;
    font-weight: 700;
}
.user-name-cell { display: flex; align-items: center; gap: 10px; }
.user-avatar {
    width: 36px; height: 36px;
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 0.8rem;
    font-weight: 700;
    color: #FFD21B;
}
.name-main  { font-weight: 600; color: #101010 !important; font-size: 0.9rem !important; }
.name-sub   { font-size: 0.78rem; color: #adb5bd !important; }

.contact-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f4f7fb;
    border-radius: 50px;
    padding: 4px 12px;
    font-size: 0.82rem;
    color: #4B4B4B;
}
.contact-pill i { color: #adb5bd; font-size: 11px; }

.query-text {
    max-width: 280px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 0.85rem !important;
    color: #4B4B4B !important;
}
.query-toggle {
    font-size: 0.75rem;
    color: #022B50;
    font-weight: 600;
    cursor: pointer;
    text-decoration: underline;
    display: inline-block;
    margin-top: 3px;
    border: none;
    background: none;
    padding: 0;
}

.date-cell { font-size: 0.82rem; color: #6c757d !important; white-space: nowrap; }

.btn-del {
    width: 32px; height: 32px;
    background: rgba(220,53,69,0.09);
    border: 1.5px solid rgba(220,53,69,0.2);
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #dc3545;
    text-decoration: none;
    transition: all 0.2s;
}
.btn-del:hover {
    background: #dc3545;
    border-color: #dc3545;
    color: #fff;
    text-decoration: none;
    transform: scale(1.08);
}
.btn-del i { font-size: 14px; }

/* Query modal */
.query-modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(2,43,80,0.55);
    backdrop-filter: blur(3px);
    z-index: 9999;
    align-items: center;
    justify-content: center;
}
.query-modal-overlay.open { display: flex; }
.query-modal-box {
    background: #fff;
    border-radius: 20px;
    padding: 32px;
    max-width: 520px;
    width: 90%;
    box-shadow: 0 20px 60px rgba(2,43,80,0.2);
    position: relative;
}
.query-modal-box h6 {
    font-weight: 700;
    color: #022B50;
    font-size: 1rem;
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.query-modal-body {
    background: #f8fafc;
    border: 1.5px solid #e4eaf2;
    border-radius: 12px;
    padding: 16px;
    font-size: 0.9rem;
    color: #4B4B4B;
    line-height: 1.7;
    white-space: pre-wrap;
    max-height: 260px;
    overflow-y: auto;
}
.query-modal-close {
    position: absolute;
    top: 16px; right: 16px;
    width: 32px; height: 32px;
    background: #f4f7fb;
    border: none;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #6c757d;
    font-size: 16px;
    transition: all 0.2s;
}
.query-modal-close:hover { background: #dc3545; color: #fff; }

/* Empty state */
.empty-enq { text-align: center; padding: 60px 20px; color: #adb5bd; }
.empty-enq i { font-size: 3rem; display: block; margin-bottom: 12px; }
.empty-enq p { font-size: 0.95rem; margin: 0; }
</style>

@section('content')

{{-- ── Query Detail Modal ──────────────────────── --}}
<div class="query-modal-overlay" id="queryModal">
    <div class="query-modal-box">
        <button class="query-modal-close" onclick="closeQueryModal()">
            <i class="bi bi-x-lg"></i>
        </button>
        <h6><i class="bi bi-chat-left-text"></i> Service Request Query</h6>
        <div class="query-modal-body" id="queryModalBody"></div>
    </div>
</div>

{{-- ── Page Header ─────────────────────────────────── --}}
<div class="app-content-header">
    <div class="container-fluid">
        <div class="enq-page-header">
            <div>
                <h2><i class="bi bi-envelope-paper me-2" style="color:#FFD21B;"></i>Service Requests</h2>
                <ol class="breadcrumb mt-1">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Service Requests</li>
                </ol>
            </div>
            <div class="header-badge">
                <i class="bi bi-shield-lock-fill"></i> Super Admin Only
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        {{-- ── Stat Cards ──────────────────────────── --}}
        <div class="row g-3 mb-2">
            <div class="col-sm-6 col-xl-4">
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div>
                        <div class="stat-num">{{ $totalCount }}</div>
                        <div class="stat-label">Total Requests</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="stat-card">
                    <div class="stat-icon gold">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div>
                        <div class="stat-num">{{ $todayCount }}</div>
                        <div class="stat-label">Today's Requests</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <div class="stat-num">{{ $requests->pluck('user_id')->filter()->unique()->count() }}</div>
                        <div class="stat-label">Unique Users</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Table ──────────────────────────────── --}}
        <div class="enq-card">
            <div class="enq-card-header">
                <h5>
                    <i class="bi bi-list-ul"></i>
                    All Service Requests
                    <span class="count-chip">{{ $totalCount }} records</span>
                </h5>
            </div>
            <div class="p-3">

                @if($requests->count() > 0)
                <table id="enquiryTable" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Contact</th>
                            <th>Service Query</th>
                            <th>Submitted On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; foreach ($requests as $record) { $i++;
                            $name     = trim($record->name ?? '');
                            $initials = strtoupper(substr($name, 0, 1) ?: 'U');
                            $delMsg   = 'Delete request from ' . ($name ?: 'this user') . '?';
                            $queryFull = htmlspecialchars($record->query ?? '', ENT_QUOTES);
                            $queryShort = Str::limit($record->query ?? '', 60);
                        ?>
                        <tr>
                            <td><span class="row-idx">{{ $i }}</span></td>

                            <td>
                                <div class="user-name-cell">
                                    <div class="user-avatar">{{ $initials }}</div>
                                    <div>
                                        <div class="name-main">{{ $name ?: '—' }}</div>
                                        <div class="name-sub">{{ $record->email ?? '—' }}</div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="contact-pill">
                                    <i class="bi bi-phone"></i>
                                    {{ $record->mobile ?? '—' }}
                                </span>
                            </td>

                            <td>
                                <div class="query-text">{{ $queryShort }}</div>
                                @if(strlen($record->query ?? '') > 60)
                                    <button class="query-toggle"
                                            onclick="openQueryModal('{{ $queryFull }}')">
                                        Read more
                                    </button>
                                @endif
                            </td>

                            <td>
                                <span class="date-cell">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ !empty($record->created_at)
                                        ? \Carbon\Carbon::parse($record->created_at)->format('d M Y, h:i A')
                                        : '—' }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ URL::to('/userrequest/delete/' . $record->id) }}"
                                   class="btn-del"
                                   onclick="return confirm('{{ $delMsg }}')"
                                   title="Delete">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                @else
                    <div class="empty-enq">
                        <i class="bi bi-inbox"></i>
                        <p>No service requests submitted yet.</p>
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>

{{-- DataTables --}}
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>

<script>
$(function () {
    @if($requests->count() > 0)
    $('#enquiryTable').DataTable({
        responsive:   true,
        autoWidth:    false,
        paging:       true,
        lengthChange: true,
        searching:    true,
        ordering:     true,
        info:         true,
        order:        [[0, 'desc']],
        pageLength:   15,
        lengthMenu:   [[10, 15, 25, 50, -1], [10, 15, 25, 50, 'All']],
        dom: '<"d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3"lBf>rtip',
        buttons: [
            { extend: 'excel', text: '<i class="bi bi-file-earmark-spreadsheet me-1"></i>Excel', className: 'btn btn-sm btn-success' },
            { extend: 'pdf',   text: '<i class="bi bi-file-earmark-pdf me-1"></i>PDF',           className: 'btn btn-sm btn-danger' },
            { extend: 'print', text: '<i class="bi bi-printer me-1"></i>Print',                  className: 'btn btn-sm btn-secondary' }
        ],
        columnDefs: [
            { orderable: false, targets: [2, 3, 5] }
        ]
    });
    @endif
});

function openQueryModal(text) {
    document.getElementById('queryModalBody').textContent = text;
    document.getElementById('queryModal').classList.add('open');
}
function closeQueryModal() {
    document.getElementById('queryModal').classList.remove('open');
}
document.getElementById('queryModal').addEventListener('click', function(e) {
    if (e.target === this) closeQueryModal();
});
</script>

@endsection
