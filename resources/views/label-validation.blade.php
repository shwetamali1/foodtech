<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FSSAI License Service</title>

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@extends('layouts.head-css')
<link href="{{ URL::asset('assets/front/css/label.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
<main>

<!-- header (UNCHANGED) -->
<header>
 <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/home"><img src="{{ URL::asset('assets/img/logo1.png') }}" alt="Logo"></a>
      
      <a href="/login/admin" class="loginbox mobileicon"><i class="fa fa-user" style="font-size:24px"></i></a>

       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarsExample07">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="/home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/subscriptions">Subscriptions</a></li>
          <li class="nav-item"><a class="nav-link" href="/reports">Food Business Plans</a></li>
          <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
        </ul>
      </div>

      <a href="/login/admin" class="loginbox desktoplogin">Log In</a>
    </div>
  </nav>
</header>
<!-- HERO -->


<section class="hero bg-grey">
<div class="container hero-wrap">

<div class="hero-text">
<h1>Food Label Validation</h1>
<p>Ensure your food labels comply with FSSAI regulations and avoid legal risks, penalties, and product rejection in the market.
</p>

<button class="btn btn-primary">Get Started Free</button>
<button class="btn btn-outline">Explore Services</button>
</div>

<div class="hero-img">
<img src="https://placehold.co/1000x700?text=Dashboard+Preview">
</div>

</div>
</section>
<!-- ABOUT -->
<!-- ABOUT -->
<section class="flv-section bg-white">
    <div class="container">

        <div class="flv-section-title" >

            <h2>
                <i class="fas fa-info-circle"></i>
                What is Label Validation?
            </h2>

            <p>
                Food label validation ensures that your packaging complies with all
                mandatory FSSAI labeling requirements including ingredients,
                nutritional values, allergens, symbols and license details.
            </p>

        </div>

    </div>
</section>

<!-- SERVICES -->
<section class="flv-section flv-light-bg bg-grey">
    <div class="container">

        <div class="flv-section-title">

            <h2>
                <i class="fas fa-check-double"></i>
                What We Validate
            </h2>

            <p>
                Our experts review every important aspect of your food label
                to ensure complete compliance with FSSAI standards.
            </p>

        </div>

        <div class="flv-grid">

            <div class="flv-card">
                <i class="fas fa-list"></i>
                <h4>Ingredients</h4>

                <p>
                    We verify that all ingredients are declared in the correct order
                    according to FSSAI labeling guidelines.
                </p>
            </div>

            <div class="flv-card">
                <i class="fas fa-apple-alt"></i>

                <h4>Nutrition</h4>

                <p>
                    Validation of nutritional information including energy,
                    fat, protein and carbohydrate values.
                </p>
            </div>

            <div class="flv-card">
                <i class="fas fa-certificate"></i>

                <h4>FSSAI License</h4>

                <p>
                    Checking proper placement of FSSAI logo and license number.
                </p>
            </div>
      <div class="flv-card">
            <i class="fas fa-leaf"></i>
            <h4>Veg Symbol</h4>
            <p>
                Ensuring correct usage and visibility of veg or non-veg
                symbol on product packaging.
            </p>
        </div>

          <div class="flv-card">
            <i class="fas fa-exclamation-triangle"></i>
            <h4>Allergens</h4>
            <p>
                Verification of mandatory allergen declarations to ensure
                consumer safety and compliance.
            </p>
        </div>

          <div class="flv-card">
            <i class="fas fa-calendar"></i>
            <h4>Date Info</h4>
            <p>
                Validation of manufacturing date, expiry date and batch details
                for proper traceability.
            </p>
        </div>
            

        </div>

    </div>
</section>

<!-- PRICING -->
<section class="section bg-white">
<h2>Choose Your Plan</h2>

<div class="container pricing">

@foreach($plans as $plan)

    <div class="price {{ $loop->index == 1 ? 'active' : '' }}">

        <h3>{{ $plan->title }}</h3>

        {{-- <p class="plan-offer">
            Save {{ $plan->offer }}% | {{ $plan->discount }}% OFF
        </p> --}}

        <p class="amt">₹{{ $plan->price }}</p>

        <p class="plan-desc">{{ $plan->description }}</p>
<?php $array = json_decode($plan->features, true);

                                $fea = isset($array[0]) ? str_replace(["\r\n", "\n", "\r"], "<li>", $array[0]) : '';
                                $features = explode("<li>",$fea);

                              ?>
                              @foreach($features as $feature)
                                <p class="plan-features-text">{{ $feature }}</p>
                              @endforeach
      

        <button class=" {{ $loop->index == 1 ? 'loginbox btn' : 'btn btn-primary' }}" style="margin-top:15px;" >
            Get Started
        </button>

    </div>

@endforeach

</div>
</section>


<!-- FAQ -->
<section class="section bg-grey">
<div class="container">

    <div class="section-title">
        <h2><i class="fas fa-question-circle"></i> FAQs</h2>

        <p>
            Common questions related to food label validation and FSSAI compliance.
        </p>
    </div>

    <div class="faq">

        <div class="faq-item">
            <div class="faq-question">
                <span>
                    <i class="fas fa-question"></i>
                    Is label validation mandatory?
                </span>

                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="faq-answer">
                Yes, incorrect labeling may result in penalties, legal issues,
                or rejection of products in the market.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>
                    <i class="fas fa-question"></i>
                    How long does validation take?
                </span>

                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="faq-answer">
                Usually the process takes 1–3 working days depending on the
                complexity of the label.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                <span>
                    <i class="fas fa-question"></i>
                    Why is allergen declaration important?
                </span>

                <i class="fas fa-chevron-down"></i>
            </div>

            <div class="faq-answer">
                Proper allergen labeling protects consumers and helps brands
                comply with food safety regulations.
            </div>
        </div>

    </div>

</div>
</section>
</main>
<script>
document.querySelectorAll(".faq-item").forEach(item => {

    item.onclick = () => {

        let answer = item.querySelector(".faq-answer");

        answer.style.display =
        answer.style.display === "block" ? "none" : "block";

    };

});
</script>
</body>
</html>