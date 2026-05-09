<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
<style>
    ul.features { list-style: none; margin: 1rem 0 1.25rem; padding: 0; display: grid; gap: .55rem; }
.features li { display: grid; grid-template-columns: 22px 1fr; align-items: start; gap: .5rem; }
.features svg { margin-top: .2rem; }
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
<script>document.addEventListener("DOMContentLoaded", function () {

  const features = document.querySelectorAll('.feature-item');
  const image = document.getElementById('featureImage');

  let index = 0;
  let interval;

function activateFeature(i, auto = false) {
  if (!features[i]) return;

  features.forEach(f => f.classList.remove('active'));
  features[i].classList.add('active');

  const imgIndex = features[i].getAttribute('data-img');

  // IMAGE ANIMATION
  image.style.opacity = 0;
  image.style.transform = "scale(0.95)";

  setTimeout(() => {
    image.src = `/assets/front/images/banner${imgIndex}.jpg`;
    image.style.opacity = 1;
    image.style.transform = "scale(1)";
  }, 200);

  // ⭐ Only scroll into view if triggered by click
  if (!auto) {
    features[i].scrollIntoView({
      behavior: "smooth",
      inline: "center",
      block: "nearest"
    });
  }

  index = i;
}
 features.forEach((item, i) => {
  item.addEventListener('click', () => {
    activateFeature(i); // default auto=false → scroll happens
    resetAutoSlide();
  });
});

function startAutoSlide() {
  interval = setInterval(() => {
    index = (index + 1) % features.length;
    activateFeature(index, true); // prevent scroll on auto-slide
  }, 3000);
}
  function resetAutoSlide() {
    clearInterval(interval);
    startAutoSlide();
  }

  if (features.length > 0) {
    startAutoSlide();
  }

});
</script>
<!-- header -->
<header>
 <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/home"><img src="{{ URL::asset('assets/img/logo1.png') }}" alt="Logo"></a>
      
      <a href="/login/admin" class="loginbox mobileicon"><i class="fa fa-user" style="font-size:24px"></i></a>

       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarsExample07">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/subscriptions">Subscriptions</a>
          </li>

            <li class="nav-item">
            <a class="nav-link" href="/reports">Food Business Plans</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="/contact-us">Contact Us</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
           -->
        </ul>
        </div>
        
      <a href="/login/admin" class="loginbox desktoplogin">Log In</a>
     
    </div>
  </nav>
</header>
<!-- end header -->

<section class="hero bg-grey">
<div class="container hero-wrap">

<div class="hero-text">
<h1>India's First Subscription-Based Food Compliance Platform</h1>
<p>Complete Compliance & Business Planning Solutions for Your Food Business</p>

<button class="btn btn-primary">Get Started Free</button>
<button class="btn btn-outline">Explore Services</button>
</div>

<div class="hero-img">
<img src="https://placehold.co/1000x700?text=Dashboard+Preview">
</div>

</div>
</section>

<!-- TRUSTED / SERVICES STYLE -->
<section class="section bg-white trusted">
<h2>Trusted by 200+ Food Businesses</h2>

<div class="container grid trusted-grid">

<div class="trusted-card">
    <div class="icon-box">📄</div>
    <h4>FSSAI Licensing</h4>
    <p>Registration, renewals & modifications with expert guidance.</p>
    <a class="more-link" href="{{ url('services/fssai-licensing') }}">
        More Info →
    </a>
</div>

<div class="trusted-card">
    <div class="icon-box">🏷️</div>
    <h4>Label Validation</h4>
    <p>Nutrition facts, claims & FSSAI-compliant label checks.</p>
    <a class="more-link" href="{{ url('services/fssai-label-validation') }}">
        More Info →
    </a>
</div>

<div class="trusted-card">
    <div class="icon-box">✅</div>
    <h4>Food Safety SOPs</h4>
    <p>Audit-ready SOPs for smooth compliance & operations.</p>
    <a class="more-link" href="{{ url('services/' . \Illuminate\Support\Str::slug('Food Safety SOPs')) }}">
        More Info →
    </a>
</div>

<div class="trusted-card">
    <div class="icon-box">📊</div>
    <h4>Business Plans</h4>
    <p>Investor-ready plans for startups & food businesses.</p>
    <a class="more-link" href="{{ url('services/' . \Illuminate\Support\Str::slug('Business Plans')) }}">
        More Info →
    </a>
</div>

</div>
</section>

