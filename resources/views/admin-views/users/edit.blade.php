@extends('layouts.master')

@section('content')

<style>
.user-form-card {
    border: none;
    border-radius: 18px;
    box-shadow: 0 8px 40px rgba(2,43,80,0.10);
    overflow: hidden;
}
.user-form-header {
    background: linear-gradient(135deg, #022B50, #0a4a8a);
    padding: 26px 32px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.user-form-header .header-icon {
    width: 46px; height: 46px;
    background: rgba(255,210,27,0.18);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: #FFD21B;
    flex-shrink: 0;
}
.user-form-header h5 { margin: 0; color: #fff; font-size: 1.1rem; font-weight: 800; }
.user-form-header p  { margin: 0; color: rgba(255,255,255,0.6); font-size: 0.82rem; }
.section-label {
    font-size: 0.72rem; font-weight: 800; color: #adb5bd;
    text-transform: uppercase; letter-spacing: 1px;
    padding-bottom: 10px; border-bottom: 1.5px solid #f0f3f8; margin-bottom: 20px;
}
.form-label { font-size: 0.83rem; font-weight: 700; color: #022B50; margin-bottom: 5px; }
.form-label .req { color: #e74c3c; }
.form-control, .form-select {
    border: 1.5px solid #e4eaf2; border-radius: 10px;
    padding: 10px 14px; font-size: 0.9rem; color: #022B50;
    background: #f8fafc; transition: border-color 0.2s, box-shadow 0.2s;
}
.form-control:focus, .form-select:focus {
    border-color: #022B50; box-shadow: 0 0 0 3px rgba(2,43,80,0.08); background: #fff; outline: none;
}
.form-control[readonly] { background: #f0f3f8; color: #6c757d; cursor: not-allowed; }
.user-form-footer {
    background: #f8fafc; border-top: 1.5px solid #f0f3f8;
    padding: 18px 32px; display: flex; gap: 12px; justify-content: flex-end;
}
.btn-save {
    background: linear-gradient(135deg, #022B50, #0a4a8a); color: #fff;
    border: none; border-radius: 10px; padding: 11px 28px;
    font-weight: 700; font-size: 0.92rem; cursor: pointer; transition: all 0.25s;
}
.btn-save:hover { background: linear-gradient(135deg, #011f3d, #022B50); color: #FFD21B; transform: translateY(-1px); }
.btn-cancel {
    background: #fff; color: #6c757d; border: 1.5px solid #e4eaf2;
    border-radius: 10px; padding: 11px 24px; font-weight: 700; font-size: 0.92rem;
    text-decoration: none; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s;
}
.btn-cancel:hover { background: #f8fafc; color: #022B50; text-decoration: none; }
</style>

<div class="app-content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit User</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/users/list') }}">Users</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">

                <div class="user-form-card card mb-4">

                    <div class="user-form-header">
                        <div class="header-icon"><i class="bi bi-person-fill-gear"></i></div>
                        <div>
                            <h5>Edit User — {{ $editRec->first_name }} {{ $editRec->last_name }}</h5>
                            <p>Update the user's details below</p>
                        </div>
                    </div>

                    <form action="{{ $editRec->id }}" method="post">
                        @csrf

                        <div class="card-body p-4">

                            <div class="section-label">Personal Information</div>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">First Name <span class="req">*</span></label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $editRec->first_name }}">
                                    <span class="text-danger small">{{ $errors->first('first_name') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name <span class="req">*</span></label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $editRec->last_name }}">
                                    <span class="text-danger small">{{ $errors->first('last_name') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email <span class="req">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ $editRec->email }}" readonly>
                                    <span class="text-danger small">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mobile <span class="req">*</span></label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="{{ $editRec->mobile }}">
                                    <span class="text-danger small">{{ $errors->first('mobile') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password <span class="req">*</span></label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ $editRec->password }}">
                                    <span class="text-danger small">{{ $errors->first('password') }}</span>
                                </div>
                            </div>

                            <div class="section-label">Role & Category</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Business Category <span class="req">*</span></label>
                                    <select name="business_category" class="form-select">
                                        <option value="">Select Business Category</option>
                                        @foreach ($business_category as $category)
                                            <option value="{{ $category->id }}" {{ $editRec->category_id == $category->id ? 'selected' : '' }}>{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger small">{{ $errors->first('business_category') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">User Role <span class="req">*</span></label>
                                    <select name="user_role_id" class="form-select">
                                        <option value="">Select User Role</option>
                                        @foreach ($roleRec as $role)
                                            <option value="{{ $role->id }}" {{ $role->id == $editRec->user_role_id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger small">{{ $errors->first('user_role_id') }}</span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="active"   {{ $editRec->status == 'active'   ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $editRec->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="user-form-footer">
                            <a href="{{ url('/users/list') }}" class="btn-cancel">
                                <i class="bi bi-x-lg"></i> Cancel
                            </a>
                            <button type="submit" class="btn-save">
                                <i class="bi bi-check-lg me-1"></i> Update User
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
