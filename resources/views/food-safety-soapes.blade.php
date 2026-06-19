<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FSSAI License Service</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@extends('layouts.head-css')

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f5f7fb;
overflow-x:hidden;
color:#1e293b;
}

section{
padding:80px 0;
}

.container{
max-width:1200px;
margin:auto;
padding:0 15px;
}

/* NAVBAR */

.navbar{
padding:15px 0;
background:#0f172a;
}

.navbar-brand img{
height:55px;
}

.navbar-nav{
margin:auto;
gap:20px;
}

.nav-link{
color:#fff !important;
font-weight:500;
}

.loginbox{
background:#2563eb;
padding:10px 24px;
border-radius:8px;
color:#fff;
text-decoration:none;
font-weight:600;
}

.mobileicon{
display:none;
}

/* HERO */

.hero{
background:linear-gradient(to right,#eef4ff,#ffffff);
}

.hero-wrap{
display:flex;
align-items:center;
justify-content:space-between;
gap:50px;
flex-wrap:wrap;
}

.hero-text{
flex:1;
min-width:300px;
}

.hero-text h1{
font-size:55px;
font-weight:700;
line-height:1.2;
margin-bottom:20px;
color:#0f172a;
}

.hero-text p{
font-size:18px;
color:#64748b;
margin-bottom:30px;
max-width:550px;
}

.hero-img{
flex:1;
min-width:300px;
}

.hero-img img{
width:100%;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.btn-primary{
background:#2563eb;
border:none;
padding:14px 28px;
border-radius:10px;
font-weight:600;
}

.btn-outline{
border:2px solid #2563eb;
padding:12px 28px;
border-radius:10px;
font-weight:600;
color:#2563eb;
background:#fff;
margin-left:10px;
}

.btn-outline:hover{
background:#2563eb;
color:#fff;
}

/* COMMON */

.section-title{
text-align:center;
margin-bottom:50px;
}

.section-title h2{
font-size:42px;
font-weight:700;
margin-bottom:15px;
}

.section-title p{
color:#64748b;
max-width:700px;
margin:auto;
}

/* GRID */

.grid{
display:grid;
gap:25px;
}

.grid-4{
grid-template-columns:repeat(4,1fr);
}

.grid-3{
grid-template-columns:repeat(3,1fr);
}

/* CARDS */

.service-card{
background:#fff;
padding:35px 25px;
border-radius:18px;
text-align:center;
box-shadow:0 5px 20px rgba(0,0,0,0.05);
transition:0.3s;
height:100%;
}

.service-card:hover{
transform:translateY(-8px);
}

.service-card i{
font-size:48px;
color:#2563eb;
margin-bottom:20px;
}

.service-card h3{
font-size:24px;
margin-bottom:10px;
}

.service-card p{
color:#64748b;
font-size:15px;
}

/* WHY */

.why{
background:#eef4ff;
}

/* PROCESS */

.process-step{
text-align:center;
}

.step-number{
width:70px;
height:70px;
border-radius:50%;
background:#2563eb;
display:flex;
align-items:center;
justify-content:center;
color:#fff;
font-size:28px;
font-weight:bold;
margin:auto auto 20px;
}

/* FAQ */
/* FAQ */

.faq-item{
background:#fff;
border-radius:16px;
margin-bottom:18px;
overflow:hidden;
box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.faq-question{
width:100%;
border:none;
background:none;
padding:24px 28px;
display:flex;
justify-content:space-between;
align-items:center;
cursor:pointer;
font-size:18px;
font-weight:600;
color:#0f172a;
}

.faq-question i{
color:#2563eb;
font-size:18px;
transition:0.3s;
}

.faq-answer{
display:none;
padding:0 28px 24px 28px;
}

.faq-answer p{
margin:0;
color:#64748b;
line-height:1.8;
font-size:16px;
}

.faq-item.active .faq-answer{
display:block;
}

/* BLOG */

.blog-card{
background:#fff;
border-radius:18px;
overflow:hidden;
box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.blog-card img{
width:100%;
height:220px;
object-fit:cover;
}

.blog-content{
padding:20px;
}

/* FOOTER */

footer{
background:#0f172a;
color:#fff;
padding:30px 0;
text-align:center;
}

/* RESPONSIVE */

@media(max-width:992px){

.grid-4{
grid-template-columns:repeat(2,1fr);
}

.grid-3{
grid-template-columns:repeat(2,1fr);
}

.hero-text h1{
font-size:42px;
}

}

@media(max-width:768px){

.desktoplogin{
display:none;
}

.mobileicon{
display:block;
}

.hero-wrap{
flex-direction:column;
text-align:center;
}

.hero-text p{
margin:auto auto 30px;
}

.grid-4,
.grid-3{
grid-template-columns:1fr;
}

.hero-text h1{
font-size:34px;
}

.section-title h2{
font-size:32px;
}

.btn-outline{
margin-left:0;
margin-top:10px;
}

}

</style>

</head>

<body>

<main>

<!-- header (UNCHANGED) -->
@include('layouts.header-menu')
<!-- HERO -->

<!-- HERO SECTION -->
<section class="hero bg-grey">
    <div class="container hero-wrap">
    
    <div class="hero-text">
    <h1>Food Safety SOPs & Compliance Solutions
    </h1>
    <p>Standard Operating Procedures for food manufacturing, kitchens, restaurants, and food startups with expert guidance.
    </p>
    
    <button class="btn btn-primary">Get Started Free</button>
    <button class="btn btn-outline">Explore Services</button>
    </div>
    
    <div class="hero-img">
    <img src="https://placehold.co/1000x700?text=Dashboard+Preview">
    </div>
    
    </div>
    </section>
    

<!-- SERVICES -->

<section class="bg-white">

<div class="container">

<div class="section-title">
<h2>Our soap document</h2>

<p>
Complete FSSAI licensing and food compliance support
for all food business categories.
</p>
</div>

<div class="grid grid-4">

<div class="service-card">
<i class="fa-solid fa-file-shield"></i>
<h3>FSSAI Registration</h3>
<p>Basic food license support for startups & home businesses.</p>
</div>

<div class="service-card">
<i class="fa-solid fa-building"></i>
<h3>State License</h3>
<p>Food business state license documentation & approvals.</p>
</div>

<div class="service-card">
<i class="fa-solid fa-industry"></i>
<h3>Central License</h3>
<p>Central FSSAI approval for manufacturers & exporters.</p>
</div>

<div class="service-card">
<i class="fa-solid fa-clipboard-check"></i>
<h3>Food Audit</h3>
<p>Food safety audits and compliance checklists.</p>
</div>

</div>

</div>

</section>

<!-- WHY -->

<section class="why bg-grey">

<div class="container">

<div class="section-title">
<h2>Why Choose Us?</h2>
</div>

<div class="grid grid-4">

<div class="service-card">
<i class="fa-solid fa-user-tie"></i>
<h3>Expert Team</h3>
<p>Experienced food consultants & licensing experts.</p>
</div>

<div class="service-card">
<i class="fa-solid fa-clock"></i>
<h3>Fast Approval</h3>
<p>Quick application processing and approval support.</p>
</div>

<div class="service-card">
<i class="fa-solid fa-headset"></i>
<h3>Dedicated Support</h3>
<p>Continuous customer assistance throughout the process.</p>
</div>

<div class="service-card">
<i class="fa-solid fa-layer-group"></i>
<h3>One Platform</h3>
<p>Manage all food compliance services in one place.</p>
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
<!-- FAQ SECTION -->

<section class="why bg-grey faq-section">

    <div class="container">
    
    <div class="section-title">
    <h2>Frequently Asked Questions</h2>
    
    <p>
    Find answers related to Food Safety SOPs,
    FSSAI compliance documentation, hygiene protocols,
    and audit requirements.
    </p>
    
    </div>
    
    <!-- FAQ ITEM -->
    
    <div class="faq-item active">
    
    <button class="faq-question">
    
    <span>
    What are Food Safety SOPs?
    </span>
    
    <i class="fa-solid fa-minus"></i>
    
    </button>
    
    <div class="faq-answer">
    
    <p>
    Food Safety SOPs (Standard Operating Procedures)
    are documented step-by-step processes that ensure
    food hygiene, safety, cleaning, sanitation,
    employee practices, and operational compliance
    within food businesses.
    </p>
    
    </div>
    
    </div>
    
    <!-- FAQ ITEM -->
    
    <div class="faq-item">
    
    <button class="faq-question">
    
    <span>
    Why are SOPs important for food businesses?
    </span>
    
    <i class="fa-solid fa-plus"></i>
    
    </button>
    
    <div class="faq-answer">
    
    <p>
    SOPs help maintain food quality,
    prevent contamination, improve consistency,
    prepare businesses for audits,
    and ensure compliance with FSSAI regulations.
    </p>
    
    </div>
    
    </div>
    
    <!-- FAQ ITEM -->
    
    <div class="faq-item">
    
    <button class="faq-question">
    
    <span>
    Do you provide SOPs for restaurants and cloud kitchens?
    </span>
    
    <i class="fa-solid fa-plus"></i>
    
    </button>
    
    <div class="faq-answer">
    
    <p>
    Yes. We create customized SOPs for restaurants,
    cafes, cloud kitchens, catering units,
    and all food manufacturing businesses.
    </p>
    
    </div>
    
    </div>
    
    <!-- FAQ ITEM -->
    
    <div class="faq-item">
    
    <button class="faq-question">
    
    <span>
    Are your SOPs FSSAI compliant?
    </span>
    
    <i class="fa-solid fa-plus"></i>
    
    </button>
    
    <div class="faq-answer">
    
    <p>
    Yes. All SOP documents are prepared according
    to FSSAI food safety guidelines and hygiene standards.
    </p>
    
    </div>
    
    </div>
    
    <!-- FAQ ITEM -->
    
    <div class="faq-item">
    
    <button class="faq-question">
    
    <span>
    Can SOPs help during food audits?
    </span>
    
    <i class="fa-solid fa-plus"></i>
    
    </button>
    
    <div class="faq-answer">
    
    <p>
    Absolutely. Proper SOP documentation helps businesses
    during inspections, third-party audits,
    and internal compliance verification processes.
    </p>
    
    </div>
    
    </div>
    
    </div>
    
    </section>

<!-- BLOG -->
{{-- 
<section>

<div class="container">

<div class="section-title">
<h2>Latest Insights</h2>
</div>

<div class="grid grid-3">

<div class="blog-card">
<img src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=1200&auto=format&fit=crop">
<div class="blog-content">
<h4>FSSAI License Guide</h4>
</div>
</div>

<div class="blog-card">
<img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop">
<div class="blog-content">
<h4>Food Labeling Compliance</h4>
</div>
</div>

<div class="blog-card">
<img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?q=80&w=1200&auto=format&fit=crop">
<div class="blog-content">
<h4>Food Safety SOPs</h4>
</div>
</div>

</div>

</div>

</section> --}}

<!-- FOOTER -->



</main>
<script>

    document.addEventListener("DOMContentLoaded", function () {
    
    const faqItems = document.querySelectorAll(".faq-item");
    
    faqItems.forEach((item) => {
    
    const question = item.querySelector(".faq-question");
    
    question.addEventListener("click", function () {
    
    const isActive = item.classList.contains("active");
    
    faqItems.forEach((faq) => {
    
    faq.classList.remove("active");
    
    faq.querySelector("i")
    .classList.replace("fa-minus","fa-plus");
    
    });
    
    if(!isActive){
    
    item.classList.add("active");
    
    item.querySelector("i")
    .classList.replace("fa-plus","fa-minus");
    
    }
    
    });
    
    });
    
    });
    
    </script>
</body>
</html>