<section class="how steps-section bg-grey" id="how">
  <h2 class="section-title">From Onboarding to<br>Approved in 4 Steps</h2>

  <div class="steps">
    <div class="step reveal">
      <div class="step-num">1</div>
      <div class="step-title">Register Your Business</div>
      <div class="step-desc">Share basic details about your food category and business stage. Takes under 5 minutes.</div>
    </div>

    <div class="step reveal reveal-delay-1">
      <div class="step-num">2</div>
      <div class="step-title">Choose a Service Plan</div>
      <div class="step-desc">Pick the plan that fits your compliance needs — or let us recommend the right scope.</div>
    </div>

    <div class="step reveal reveal-delay-2">
      <div class="step-num">3</div>
      <div class="step-title">Submit Documents</div>
      <div class="step-desc">Our checklist-driven process guides you on exactly what to provide. No guesswork.</div>
    </div>

    <div class="step reveal reveal-delay-3">
      <div class="step-num">4</div>
      <div class="step-title">Track & Get Support</div>
      <div class="step-desc">We handle follow-ups, respond to queries, and keep you updated until approval is in hand.</div>
    </div>
  </div>
</section>
<section class="mobile-steps-img">
  <img src="{{ URL::asset('assets/front/images/choose.jpg') }}" alt="Process Steps">
</section>
{{-- <section class="servies-section headingh2">
  <div class="container">
    <h3>Featured Services</h3>
    <h2>Effortless FSSAI Compliance for Food Businesses</h2>

  <div class="swiper serviesslide mt-4" style="height: ">
    <div class="swiper-wrapper">
      <?php foreach($services as $service){ ?>
       <div class="swiper-slide servies-box">
        <?php if(!empty($service->uploaded_file)){ 
            $filenames = json_decode($service->uploaded_file, true);
            if ($filenames && is_array($filenames)) {
                foreach($filenames as $file){
        ?>
          <img src="{{ URL::asset('images/'.$file) }}" class="img-fluid" alt="" title="" style="margin:0 auto; height:170px;">
        <?php } } } else{ ?>
          <img src="{{ URL::asset('assets/front/images/1.webp') }}" class="img-fluid" alt="" title="" style="margin:0 auto;">
        <?php } ?>
        <div class="servies-text-box">
          <h3>{{$service->services}}</h3>
          <p>{{ Str::limit(strip_tags($service->description), 80) }}</p>
          <a href="{{ url('services/'.$service->slug) }}">
            More Info <i class="fa fa-arrow-right" aria-hidden="true"></i>
        </a>
                </div>
      </div>
      <?php } ?>
       
   </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div> 
  </div>
  </div>
</section> --}}

<!-- Why Choose US -->
{{-- <section class="Whychoose-section headingh2">
  <div class="container">
   <h2> Why Choose Us</h2>
   <p>FoodTech Mate is built with the needs of the food industry in mind, supporting compliance for businesses of all sizes—from small vendors to large enterprises</p>

<div class="row row-cols-1 row-cols-sm-0 row-cols-md-2 g-4 mb-3 mt-4">

      <div class="col-md-5">
      <img src="{{ URL::asset('assets/front/images/why_choose_us.jpeg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;">
      </div>


       <div class="col-md-7">
        <div class="why-box">

         <div class="why-list-box">
            <div class="icon-box"><img src="{{ URL::asset('assets/front/images/why1.svg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;"></div>
            <div class="why-list-text">
            <h3>Streamlined FSSAI Compliance</h3>
            <p>Get your FSSAI registration, license renewals, and modifications done with ease. FoodTech Mate simplifies the entire process, saving you time and ensuring you're always up-to-date with compliance</p>
           </div>
          </div>

          <div class="why-list-box">
            <div class="icon-box"><img src="{{ URL::asset('assets/front/images/why2.svg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;"></div>
            <div class="why-list-text">
            <h3>All-in-One Solution</h3>
            <p>Access every service you need in one place. From initial registration to subscription management, payments, and ongoing support, our platform is built to handle every step</p>
           </div>
          </div>


          <div class="why-list-box">
            <div class="icon-box"><img src="{{ URL::asset('assets/front/images/why3.svg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;"></div>
            <div class="why-list-text">
            <h3>Transparent and Flexible Plans</h3>
            <p>We offer a range of subscription packages tailored to different business needs. Compare plans side-by-side to find the best fit for your business, with clear pricing and no hidden fees.</p>
           </div>
          </div>


          <div class="why-list-box">
            <div class="icon-box"><img src="{{ URL::asset('assets/front/images/why4.svg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;"></div>
            <div class="why-list-text">
            <h3>Secure and Reliable</h3>
            <p>Your data security is our priority. With encrypted payment options through Stripe and PayPal, FoodTech Mate ensures a safe and reliable transaction experience</p>
           </div>
          </div>

          
       
      </div>
      </div> 

      
    </div>

  </div>
</section> --}}








