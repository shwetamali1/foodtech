@extends('layouts.master')
@section('title') @lang('translation.form-layouts') @endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Home @endslot
        @slot('title')Add Role @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add Role</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <form id="add_role_form" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role_name" class="form-label">Role Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter role name" id="role_name" name="role_name">
                                        <div class="error text-danger required_role_name"></div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="status1" class="select2-single">
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                                </div><!--end col-->

								<div class="border border-dashed"></div>
                                <div class="col-md-6">
                                    <label class="form-label mt-3">Web Menu Permissions</label>

                                    <div class="verti-sitemap px-3" data-simplebar data-simplebar-auto-hide="false" style="max-height: 250px;">
                                        <ul class="list-unstyled mb-0">
                                            <li class="p-0 parent-title fw-medium fs-14">
                                                <input name="menus[]" type="checkbox" class="check-permission" value="" >
                                                All Web Menu
                                            </li>
                                            <li>
                                                @if(!empty($LeftMenu))
                                                    @foreach ($LeftMenu as $key => $menu)
                                                        <div class="first-list">
                                                            <div class="list-wrap">
                                                                <a href="javascript: void(0);" class="fw-medium text-primary">
                                                                    <input name="menus[]" type="checkbox" class="check-permission" value="{{$menu->id}}" >
                                                                    <span class="custom-unchecked">{{$menu->title}}</span>
                                                                </a>
                                                            </div>
                                                            <ul class="second-list list-unstyled">
                                                                @foreach ($subMenuList as $submenu)
                                                                    @if ($menu->id == $submenu->parent_id)
                                                                        <li>
                                                                            <a href="javascript: void(0);">
                                                                                <input name="menus[]" type="checkbox" class="check-permission" value="{{$submenu->id}}" >
                                                                                <span class="custom-unchecked">{{$submenu->title}}</span>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div> <!-- end web menu permissions -->

                                <div class="col-md-6">
                                    <label class="form-label mt-3">Module Permissions</label>
                                    <div class="verti-sitemap px-3 module-permisstion" data-simplebar data-simplebar-auto-hide="false" style="max-height: 250px;">
                                        <ul class="list-unstyled mb-0">
                                            <li class="p-0 parent-title fw-medium fs-14">
                                                <input name="menus[]" type="checkbox" class="check-permission" value="" >
                                                All Module Permissions
                                            </li>
                                            <li>
                                                @if(!empty($modulePermissionParentList))
                                                    @foreach ($modulePermissionParentList as $key => $parentParemission)
                                                        <div class="first-list">
                                                            <div class="list-wrap">
                                                                <a href="javascript: void(0);" class="fw-medium text-primary">
                                                                    <input name="menus[]" type="checkbox" class="check-permission" value="{{$parentParemission->id}}" >
                                                                    <span class="custom-unchecked">{{$parentParemission->module_title}}</span>
                                                                </a>
                                                            </div>
                                                            <ul class="second-list list-unstyled">
                                                                @foreach ($modulePermissionList as $childPermission)
                                                                    @if ($parentParemission->id == $childPermission->parent_id)
                                                                        <li>
                                                                            <a href="javascript: void(0);">
                                                                                <input name="menus[]" type="checkbox" class="check-permission" value="{{$childPermission->id}}" >
                                                                                <span class="custom-unchecked">{{$childPermission->module_title}}</span>
                                                                            </a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
								</div>

                                <div class="col-lg-12">
                                    <div class="text-end">
										<a href="{{ route('roles') }}" class="btn btn-soft-danger"><i class="mdi mdi-keyboard-backspace align-middle me-1"></i> Back</a>
                                        <button type="button" class="btn btn-primary" id="add_role_btn">Add</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div><!--end row-->
@endsection
@section('script')
<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Sweet alert -->
<script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/sweetalerts.init.js') }}"></script>

<script>
    $(document).ready( function () {
        $("#status1").select2();

        $(document).on("click", "#add_role_btn", function() {
            $(".error").html('');
            var clickBtn = $(this);
            clickBtn.html('Adding...').prop("disabled", true);

            var role_name = $("#role_name").val();
            var status = $("#status1").val();
            var menuIds = [];
            $('.check-permission:checked').each(function() {
                var val = $(this).val();
                if (val !== null && val !== undefined && val !== '') {
                    menuIds.push(val);
                }
            });

            var modulePermisstionIds = [];
            $('.module-permisstion .check-permission:checked').each(function() {
                var val = $(this).val();
                if (val !== null && val !== undefined && val !== '') {
                    modulePermisstionIds.push(val);
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{route('roles.addPost')}}", // URL defined in your routes
                data: {
                    role_name:role_name, status: status, menuIds: menuIds, modulePermisstionIds: modulePermisstionIds
                },
                success: function(response) {
                    if (response.success) {
                        Toastify({
                            text: response.message,
                            className: "bg-success",
                            position: 'center',
                        }).showToast();

                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }

                        clearSpecificVal();
                        clearFields("add_role_form");
                    }
                    clickBtn.html('Add').prop("disabled", false);
                },
                error: function (xhr) {
                    handleValidationErrors(xhr);
                    clickBtn.html('Add').prop("disabled", false);
                }
            });
        });
    });
</script>
@endsection
