<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
  
<body>
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
        
      <a href="/login/admin" class="loginbox desktoplogin">Login In</a>
     
    </div>
  </nav>
</header>
<!-- end header -->

<section class="bannerbox">
  <div class="container">
    <div class="col-lg-7 mx-auto">
  <h1>India's Top Rated Professional Food Regulatory Services</h1>
  <p>Platform is Connecting you with food technologies expert having more than 15 years experience.</p>  

</div>

</div>
</section>

    <!-- <div class="container"><form>
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form></div> -->



<section class="servies-section headingh2">
  <div class="container">
    <h3>Featured Services</h3>
    <h2>Effortless FSSAI Compliance for Food Businesses</h2>

  <div class="swiper serviesslide mt-4">
    <div class="swiper-wrapper">
      <?php foreach($services as $service){ ?>
       <div class="swiper-slide servies-box">
        <?php if(!empty($service->uploaded_file)){ ?>
          <img src="{{ URL::asset('assets/front/images/'.$service->uploaded_file) }}" class="img-fluid" alt="" title="" style="margin:0 auto;">
        <?php } else{ ?>
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
<section class="plan-section headingh2">
  <div class="container">
   <h2> Perfect Plan for Your Needs</h2>
   <p>Choose a subscription that aligns with your business goals and start 
managing your food operations with ease today!</p>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-3 mt-4">

      <div class="col">
        <div class="plan-box">
        <h3>Free <span>First Month Free</span></h3>
        <p>Get started with your food business effortlessly using our Free Food License Plan.</p>
        <h4>$0 <span>+govt fee</span></h4>
        <a href="#">Start For Free</a>
        <ul>
          <h3>Plan Includes:</h3>
          <li>New FSSAI License Application</li>
          <li>Food License Renewal</li>
        </ul>
      </div>
      </div>


       <div class="col">
        <div class="plan-box plan-box2">
        <h3>Starter <span>First Month 75% Off</span></h3>
        <p>Our Starter Plan is designed for businesses that need more support and features to smoothly navigate.</p>
        <h4>$6.25 <span>+govt fee</span></h4>
        <a href="#">Start Today</a>
        <ul>
          <h3>Everything in Membership Plus:</h3>
          <li>New FSSAI License Application</li>
          <li>Food License Renewal</li>
          <li>Food License Annual Return Filing</li>
          <li>Food Labels Validation Services</li>
        </ul>
      </div>
      </div>

       <div class="col">
        <div class="plan-box">
        <h3>Premium <span>First Month 50% Off</span></h3>
        <p>Our Premium Plan offers a comprehensive solution to ensure your food license application is smooth, quick, and stress-free.</p>
        <h4>$10.99 <span>+govt fee</span></h4>
        <a href="#">Start Today</a>
        <ul>
          <h3>Everything in Starter Plus:</h3>
          <li>New FSSAI License Application</li>
          <li>Food License Renewal</li>
          <li>Food License Annual Return Filing</li>
          <li>Food Labels Validation Services</li>
          <li>Reply to FSSAI Notice from Food Experts</li>
          <li>Food License Modification</li>

        </ul>
      </div>
      </div>


      
    </div>



  </div>
</section>


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
      <div class="accordion-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
       Can I choose a specific subscription package based on my needs?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
       Is my payment information secure on FoodTech Mate?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
    </div>
  </div>

 <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingfive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
       What payment options are available?
      </button>
    </h2>
    <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
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
      <img src="{{ URL::asset('assets/front/images/chooseus.svg') }}" class="img-fluid" alt="" title="" style="margin:0 auto;">
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
           <h3>Sasha Perry <br><span>Lead designer</span></h3>
        </div>
       <p>Nisi vivamus neque elementum, at pharetra. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pellentesque. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pell...</p>
       </div>


       <div class="swiper-slide testimonials-box">
      <div class="name-img">
          <img src="{{ URL::asset('assets/front/images/t.jpg') }}" class="img-fluid">
           <h3>Sasha Perry <br><span>Lead designer</span></h3>
        </div>
       <p>Nisi vivamus neque elementum, at pharetra. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pellentesque. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pell...</p>
       </div>

       <div class="swiper-slide testimonials-box">
      <div class="name-img">
          <img src="{{ URL::asset('assets/front/images/t.jpg') }}" class="img-fluid">
           <h3>Sasha Perry <br><span>Lead designer</span></h3>
        </div>
       <p>Nisi vivamus neque elementum, at pharetra. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pellentesque. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pell...</p>
       </div>

       <div class="swiper-slide testimonials-box">
      <div class="name-img">
          <img src="{{ URL::asset('assets/front/images/t.jpg') }}" class="img-fluid">
           <h3>Sasha Perry <br><span>Lead designer</span></h3>
        </div>
       <p>Nisi vivamus neque elementum, at pharetra. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pellentesque. Cras gravida congue in tincidunt neque, ipsum egestas. Duis risus ipsum dis commodo. Enim euismod velit amet volutpat egestas urna in eget pell...</p>
       </div>
</div>

    <div class="swiper-pagination"></div> 
  </div>
</section>



<section class="starting-section headingh2">
   <div class="container">
    <div class="row align-items-center">
      <div class="col-md-9">
<h2>Starting a business and confused where to begin?</h2>
<p>We take care of Accounting, Business, Compliance, and Handle end-to-end soloutions</p>
<a href="#">Register Now</a>
</div>
<div class="col-md-3"><img src="{{ URL::asset('assets/front/images/gril.png') }}" class="img-fluid"></div>
    </div>
   </div> 
</section>

@extends('layouts.footer')

  </body>
</html>
