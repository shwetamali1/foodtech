<form action="{{ route('store') }}" method="POST">
    @csrf
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7 col-md-9">

            <div class="card border-0" style="border-radius:22px; overflow:hidden; box-shadow:0 8px 40px rgba(2,43,80,0.11);">

                {{-- Card Header --}}
                <div class="card-header border-0 py-4 px-4"
                     style="background: linear-gradient(135deg, #022B50 0%, #0a4a8a 100%);">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:50px;height:50px;background:rgba(255,210,27,0.15);border:1px solid rgba(255,210,27,0.3);border-radius:13px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <i class="bi bi-wallet2" style="color:#FFD21B;font-size:22px;"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 text-white fw-bold" style="font-size:1.05rem;">Order Summary</h5>
                            <p class="mb-0" style="color:rgba(255,255,255,0.6);font-size:0.82rem;">Review your plan before proceeding to payment</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">

                    {{-- Plan Info Card --}}
                    <div class="d-flex align-items-center gap-3 p-3 mb-4 rounded-3"
                         style="background:#f4f7fb;border:1.5px solid #e4eaf2;">
                        <div style="width:46px;height:46px;background:linear-gradient(135deg,#022B50,#0a4a8a);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <img src="https://img.icons8.com/ios-filled/30/ffffff/wallet.png" alt="plan" style="width:20px;">
                        </div>
                        <div>
                            <div class="fw-bold" style="color:#022B50;font-size:0.98rem;">{{ $editRec->title }}</div>
                            <div class="text-muted" style="font-size:0.82rem;">{{ $editRec->description }}</div>
                        </div>
                    </div>

                    {{-- Price Breakdown --}}
                    <?php
                    $mprice   = (float) str_replace('RS', '', $editRec->price);
                    $discount = !empty($editRec->discount) ? (float)$editRec->discount : 0;
                    $dis      = ($mprice * $discount) / 100;
                    $govt_fee = !empty($editRec->government_fee) ? (float)$editRec->government_fee : 0;
                    ?>
                    <div class="rounded-3 overflow-hidden mb-4" style="border:1.5px solid #e4eaf2;">

                        <div class="d-flex justify-content-between align-items-center px-3 py-2"
                             style="border-bottom:1px solid #f0f0f0;">
                            <span style="font-size:0.88rem;color:#6c757d;">Base Price</span>
                            <span class="fw-600" style="font-size:0.92rem;color:#101010;font-weight:600;">{{ $editRec->price }}</span>
                        </div>

                        @if($discount > 0)
                        <div class="d-flex justify-content-between align-items-center px-3 py-2"
                             style="border-bottom:1px solid #f0f0f0;">
                            <span style="font-size:0.88rem;color:#6c757d;">
                                Discount ({{ $editRec->discount }}%)
                            </span>
                            <span class="fw-600" style="font-size:0.92rem;color:#198754;font-weight:600;">
                                &minus; <?php echo number_format($dis, 2); ?> RS
                            </span>
                        </div>
                        @endif

                        <?php if ($govt_fee > 0): ?>
                        <div class="d-flex justify-content-between align-items-center px-3 py-2"
                             style="border-bottom:1px solid #f0f0f0;">
                            <span style="font-size:0.88rem;color:#6c757d;">Government Fee</span>
                            <span class="fw-600" style="font-size:0.92rem;color:#101010;font-weight:600;">
                                <?php echo number_format($govt_fee, 2); ?> RS
                            </span>
                        </div>
                        <?php endif; ?>

                        {{-- Total Row --}}
                        <div class="d-flex justify-content-between align-items-center px-3 py-3"
                             style="background:linear-gradient(135deg,#022B50,#0a4a8a);">
                            <span class="text-white fw-bold" style="font-size:0.92rem;">Total Payable</span>
                            <span class="fw-bold" style="color:#FFD21B;font-size:1.22rem;">
                                RS&nbsp;<?php echo number_format($mprice - $dis + $govt_fee, 2); ?>
                            </span>
                        </div>

                    </div>

                    {{-- Terms Checkbox --}}
                    <div class="d-flex align-items-start gap-3 p-3 mb-2 rounded-3"
                         style="background:#fffbeb;border:1.5px solid rgba(255,210,27,0.35);">
                        <input class="form-check-input mt-1" type="checkbox" name="terms" id="terms"
                               style="border-color:#022B50;width:18px;height:18px;cursor:pointer;flex-shrink:0;">
                        <label class="form-check-label" for="terms"
                               style="font-size:0.88rem;color:#4B4B4B;cursor:pointer;line-height:1.55;">
                            I have read and agree to the
                            <a href="#" style="color:#022B50;font-weight:700;text-decoration:underline;">Terms &amp; Conditions</a>
                        </label>
                    </div>
                    <div id="agree_chk_error" style="display:none;color:#dc3545;font-size:0.82rem;padding:4px 6px;">
                        <i class="bi bi-exclamation-circle me-1"></i>Please agree to the Terms &amp; Conditions to continue.
                    </div>

                    {{-- Pay Button --}}
                    <button id="payBtn" type="button" class="btn w-100 mt-3 py-3"
                            style="background:linear-gradient(135deg,#022B50,#0a4a8a);color:#fff;border:none;border-radius:14px;font-size:0.97rem;font-family:'Quicksand',sans-serif;font-weight:700;letter-spacing:0.3px;transition:all 0.3s;">
                        <i class="bi bi-shield-lock me-2"></i>Proceed to Secure Checkout
                    </button>

                    <p class="text-center text-muted mt-3 mb-0" style="font-size:0.78rem;">
                        <i class="bi bi-lock-fill me-1"></i>256-bit SSL encrypted &middot; Secured by Razorpay
                    </p>

                </div>
            </div>

        </div>
    </div>
</form>
