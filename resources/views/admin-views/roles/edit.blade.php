@extends('layouts.master')
  
  @section('content') 
<!--begin::Row-->
<div class="row">
  <div class="col-sm-6">
    <h3 class="mb-0">Edit Services</h3>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-end">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Services</li>
    </ol>
  </div>
</div>
<!--end::Row-->
</div>
<!--end::Container-->
</div>
<div class="app-content"> 
  <!--begin::Container-->
  <div class="container-fluid"> 
    <!-- Info boxes -->
    <div class="row">
      <div class="card card-warning card-outline mb-4"> 
        <!--begin::Header--> 
        <!-- <div class="card-header"><div class="card-title">Horizontal Form</div></div> --> 
        <!--end::Header--> 
        <!--begin::Form-->
        <form action="{{$editRec->id}}" id="edit_role_form"  method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="role_name" class="form-label">Role Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Enter role name" id="role_name" name="role_name" value="{{$editRec->role_name}}">
                <div class="error text-danger required_role_name"></div>
              </div>
            </div>
            <!--end col-->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status1" class="form-select" data-choices data-choices-sorting="true" >
                  <option value="active" {{ $editRec->status == 'active' ? 'selected' : '' }}>active</option>
                  <option value="inactive" {{ $editRec->status == 'inactive' ? 'selected' : '' }}>inactive</option>
                </select>
              </div>
            </div>
            <!--end col-->
            
            <div class="border border-dashed"></div>
            <div class="col-6">
              <label class="form-label mt-3">Web Menu Permissions</label>
              <div class="verti-sitemap px-3" data-simplebar data-simplebar-auto-hide="false" style="max-height: 250px;">
                <ul class="list-unstyled mb-0">
                  <li class="p-0 parent-title fw-medium fs-14">All Web Menu</li>
                  <li> @php
                    $permissionIds = explode (",", $editRec->permission_id);
                    @endphp
                    @if(!empty($LeftMenu))
                    @foreach ($LeftMenu as $key => $menu)
                    @php $menuChecked = (in_array($menu->id, $permissionIds)) ? 'checked' : ''; @endphp
                    <div class="first-list">
                      <div class="list-wrap"> <a href="javascript: void(0);" class="fw-medium text-primary">
                        <input name="menus[]" type="checkbox" class="check-permission" value="{{$menu->id}}" {{$menuChecked}}>
                        <span class="custom-unchecked">{{$menu->title}}</span> </a> </div>
                      <ul class="second-list list-unstyled">
                        @foreach ($subMenuList as $submenu)
                        @if ($menu->id == $submenu->parent_id)
                        @php $subMenuChecked = (in_array($submenu->id, $permissionIds)) ? 'checked' : ''; @endphp
                        <li> <a href="javascript: void(0);">
                          <input name="menus[]" type="checkbox" class="check-permission" value="{{$submenu->id}}" {{$subMenuChecked}}>
                          <span class="custom-unchecked">{{$submenu->title}}</span> </a> </li>
                        @endif
                        <?php if($key ==4){  } ?>
                        @endforeach
                      </ul>
                    </div>
                    @endforeach
                    @endif </li>
                </ul>
              </div>
            </div>
            <!-- end web menu permissions -->
            
            <div class="col-lg-12">
              <div class="text-end"> <a href="{{ route('roles') }}" class="btn btn-soft-danger"><i class="mdi mdi-keyboard-backspace align-middle me-1"></i> Back</a>
                <button type="button" class="btn btn-primary" id="edit_role_btn">Update</button>
              </div>
            </div>
            <!--end col--> 
          </div>
          <!--end row-->
        </form>
        <!--end::Form--> 
      </div>
    </div>
    
    <!--end::Row--> 
  </div>
  <!--end::Container--> 
</div>
<!--end::App Content-->
<!--end::App Main--> 
<!--begin::Footer--> 

<!--end::Footer-->
</div>
<!--end::App Wrapper--> 
<!--begin::Script--> 
<!--begin::Third Party Plugin(OverlayScrollbars)--> 

@endsection 