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
    <div>{{ $editRec->government_fee ?? 0 }} RS</div>
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
     
    </div>
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

  
    @endsection
    