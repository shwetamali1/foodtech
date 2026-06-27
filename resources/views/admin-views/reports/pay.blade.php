@extends('layouts.master')
  <style>
      .plan-box h4{
          font-size: 22px !important;
      }
      #payment-loader {
          display: none;
          position: fixed;
          inset: 0;
          background: rgba(0, 0, 0, 0.75);
          z-index: 99999;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          gap: 20px;
      }
      #payment-loader.active {
          display: flex;
      }
      #payment-loader .spinner {
          width: 60px;
          height: 60px;
          border: 6px solid rgba(255,255,255,0.2);
          border-top-color: #fff;
          border-radius: 50%;
          animation: spin 0.9s linear infinite;
      }
      #payment-loader .loader-text {
          color: #fff;
          font-size: 18px;
          font-weight: 600;
          text-align: center;
          line-height: 1.6;
      }
      #payment-loader .loader-sub {
          color: #ffd21b;
          font-size: 14px;
          text-align: center;
      }
      @keyframes spin { to { transform: rotate(360deg); } }
  </style>

  @section('content')

  {{-- Payment Processing Loader --}}
  <div id="payment-loader">
      <div class="spinner"></div>
      <div class="loader-text">Processing your payment...</div>
      <div class="loader-sub">&#9888; Please do not refresh or close this page</div>
  </div>    
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
                    // $mprice = str_replace('RS', '', $editRec->price);
                    // if(!empty($editRec->discount)){ $discount = $editRec->discount; } else{ $discount = 0; }
                    // $dis = ($mprice * $discount)/100;
                    // $price = $mprice - $dis;
                    // $price2 = number_format($price, 2);
                    
                    $price = str_replace(' RS', '', $editRec->price);
                ?>
                <input type="hidden" name="amount" id="amount" value="<?php echo $price ?>">
                <input type="hidden" name="name" id="name" value="<?php echo $billingData->first_name .' '.$billingData->last_name ?>">
                <input type="hidden" name="billingId" id="billingId" value="<?php echo $billingData->id ?>">
            <!--begin::Row-->
              @include('admin-views.components.razorpay-form-reports')

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
            var amount = $("#amount").val();
            var name = $("#name").val();
            var billingId = $("#billingId").val();
           
            var options = {
                "key": "{{ env('RAZORPAY_KEY') }}",
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
                    document.getElementById('payment-loader').classList.add('active');
                    $.ajax({
                        url: "/reports/createorder",
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "razorpay_payment_id": res.razorpay_payment_id,
                            "razorpay_order_id": res.razorpay_order_id,
                            "razorpay_signature": res.razorpay_signature,
                            "billingId": billingId,
                            "amount": amount
                        },
                        success: function (resp) {
                            if (resp.success === true) {
                                window.location.href = '/reports/thank-you/'+ resp.lastId;
                            } else {
                                document.getElementById('payment-loader').classList.remove('active');
                                alert('Payment verification failed. Please contact support.');
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            document.getElementById('payment-loader').classList.remove('active');
                            alert('An error occurred. Please contact support.');
                        }
                    });
                },
                "modal": {
                    "ondismiss": function () {
                        window.location.href = '/reports/list'; // Redirect on close
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
                            window.location.href = '/reports/list';
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
    