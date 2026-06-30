@extends('layouts.master')

@section('content')

<style>
.success-outer { min-height: 70vh; display: flex; align-items: center; justify-content: center; padding: 40px 16px; }
.success-card {
    background: #fff; border-radius: 24px; box-shadow: 0 12px 50px rgba(2,43,80,0.11);
    padding: 56px 48px 48px; text-align: center; max-width: 520px; width: 100%; position: relative; overflow: hidden;
}
.success-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px;
    background: linear-gradient(90deg, #28a745, #20c997);
}
.success-circle {
    width: 90px; height: 90px; background: linear-gradient(135deg, #28a745, #20c997); border-radius: 50%;
    display: flex; align-items: center; justify-content: center; margin: 0 auto 26px;
    animation: popIn 0.55s cubic-bezier(0.26, 0.53, 0.74, 1.48) both; box-shadow: 0 8px 28px rgba(40,167,69,0.3);
}
.success-circle i { color: #fff; font-size: 38px; }
@keyframes popIn { 0% { transform: scale(0); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
.success-title { font-size: 1.7rem; font-weight: 800; color: #101010; margin-bottom: 10px; }
.success-subtitle { font-size: 0.97rem; color: #6c757d; margin-bottom: 32px; line-height: 1.65; }
.success-actions { display: flex; flex-direction: column; gap: 12px; }
.btn-continue-dash {
    display: block; background: linear-gradient(135deg, #022B50, #0a4a8a); color: #fff; border: none;
    border-radius: 13px; padding: 14px; font-weight: 700; font-size: 0.95rem; font-family: 'Quicksand', sans-serif;
    text-decoration: none; text-align: center;
}
.btn-continue-dash:hover { background: linear-gradient(135deg, #011f3d, #022B50); color: #FFD21B; text-decoration: none; }
.btn-view-subs {
    display: block; background: #f4f7fb; color: #022B50; border: 1.5px solid #e4eaf2; border-radius: 13px;
    padding: 13px; font-weight: 700; font-size: 0.92rem; font-family: 'Quicksand', sans-serif; text-decoration: none; text-align: center;
}
.btn-view-subs:hover { background: #e9ecef; color: #022B50; text-decoration: none; }
</style>

<div class="app-content">
    <div class="container-fluid">
        <div class="success-outer">
            <div class="success-card">

                <div class="success-circle">
                    <i class="bi bi-check-lg"></i>
                </div>

                <div class="success-title">Payment Successful!</div>
                <p class="success-subtitle">
                    Your add-on credits have been added to your account and are ready to use
                    on your next food label validation submission.
                </p>

                <div class="success-actions">
                    <a href="/label-validation/create" class="btn-continue-dash">
                        <i class="bi bi-patch-check-fill me-2"></i>Submit a Food Label
                    </a>
                    <a href="/addon-services/list" class="btn-view-subs">
                        <i class="bi bi-puzzle me-2"></i>Browse More Add-ons
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