<!-- Why Choose US -->
 {{-- <section class="Whychoose-section headingh2">
  <div class="container">
   <h2>How to use FoodTech Mate — Step by Step
</h2>

<div class="row  mt-4">

       <div class="col-12 col-md-7">
  <div class="why-box">

    <ul class="ft-steps" style="padding-left:1.1rem; margin-top:1rem;">
      <li><strong>Sign up / Login</strong> — create an account or log in.</li>
      <li><strong>Complete profile</strong> — enter business type, turnover, state and contact details.</li>
      <li><strong>Select registration type</strong> — Basic / State / Central based on turnover.</li>
      <li><strong>Upload documents</strong> — passport photo, business registration, ID & address proofs.</li>
      <li><strong>Review & pay</strong> — confirm details and complete payment securely.</li>
      <li><strong>We file for you</strong> — our team prepares and submits the FSSAI application.</li>
      <li><strong>Track & support</strong> — monitor status from dashboard; get post-filing help.</li>
    </ul>
  </div>
</div>

 <div class="col-12 col-md-5">
      <img src="{{ URL::asset('assets/front/images/choose.jpg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;">
      </div>
      
    </div>

  </div>
</section> --}}
{{-- <section class="dashboard-section py-5">
  <div class="container">

    <!-- ✅ HEADLINE -->
    <div class="section-heading text-center mb-5">
      <h2>Manage Your Compliance Smarter & Faster</h2>
      <p>Everything you need in one powerful dashboard</p>
    </div>

    <div class="row align-items-center">

      <!-- LEFT SIDE -->
      <div class="col-lg-5 mb-4 mb-lg-0">
        <div class="feature-list">

          <div class="feature-item active" data-img="1">
            <div class="icon">📊</div>
            <h5>Unified Dashboard</h5>
            <p>Manage all compliance in one place</p>
          </div>

          <div class="feature-item" data-img="2">
            <div class="icon">⏰</div>
            <h5>Automated Compliance</h5>
            <p>Never miss deadlines with smart alerts</p>
          </div>

          <div class="feature-item" data-img="3">
            <div class="icon">🔒</div>
            <h5>Secure Document Vault</h5>
            <p>Store all documents safely</p>
          </div>

          <div class="feature-item" data-img="4">
            <div class="icon">👨‍💼</div>
            <h5>Expert Connect</h5>
            <p>Connect with industry experts</p>
          </div>

        </div>
      </div>

      <!-- RIGHT SIDE -->
      <div class="col-lg-7 text-center">
        <div class="image-box">
          <img id="featureImage" src="{{ URL::asset('assets/front/images/banner1.jpg') }}" class="img-fluid">
        </div>
      </div>

    </div>
  </div>
</section> --}}
<section class="testimonials-section bg-white">
  <h6 class="section-title text-center">What Our Clients Say</h6>
<div class="swiper testimonialsslide">
    <div class="swiper-wrapper">
       <div class="swiper-slide testimonials-box">
      <div class="name-img">
          <img src="{{ URL::asset('assets/front/images/t.jpg') }}" class="img-fluid">
           <h3>Mr Sushant Wagle <br><span>Director-Auctorem Solutions Pvt Ltd</span></h3>
        </div>
       <p>The Foodtech mate Team has provided us with thorough guidance on FSSAI Regulations for our food manufacturing and export business and even they guided us for new product development for our company</p>
       </div>


       <div class="swiper-slide testimonials-box">
      <div class="name-img">
          <img src="{{ URL::asset('assets/front/images/t.jpg') }}" class="img-fluid">
           <h3>Mr Mahesh Kulkarni <br><span>Director-Vallary Agro</span></h3>
        </div>
