@php
    // Same services shown in the "Everything Your Food Business Needs" section on the home page
    $navServices = [
        ['name' => 'FSSAI Licensing',    'url' => '/services/fssai-licensing',       'icon' => 'fa-file-text-o'],
        ['name' => 'Label Validation',   'url' => '/services/fssai-label-validation', 'icon' => 'fa-tag'],
        ['name' => 'Food Safety SOPs',   'url' => '/services/food-safety-soapes',     'icon' => 'fa-check-circle'],
        ['name' => 'Business Plans',     'url' => '/business-plans',                  'icon' => 'fa-bar-chart'],
    ];
@endphp

<header>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">

      {{-- Logo --}}
      <a class="navbar-brand" href="/home">
        <img src="{{ URL::asset('assets/img/logo1.png') }}" alt="Food Tech Mate Logo">
      </a>

      {{-- Mobile: user icon (far left of toggler) --}}
      <a href="/login/admin" class="loginbox mobileicon" title="Login">
        <i class="fa fa-user" style="font-size:20px;"></i>
      </a>

      {{-- Hamburger --}}
      <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse" data-bs-target="#mainNav"
              aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{-- Nav links --}}
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link {{ request()->is('/') || request()->is('home') || request()->is('home2') ? 'active' : '' }}"
               href="/home">Home</a>
          </li>

          {{-- Services hover dropdown --}}
          <li class="nav-item hdr-dropdown">
            <a class="nav-link hdr-dropdown-toggle {{ request()->is('services/*') ? 'active' : '' }}"
               href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
              Services <i class="fa fa-chevron-down hdr-chevron"></i>
            </a>
            <ul class="hdr-dropdown-menu">
              @foreach($navServices as $svc)
                <li>
                  <a href="{{ $svc['url'] }}">
                    <i class="fa {{ $svc['icon'] }} hdr-svc-icon"></i>
                    {{ $svc['name'] }}
                  </a>
                </li>
              @endforeach
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('subscriptions') ? 'active' : '' }}"
               href="/subscriptions">Subscriptions</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('business-plans') || request()->is('business-plans/*') ? 'active' : '' }}"
               href="/business-plans">Food Business Plans</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}"
               href="/contact-us">Contact Us</a>
          </li>

        </ul>
      </div>

      {{-- Desktop login button --}}
      <a href="/login/admin" class="hdr-login-btn desktoplogin">
        <i class="fa fa-user"></i> Log In
      </a>

    </div>
  </nav>
</header>

<style>
/* ── Header base ─────────────────────────────────── */
header { position: fixed; width: 100%; z-index: 999; background-color: #022B50; border-bottom: 1px solid rgba(255,255,255,.15); box-shadow: 0 4px 18px rgba(0,0,0,.18); }

.navbar { padding: .55rem 0; }

/* ── Nav links ───────────────────────────────────── */
.nav-link { font-size: 16px; font-weight: 600; padding: 8px 16px !important; color: #fff !important; transition: color .2s; }
.nav-link:hover,
.nav-link.active { color: #FFD21B !important; }

/* ── Desktop login button ────────────────────────── */
.hdr-login-btn {
  display: inline-flex; align-items: center; gap: 7px;
  background: #FFD21B; color: #022B50 !important;
  font-weight: 700; font-size: 15px;
  border-radius: 8px; padding: 8px 20px;
  text-decoration: none;
  border: 2px solid #FFD21B;
  transition: background .2s, color .2s, border-color .2s;
  white-space: nowrap;
}
.hdr-login-btn:hover {
  background: transparent;
  color: #FFD21B !important;
  border-color: #FFD21B;
}

/* ── Mobile login icon ───────────────────────────── */
.mobileicon { display: none; }
.desktoplogin { display: inline-flex; }

/* ── Services dropdown wrapper ───────────────────── */
.hdr-dropdown { position: relative; }

.hdr-chevron {
  font-size: 11px;
  margin-left: 5px;
  transition: transform .25s;
  display: inline-block;
}
.hdr-dropdown:hover .hdr-chevron,
.hdr-dropdown.open .hdr-chevron { transform: rotate(180deg); }

/* ── Dropdown menu ───────────────────────────────── */
.hdr-dropdown-menu {
  display: none;
  position: absolute;
  top: calc(100% + 6px);
  left: 50%;
  transform: translateX(-50%);
  min-width: 230px;
  max-height: 340px;
  overflow-y: auto;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 10px 35px rgba(0,0,0,.18);
  padding: 8px 0;
  list-style: none;
  margin: 0;
  z-index: 1000;
  border-top: 3px solid #FFD21B;
  animation: dropFadeIn .18s ease;
}

@keyframes dropFadeIn {
  from { opacity: 0; transform: translateX(-50%) translateY(-6px); }
  to   { opacity: 1; transform: translateX(-50%) translateY(0);    }
}

.hdr-dropdown-menu li a {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 20px;
  color: #022B50 !important;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  border-left: 3px solid transparent;
  transition: background .15s, border-color .15s, color .15s;
}
.hdr-dropdown-menu li a:hover {
  background: #f0f5ff;
  border-left-color: #FFD21B;
  color: #022B50 !important;
}
.hdr-svc-icon {
  width: 18px;
  text-align: center;
  color: #FFD21B;
  flex-shrink: 0;
}

.hdr-dropdown-empty {
  display: block; padding: 10px 20px;
  color: #aaa; font-size: 13px;
}

/* Desktop: show on hover */
@media (min-width: 992px) {
  .hdr-dropdown:hover .hdr-dropdown-menu { display: block; }
  .navbar-collapse { justify-content: center; }
}

/* Mobile: static collapse below toggle */
@media (max-width: 991.98px) {
  .mobileicon  { display: inline-flex; align-items: center; justify-content: center; background: #FFD21B; color: #022B50 !important; width: 36px; height: 36px; border-radius: 8px; font-size: 16px; }
  .desktoplogin { display: none !important; }

  .hdr-dropdown-menu {
    position: static;
    transform: none;
    box-shadow: none;
    border-radius: 6px;
    border-top: none;
    border-left: 3px solid #FFD21B;
    background: rgba(255,255,255,.07);
    padding: 4px 0;
    margin: 4px 0 4px 16px;
    animation: none;
    max-height: none;
    overflow: visible;
  }
  .hdr-dropdown-menu li a {
    color: #fff !important;
    font-size: 15px;
    padding: 8px 16px;
    border-left: none;
    gap: 10px;
  }
  .hdr-dropdown-menu li a:hover { color: #FFD21B !important; background: transparent; }
  .hdr-svc-icon { color: #FFD21B; }
  .hdr-dropdown.open .hdr-dropdown-menu { display: block; }
}

/* Scrollbar inside dropdown (desktop) */
.hdr-dropdown-menu::-webkit-scrollbar { width: 4px; }
.hdr-dropdown-menu::-webkit-scrollbar-thumb { background: #FFD21B; border-radius: 4px; }
</style>

<script>
// Mobile toggle for Services dropdown
document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.hdr-dropdown-toggle');
  if (!toggle) return;
  toggle.addEventListener('click', function (e) {
    if (window.innerWidth < 992) {
      e.preventDefault();
      toggle.closest('.hdr-dropdown').classList.toggle('open');
    }
  });
});
</script>
<!-- end header -->
