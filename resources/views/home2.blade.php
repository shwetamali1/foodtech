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

<section class="bannerbox">
  <div class="container-fluid p-0">
<!--    <div class="col-lg-7 mx-auto">-->
<!--  <h1>India's Top Rated Professional Food Regulatory Services</h1>-->
<!--  <p>Platform is Connecting you with food technologies expert having more than 15 years experience.</p>  -->

<!--</div>-->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ URL::asset('assets/front/images/banner3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption p-0">
        <p class="indias"> Your <span class="toprated">Trusted Partner</span> for FSSAI & Food Regulatory ConsultingYour Trusted Partner for FSSAI & Food Regulatory Consulting</p>
        {{-- <p class="services">Food Regulatory Services</p>
        <p class="compliance">Connecting you with experts to simplify your legal, tax & compliance.</p> --}}
      </div>
     
    </div>
    <div class="carousel-item">
      <img src="{{ URL::asset('assets/front/images/banner3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption p-0">
        <p class="indias">Your Partner for <span class="toprated">Food Business Growth & Compliance </span></p>
        {{-- <p class="services">Food Regulatory Services</p>
        <p class="compliance">Connecting you with experts to simplify your legal, tax & compliance.</p> --}}
      </div>
     
    </div>
    <div class="carousel-item">
      <img src="{{ URL::asset('assets/front/images/banner3.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption p-0">
        <p class="indias">Expert Advisory for <span class="toprated">Food Standardization & Shelf Life Study</span> </p>
        {{-- <p class="services">Food Regulatory Services</p> --}}
        {{-- <p class="compliance">Connecting you with experts to simplify your legal, tax & compliance.</p> --}}
      </div>
     
    </div>
    <!--<div class="carousel-item">-->
    <!--  <img src="..." class="d-block w-100" alt="...">-->
    <!--  <div class="carousel-caption d-none d-md-block">-->
    <!--    <h5>Second slide label</h5>-->
    <!--    <p>Some representative placeholder content for the second slide.</p>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<div class="carousel-item">-->
    <!--  <img src="..." class="d-block w-100" alt="...">-->
    <!--  <div class="carousel-caption d-none d-md-block">-->
    <!--    <h5>Third slide label</h5>-->
    <!--    <p>Some representative placeholder content for the third slide.</p>-->
    <!--  </div>-->
    <!--</div>-->
  </div>
  <!--<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">-->
  <!--  <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
  <!--  <span class="visually-hidden">Previous</span>-->
  <!--</button>-->
  <!--<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">-->
  <!--  <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
  <!--  <span class="visually-hidden">Next</span>-->
  <!--</button>-->
</div>

</div>
</section>

    <!-- <div class="container"><form>
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form></div> -->


<!--<div class="services-section">-->
<!--  <div class="header">-->
<!--    <h2>Home Services</h2>-->
<!--    <a href="#">See All &gt;</a>-->
<!--  </div>-->

<!--  <div class="card-grid">-->

<!--    <div class="card large">-->
<!--      <img src="{{ URL::asset('assets/front/images/cleanning.jpg') }}" alt="Packers & Movers">-->
<!--      <div class="overlay-text">Packers & Movers</div>-->
<!--    </div>-->

<!--    <div class="card large">-->
<!--      <img src="{{ URL::asset('assets/front/images/cleanning.jpg') }}" alt="AC Service & Repair">-->
<!--      <div class="overlay-text">AC Service & Repair</div>-->
<!--    </div>-->

<!--    <div class="card">-->
<!--      <img src="{{ URL::asset('assets/front/images/cleanning.jpg') }}" alt="Home Cleaning">-->
<!--      <div class="card-title">Home Cleaning</div>-->
<!--    </div>-->

<!--    <div class="card">-->
<!--      <img src="{{ URL::asset('assets/front/images/cleanning.jpg') }}" alt="Home Painting">-->
<!--      <div class="card-title">Home Painting</div>-->
<!--    </div>-->

<!--    <div class="card">-->
<!--      <img src="{{ URL::asset('assets/front/images/cleanning.jpg') }}" alt="Rental Agreement">-->
<!--      <div class="card-title">Rental Agreement</div>-->
<!--    </div>-->

<!--    <div class="card">-->
<!--      <img src="{{ URL::asset('assets/front/images/cleanning.jpg') }}" alt="Rent Pay">-->
<!--      <div class="card-title">Rent Pay</div>-->
<!--    </div>-->

<!--  </div>-->
<!--</div>-->

<section class="servies-section headingh2">
  <div class="container">
    <h3>Fuatured Services</h3>
    <h2>Effortless FSSAI Compliance for Food Businesses</h2>

  <div class="swiper serviesslide mt-4">
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
          <p>{{ Str::limit($service->description, 80) }}</p>
          <a href="<?php echo 'servicedetails/'.$service->id.'/'.$service->slug ?>">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
      <?php } ?>
       
   </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div> 
  </div>
  </div>