<p>Working with Foodtech mate was an incredible experience. They guided us from the initial business plan all the way to the successful launch of our frozen ready-to-eat products. Their expertise in plant machinery setup and market strategy was invaluable.       </div>

       <div class="swiper-slide testimonials-box">
      <div class="name-img">
          <img src="{{ URL::asset('assets/front/images/t.jpg') }}" class="img-fluid">
           <h3>Mrs Mohini Jadhav <br><span>Director - Hitay Industries</span></h3>
        </div>
<p>We are very happy with the help from ProwessBuzz in creating our pea-protein-based snacks and flour. They guided us in making tasty, healthy products and ensured everything met the right standards. Thanks to them, we launched successful products that our customers love!</p>       </div>

       <div class="swiper-slide testimonials-box">
      <div class="name-img">
          <img src="{{ URL::asset('assets/front/images/t.jpg') }}" class="img-fluid">
           <h3>Mr.Ayan shash <br><span>Director Gs- Tea</span></h3>
        </div>
<p>Foodtechmate helped us develop a completely new product from scratch. They supported us in creating the recipe, running trials, and getting it ready for market. Their team made the whole development process easy to understand and well-managed. We are happy with the results and highly recommend them.</p>       </div>
</div>

    <div class="swiper-pagination"></div> 
  </div>
</section>


<!-- PRICING -->

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
  



 <section class="faqs-section headingh2 bg-white">
  <div class="container">
   <h2> Frequently Asked Questions</h2>
   <p>FoodTech Mate is a web-based platform designed to help food businesses in India manage FSSAI compliance, licensing, and regulatory needs</p>
<div class="row">
<div class="accordion accordion-flush mt-4" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
       How does the FSSAI registration process work on FoodTech Mate?
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          On FoodTech Mate, the FSSAI registration process is designed to make it simple for food business operators (FBOs) to apply online without dealing with complicated paperwork. Here’s how it typically works step by step:</br></br>
          <h5>Step 1: Sign Up / Login</h5>
          </br>Create an account on FoodTech Mate or log in if you already have one.</br>
          Fill in basic business details (type of business, annual turnover, state, etc.).
          </br></br>
          <h5>Step 1: Sign Up / Login</h5>
          </br>FSSAI Basic Registration → For small businesses/turnover up to ₹12 lakhs.</br>
          FSSAI State License → For businesses with turnover between ₹12 lakhs–₹20 crores.</br>
          FSSAI Central License → For turnover above ₹20 crores or for import/export.</br></br>
          <h5>Upload Documents</h5></br>
          Passport-size photo of the applicant</br>
          Business registration certificate (Shop Act / Partnership / Company Incorporation)</br>
          ID & address proof of proprietor/partners/directors</br></br>
          <h5>Application Filing</h5></br>
          FoodTech Mate’s team prepares and files your application with the FSSAI department on your behalf.</br>
          They ensure all forms are correctly filled to avoid rejection.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
       Can I choose a specific subscription package based on my needs?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">On FoodTech Mate, the FSSAI registration process is designed to be flexible. You’ll find different subscription packages that cover various services (basic registration, state license, central license, renewal, modifications, etc.).</br>
        
            
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
       Is my payment information secure on FoodTech Mate?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Yes ✅ — your payment information on FoodTech Mate is kept secure.</br>
      They typically use encrypted payment gateways (such as Razorpay, PayU, or similar PCI-DSS–compliant services) to process transactions.
     </div>
    </div>
  </div>

 <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingfive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
       What payment options are available?
      </button>
    </h2>
    <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">On FoodTech Mate, you get multiple secure payment options 💳💸 to make the subscription process convenient. Typically, the following are available:</br>
        ✅ UPI (Google Pay, PhonePe, Paytm, BHIM, etc.)
</br>
        ✅ Credit / Debit Cards (Visa, Mastercard, RuPay, American Express)
        </br>
        ✅ Net Banking (all major Indian banks)
        </br>
        ✅ Mobile Wallets (Paytm Wallet, Amazon Pay, etc.) </div>
    </div>
  </div>

</div>

</div>
  </div>
</section>

<section class="starting-section headingh2 bg-white">
   <div class="container">
    <div class="row align-items-center">
      <div class="col-md-9">
<h3>Register Free. Start Your Food Business the Right Way</h3>
<p>We handle label compliance, FSSAI licensing, and full setup—end to end.</p>
<a href="/register-user">Register Now</a>
</div>
<div class="col-md-3"><img src="{{ URL::asset('assets/front/images/gril.png') }}" class="img-fluid"></div>
    </div>
   </div> 
</section>

@extends('layouts.footer')

  </body>
</html>
