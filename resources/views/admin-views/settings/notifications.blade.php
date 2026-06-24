@extends('layouts.master')

@section('content')

<style>
.notif-card {
  border: none;
  border-radius: 16px;
  box-shadow: 0 4px 24px rgba(2,43,80,.1);
  overflow: hidden;
}
.notif-card-header {
  background: linear-gradient(135deg, #022B50, #0a4a8a);
  color: #fff;
  padding: 1.2rem 1.5rem;
  display: flex;
  align-items: center;
  gap: .75rem;
  font-size: 1rem;
  font-weight: 700;
}
.notif-card-header i { font-size: 1.3rem; color: #FFD21B; }
.send-btn {
  background: linear-gradient(135deg, #022B50, #0a4a8a);
  color: #fff;
  border: none;
  border-radius: 10px;
  padding: 12px 32px;
  font-weight: 700;
  font-size: .95rem;
  transition: all .25s;
}
.send-btn:hover { background: linear-gradient(135deg, #011f3d, #022B50); color: #FFD21B; }
</style>

<!--begin::Row-->
<div class="page-header-row">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <h3><i class="bi bi-bell me-2" style="color:var(--ft-gold);"></i>Send Notification</h3>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-end">
        <li class="breadcrumb-item"><a href="{{ URL::to('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Notifications</li>
      </ol>
    </div>
  </div>
</div>

<div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-lg-7 col-xl-6">

        @if(session('success'))
          <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
          </div>
        @endif

        <div class="notif-card card">
          <div class="notif-card-header">
            <i class="bi bi-bell-fill"></i>
            <span>Send a Notification to User</span>
          </div>

          <form action="notifications" method="post">
            @csrf
            <div class="card-body p-4">
              <p class="text-muted mb-4" style="font-size:.88rem;">
                The selected user will receive this notification in their dashboard <strong>and via email</strong>.
              </p>

              <div class="mb-3">
                <label class="form-label">Select User <span class="text-danger">*</span></label>
                <select id="user_id" name="user_id" class="form-control select2">
                  <option value="">— Choose a user —</option>
                  @foreach($users as $user)
                    <option value="{{ $user->id }}">
                      {{ $user->first_name }} {{ $user->last_name }} ({{ $user->email }})
                    </option>
                  @endforeach
                </select>
                @error('user_id')
                  <span class="text-danger small">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Notification Message <span class="text-danger">*</span></label>
                <textarea name="notification" class="form-control" rows="6"
                  placeholder="Type your notification message here…">{{ old('notification') }}</textarea>
                @error('notification')
                  <span class="text-danger small">{{ $message }}</span>
                @enderror
              </div>

              <div class="d-flex align-items-center gap-2 mt-1" style="font-size:.82rem; color:#6b7280;">
                <i class="bi bi-envelope-check"></i>
                An email copy will be sent to the user automatically.
              </div>
            </div>

            <div class="card-footer bg-white border-top d-flex justify-content-end gap-2 p-3">
              <a href="{{ URL::to('dashboard') }}" class="btn btn-outline-secondary" style="border-radius:10px;">Cancel</a>
              <button type="submit" class="send-btn">
                <i class="bi bi-send-fill me-1"></i>Send Notification
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>

</div>

@endsection
