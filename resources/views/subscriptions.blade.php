<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
  <style>
      .plan-box h4{
          font-size: 20px !important;
      }
      #preloader {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Loader Animation */
.loader {
    border: 8px solid #f3f3f3; /* Light gray */
    border-top: 8px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
  </style>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <main>

<!-- header -->
@include('layouts.header-menu')
<!-- end header -->

<section class="bannerbox2" style="height:70vh !important">
  <div class="container">
    <div class="col-lg-7 mx-auto">
  <h1>SUBSCRIBE FOR <br>EXCLUSIVE UPDATES</h1>
  <p style="color:#FFF;">Join our community! Subscribe now for exclusive updates, offers, and insights delivered straight to your inbox.</p>  
  <form class="banner-email" action="emailSubscribe" method="POST">
      @csrf
 <input class="form-control" name="email" type="text" placeholder="Enter your email">
 <button type="submit">Subscribe</button>
  </form>
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ $errors->first('email') }}
    </div>
@endif
</div>
</div>
</section>

 

<!-- Plan -->
<section class="plan-section headingh2">
  <div class="container">
   <h2> Perfect Plan for Your Needs</h2>
   <p>Choose a subscription that aligns with your business goals and start 
managing your food operations with ease today!</p>

<!--<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-3 mt-4">-->

      <!--<div class="col">-->
      <!--  <div class="plan-box">-->
      <!--  <h3>Free <span>First Month Free</span></h3>-->
      <!--  <p>Get started with your food business effortlessly using our Free Food License Plan.</p>-->
      <!--  <h4>$0 <span>+govt fee</span></h4>-->
      <!--  <a href="#">Start For Free</a>-->
      <!--  <ul>-->
      <!--    <h3>Plan Includes:</h3>-->
      <!--    <li>New FSSAI License Application</li>-->
      <!--    <li>Food License Renewal</li>-->
      <!--  </ul>-->
      <!--</div>-->
      <!--</div>-->


      <!-- <div class="col">-->
      <!--  <div class="plan-box plan-box2">-->
      <!--  <h3>Starter <span>First Month 75% Off</span></h3>-->
      <!--  <p>Our Starter Plan is designed for businesses that need more support and features to smoothly navigate.</p>-->
      <!--  <h4>$6.25 <span>+govt fee</span></h4>-->
      <!--  <a href="#">Start Today</a>-->
      <!--  <ul>-->
      <!--    <h3>Everything in Membership Plus:</h3>-->
      <!--    <li>New FSSAI License Application</li>-->
      <!--    <li>Food License Renewal</li>-->
      <!--    <li>Food License Annual Return Filing</li>-->
      <!--    <li>Food Labels Validation Services</li>-->
      <!--  </ul>-->
      <!--</div>-->
      <!--</div>-->

      <!-- <div class="col">-->
      <!--  <div class="plan-box">-->
      <!--  <h3>Premium <span>First Month 50% Off</span></h3>-->
      <!--  <p>Our Premium Plan offers a comprehensive solution to ensure your food license application is smooth, quick, and stress-free.</p>-->
      <!--  <h4>$10.99 <span>+govt fee</span></h4>-->
      <!--  <a href="#">Start Today</a>-->
      <!--  <ul>-->
      <!--    <h3>Everything in Starter Plus:</h3>-->
      <!--    <li>New FSSAI License Application</li>-->
      <!--    <li>Food License Renewal</li>-->
      <!--    <li>Food License Annual Return Filing</li>-->
      <!--    <li>Food Labels Validation Services</li>-->
      <!--    <li>Reply to FSSAI Notice from Food Experts</li>-->
      <!--    <li>Food License Modification</li>-->

      <!--  </ul>-->
      <!--</div>-->
      <!--</div>-->
        <div class="row g-4">
                        <?php foreach ($showRec as $plan) { ?>
                        <div class="col-sm-4 mb-3">
                          <div class="plan-box">
                            <h3>{{ $plan->title }} <span>{{ $plan->offer }}% off</span></h3>
                            <p>{{ $plan->description }}</p>
                            <h4>{{ $plan->price }}</span></h4>
                            
                            <a href="/login/admin" class="btn btn-primary">Subscribe</a>
                           <?php if(!empty($plan->credits)){ ?>
                            <ul>
                              <h3>Credits Includes:</h3>
                              <li>{{ $plan->credits }} Credits/Month (~60 videos)</li>
                            </ul>
                            <?php } ?>
                            <ul>
                                
                              <h3>Everything in {{ $plan->title }}:</h3>
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

      
    <!--</div>-->

    

  </div>
</section>

@extends('layouts.footer')


  </body>
</html>
