@extends('layouts.master')
  
  @section('content')
<div class="app-content-header"> 
  <!--begin::Container-->
  <div class="container-fluid"> 
    <!--begin::Row-->
    <div class="row">
      <div class="col-sm-6">
        <h3 class="mb-0">Roles</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
          <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Roles</li>
        </ol>
      </div>
    </div>
    <!--end::Row--> 
  </div>
  <!--end::Container--> 
</div>
<!--end::App Content Header--> 
<!--begin::App Content-->
<div class="app-content"> 
  <!--begin::Container-->
  <div class="container-fluid"> 
    <!--begin::Row-->
    <div class="row">
      <div class="card">
        <div class="DTTT_container" id="new_button" style="padding-left: 854px;"> <a class="btn btn-primary" href="{{URL::to('/roles/add')}}"> + Add New Role </a> </div>
        <div class="card-body">
          <table id="reports" class="table table-bordered table-striped">
            <thead>
              <tr>
              	<th scope="col" style="width: 10px;">No.</th>
                <th>Role</th>
                <th>Status</th>
                <th style="width: 45px;">Action</th>
              </tr>
            </thead>
            <tbody>
             @if (!$roleList->isEmpty())
                @foreach ($roleList as $key => $role)
                @php
                $status = 'active';
                $btnSoft = 'btn-soft-danger';
                $bgSubtle = 'bg-danger-subtle text-danger';
                $message = 'Are you sure you want to active '.$role->role_name.' ?';	
                if($role->status == 'active') {
                $status = 'inactive';
                $btnSoft = 'btn-soft-success';
                $bgSubtle = 'bg-success-subtle text-success';
                $message = 'Are you sure you want to Inactive '.$role->role_name.' ?';										
                }
                @endphp
              <tr>
                <td scope="row">{{ $key + 1 }}</td>
                <td>{{ $role->role_name }}</td>
                <td><span class="badge {{$bgSubtle}}">{{ $role->status }}</span></td>
                
                <td><a href="{{URL::to('/roles/edit/'.$role->id)}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a> <a href="{{URL::to('/roles/delete/'.$role->id)}}" class="icon-circle-list {{$btnSoft}}" onclick="return confirm('{{$message}}')"><i class="bi bi-trash" style="font-size: 18px;"></i></a></td>
              </tr>
              @endforeach
                @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--end::Row--> 
  </div>
  <!--end::Container--> 
</div>
</main>
</div>
@endsection 