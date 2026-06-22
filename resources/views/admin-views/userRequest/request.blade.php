@extends('layouts.master')

@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Service Request</h3></div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Service Request</li>
            </ol>
        </div>
    </div>
    <!--end::Row-->
    </div>
    <!--end::Container-->
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card card-warning card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Submit Your Query</div>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success mx-3 mt-3">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger mx-3 mt-3">{{ session('error') }}</div>
                        @endif

                        <form action="{{ url('userrequest/add_submit') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Your full name"
                                                   value="{{ old('name') }}">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Your email address"
                                                   value="{{ old('email') }}">
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                            <input type="tel" name="mobile" class="form-control"
                                                   placeholder="Your mobile number"
                                                   value="{{ old('mobile') }}">
                                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Your Query <span class="text-danger">*</span></label>
                                            <textarea name="user_query" class="form-control" rows="5"
                                                      placeholder="Insert your query here...">{{ old('user_query') }}</textarea>
                                            <span class="text-danger">{{ $errors->first('user_query') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Submit Query</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