</section>

<!-- Why Choose US -->
<section class="Whychoose-section headingh2">
  <div class="container">
   <h2> Why Choose Us</h2>
   <p>FoodTech Mate is built with the needs of the food industry in mind, supporting compliance for businesses of all sizes—from small vendors to large enterprises</p>

<div class="row row-cols-1 row-cols-sm-0 row-cols-md-2 g-4 mb-3 mt-4">

      <div class="col-md-5">
      <img src="{{ URL::asset('assets/front/images/whyimg.png') }}" class="img-fluid" alt="" title="" style="margin:0 auto;">
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
</section>

<!-- Plan -->
<!--<section class="plan-section headingh2">-->
<!--  <div class="container">-->
<!--   <h2> Perfect Plan for Your Needs</h2>-->
<!--   <p>Choose a subscription that aligns with your business goals and start -->
<!--managing your food operations with ease today!</p>-->

<!--<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-3 mt-4">-->

<!--      <div class="col">-->
<!--        <div class="plan-box">-->
<!--        <h3>Free <span>First Month Free</span></h3>-->
<!--        <p>Get started with your food business effortlessly using our Free Food License Plan.</p>-->
<!--        <h4>$0 <span>+govt fee</span></h4>-->
<!--        <a href="#">Start For Free</a>-->
<!--        <ul>-->
<!--          <h3>Plan Includes:</h3>-->
<!--          <li>New FSSAI License Application</li>-->
<!--          <li>Food License Renewal</li>-->
<!--        </ul>-->
<!--      </div>-->
<!--      </div>-->


<!--       <div class="col">-->
<!--        <div class="plan-box plan-box2">-->
<!--        <h3>Starter <span>First Month 75% Off</span></h3>-->
<!--        <p>Our Starter Plan is designed for businesses that need more support and features to smoothly navigate.</p>-->
<!--        <h4>$6.25 <span>+govt fee</span></h4>-->
<!--        <a href="#">Start Today</a>-->
<!--        <ul>-->
<!--          <h3>Everything in Membership Plus:</h3>-->
<!--          <li>New FSSAI License Application</li>-->
<!--          <li>Food License Renewal</li>-->
<!--          <li>Food License Annual Return Filing</li>-->
<!--          <li>Food Labels Validation Services</li>-->
<!--        </ul>-->
<!--      </div>-->
<!--      </div>-->

<!--       <div class="col">-->
<!--        <div class="plan-box">-->
<!--        <h3>Premium <span>First Month 50% Off</span></h3>-->
<!--        <p>Our Premium Plan offers a comprehensive solution to ensure your food license application is smooth, quick, and stress-free.</p>-->
<!--        <h4>$10.99 <span>+govt fee</span></h4>-->
<!--        <a href="#">Start Today</a>-->
<!--        <ul>-->
<!--          <h3>Everything in Starter Plus:</h3>-->
<!--          <li>New FSSAI License Application</li>-->
<!--          <li>Food License Renewal</li>-->
<!--          <li>Food License Annual Return Filing</li>-->
<!--          <li>Food Labels Validation Services</li>-->
<!--          <li>Reply to FSSAI Notice from Food Experts</li>-->
<!--          <li>Food License Modification</li>-->

<!--        </ul>-->
<!--      </div>-->
<!--      </div>-->


      
<!--    </div>-->



<!--  </div>-->
<!--</section>-->


 <section class="faqs-section headingh2">
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





<!-- Why Choose US -->
 <section class="Whychoose-section headingh2">
  <div class="container">
   <h2>Why Choose Us</h2>
   <p>FoodTech Mate is built with the needs of the food industry in mind, supporting compliance for businesses of all sizes—from small vendors to large enterprises</p>

<div class="row  mt-4">

       <div class="col-12 col-md-7">
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

 <div class="col-12 col-md-5">
      <img src="{{ URL::asset('assets/front/images/choose.jpg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;">
      </div>
      
    </div>

  </div>
</section>


<section class="testimonials-section">
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



<section class="starting-section headingh2">
   <div class="container">
    <div class="row align-items-center">
      <div class="col-md-9">
<h2>Dreaming of a food brand but don’t know where to start?</h2>
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
