<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FSSAI License Service</title>

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@extends('layouts.head-css')

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

<section class="label-root">

<section class="label-hero">
    <div class="label-container">
        <div class="label-hero-content">
            <div>
                <h1 class="light">Get Your FSSAI License Fast & Hassle-Free</h1>
                <p>Expert assistance for FSSAI Registration, State License, Central License, Renewal, Modification and Compliance Documentation across India.</p>
                <div class="label-hero-buttons">
                    <a href="/login/admin" class="label-btn label-btn-secondary">Apply Now</a>
                    <a href="/contact-us" class="label-btn label-btn-primary">Talk to Expert</a>
                </div>
            </div>
            <div class="label-hero-image">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Professional Consulting and FSSAI Compliance">
            </div>
        </div>
    </div>
</section>

<section class="label-stats-wrapper">
    <div class="label-container">
        <div class="label-stats-grid">
            <div class="label-stat-box">
                <h3>500+</h3>
                <p>Licenses Processed</p>
            </div>
            <div class="label-stat-box">
                <h3>98%</h3>
                <p>Approval Rate</p>
            </div>
            <div class="label-stat-box">
                <h3>24/7</h3>
                <p>Expert Consultation</p>
            </div>
            <div class="label-stat-box">
                <h3>India</h3>
                <p>Service Coverage</p>
            </div>
        </div>
    </div>
</section>

<!-- License Types Section -->
<section class="label-license-types">
    <div class="label-container">
        <h2 class="label-license-types-title">License Types</h2>
        
        <div class="label-license-grid">
            <!-- Basic License Card -->
            <div class="label-license-card">
                <div class="label-icon-wrapper">
                    <!-- Shop Icon -->
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6V4H20V6H4ZM2 8L3 14V22H9V16H15V22H21V14L22 8H2ZM13 20H11V14H13V20ZM19 14H17V20H15V14H19ZM9 20H7V14H9V20ZM5 14H7V20H5V14ZM4 10L4.5 12H19.5L20 10H4Z"/>
                    </svg>
                </div>
                <h3 class="label-license-name">Basic</h3>
                <p class="label-license-desc">Small vendors (₹12L)</p>
            </div>

            <!-- State License Card -->
            <div class="label-license-card">
                <div class="label-icon-wrapper">
                    <!-- Warehouse/Building Icon -->
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 3L2 8V21H22V8L12 3ZM4 9.1L12 5.1L20 9.1V19H16V13H8V19H4V9.1ZM14 19H10V15H14V19Z"/>
                    </svg>
                </div>
                <h3 class="label-license-name">State</h3>
                <p class="label-license-desc">Medium business</p>
            </div>

            <!-- Central License Card -->
            <div class="label-license-card">
                <div class="label-icon-wrapper">
                    <!-- Factory Icon -->
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 12V21H2V9L12 12ZM12 12V21H22V9L12 12ZM6 4H8V8L6 7V4ZM16 4H18V8L16 7V4ZM22 7V9L12 12L2 9V7L12 10L22 7ZM10 14V19H14V14H10Z"/>
                    </svg>
                </div>
                <h3 class="label-license-name">Central</h3>
                <p class="label-license-desc">Large enterprises</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="label-step-section">

<div class="label-container">

<div class="label-step-header">
<span>How It Works</span>
<h2>From Sign-Up to Approved in 4 Steps</h2>
<p>
A simple checklist-driven process — we handle filing and
follow-ups with FSSAI so you don't have to.
</p>
</div>


<div class="label-step-grid">

<div class="label-step-item">
<div class="label-step-circle">1</div>

<h4>Register Your Business</h4>

<p>
Share food category, turnover, state.
Takes under 5 minutes.
</p>
</div>



<div class="label-step-item">
<div class="label-step-circle">2</div>

<h4>Choose Your Plan</h4>

<p>
Pick Basic, State or Central.
We recommend the right scope.
</p>
</div>



<div class="label-step-item">
<div class="label-step-circle">3</div>

<h4>Submit Documents</h4>

