@extends('layouts.master')
  <style>
      #payment-loader {
          display: none;
          position: fixed;
          inset: 0;
          background: rgba(2,43,80,0.88);
          backdrop-filter: blur(4px);
          z-index: 99999;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          gap: 18px;
      }
      #payment-loader.active { display: flex; }
      #payment-loader .spinner {
          width: 64px; height: 64px;
          border: 5px solid rgba(255,255,255,0.15);
          border-top-color: #FFD21B;
          border-radius: 50%;
          animation: spin 0.85s linear infinite;
      }
      #payment-loader .loader-text {
          color: #fff;
          font-size: 17px;
          font-weight: 700;
          text-align: center;
          line-height: 1.6;
      }
      #payment-loader .loader-sub {
          color: #FFD21B;
          font-size: 13px;
          text-align: center;
          opacity: 0.9;
      }
      @keyframes spin { to { transform: rotate(360deg); } }

      #payBtn:hover {
          background: linear-gradient(135deg, #011f3d, #022B50) !important;
          color: #FFD21B !important;
          transform: translateY(-2px);
          box-shadow: 0 8px 24px rgba(2,43,80,0.3);
      }
  </style>

  @section('content')

  {{-- Payment Processing Loader --}}
  <div id="payment-loader">
      <div class="spinner"></div>
      <div class="loader-text">Processing your payment...</div>
      <div class="loader-sub">&#9888; Please do not refresh or close this page</div>
  </div>

  <div class="app-content-header">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Payment</h3></div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{ url('subscriptions/list') }}">Subscriptions</a></li>
                      <li class="breadcrumb-item active">Payment</li>
                  </ol>
              </div>
          </div>
      </div>
  </div>

  <div class="app-content">
      <div class="container-fluid">
          <?php
              $mprice   = (float) str_replace('RS', '', $editRec->price);
              $discount = !empty($editRec->discount) ? (float)$editRec->discount : 0;
              $dis      = ($mprice * $discount) / 100;
              $govt_fee = !empty($editRec->government_fee) ? (float)$editRec->government_fee : 0;
              $price    = $mprice - $dis + $govt_fee;
          ?>
          {{-- These hidden fields are read by the Razorpay JS below --}}
          <input type="hidden" id="amount"    value="{{ $price }}">
          <input type="hidden" id="name"      value="{{ $billingData->first_name . ' ' . $billingData->last_name }}">
          <input type="hidden" id="billingId" value="{{ $billingData->id }}">
          <input type="hidden" id="userEmail" value="{{ $billingData->email }}">

          {{-- Razorpay order-summary card --}}
          @include('admin-views.components.razorpay-form')
      </div>
  </div>

  {{-- Render these URLs server-side so JS always has authenticated, CSRF-safe paths --}}
  <input type="hidden" id="urlList"     value="{{ url('subscriptions/list') }}">
  <input type="hidden" id="urlThankyou" value="{{ url('subscriptions/thank-you') }}">
  <input type="hidden" id="urlOrder"    value="{{ url('subscriptions/createorder') }}">
  <input type="hidden" id="urlFailed"   value="{{ url('subscriptions/paymentfailed') }}">
  <input type="hidden" id="csrfToken"   value="{{ csrf_token() }}">

  <script>
  document.getElementById('payBtn').onclick = function (e) {

      if (!$("#terms").is(':checked')) {
          $("#agree_chk_error").show();
          return false;
      }

      e.preventDefault();
      $("#agree_chk_error").hide();

      var amount    = $("#amount").val();
      var name      = $("#name").val();
      var email     = $("#userEmail").val();
      var billingId = $("#billingId").val();
      var csrfToken = $("#csrfToken").val();
      var urlList   = $("#urlList").val();
      var urlOrder  = $("#urlOrder").val();
      var urlFailed = $("#urlFailed").val();
      var urlThankyou = $("#urlThankyou").val();

      var options = {
          "key": "rzp_test_RGeJBHpM5062FI",
          "amount": Math.round(amount * 100),
          "currency": "INR",
          "name": "Food Tech Mate",
          "description": "Subscription Payment",
          "image": "https://cdn.razorpay.com/logos/NSL3kbRT73axfn_medium.png",
          "prefill": {
              "name":  name,
              "email": email
          },
          "theme": { "color": "#022B50" },

          "handler": function (res) {
              document.getElementById('payment-loader').classList.add('active');
              $.ajax({
                  url:      urlOrder,
                  type:     'POST',
                  dataType: 'json',
                  data: {
                      "_token":               csrfToken,
                      "razorpay_payment_id":  res.razorpay_payment_id,
                      "razorpay_order_id":    res.razorpay_order_id,
                      "razorpay_signature":   res.razorpay_signature,
                      "billingId":            billingId
                  },
                  success: function (resp) {
                      if (resp.success === true) {
                          window.location.href = urlThankyou + '/' + resp.lastId;
                      } else {
                          document.getElementById('payment-loader').classList.remove('active');
                          alert('Payment verification failed. Please contact support.');
                      }
                  },
                  error: function () {
                      document.getElementById('payment-loader').classList.remove('active');
                      alert('An error occurred. Please contact support.');
                  }
              });
          },

          "modal": {
              {{-- ondismiss: user closed Razorpay without paying → go back to plan list --}}
              "ondismiss": function () {
                  window.location.href = urlList;
              }
          }
      };

      var rzp = new Razorpay(options);
      rzp.open();

      rzp.on('payment.failed', function (response) {
          $.ajax({
              url:      urlFailed,
              type:     'POST',
              dataType: 'json',
              data: {
                  "_token":   csrfToken,
                  "error":    response.error,
                  "reason":   response.error.reason,
                  "billingId": billingId,
                  "amount":   amount
              },
              success: function (resp) {
                  if (resp.success === true) {
                      window.location.href = urlList;
                  }
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  console.error('Error sending failure info:', textStatus, errorThrown);
              }
          });
      });
  };
  </script>

  @endsection
