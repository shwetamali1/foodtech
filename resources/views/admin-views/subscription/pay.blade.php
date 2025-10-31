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
              <div class="col-sm-6"><h3 class="mb-0">Payment</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Payment</li>
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
              <?php 
                    $mprice = str_replace('RS', '', $editRec->price);
                    if(!empty($editRec->discount)){ $discount = $editRec->discount; } else{ $discount = 0; }
                    $dis = ($mprice * $discount)/100;
                    $price = $mprice - $dis;
                    $price2 = number_format($price, 2);
                    //$price = str_replace(' RS', '', $editRec->price);
                ?>
                <input type="hidden" name="amount" id="amount" value="<?php echo $price ?>">
                <input type="hidden" name="name" id="name" value="<?php echo $billingData->first_name .' '.$billingData->last_name ?>">
                <input type="hidden" name="billingId" id="billingId" value="<?php echo $billingData->id ?>">
            <!--begin::Row-->
              @include('admin-views.components.razorpay-form')

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


    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
   
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
    <script>
    document.getElementById('payBtn').onclick = function (e) {
        var terms = '';
        if($("#terms").is(':checked')){
            terms = 'true';
        }else{
            terms = 'false';
        }
        if(terms == 'false'){
             $("#agree_chk_error").show();
             return false;
        }
        else{
            
            e.preventDefault();
            $("#agree_chk_error").hide();
            var amount = $("#amount").val();
            var name = $("#name").val();
            var billingId = $("#billingId").val();
           
            var options = {
                "key": "rzp_test_RGeJBHpM5062FI",
                "amount": amount * 100, // Razorpay expects paise, so ₹100 → 10000
                "currency": "INR",
                "name": name,
                "description": "Razorpay payment",
                "image": "https://cdn.razorpay.com/logos/NSL3kbRT73axfn_medium.png",
                "prefill": {
                    "name": "ABC",
                    "email": "abc@gmail.com"
                },
                "theme": {
                    "color": "#0F408F"
                },
                "handler": function (res) {
                    $.ajax({
                        url: "/subscriptions/createorder",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "razorpay_payment_id": res.razorpay_payment_id,
                            "razorpay_order_id": res.razorpay_order_id,
                            "razorpay_signature": res.razorpay_signature,
                            "billingId":billingId
                        },
                        success: function (resp) {
                            console.log('Payment data sent to server', resp);
                           
                            if (resp.success === true) {
                                window.location.href = '/subscriptions/thank-you/'+ resp.lastId; // redirect on success
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log('Error sending payment info:', textStatus, errorThrown);
                        }
                    });
                },
                "modal": {
                    "ondismiss": function () {
                        window.location.href = '/subscriptions/list'; // Redirect on close
                    }
                }
            };
    
            var rzp = new Razorpay(options);
            rzp.open();
    
            rzp.on('payment.failed', function (response) {
                console.log('Payment failed', response);
    
                $.ajax({
                    url: "{{ route('failed') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "error": response.error,
                        "reason": response.error.reason,
                        "billingId": billingId,
                        "amount":amount
                        
                    },
                    success: function (resp) {
                        console.log('Payment failure sent to server', resp);
                        if (resp.success === true) {
                            window.location.href = '/subscriptions/list';
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log('Error sending failure info:', textStatus, errorThrown);
                    }
                });
            });
        }
    };
</script>
  
    @endsection
    