<p>
Our checklist guides exactly what
to upload.
</p>
</div>



<div class="label-step-item">
<div class="label-step-circle">4</div>

<h4>Track & Get Approved</h4>

<p>
We handle FSSAI follow-ups till
approval arrives.
</p>
</div>


</div>
</div>
</section>

<section class="label-why-section">
    <div class="label-container">
        <h2 class="label-section-title">Why Choose FoodTechMate?</h2>
        <p class="label-section-subtitle">We take the stress out of government compliance so you can focus on cooking and growing.</p>

        <div class="label-why-grid">
            <div class="label-why-card">
                <h4>Expert Consultants</h4>
                <p>Industry professionals with deep regulatory expertise.</p>
            </div>
            <div class="label-why-card">
                <h4>Fast Processing</h4>
                <p>Quick application preparation and priority submission.</p>
            </div>
            <div class="label-why-card">
                <h4>Dedicated Support</h4>
                <p>Personalized assistance throughout the entire process.</p>
            </div>
            <div class="label-why-card">
                <h4>Total Compliance</h4>
                <p>End-to-end support far beyond just the initial licensing.</p>
            </div>
        </div>
    </div>
</section>

<section class="label-faq-section">
    <div class="label-container">
        <h2 class="label-section-title">Frequently Asked Questions</h2>
        <p class="label-section-subtitle">Clear your doubts regarding food licenses and subscription plans on FoodTechMate.</p>

        <div class="label-faq-accordion">
            
            <details class="label-faq-item" open>
                <summary>How does the FSSAI registration process work on FoodTechMate?</summary>
                <div class="label-faq-content">
                    <p>On FoodTechMate, the registration process is designed to make it simple for food business operators (FBOs) without dealing with complicated paperwork.</p>
                    <ul>
                        <li><strong>Step 1:</strong> Sign Up / Login and share basic details about your food category.</li>
                        <li><strong>Step 2:</strong> Choose the right subscription plan (Basic, State, or Central).</li>
                        <li><strong>Step 3:</strong> Upload standard documents (Photo, ID proof, Business registration).</li>
                        <li><strong>Step 4:</strong> Our team prepares and files your application, handling all follow-ups until approval.</li>
                    </ul>
                </div>
            </details>

            <details class="label-faq-item">
                <summary>Can I choose a specific subscription package based on my needs?</summary>
                <div class="label-faq-content">
                    <p>Yes! Our process is designed to be highly flexible. You will find different subscription packages that cover various specific services including basic registration, state licenses, central licenses, annual renewals, and modifications based on your current business turnover and operational scale.</p>
                </div>
            </details>

            <details class="label-faq-item">
                <summary>Is my payment information secure on FoodTechMate?</summary>
                <div class="label-faq-content">
                    <p>Absolutely. Your payment information on FoodTechMate is kept strictly secure. We utilize encrypted, industry-standard payment gateways (PCI-DSS compliant) to process all transactions safely.</p>
                </div>
            </details>

            <details class="label-faq-item">
                <summary>What payment options are available?</summary>
                <div class="label-faq-content">
                    <p>We offer multiple secure payment options to make the subscription process as convenient as possible:</p>
                    <ul>
                        <li><strong>UPI:</strong> Google Pay, PhonePe, Paytm, BHIM, etc.</li>
                        <li><strong>Cards:</strong> Credit & Debit Cards (Visa, Mastercard, RuPay).</li>
                        <li><strong>Net Banking:</strong> Supported by all major Indian banks.</li>
                    </ul>
                </div>
            </details>

        </div>
    </div>
</section>

<section class="label-cta-section">
    <div class="label-container">
        <h2>Ready to Start Your Food Business Legally?</h2>
        <p>Get professional, audit-ready assistance for FSSAI Registration, State License, Central License, Renewal and Compliance Documentation.</p>
        <a href="/login/admin" class="label-btn label-btn-primary" style="padding: 16px 40px; font-size: 18px;">Start Your Application</a>
    </div>
</section>
</main>
</main>
@extends('layouts.footer')
</body>
</html>