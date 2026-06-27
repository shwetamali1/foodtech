@extends('layouts.master')

@section('content')

<style>
/* ── Profile header card ── */
.profile-hero {
  background: linear-gradient(135deg, var(--ft-navy) 0%, var(--ft-navy-mid) 100%);
  border-radius: 14px;
  padding: 1.5rem 1.75rem;
  display: flex;
  align-items: center;
  gap: 1.25rem;
  margin-bottom: 1.25rem;
  position: relative;
  overflow: hidden;
  box-shadow: var(--ft-shadow);
}
.profile-hero::after {
  content: '';
  position: absolute;
  right: -40px; bottom: -40px;
  width: 160px; height: 160px;
  border-radius: 50%;
  background: rgba(255,210,27,.07);
  pointer-events: none;
}
.profile-avatar {
  width: 70px; height: 70px;
  border-radius: 50%;
  background: rgba(255,210,27,.18);
  border: 3px solid rgba(255,210,27,.45);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.65rem;
  font-weight: 800;
  color: var(--ft-gold);
  flex-shrink: 0;
  letter-spacing: -1px;
}
.profile-hero h4 { color: #fff; font-weight: 800; margin: 0 0 3px; font-size: 1.15rem; }
.profile-meta { color: rgba(255,255,255,.65); font-size: .8rem; display: flex; flex-wrap: wrap; gap: .55rem 1.1rem; margin-top: 5px; }
.profile-meta span { display: flex; align-items: center; gap: 4px; }
.profile-badge {
  display: inline-flex; align-items: center; gap: 4px;
  padding: 4px 13px; border-radius: 50px;
  font-size: .72rem; font-weight: 700; letter-spacing: .04em; text-transform: uppercase;
}
.badge-active-pill  { background: #dcfce7; color: #166534; }
.badge-inactive-pill{ background: #fee2e2; color: #991b1b; }

/* ── Info cards below profile ── */
.info-card {
  background: #fff;
  border: 1px solid #e8edf5;
  border-radius: 12px;
  overflow: hidden;
  margin-bottom: 1rem;
  box-shadow: 0 1px 5px rgba(2,43,80,.05);
}
.info-card-header {
  background: linear-gradient(90deg,#f4f7fb,#eef2f9);
  border-bottom: 1px solid #e2e8f3;
  padding: .6rem 1rem;
  font-size: .72rem; font-weight: 800;
  text-transform: uppercase; letter-spacing: .07em;
  color: var(--ft-navy);
  display: flex; align-items: center; gap: .4rem;
}
.info-card-header i { color: var(--ft-gold-dark); }
.info-card-body { padding: .75rem 1rem; }
.info-row {
  display: flex; align-items: baseline; gap: .4rem;
  padding: .32rem 0; border-bottom: 1px solid #f0f4fa;
  font-size: .82rem;
}
.info-row:last-child { border-bottom: none; }
.info-key { width: 42%; color: #6c757d; font-weight: 500; flex-shrink: 0; }
.info-val { color: #1a2545; font-weight: 600; word-break: break-word; }

/* ── Tabs ── */
.ftab-nav {
  display: flex; gap: 0;
  border-bottom: 2px solid #e2e8f3;
  margin-bottom: 1.1rem;
  overflow-x: auto;
  flex-wrap: nowrap;
}
.ftab-btn {
  background: transparent;
  border: none; border-bottom: 3px solid transparent;
  margin-bottom: -2px;
  padding: .65rem 1.1rem;
  font-size: .82rem; font-weight: 700;
  color: #6c757d;
  cursor: pointer; white-space: nowrap;
  display: flex; align-items: center; gap: .4rem;
  transition: color .2s, border-color .2s;
}
.ftab-btn:hover { color: var(--ft-navy); }
.ftab-btn.active { color: var(--ft-navy); border-bottom-color: var(--ft-gold); }
.ftab-btn .tab-count {
  background: #e8edf5; color: var(--ft-navy);
  font-size: .68rem; font-weight: 800;
  padding: 1px 7px; border-radius: 50px;
}
.ftab-btn.active .tab-count { background: var(--ft-gold); color: var(--ft-navy); }
.ftab-panel { display: none; }
.ftab-panel.active { display: block; }

/* ── Document cards ── */
.doc-card {
  border: 1px solid #e2e8f3; border-radius: 10px;
  overflow: hidden; background: #fff;
  transition: box-shadow .2s, transform .2s;
  height: 100%;
}
.doc-card:hover { box-shadow: 0 4px 16px rgba(2,43,80,.10); transform: translateY(-2px); }
.doc-card img { width: 100%; height: 160px; object-fit: cover; border-bottom: 1px solid #e2e8f3; }
.doc-card-body { padding: .7rem .85rem; }
.doc-card-title { font-size: .8rem; font-weight: 700; color: var(--ft-navy); margin-bottom: .5rem; }
.doc-placeholder {
  width: 100%; height: 160px;
  background: linear-gradient(135deg,#f0f4ff,#e8edf8);
  display: flex; align-items: center; justify-content: center;
  font-size: 2.5rem; color: #c0cadd;
  border-bottom: 1px solid #e2e8f3;
}

/* ── Feature documents table ── */
.feat-table { width: 100%; border-collapse: collapse; font-size: .83rem; }
.feat-table thead th {
  background: linear-gradient(90deg, var(--ft-navy), var(--ft-navy-mid));
  color: var(--ft-gold);
  font-size: .72rem; font-weight: 700;
  text-transform: uppercase; letter-spacing: .06em;
  padding: .55rem .85rem;
}
.feat-table tbody tr { border-bottom: 1px solid #f0f4fa; }
.feat-table tbody tr:last-child { border-bottom: none; }
.feat-table tbody tr:nth-child(even) { background: #f9fbff; }
.feat-table td { padding: .5rem .85rem; vertical-align: middle; color: #1a2545; }
.feat-table td:first-child { color: #6c757d; font-weight: 700; width: 40px; }
.feat-sub-row td { background: linear-gradient(90deg,#f0f4ff,#eef2f9) !important; font-weight: 700; color: var(--ft-navy) !important; font-size: .78rem; }

/* ── Empty state ── */
.empty-state { text-align: center; padding: 2.5rem 1rem; color: #aaa; }
.empty-state i { font-size: 2.5rem; display: block; margin-bottom: .5rem; color: #d0d5dd; }
.empty-state p { font-size: .85rem; font-style: italic; margin: 0; }
</style>

{{-- Page Header --}}
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-person-badge-fill me-2" style="color:var(--ft-gold);"></i>User Profile</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('users/list') }}">Users</a></li>
        <li class="breadcrumb-item active">View</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success mb-3"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
  @endif

  <div class="row g-3">

    {{-- ════ LEFT: Profile sidebar ════ --}}
    <div class="col-lg-3 col-md-4">

      {{-- Profile Hero --}}
      <div class="profile-hero">
        <div class="profile-avatar">
          {{ strtoupper(substr($editRec->first_name ?? 'U', 0, 1) . substr($editRec->last_name ?? '', 0, 1)) }}
        </div>
        <div>
          <h4>{{ $editRec->first_name }} {{ $editRec->last_name }}</h4>
          <div class="profile-meta">
            <span><i class="bi bi-envelope-fill"></i>{{ $editRec->email }}</span>
            @if($editRec->mobile ?? null)
              <span><i class="bi bi-phone-fill"></i>{{ $editRec->mobile }}</span>
            @endif
          </div>
          <div class="mt-2">
            @if(($editRec->status ?? '') === 'active')
              <span class="profile-badge badge-active-pill"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Active</span>
            @else
              <span class="profile-badge badge-inactive-pill"><i class="bi bi-circle-fill" style="font-size:.45rem;"></i>Inactive</span>
            @endif
          </div>
        </div>
      </div>

      {{-- Contact Info --}}
      <div class="info-card">
        <div class="info-card-header"><i class="bi bi-person-lines-fill"></i>Contact Details</div>
        <div class="info-card-body">
          <div class="info-row">
            <span class="info-key"><i class="bi bi-envelope me-1"></i>Email</span>
            <span class="info-val" style="font-size:.78rem;word-break:break-all;">{{ $editRec->email }}</span>
          </div>
          <div class="info-row">
            <span class="info-key"><i class="bi bi-phone me-1"></i>Mobile</span>
            <span class="info-val">{{ $editRec->mobile ?? '—' }}</span>
          </div>
          <div class="info-row">
            <span class="info-key"><i class="bi bi-person me-1"></i>Username</span>
            <span class="info-val">{{ $editRec->user_name ?? '—' }}</span>
          </div>
        </div>
      </div>

      {{-- Location --}}
      <div class="info-card">
        <div class="info-card-header"><i class="bi bi-geo-alt-fill"></i>Location</div>
        <div class="info-card-body">
          <div class="info-row">
            <span class="info-key">Country</span>
            <span class="info-val">{{ $editRec->country ?? '—' }}</span>
          </div>
          <div class="info-row">
            <span class="info-key">State</span>
            <span class="info-val">{{ $editRec->state ?? '—' }}</span>
          </div>
          <div class="info-row">
            <span class="info-key">City</span>
            <span class="info-val">{{ $editRec->city ?? '—' }}</span>
          </div>
        </div>
      </div>

      {{-- Quick Actions --}}
      <div class="d-flex flex-column gap-2">
        <a href="{{ URL::to('users/edit/' . $editRec->id) }}" class="btn btn-primary btn-sm">
          <i class="bi bi-pencil-fill me-1"></i>Edit User
        </a>
        <a href="{{ URL::to('users/list') }}" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-arrow-left me-1"></i>Back to Users
        </a>
      </div>

    </div>

    {{-- ════ RIGHT: Tabs content ════ --}}
    <div class="col-lg-9 col-md-8">

      <div class="info-card">
        <div class="info-card-body" style="padding:.85rem 1.1rem 0;">

          {{-- Tab buttons --}}
          <div class="ftab-nav">
            <button class="ftab-btn active" onclick="switchTab('subscriptions', this)">
              <i class="bi bi-credit-card-fill"></i>Subscriptions
              <span class="tab-count">{{ count($subscriptions) }}</span>
            </button>
            <button class="ftab-btn" onclick="switchTab('udoc', this)">
              <i class="bi bi-upload"></i>User Documents
              @php $userDocs = $documents->filter(fn($d) => $d->uploaded_by != 1); @endphp
              <span class="tab-count">{{ $userDocs->count() }}</span>
            </button>
            <button class="ftab-btn" onclick="switchTab('adoc', this)">
              <i class="bi bi-shield-fill-check"></i>Admin Documents
              @php $adminDocs = $documents->filter(fn($d) => $d->uploaded_by == 1); @endphp
              <span class="tab-count">{{ $adminDocs->count() }}</span>
            </button>
            <button class="ftab-btn" onclick="switchTab('fdoc', this)">
              <i class="bi bi-file-earmark-check-fill"></i>Final Documents
            </button>
          </div>
        </div>

        <div style="padding:.1rem 1.1rem 1.1rem;">

          {{-- ── Tab 1: Subscriptions ── --}}
          <div class="ftab-panel active" id="tab-subscriptions">
            @if(count($subscriptions))
              <div class="table-responsive">
                <table class="ft-table table" id="subTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Plan / License</th>
                      <th>Payment Plan</th>
                      <th>Method</th>
                      <th>Amount</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subscriptions as $i => $sub)
                      @php
                        $title = !empty($sub->subscription_name) ? $sub->subscription_name : ($sub->report_title ?? '—');
                        $price = str_replace('RS', '', $sub->amount ?? 0);
                      @endphp
                      <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><span class="fw-semibold" style="color:var(--ft-navy);">{{ $title }}</span></td>
                        <td>{{ ucfirst($sub->payment_plan ?? '—') }}</td>
                        <td>{{ $sub->payment_method ?? $sub->method ?? '—' }}</td>
                        <td><span class="fw-bold" style="color:var(--ft-navy);">₹{{ number_format($price) }}</span></td>
                        <td style="font-size:.8rem;color:var(--ft-muted);">{{ $sub->payment_date ? \Carbon\Carbon::parse($sub->payment_date)->format('d M Y') : '—' }}</td>
                        <td>
                          @if(($sub->p_status ?? '') === 'success')
                            <span class="badge-ft badge-active"><i class="bi bi-circle-fill" style="font-size:.4rem;"></i>Paid</span>
                          @else
                            <span class="badge-ft badge-inactive"><i class="bi bi-circle-fill" style="font-size:.4rem;"></i>{{ ucfirst($sub->p_status ?? 'pending') }}</span>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div class="empty-state">
                <i class="bi bi-credit-card"></i>
                <p>No subscription records found for this user.</p>
              </div>
            @endif
          </div>

          {{-- ── Tab 2: User Uploaded Documents ── --}}
          <div class="ftab-panel" id="tab-udoc">
            @if($userDocs->count())
              <div class="row g-3">
                @foreach($userDocs as $doc)
                  @php
                    $files = !empty($doc->uploaded_file) ? json_decode($doc->uploaded_file, true) : [];
                    if (!is_array($files)) $files = [];
                    $isImage = fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif','webp']);
                  @endphp
                  @foreach($files as $file)
                    <div class="col-6 col-md-4 col-xl-3">
                      <div class="doc-card">
                        @if($isImage($file))
                          <img src="{{ asset('images/' . $file) }}" alt="{{ $doc->document }}">
                        @else
                          <div class="doc-placeholder">
                            <i class="bi bi-file-earmark-text"></i>
                          </div>
                        @endif
                        <div class="doc-card-body">
                          <div class="doc-card-title">{{ $doc->document }}</div>
                          <a href="{{ route('documents.download-file', ['filename' => $file]) }}"
                             class="btn btn-sm btn-primary w-100" style="font-size:.76rem;">
                            <i class="bi bi-download me-1"></i>Download
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @endforeach
              </div>
            @else
              <div class="empty-state">
                <i class="bi bi-upload"></i>
                <p>No user-uploaded documents found.</p>
              </div>
            @endif
          </div>

          {{-- ── Tab 3: Admin Uploaded Documents ── --}}
          <div class="ftab-panel" id="tab-adoc">
            @if($adminDocs->count())
              <div class="row g-3">
                @foreach($adminDocs as $doc)
                  @php
                    $files = !empty($doc->uploaded_file) ? json_decode($doc->uploaded_file, true) : [];
                    if (!is_array($files)) $files = [];
                    $isImage = fn($f) => in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif','webp']);
                  @endphp
                  @foreach($files as $file)
                    <div class="col-6 col-md-4 col-xl-3">
                      <div class="doc-card">
                        @if($isImage($file))
                          <img src="{{ asset('images/' . $file) }}" alt="{{ $doc->document }}">
                        @else
                          <div class="doc-placeholder">
                            <i class="bi bi-file-earmark-shield"></i>
                          </div>
                        @endif
                        <div class="doc-card-body">
                          <div class="doc-card-title">{{ $doc->document }}</div>
                          <a href="{{ route('documents.download-file', ['filename' => $file]) }}"
                             class="btn btn-sm btn-primary w-100" style="font-size:.76rem;">
                            <i class="bi bi-download me-1"></i>Download
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @endforeach
              </div>
            @else
              <div class="empty-state">
                <i class="bi bi-shield-fill-check"></i>
                <p>No admin-uploaded documents found.</p>
              </div>
            @endif
          </div>

          {{-- ── Tab 4: Final Documents (Feature Upload) ── --}}
          <div class="ftab-panel" id="tab-fdoc">
            @if(session('success'))
              <div class="alert alert-success mb-3"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
            @endif

            @php
              $printedSignatures = [];
              $globalIndex = 1;
              $hasRows = false;
            @endphp

            @if(!empty($subscriptions) && is_iterable($subscriptions))
              <table class="feat-table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Feature</th>
                    <th style="width:320px;">Upload / Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($subscriptions as $sub)
                    @php
                      $rawFeatures = $sub->features ?? '';
                      $subName     = $sub->subscription_name ?? '';
                      $subId       = $sub->subscription_id ?? ($sub->id ?? '');
                      $userId      = $sub->user_id ?? ($editRec->id ?? '');

                      $decoded = json_decode($rawFeatures, true);
                      $lines = [];
                      if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                        foreach ($decoded as $item) {
                          foreach (preg_split("/\r\n|\r|\n/", is_array($item) ? implode("\n",$item) : (string)$item) as $p) {
                            if (trim($p) !== '') $lines[] = trim($p);
                          }
                        }
                      } else {
                        foreach (preg_split("/\r\n|\r|\n/", (string)$rawFeatures) as $p) {
                          if (trim($p) !== '') $lines[] = trim($p);
                        }
                      }
                      if (empty($lines)) continue;
                      $sig = md5(implode("\n",$lines));
                      if (in_array($sig, $printedSignatures)) continue;
                      $printedSignatures[] = $sig;
                      $hasRows = true;
                    @endphp

                    @if(!empty($subName))
                      <tr class="feat-sub-row">
                        <td colspan="3"><i class="bi bi-bookmark-fill me-2" style="color:var(--ft-gold-dark);"></i>{{ $subName }}</td>
                      </tr>
                    @endif

                    @foreach($lines as $line)
                      @php
                        $nf  = preg_replace('/\s+/', ' ', strtolower(trim($line)));
                        $fSig = md5($nf);
                        $q = \App\Models\FeatureDocument::where('subscription_id', $subId)->where('feature_signature', $fSig);
                        if (!empty($userId)) $q->where('user_id', $userId); else $q->whereNull('user_id');
                        $existingDoc = $q->first();
                        $rowId = 'feat_' . $globalIndex;
                      @endphp
                      <tr>
                        <td>{{ $globalIndex }}</td>
                        <td style="font-size:.82rem;">{{ $line }}</td>
                        <td>
                          <form class="d-flex align-items-center gap-2" method="POST"
                                action="{{ route('feature-documents.upload') }}"
                                enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="subscription_id"   value="{{ $subId }}">
                            <input type="hidden" name="user_id"           value="{{ $userId }}">
                            <input type="hidden" name="feature_signature" value="{{ $fSig }}">
                            <input type="hidden" name="feature_text"      value="{{ $nf }}">

                            <input type="file" name="document"
                                   accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                   class="form-control form-control-sm"
                                   style="font-size:.76rem;flex:1;">

                            <button type="submit" class="btn btn-sm btn-primary" style="white-space:nowrap;font-size:.76rem;">
                              <i class="bi bi-{{ $existingDoc ? 'arrow-repeat' : 'upload' }} me-1"></i>{{ $existingDoc ? 'Update' : 'Upload' }}
                            </button>

                            @if($existingDoc)
                              <a href="{{ asset('storage/' . $existingDoc->file_path) }}"
                                 target="_blank" class="btn btn-sm btn-outline-secondary" style="font-size:.76rem;white-space:nowrap;">
                                <i class="bi bi-eye"></i>
                              </a>
                            @endif
                          </form>
                        </td>
                      </tr>
                      @php $globalIndex++; @endphp
                    @endforeach
                  @empty
                  @endforelse

                  @if(!$hasRows)
                    <tr><td colspan="3" class="text-center py-4" style="color:#aaa;font-style:italic;">No feature records found.</td></tr>
                  @endif
                </tbody>
              </table>
            @else
              <div class="empty-state">
                <i class="bi bi-file-earmark-x"></i>
                <p>No final document features to display.</p>
              </div>
            @endif
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
function switchTab(id, btn) {
  document.querySelectorAll('.ftab-panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.ftab-btn').forEach(b => b.classList.remove('active'));
  document.getElementById('tab-' + id).classList.add('active');
  btn.classList.add('active');

  // Init DataTable on subscriptions tab once
  if (id === 'subscriptions' && !$.fn.DataTable.isDataTable('#subTable')) {
    $('#subTable').DataTable({
      paging: true, searching: true, ordering: true, info: true,
      autoWidth: false, responsive: true,
      language: { search: '', searchPlaceholder: 'Search subscriptions…' },
    });
  }
}

// Init on first load
$(function() {
  if ($('#subTable tbody tr').length > 1) {
    $('#subTable').DataTable({
      paging: true, searching: true, ordering: true, info: true,
      autoWidth: false, responsive: true,
      language: { search: '', searchPlaceholder: 'Search subscriptions…' },
    });
  }
});
</script>

@endsection
