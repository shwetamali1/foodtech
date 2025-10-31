<form action="{{ route('store') }}" method="POST">
    @csrf
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
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
                    <!--<div class="plan-description">{{ $editRec->description }}</div>-->
                  </div>
                </div>
            
                <div class="price-row">
                  <div>Price</div>
                  <div>{{ $editRec->price }}</div>
                </div>
            
                
                <div class="price-row">
                    <input type="checkbox" name="terms" id="terms">  I Agree Terms & Conditions
                </div>
                <div style="display:none; color:red" id="agree_chk_error">
                  Can't proceed as you didn't agree to the terms!
                 </div>
                <hr>
            
                <div class="price-row total">
                  <div>Total</div>
                  <div><?php 
                  $mprice = str_replace('RS', '', $editRec->price);
                  if(!empty($editRec->discount)){ $discount = $editRec->discount; } else{ $discount = 0; }
                  $dis = ($mprice * $discount)/100;
                  if(!empty($editRec->per)){ $per = $editRec->per; } else{ $per = 0; } 
                  $price = $mprice - $dis;
                  echo number_format($price, 2).' RS';
                  ?>
                  </div>
                </div>
                
                <button id="payBtn" class="checkout-btn">Proceed To Checkout → </button>
                
                <!--<button class="checkout-btn">-->
                <!--  Proceed To Checkout →-->
                <!--</button>-->
            </div>
          
        </div>
      </div>
    </div>
</form>

 


