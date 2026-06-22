@extends('layouts.master')
  <style>
      .plan-box h4{
          font-size: 20px !important;
      }
  </style>
  @section('content')    
      <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Subscriptions</h3></div>
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
                      <?php if($role_id != 8) { ?>
                    <div class="card-header d-flex justify-content-between align-items-right">
                      <!--<div class="card-title mb-0">Plans</div>-->
                      <a class="btn btn-primary" href="{{ URL::to('/subscriptions/add') }}">+ Add Plan</a>
                    </div>
                    <?php } ?>
                    <div class="card-body">
                      <div class="row g-4">
                        <?php foreach ($showRec as $plan) { 
                        ?>
                        <div class="col-sm-4 mb-3">
                          <div class="plan-box">
                            <h3>{{ $plan->title }} <span>{{ $plan->offer }}% off</span></h3>
                            <p>{{ $plan->description }}</p>
                            <?php if(!empty($plan->per)) { $per = $plan->per.' /'; } else{ $per = ''; } ?>
                            <h4>{{ $plan->price }}</span></h4>
                            <?php if($role_id != 8) { ?>
                            <a href="/subscriptions/edit/{{ $plan->id }}" class="btn btn-primary">Edit</a>
                            <?php } else { 
                            if($plan->payment_status !='' && $plan->r_payment_id !='') {
                            ?>
                            <a href="javascript:;" class="btn btn-success" style="color:#FFF;">Active</a>
                            <?php } else { ?>
                            <a href="/subscriptions/subscribe/{{ $plan->id }}" class="btn btn-primary">Subscribe</a>
                            <?php } } ?>
                            <?php if(!empty($plan->credits)){ ?>
                            <ul>
                              <h3>Credits Includes </h3>
                              <li>{{ $plan->credits }} Credits/Month (~60 videos)</li>
                            </ul>
                            <?php } ?>
                            <ul>
                              <h3>Everything in {{ $plan->title }} </h3>
                              <?php $array = json_decode($plan->features, true);

                                $fea = isset($array[0]) ? str_replace(["\r\n", "\n", "\r"], "<li>", $array[0]) : '';
                                $features = explode("<li>",$fea);

                              ?>
                              @foreach($features as $feature)
                                <li>{{ $feature }}</li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                        <?php } ?>
                        
                
                      </div>
                    </div>
                  </div>
                </div>

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->

@endsection
    