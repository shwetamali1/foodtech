@extends('layouts.master')
@section('css')
		<!-- INTERNAL Select2 css -->
		<link href="{{URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Roles</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ URL::to('/dashboard')}}"><i class="fe fe-layers mr-2 fs-14"></i>Home</a></li>
									<?php
									$url = '';
									$count = count(Request::segments());
									for($i = 1; $i <= $count; $i++) {
										$segments = Request::segment($i);
										$url .= '/'.$segments;
									?>
										<li class="breadcrumb-item <?= ($i == $count)? 'active': '' ?>">
											<a href="{{$url}}" class="text-capitalize"><?= str_replace('-', ' ', $segments); ?></a>
										</li>
									<?php } ?>
								</ol>
							</div>
						</div>
                        <!--End Page header-->
@endsection
@section('content')
						<!-- Row -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Add Role</div>
									</div>
									<form action="add" method="post">
										<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										<div class="card-body">
											<div class="row">
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Role Name <span class="text-red">*</span></label>
														<input type="text" name="roles" class="form-control" placeholder="Role Name" value="{{old('roles')}}">
														<span class="text-danger">{{ $errors->first('roles') }}</span>
													</div>
												</div>
												<div class="col-sm-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Status</label>
														<select name="status" class="form-control select2">
															<option value="active">active</option>
															<option value="inactive">inactive</option>
														</select>
													</div>
												</div>
												<div class="col-12 ">
													<label class="form-label">Permissions </label>
													<div class="row">
														<?php
															foreach($LeftMenu as $key=>$menu) {
														?>
															<div class="col-3">
																<div class="permissions">
																	<span class="mTitle"><?= $menu->title; ?></span>
																	<ul class="treeview">
																		<li>
																			<input name="menus[]" type="checkbox" class="check-permission" value="<?= $menu->id; ?>" >
																			<label class="custom-unchecked mb-0"><?= $menu->title; ?></label>
																			<ul class="pl-4">
																			<?php
																			foreach($subMenuList as $submenu) { 
																				if($menu->id == $submenu->parent_id) {
																			?>
																				<li>
																					<input name="menus[]" type="checkbox" class="check-permission" value="<?= $submenu->id ?>" >
																					<label class="custom-unchecked mb-0"><?= $submenu->title ?></label>
																				</li>
																				<?php
																				}
																			}
																			?>
																			</ul>
																		</li>
																	</ul>
																</div>
															</div>
														<?php
															}
														?>
													</div>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type='submit' class="btn btn-primary" value="Create" />
											<!--<a href="#" class="btn btn-primary">Create</a>-->
											<a href="#" class="btn btn-danger">Cancel</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- End Row-->

					</div>
				</div><!-- end app-content-->
            </div>
@endsection
@section('js')
		<!-- INTERNAL Select2 js -->
		<script src="{{URL::asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{URL::asset('assets/js/select2.js')}}"></script>
		<script>
			$(function() {
				$('input[type="checkbox"]').change(checkboxChanged);
				function checkboxChanged() {
					var $this = $(this),
						checked = $this.prop("checked"),
						container = $this.parent(),
						siblings = container.siblings();

					container.find('input[type="checkbox"]')
						.prop({
							checked: checked
						})
						.siblings('label')
						.removeClass('custom-checked custom-unchecked custom-indeterminate')
						.addClass(checked ? 'custom-checked' : 'custom-unchecked');

					checkSiblings(container, checked);
				}

				function checkSiblings($el, checked) {
					var parent = $el.parent().parent(),
						all = true,
						indeterminate = false;

					$el.siblings().each(function() {
						return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
					});

					if (all && checked) {
						parent.children('input[type="checkbox"]')
							.prop({
								checked: checked
							})
							.siblings('label')
							.removeClass('custom-checked custom-unchecked custom-indeterminate')
							.addClass(checked ? 'custom-checked' : 'custom-unchecked');

						checkSiblings(parent, checked);
					} else if (all && !checked) {			
						indeterminate = parent.find('input[type="checkbox"]:checked').length > 0;

						parent.children('input[type="checkbox"]')
							.prop("checked", checked)
							.siblings('label')
							.removeClass('custom-checked custom-unchecked custom-indeterminate')
							.addClass(indeterminate ? 'custom-indeterminate' : (checked ? 'custom-checked' : 'custom-unchecked'));

						checkSiblings(parent, checked);
					} else if (!all && checked) {
						parent.children('input[type="checkbox"]')
							.prop({
								checked: checked
							})
							.siblings('label')
							.removeClass('custom-checked custom-unchecked custom-indeterminate')
							.addClass(checked ? 'custom-checked' : 'custom-unchecked');
					}
				}
			});
		</script>
@endsection