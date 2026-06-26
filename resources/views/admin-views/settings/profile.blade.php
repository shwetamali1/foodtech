@extends('layouts.master')

@section('content')

<style>
/* ── Profile Page ───────────────────────────────────────── */
.prof-sidebar {
  background: #fff; border-radius: 16px;
  box-shadow: 0 4px 24px rgba(2,43,80,.09);
  border: 1px solid #e8f0f9; overflow: hidden;
}
.prof-banner {
  background: linear-gradient(135deg, #022B50 0%, #0a4a8c 100%);
  padding: 2rem 1.5rem 2.5rem; position: relative;
}
.prof-banner::after {
  content: ''; position: absolute; right: -30px; bottom: -30px;
  width: 110px; height: 110px; border-radius: 50%;
  background: rgba(255,210,27,.08);
}
.prof-avatar {
  width: 78px; height: 78px; border-radius: 50%;
  background: linear-gradient(135deg, #ffd200, #f97316);
  display: flex; align-items: center; justify-content: center;
  font-size: 2rem; color: #022B50; font-weight: 800;
  border: 3px solid rgba(255,255,255,.3);
  margin: 0 auto .9rem; position: relative; z-index: 1;
}
.prof-name  { color: #fff; font-weight: 800; font-size: 1.05rem; text-align: center; margin-bottom: .2rem; }
.prof-email { color: rgba(255,255,255,.55); font-size: .78rem; text-align: center; }
.prof-body  { padding: 1.2rem 1.4rem; }
.prof-stat  {
  display: flex; align-items: center; justify-content: space-between;
  padding: .55rem 0; border-bottom: 1px solid #f1f5f9; font-size: .84rem;
}
.prof-stat:last-child { border-bottom: none; }
.prof-stat-label { color: #64748b; font-weight: 600; display: flex; align-items: center; gap: .4rem; }
.prof-stat-val   { color: #0f172a; font-weight: 700; }

/* ── Tab Card ──────────────────────────────────────────── */
.prof-tab-card {
  background: #fff; border-radius: 16px;
  box-shadow: 0 4px 24px rgba(2,43,80,.09);
  border: 1px solid #e8f0f9; overflow: hidden;
}
/* Nav tabs override for brand colours */
.prof-tab-card .nav-tabs {
  background: #f8fafc; border-bottom: 2px solid #e8f0f9;
  padding: 0 1.5rem; flex-wrap: nowrap;
}
.prof-tab-card .nav-tabs .nav-link {
  border: none; border-bottom: 3px solid transparent;
  border-radius: 0; padding: .9rem 1.2rem;
  font-weight: 700; font-size: .875rem; color: #64748b;
  margin-bottom: -2px; display: flex; align-items: center; gap: .4rem;
  transition: color .2s, border-color .2s;
  background: transparent;
}
.prof-tab-card .nav-tabs .nav-link.active {
  color: #022B50; border-bottom-color: #022B50; background: transparent;
}
.prof-tab-card .nav-tabs .nav-link:hover:not(.active) { color: #022B50; }
.prof-tab-body { padding: 1.8rem; }

/* Field section label */
.field-section {
  font-size: .7rem; font-weight: 800; text-transform: uppercase;
  letter-spacing: .1em; color: #e6a800;
  border-bottom: 2px solid #ffd200;
  padding-bottom: 5px; margin: 1.4rem 0 1.1rem; display: block;
}
.field-section:first-child { margin-top: 0; }

/* ── Notification items ────────────────────────────────── */
.notif-list { display: flex; flex-direction: column; gap: .6rem; }
.notif-item {
  border-radius: 12px; padding: 1rem 1.1rem;
  border: 1.5px solid #e8f0f9;
  display: flex; align-items: flex-start; gap: .8rem;
  transition: box-shadow .2s;
  position: relative;
}
.notif-item:hover { box-shadow: 0 2px 12px rgba(2,43,80,.08); }
.notif-item.unread {
  background: #fffdf0; border-color: #ffd200;
}
.notif-item.read {
  background: #fff;
}
.notif-dot {
  width: 8px; height: 8px; border-radius: 50%;
  flex-shrink: 0; margin-top: 6px;
}
.notif-dot.unread { background: #ffd200; box-shadow: 0 0 0 3px rgba(255,210,0,.2); }
.notif-dot.read   { background: #94a3b8; }
.notif-text  { font-size: .88rem; color: #1e293b; line-height: 1.5; flex: 1; }
.notif-meta  { font-size: .72rem; color: #94a3b8; margin-top: 4px; display: flex; align-items: center; gap: .4rem; }
.notif-actions { display: flex; gap: 6px; flex-shrink: 0; }
.notif-status-badge {
  display: inline-flex; align-items: center; gap: 4px;
  border-radius: 50px; padding: 2px 10px;
  font-size: .68rem; font-weight: 700; text-transform: uppercase; letter-spacing: .04em;
  flex-shrink: 0;
}
.notif-status-badge.unread { background: #fef9c3; color: #854d0e; }
.notif-status-badge.read   { background: #dcfce7; color: #15803d; }

/* Empty state */
.notif-empty {
  text-align: center; padding: 3rem 1rem; color: #94a3b8;
}
.notif-empty i { font-size: 3rem; margin-bottom: .75rem; display: block; }

/* Unread count badge in tab */
.notif-tab-badge {
  background: #dc2626; color: #fff;
  border-radius: 50px; padding: 1px 7px;
  font-size: .65rem; font-weight: 700; line-height: 1.4;
}
</style>

<!-- Page Header -->
<div class="app-content-header">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-sm-6"><h4 class="mb-0">My Profile</h4></div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end mb-0">
          <li class="breadcrumb-item"><a href="{{ url('/user-dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="app-content">
  <div class="container-fluid">

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show mb-4">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="row g-4">

      <!-- Sidebar -->
      <div class="col-md-3">
        <div class="prof-sidebar">
          <div class="prof-banner">
            <div class="prof-avatar">
              {{ strtoupper(substr($editRec->first_name,0,1)) }}{{ strtoupper(substr($editRec->last_name??'',0,1)) }}
            </div>
            <div class="prof-name">{{ $editRec->first_name }} {{ $editRec->last_name }}</div>
            <div class="prof-email">{{ $editRec->email }}</div>
          </div>
          <div class="prof-body">
            <div class="prof-stat">
              <span class="prof-stat-label"><i class="bi bi-phone"></i> Mobile</span>
              <span class="prof-stat-val">{{ $editRec->mobile ?? '—' }}</span>
            </div>
            <div class="prof-stat">
              <span class="prof-stat-label"><i class="bi bi-building"></i> Company</span>
              <span class="prof-stat-val" style="max-width:120px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $editRec->company_name ?? '—' }}</span>
            </div>
            <div class="prof-stat">
              <span class="prof-stat-label"><i class="bi bi-geo-alt"></i> City</span>
              <span class="prof-stat-val">{{ $editRec->city ?? '—' }}</span>
            </div>
            <div class="prof-stat">
              <span class="prof-stat-label"><i class="bi bi-flag"></i> State</span>
              <span class="prof-stat-val">{{ $editRec->state ?? '—' }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab Card -->
      <div class="col-md-9">
        <div class="prof-tab-card">

          @php $unreadCount = $notifications->where('status','unread')->count(); @endphp

          <!-- Bootstrap 5 Nav Tabs -->
          <ul class="nav nav-tabs" id="profileTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="profile-tab"
                      data-bs-toggle="tab" data-bs-target="#tab-profile"
                      type="button" role="tab" aria-controls="tab-profile" aria-selected="true">
                <i class="bi bi-person-fill"></i> Profile Update
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="notifications-tab"
                      data-bs-toggle="tab" data-bs-target="#tab-notifications"
                      type="button" role="tab" aria-controls="tab-notifications" aria-selected="false">
                <i class="bi bi-bell-fill"></i> Notifications
                @if($unreadCount > 0)
                  <span class="notif-tab-badge ms-1">{{ $unreadCount }}</span>
                @endif
              </button>
            </li>
          </ul>

          <div class="tab-content" id="profileTabContent">

            <!-- ══ Profile Update Tab ══════════════════════════════ -->
            <div class="tab-pane fade show active" id="tab-profile" role="tabpanel">
              <div class="prof-tab-body">
                <form action="updateRecord" method="post">
                  @csrf

                  <span class="field-section">Personal Information</span>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $editRec->first_name }}">
                        <span class="text-danger small">{{ $errors->first('first_name') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $editRec->last_name }}">
                        <span class="text-danger small">{{ $errors->first('last_name') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" disabled value="{{ $editRec->email }}">
                        <small class="text-muted">Email cannot be changed.</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="mobile" class="form-control" placeholder="Mobile number" value="{{ $editRec->mobile }}">
                        <span class="text-danger small">{{ $errors->first('mobile') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
                        <span class="text-danger small">{{ $errors->first('password') }}</span>
                      </div>
                    </div>
                  </div>

                  <span class="field-section">Business Information</span>
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="cname" class="form-control" placeholder="Company Name" value="{{ $editRec->company_name }}">
                        <span class="text-danger small">{{ $errors->first('cname') }}</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Business Category</label>
                        <select class="form-control" name="category">
                          <option value="">Select Category</option>
                          @foreach($business_category as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $editRec->category_id ? 'selected' : '' }}>
                              {{ $cat->category }}
                            </option>
                          @endforeach
                        </select>
                        <span class="text-danger small">{{ $errors->first('category') }}</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-label">Country</label>
                        <select class="form-control" name="country">
                          <option value="india" selected>India</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-label">State</label>
                        <input type="text" name="state" class="form-control" placeholder="State" value="{{ $editRec->state }}">
                        <span class="text-danger small">{{ $errors->first('state') }}</span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-control" placeholder="City" value="{{ $editRec->city }}">
                        <span class="text-danger small">{{ $errors->first('city') }}</span>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex align-items-center gap-3 mt-4 pt-3" style="border-top:1px solid #e8f0f9;">
                    <button type="submit" class="btn btn-primary px-4">
                      <i class="bi bi-check2-circle me-1"></i> Save Changes
                    </button>
                    <a href="{{ url('/user-dashboard') }}" class="btn btn-outline-secondary">
                      <i class="bi bi-x-circle me-1"></i> Cancel
                    </a>
                  </div>
                </form>
              </div>
            </div>
            <!-- /Profile Update Tab -->

            <!-- ══ Notifications Tab ═══════════════════════════════ -->
            <div class="tab-pane fade" id="tab-notifications" role="tabpanel">
              <div class="prof-tab-body">

                <!-- Header row -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <div>
                    <h6 class="fw-bold mb-0" style="color:#022B50;">
                      Notifications
                      @if($unreadCount > 0)
                        <span class="badge bg-danger ms-2 rounded-pill" style="font-size:.7rem;">{{ $unreadCount }} unread</span>
                      @endif
                    </h6>
                    <small class="text-muted">{{ $notifications->count() }} total notification{{ $notifications->count() != 1 ? 's' : '' }}</small>
                  </div>
                  @if($unreadCount > 0)
                    <form action="{{ url('settings/notifications/mark-all-read') }}" method="POST" id="markAllForm">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-check2-all me-1"></i> Mark all read
                      </button>
                    </form>
                  @endif
                </div>

                @if($notifications->count() > 0)
                  <div class="notif-list">
                    @foreach($notifications->sortByDesc('sent_date') as $notif)
                      <div class="notif-item {{ $notif->status }}" id="notif-item-{{ $notif->id }}">

                        <!-- Status dot -->
                        <div class="notif-dot {{ $notif->status }}"></div>

                        <!-- Body -->
                        <div class="flex-grow-1">
                          <div class="notif-text">{{ $notif->notification }}</div>
                          <div class="notif-meta">
                            <i class="bi bi-clock"></i>
                            {{ \Carbon\Carbon::parse($notif->sent_date)->format('d M Y, h:i A') }}
                            &bull;
                            <span class="notif-status-badge {{ $notif->status }}">
                              @if($notif->status === 'unread')
                                <i class="bi bi-circle-fill" style="font-size:.45rem;"></i> Unread
                              @else
                                <i class="bi bi-check-circle-fill" style="font-size:.6rem;"></i> Read
                              @endif
                            </span>
                          </div>
                        </div>

                        <!-- Actions -->
                        <div class="notif-actions">
                          <!-- View -->
                          <button type="button" title="View"
                                  class="btn-icon btn-icon-view"
                                  onclick="openNotifModal({{ $notif->id }}, '{{ addslashes($notif->notification) }}', '{{ $notif->sent_date }}', '{{ $notif->status }}')">
                            <i class="bi bi-eye"></i>
                          </button>

                          @if($notif->status === 'unread')
                            <!-- AJAX mark as read -->
                            <button type="button" title="Mark as read"
                                    class="btn-icon btn-icon-edit"
                                    onclick="markRead({{ $notif->id }}, this)">
                              <i class="bi bi-check2-circle"></i>
                            </button>
                          @endif
                        </div>

                      </div>
                    @endforeach
                  </div>
                @else
                  <div class="notif-empty">
                    <i class="bi bi-bell-slash"></i>
                    <p class="mb-0 fw-semibold">No notifications yet</p>
                    <small>You'll see messages from the admin here.</small>
                  </div>
                @endif

              </div>
            </div>
            <!-- /Notifications Tab -->

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Notification Detail Modal -->
<div class="modal fade" id="notifModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:16px;overflow:hidden;border:none;">
      <div class="modal-header" style="background:linear-gradient(135deg,#022B50,#0a4a8c);border:none;">
        <h5 class="modal-title text-white">
          <i class="bi bi-bell-fill me-2" style="color:#ffd200;"></i>Notification
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="padding:1.5rem;">
        <p id="modal-notif-text" style="font-size:.95rem;color:#1f2937;line-height:1.7;margin-bottom:1rem;"></p>
        <div style="background:#f8fafc;border-radius:10px;padding:.6rem 1rem;display:flex;align-items:center;gap:.5rem;">
          <i class="bi bi-clock text-muted"></i>
          <small class="text-muted" id="modal-notif-date"></small>
        </div>
      </div>
      <div class="modal-footer" style="border-top:1px solid #e8f0f9;">
        <span id="modal-notif-status-wrap"></span>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
// ── Mark single notification read (AJAX) ─────────────────
function markRead(id, btn) {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  fetch('/settings/notifications/mark-read/' + id, {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      const item = document.getElementById('notif-item-' + id);
      if (item) {
        // Visual updates
        item.classList.remove('unread');
        item.classList.add('read');
        item.querySelector('.notif-dot').classList.replace('unread', 'read');
        const badge = item.querySelector('.notif-status-badge');
        if (badge) {
          badge.className = 'notif-status-badge read';
          badge.innerHTML = '<i class="bi bi-check-circle-fill" style="font-size:.6rem;"></i> Read';
        }
        btn.remove(); // remove the mark-read button

        // Update tab badge count
        updateUnreadBadge(-1);
      }
    }
  })
  .catch(() => { window.location.reload(); });
}

// ── Update unread count badge in tab ─────────────────────
function updateUnreadBadge(delta) {
  const tabBadge = document.querySelector('.notif-tab-badge');
  const headerBadge = document.querySelector('#tab-notifications .badge.bg-danger, .notif-list ~ * .badge');
  const h6Badge = document.querySelector('#tab-notifications h6 .badge');

  if (tabBadge) {
    let count = parseInt(tabBadge.textContent) + delta;
    if (count <= 0) { tabBadge.remove(); }
    else { tabBadge.textContent = count; }
  }
  if (h6Badge) {
    let count = parseInt(h6Badge.textContent) + delta;
    if (count <= 0) { h6Badge.remove(); }
    else { h6Badge.textContent = count + ' unread'; }
  }
}

// ── Open notification modal ───────────────────────────────
function openNotifModal(id, message, date, status) {
  document.getElementById('modal-notif-text').textContent = message;
  document.getElementById('modal-notif-date').textContent = date;

  const statusWrap = document.getElementById('modal-notif-status-wrap');
  if (status === 'unread') {
    statusWrap.innerHTML = '<span class="badge bg-warning text-dark me-auto"><i class="bi bi-circle-fill me-1" style="font-size:.5rem;"></i>Unread</span>';
  } else {
    statusWrap.innerHTML = '<span class="badge bg-success me-auto"><i class="bi bi-check-circle-fill me-1"></i>Read</span>';
  }

  new bootstrap.Modal(document.getElementById('notifModal')).show();

  // Auto mark as read when opening unread notification
  if (status === 'unread') {
    const btn = document.querySelector('#notif-item-' + id + ' button[onclick^="markRead"]');
    if (btn) { markRead(id, btn); }
  }
}

// ── Mark all read (intercept with AJAX) ──────────────────
const markAllForm = document.getElementById('markAllForm');
if (markAllForm) {
  markAllForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch('/settings/notifications/mark-all-read', {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        document.querySelectorAll('.notif-item.unread').forEach(item => {
          item.classList.replace('unread', 'read');
          const dot = item.querySelector('.notif-dot');
          if (dot) dot.classList.replace('unread', 'read');
          const badge = item.querySelector('.notif-status-badge');
          if (badge) {
            badge.className = 'notif-status-badge read';
            badge.innerHTML = '<i class="bi bi-check-circle-fill" style="font-size:.6rem;"></i> Read';
          }
          const markBtn = item.querySelector('button[onclick^="markRead"]');
          if (markBtn) markBtn.remove();
        });
        const tabBadge = document.querySelector('.notif-tab-badge');
        if (tabBadge) tabBadge.remove();
        markAllForm.remove();
        const h6Badge = document.querySelector('#tab-notifications h6 .badge');
        if (h6Badge) h6Badge.remove();
      }
    })
    .catch(() => { markAllForm.submit(); });
  });
}

// ── Re-open notifications tab if hash says so ─────────────
document.addEventListener('DOMContentLoaded', function() {
  if (window.location.hash === '#tab-notifications') {
    const tab = document.getElementById('notifications-tab');
    if (tab) { new bootstrap.Tab(tab).show(); }
  }
});
</script>

@endsection
