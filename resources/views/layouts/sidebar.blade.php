<?php
use Illuminate\Support\Facades\DB;
?>
<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="/dashboard" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="{{ URL::asset('assets/img/logo-no-background.png') }}"
              alt="Food Tech Made"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Food</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
              
              <?php
                $userRole = auth()->user()->user_role_id;
                
                $AssignPermission = DB::table('roles')->where([['id', '=', $userRole],['status', '=', 'active']])->get();
                
                $permissionId = explode(',', $AssignPermission[0]->permission_id);
                $segment1 =  Request::segment(1);
                
              ?>

              @foreach($LeftMenu as $menu)
								@if(in_array($menu->id, $permissionId))
                  <?php $childMenu = DB::table('web_menu')->where([['parent_id', '=', $menu->id],['status', '=', 1]])->orderBy('orders','asc')->get(); ?>
                  <li class="nav-item <?php if($segment1 == $menu->permission_tag) {?>  menu-open <?php } ?>">
                    <?php if(!$childMenu->isEmpty()) { ?>
                      <a href="#" class="nav-link <?php if($segment1 == $menu->permission_tag) {?>  active <?php } ?>">
                    <?php } else { ?>
                    <a href="{{ url('/' . $menu->url)}}" class="nav-link <?php if($segment1 == $menu->permission_tag) {?>  active <?php } ?>">
                    <?php } ?>
                      <i class="nav-icon bi {{ $menu->menu_icon }}"></i>
                      <p>{{$menu->title}}</p>
                      @if(!$childMenu->isEmpty()) <i class="nav-arrow bi bi-chevron-right"></i> @endif
                    </a>
                    @if(!$childMenu->isEmpty())
											<ul class="nav nav-treeview">
											@foreach($childMenu as $cMenu)
												@if(in_array($cMenu->id, $permissionId))
													<li class="nav-item">
                            <a href="{{url('/' . $cMenu->url)}}" class="nav-link sub-menu">
                              <i class="nav-icon bi bi-circle"></i>
                              <p>{{$cMenu->title}}</p>
                            </a>
                          </li>
												@endif
											@endforeach
											</ul>
										@endif
                  </li>
                @endif
							@endforeach
              
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->