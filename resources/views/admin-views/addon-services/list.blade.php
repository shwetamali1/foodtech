@extends('layouts.master')

<style>
.sub-page-header {
    background: linear-gradient(135deg, #022B50 0%, #0a4a8a 100%);
    border-radius: 18px;
    padding: 28px 32px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
}
.sub-page-header h2 { color: #fff; font-weight: 700; font-size: 1.35rem; margin: 0; }
.sub-page-header .breadcrumb { margin: 0; }
.sub-page-header .breadcrumb-item a { color: rgba(255,255,255,0.65); text-decoration: none; font-size: 0.85rem; }
.sub-page-header .breadcrumb-item.active { color: #FFD21B; font-size: 0.85rem; }
.btn-add-plan {
    background: #FFD21B; color: #022B50; border: none; border-radius: 10px;
    padding: 10px 22px; font-weight: 700; font-size: 0.88rem; text-decoration: none;
    display: inline-flex; align-items: center; gap: 6px;
}
.btn-add-plan:hover { background: #e6a800; color: #022B50; text-decoration: none; }

.plan-card {
    background: #fff; border-radius: 20px; border: 2px solid transparent;
    box-shadow: 0 4px 20px rgba(2,43,80,0.07); transition: all 0.35s ease;
    overflow: hidden; display: flex; flex-direction: column; height: 100%; position: relative;
}
.plan-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
    background: linear-gradient(90deg, #022B50, #0a4a8a);
}
.plan-card:hover { border-color: rgba(2,43,80,0.18); transform: translateY(-6px); box-shadow: 0 16px 44px rgba(2,43,80,0.12); }
.plan-icon-circle {
    width: 50px; height: 50px; background: linear-gradient(135deg, #022B50, #0a4a8a);
    border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 16px;
}
.plan-icon-circle i { color: #FFD21B; font-size: 20px; }
.plan-card-body { padding: 30px 26px 0; flex: 1; }
.plan-card-title { font-size: 1.15rem; font-weight: 700; color: #101010; margin-bottom: 6px; }
.plan-card-desc { color: #6c757d; font-size: 0.87rem; line-height: 1.6; margin-bottom: 18px; }
.plan-card-price { font-size: 1.75rem; font-weight: 800; color: #022B50; margin-bottom: 4px; line-height: 1; }
.credit-chip {
    display: inline-flex; align-items: center; gap: 6px; background: rgba(255,210,27,0.17);
    color: #8a6500; font-size: 0.78rem; font-weight: 700; padding: 5px 14px; border-radius: 50px; margin-bottom: 16px;
}
.plan-card-footer { padding: 22px 26px 26px; }
.btn-subscribe {
    display: block; width: 100%; background: linear-gradient(135deg, #022B50, #0a4a8a);
    color: #fff; border: none; border-radius: 12px; padding: 13px; font-weight: 700;
    font-size: 0.92rem; font-family: 'Quicksand', sans-serif; text-decoration: none; text-align: center;
}
.btn-subscribe:hover { background: linear-gradient(135deg, #011f3d, #022B50); color: #FFD21B; text-decoration: none; }
.btn-edit-plan {
    display: block; width: 100%; background: #f4f7fb; color: #022B50; border: 1.5px solid #e4eaf2;
    border-radius: 12px; padding: 12px; font-weight: 700; font-size: 0.9rem; font-family: 'Quicksand', sans-serif;
    text-decoration: none; text-align: center;
}
.btn-edit-plan:hover { background: #022B50; color: #FFD21B; border-color: #022B50; text-decoration: none; }
.empty-plans { text-align: center; padding: 70px 20px; color: #adb5bd; }
.empty-plans i { font-size: 3.5rem; margin-bottom: 16px; display: block; }
</style>

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
        <div class="sub-page-header">
            <div>
                <h2><i class="bi bi-puzzle me-2" style="color:#FFD21B;"></i>Add-on Services</h2>
                <ol class="breadcrumb mt-1">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add-on Services</li>
                </ol>
            </div>
            @if($role_id != 8)
                <a href="{{ URL::to('/addon-services/add') }}" class="btn-add-plan">
                    <i class="bi bi-plus-lg"></i> Add New Service
                </a>
            @endif
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success rounded-3 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
        @endif

        @if($role_id == 8)
            <div class="alert alert-info rounded-3 mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-info-circle-fill"></i>
                Need additional label validation credits? Purchase an Add-On Service to continue submitting labels without upgrading your subscription plan.
            </div>
        @endif

        @if(count($showRec) > 0)
        <div class="row g-4">
            @foreach($showRec as $service)
            <div class="col-sm-6 col-xl-4 d-flex">
                <div class="plan-card w-100">
                    <div class="plan-card-body">
                        <div class="plan-icon-circle"><i class="bi bi-lightning-charge-fill"></i></div>
                        <div class="plan-card-title">{{ $service->title }}</div>
                        <p class="plan-card-desc">{{ $service->description }}</p>
                        <div class="plan-card-price">₹{{ number_format((float) str_replace('RS', '', $service->price)) }}</div>
                        @if(!empty($service->label_validation_credit))
                        <div class="credit-chip">
                            <i class="bi bi-patch-check-fill"></i>
                            +{{ $service->label_validation_credit }} label validation{{ $service->label_validation_credit > 1 ? 's' : '' }}
                        </div>
                        @endif
                    </div>
                    <div class="plan-card-footer">
                        @if($role_id != 8)
                            <div class="d-flex gap-2">
                                <a href="/addon-services/edit/{{ $service->id }}" class="btn-edit-plan" style="flex:1;">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </a>
                                <a href="/addon-services/delete/{{ $service->id }}"
                                   class="btn-edit-plan"
                                   style="flex:0 0 auto; background:#fff1f1; color:#dc3545; border-color:#f5c6cb;"
                                   onclick="return confirm('Delete this add-on service?')">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </div>
                        @else
                            <a href="/addon-services/billing-details/{{ $service->id }}" class="btn-subscribe">
                                Buy Now <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <div class="empty-plans">
                <i class="bi bi-puzzle"></i>
                <p>No add-on services available yet.</p>
            </div>
        @endif

    </div>
</div>

@endsection
