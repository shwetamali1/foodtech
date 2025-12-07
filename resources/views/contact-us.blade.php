<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
  <style>
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
            <a class="nav-link" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/subscriptions">Subscriptions</a>
          </li>

            <li class="nav-item">
            <a class="nav-link" href="/reports">Food Business Plans</a>
          </li>

           <li class="nav-item">
            <a class="nav-link active" href="/contact-us">Contact Us</a>
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

<section class="bannerbox2">
  <div class="container">
    <div class="col-lg-7 mx-auto">
  <h1>Contact Us</h1>

</div>
</div>
</section>
 
<section class="contact-page-box">
  <div class="container">
<div class="row align-items-center">

<div class="col-md-5">
<div class="contact-info">
  <h3>Contact Information</h3>
<p>reliable contact details for seamless communication and support</p>

 <div><a href="tel:+91 7020048677"><span><i class="fa fa-phone"></i></span> <span>+91 7020048677 </span></a></div>
 <div><a href="mailto:foodtechmate@gmail.com"><span><i class="fa fa-envelope"></i></span> <span>foodtechmate@gmail.com</span></a></div>
 <div><a href="#"> <span><i class="fa fa-map-marker"></i></span> <span>7, Star Properties, Office No 302 Sant Niwas, New DP Rd, Vishal Nagar, Pimple Nilakh, Maharashtra 411027</span></a></div>

 </div>   
</div>

 <div class="col-md-7">
    @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="contact-form">
      <!-- <h4 class="mb-4">Contact Us</h4> -->
      <form action="contact-us" method="post">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="row row-cols-md-2 row-cols-sm-1">
          <div class="col mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
          </div>
          <div class="col mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
          </div>
        </div>
        <div class="row row-cols-md-2 row-cols-sm-1">
          <div class="col mb-3">
           <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
          <span class="text-danger">{{ $errors->first('email') }}</span>
          </div>


           <div class="col mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
          <span class="text-danger">{{ $errors->first('phone') }}</span>
          </div>
</div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message"></textarea>
        </div>

        <button type="submit" class="btn btn-send">Send Message</button>
      </form>
    </div>
  </div>
</div>

</div>
  </div>
</section>
<section class="map-bx">
    <div class="container">
      <div class="row">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30773392.078304354!2d61.028322527582496!3d19.690576264827094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1749385277282!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</div>
</section>

@extends('layouts.footer')

  </body>
</html>
