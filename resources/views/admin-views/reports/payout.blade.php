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
              <div class="col-sm-6"><h3 class="mb-0">Business Plan Checkout</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Business Plan Checkout</li>
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
                                <div class="plan-title">{{ $editRec->reports_title }}</div>
                                <div class="plan-description">{{ Str::limit(strip_tags($editRec->description), 150, '.') }}</div>
                              </div>
                            </div>
                        
                            <div class="price-row">
                              <div>Price</div>
                              <div>{{ $editRec->price }}</div>
                            </div>
                        
                            <hr>
                        
                            <div class="price-row total">
                              <div>Total</div>
                              <div>
                                  <?php 
                                  $mprice = str_replace('RS', '', $editRec->price);
                                  if(!empty($editRec->discount)){ $discount = $editRec->discount; } else{ $discount = 0; }
                                  $dis = ($mprice * $discount)/100;
                                  if(!empty($editRec->per)){ $per = $editRec->per; } else{ $per = 0; } 
                                  $price = $mprice - $dis;
                                  echo number_format($price, 2).' RS';
                                  ?>
                              </div>
                              
                            </div>
                            <a href="/reports/billing-details/{{ $editRec->id }}" class="checkout-btn">Proceed To Checkout →</a>
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
    