<?php
use Illuminate\Support\Facades\DB;
?>
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
            <!-- <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li> -->
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <!--<li class="nav-item">-->
            <!--  <a class="nav-link" data-widget="navbar-search" href="#" role="button">-->
            <!--    <i class="bi bi-search"></i>-->
            <!--  </a>-->
            <!--</li>-->
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->
            <li class="nav-item dropdown">
              <!--<a class="nav-link" data-bs-toggle="dropdown" href="#">-->
              <!--  <i class="bi bi-chat-text"></i>-->
              <!--  <span class="navbar-badge badge text-bg-danger">0</span>-->
              <!--</a>-->
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--<a href="#" class="dropdown-item">-->
                  <!--begin::Message-->
                <!--  <div class="d-flex">-->
                <!--    <div class="flex-shrink-0">-->
                <!--      <img-->
                <!--        src="{{ URL::asset('assets/img/user1-128x128.jpg') }}"-->
                <!--        alt="User Avatar"-->
                <!--        class="img-size-50 rounded-circle me-3"-->
                <!--      />-->
                <!--    </div>-->
                <!--    <div class="flex-grow-1">-->
                <!--      <h3 class="dropdown-item-title">-->
                <!--        Brad Diesel-->
                <!--        <span class="float-end fs-7 text-danger"-->
                <!--          ><i class="bi bi-star-fill"></i-->
                <!--        ></span>-->
                <!--      </h3>-->
                <!--      <p class="fs-7">Call me whenever you can...</p>-->
                <!--      <p class="fs-7 text-secondary">-->
                <!--        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago-->
                <!--      </p>-->
                <!--    </div>-->
                <!--  </div>-->
                  <!--end::Message-->
                <!--</a>-->
                <!--<div class="dropdown-divider"></div>-->
                <!--<a href="#" class="dropdown-item">-->
                  <!--begin::Message-->
                <!--  <div class="d-flex">-->
                <!--    <div class="flex-shrink-0">-->
                <!--      <img-->
                <!--        src="{{ URL::asset('assets/img/user8-128x128.jpg') }}"-->
                <!--        alt="User Avatar"-->
                <!--        class="img-size-50 rounded-circle me-3"-->
                <!--      />-->
                <!--    </div>-->
                <!--    <div class="flex-grow-1">-->
                <!--      <h3 class="dropdown-item-title">-->
                <!--        John Pierce-->
                <!--        <span class="float-end fs-7 text-secondary">-->
                <!--          <i class="bi bi-star-fill"></i>-->
                <!--        </span>-->
                <!--      </h3>-->
                <!--      <p class="fs-7">I got your message bro</p>-->
                <!--      <p class="fs-7 text-secondary">-->
                <!--        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago-->
                <!--      </p>-->
                <!--    </div>-->
                <!--  </div>-->
                  <!--end::Message-->
                <!--</a>-->
                <!--<div class="dropdown-divider"></div>-->
                <!--<a href="#" class="dropdown-item">-->
                  <!--begin::Message-->
                <!--  <div class="d-flex">-->
                <!--    <div class="flex-shrink-0">-->
                <!--      <img-->
                <!--        src="{{ URL::asset('assets/img/user3-128x128.jpg') }}"-->
                <!--        alt="User Avatar"-->
                <!--        class="img-size-50 rounded-circle me-3"-->
                <!--      />-->
                <!--    </div>-->
                <!--    <div class="flex-grow-1">-->
                <!--      <h3 class="dropdown-item-title">-->
                <!--        Nora Silvester-->
                <!--        <span class="float-end fs-7 text-warning">-->
                <!--          <i class="bi bi-star-fill"></i>-->
                <!--        </span>-->
                <!--      </h3>-->
                <!--      <p class="fs-7">The subject goes here</p>-->
                <!--      <p class="fs-7 text-secondary">-->
                <!--        <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago-->
                <!--      </p>-->
                <!--    </div>-->
                <!--  </div>-->
                  <!--end::Message-->
                <!--</a>-->
                <!--<div class="dropdown-divider"></div>-->
                <!--<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>-->
              </div>
            </li>
            <!--end::Messages Dropdown Menu-->
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
                <?php
                $UserId = Auth::user()->id;
         		$notifications = DB::table('notifications')
         			->where('send_to', '=', $UserId)
 			        ->get();
 			    ?>
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-warning"><?php echo count($notifications) ?></span>
              </a>
              
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <span class="dropdown-item dropdown-header"><?php echo count($notifications) ?> Notifications</span>
                    <?php foreach ($notifications as $notification) { ?>
                    <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                          <i class="bi bi-envelope me-2"></i> 
                          <?php 
                          if(strlen($notification->notification) > 50){
                              echo substr($notification->notification, 0, 20) . '...';
                          }else{
                              echo $notification->notification;
                          }
                          ?>
                          <!--<span class="float-end text-secondary fs-7">3 mins</span>-->
                      </a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                        <a href="/settings/profiles" class="dropdown-item dropdown-footer"> See All Notifications </a>
                    
                </div>
              
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            
            <!--@auth-->
            <!--<li class="nav-item dropdown">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-bs-toggle="dropdown">-->
            <!--    {{ Auth::user()->name }}-->
            <!--  </a>-->
            <!--  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">-->
            <!--    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>-->
            <!--    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            <!--@endauth-->
            
            
            
            <li class="nav-item dropdown">
              <a href="#" class="nav-link d-flex align-items-center gap-2 dropdown-toggle"
                 id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <span style="width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#022B50,#ffd200);display:inline-flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.85rem;flex-shrink:0;">
                  {{ strtoupper(substr(Auth::user()->first_name,0,1)) }}{{ strtoupper(substr(Auth::user()->last_name??'',0,1)) }}
                </span>
                <span class="d-none d-md-inline" style="font-size:.875rem;font-weight:600;color:#374151;">
                  {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </span>
                <i class="bi bi-chevron-down d-none d-md-inline" style="font-size:.7rem;color:#6b7280;"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 py-1"
                  aria-labelledby="userDropdown"
                  style="min-width:200px;border-radius:10px;margin-top:.4rem;">
                <!-- User info header -->
                <li class="px-3 py-2 border-bottom">
                  <div style="font-weight:700;font-size:.875rem;color:#111827;">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                  </div>
                  <div style="font-size:.78rem;color:#6b7280;">{{ Auth::user()->email }}</div>
                </li>
                <!-- My Profile -->
                <li>
                  <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                     href="/settings/profiles"
                     style="font-size:.875rem;">
                    <i class="bi bi-person-circle" style="color:#022B50;font-size:1rem;"></i>
                    My Profile
                  </a>
                </li>
                <li><hr class="dropdown-divider my-1"></li>
                <!-- Logout -->
                <li>
                  <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                     href="{{ route('logout') }}"
                     style="font-size:.875rem;color:#dc2626;">
                    <i class="bi bi-box-arrow-right" style="font-size:1rem;"></i>
                    Log Out
                  </a>
                </li>
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>
      <!--end::Header-->