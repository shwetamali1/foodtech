@extends('layouts.master')
  <style>
      .plan-box h4{
          font-size: 22px !important;
      }
  </style>

  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Subscriptions Plan</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
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
                  <div class="card w-100">
                     
                    <div class="card-body">
                        
                        <div class="pricing-card">
                            <div class="plan-header">
                              <div class="plan-icon">
                                <img src="https://img.icons8.com/ios-filled/50/000000/wallet.png" alt="icon">
                              </div>
                              <div>
                                <div class="plan-title">{{ $editRec->title }}</div>
                                <div class="plan-description">{{ $editRec->description }}</div>
                              </div>
                            </div>
                        
                            <div class="price-row">
                              <div>{{ $editRec->title }}</div>
                              <div>{{ $editRec->price }}</div>
                            </div>
                            <div class="price-row">
    <div>Government Fee</div>
    <div>{{ number_format($editRec->government_fee, 2) }} RS</div>
</div>
                        
                            <div class="price-row">
                              <div>Discount (If applicable)</div>
                              <?php $mprice = str_replace('RS', '', $editRec->price);
                              if(!empty($editRec->discount)){ $discount = $editRec->discount; } else{ $discount = 0; }
                              $dis = ($mprice * $discount)/100; ?>
                              <div><?php echo number_format($dis, 2).' RS'; ?></div>
                            </div>
                        
                            <hr>
                        
                         <div class="price-row total">
    <div>Total</div>
    <div>
    <?php
    $mprice = str_replace('RS', '', $editRec->price);

    $discount = !empty($editRec->discount) ? $editRec->discount : 0;
    $dis = ($mprice * $discount) / 100;

    $government_fee = !empty($editRec->government_fee)
        ? $editRec->government_fee
        : 0;

    // Final Price = Price - Discount + Government Fee
    $price = $mprice - $dis + $government_fee;

    echo number_format($price, 2) . ' RS';
    ?>
    </div>
</div>
                            <a href="/subscriptions/billing-details/{{ $editRec->id }}" class="checkout-btn">Proceed To Checkout →</a>
                            <!--<button class="checkout-btn">-->
                            <!--  Proceed To Checkout →-->
                            <!--</button>-->
                        </div>
                      
                    </div>
                  </div>
                </div>

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>     
      </main>
     
    </div>
   <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('assets/plugins/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
<script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <
    <script src="{{ URL::asset('assets/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>

  
    @endsection
    