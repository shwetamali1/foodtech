@extends('layouts.master')
  
  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">User Listing</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
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
              <div class="card-header">
                  <div class="card-title w-50"></div>
                  <div style="float:right">
                    <a href="{{URL::to('/users/add')}}"class="btn btn-primary">Add User</a>
                  </div>
              </div>
              <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>0001</td>
                    <td>Vimal Chuahan</td>
                    <td>vchauhan</td>
                    <td>chauhan.vimal4@gmail.com</td>
                    <td>Super Admin</td>
                    <td>Active</td>
                    <td>
                      <a href="{{URL::to('/user/view/')}}" class="icon-circle-list"><i class="bi bi-eye" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/edit/')}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/delete/')}}" class="icon-circle-list" onclick="return confirm('Are you sure you want to delete!')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
                    </td>
                  </tr>

                  <tr>
                    <td>0002</td>
                    <td>Vimal Chuahan</td>
                    <td>vchauhan</td>
                    <td>chauhan.vimal4@gmail.com</td>
                    <td>Admin</td>
                    <td>Active</td>
                    <td>
                      <a href="{{URL::to('/user/view/')}}" class="icon-circle-list"><i class="bi bi-eye" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/edit/')}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/delete/')}}" class="icon-circle-list" onclick="return confirm('Are you sure you want to delete!')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
                    </td>
                  </tr>

                  <tr>
                    <td>0003</td>
                    <td>Vimal Chuahan</td>
                    <td>vchauhan</td>
                    <td>chauhan.vimal4@gmail.com</td>
                    <td>Admin</td>
                    <td>Active</td>
                    <td>
                      <a href="{{URL::to('/user/view/')}}" class="icon-circle-list"><i class="bi bi-eye" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/edit/')}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/delete/')}}" class="icon-circle-list" onclick="return confirm('Are you sure you want to delete!')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>0004</td>
                    <td>Vimal Chuahan</td>
                    <td>vchauhan</td>
                    <td>chauhan.vimal4@gmail.com</td>
                    <td>Admin</td>
                    <td>Active</td>
                    <td>
                      <a href="{{URL::to('/user/view/')}}" class="icon-circle-list"><i class="bi bi-eye" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/edit/')}}" class="icon-circle-list"><i class="bi bi-pencil" style="font-size: 18px;"></i></a>
                      <a href="{{URL::to('/user/delete/')}}" class="icon-circle-list" onclick="return confirm('Are you sure you want to delete!')"><i class="bi bi-trash" style="font-size: 18px;"></i></a>
                    </td>
                  </tr>
                  
                  </tbody>
                  
                </table>
              </div></div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>     
     
    </div>
   
  
    @endsection
    