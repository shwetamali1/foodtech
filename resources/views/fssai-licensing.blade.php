<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FSSAI License Service</title>

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@extends('layouts.head-css')
<link href="{{ URL::asset('assets/front/css/license.css') }}" rel="stylesheet" type="text/css" />

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
<h1>FSSAI License Services</h1>
<p>Fast, simple & expert-led food license approval

</p>

<button class="btn btn-primary">Get Started Free</button>
<button class="btn btn-outline">Explore Services</button>
</div>

<div class="hero-img">
<img src="https://placehold.co/1000x700?text=Dashboard+Preview">
</div>

</div>
</section>


<!-- BENEFITS -->
<section class="fssai-section bg-white">
<div class="container">
<h2>Why FSSAI License?</h2>

<div class="fssai-grid">
<div class="fssai-card">
<i class="fas fa-check-circle"></i>
<h3>Legal Approval</h3>
<p>Operate your food business legally</p>
</div>

<div class="fssai-card">
<i class="fas fa-users"></i>
<h3>Build Trust</h3>
<p>Gain customer confidence</p>
</div>

<div class="fssai-card">
<i class="fas fa-shield-alt"></i>
<h3>Food Safety</h3>
<p>Ensure hygiene compliance</p>
</div>

<div class="fssai-card">
<i class="fas fa-exclamation-triangle"></i>
<h3>Avoid Penalties</h3>
<p>Stay protected from fines</p>
</div>
</div>
</div>
</section>

<!-- TYPES -->
<section class="fssai-section">
<div class="container">
<h2>License Types</h2>

<div class="fssai-grid">
<div class="fssai-card">
<i class="fas fa-store"></i>
<h3>Basic</h3>
<p>Small vendors (₹12L)</p>
</div>

<div class="fssai-card">
<i class="fas fa-warehouse"></i>
<h3>State</h3>
<p>Medium business</p>
</div>

<div class="fssai-card">
<i class="fas fa-industry"></i>
<h3>Central</h3>
<p>Large enterprises</p>
</div>
</div>
</div>
</section>

<!-- STEPS -->
<section class="fssai-section bg-white">
<div class="container">
<h2>How It Works</h2>

<div class="fssai-steps">
<div class="fssai-step">
<i class="fas fa-user-plus"></i>
<p>Register</p>
</div>

<div class="fssai-step">
<i class="fas fa-list"></i>
<p>Select Service</p>
</div>

<div class="fssai-step">
<i class="fas fa-file-upload"></i>
<p>Upload Docs</p>
</div>

<div class="fssai-step">
<i class="fas fa-check"></i>
<p>Get Approved</p>
</div>
</div>
</div>
</section>


<!-- PRICING -->
<section class="section bg-grey">
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
  
<!-- CTA -->
<section class="fssai-cta">
<div class="container">
<h2>Start Your License Today 🚀</h2>
<a href="#" class="fssai-btn fssai-btn-primary">Get Started</a>
</div>
</section>

</main>

<script>
function toggleFAQ(el){
    let ans = el.querySelector(".faq-answer");
    ans.style.display = ans.style.display === "block" ? "none" : "block";
}
</script>

</body>
</html>