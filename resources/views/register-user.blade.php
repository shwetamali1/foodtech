<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
  
<body>
    <main>

<!-- header -->
@include('layouts.header-menu')

<section class="bannerbox2">
  <div class="container">
    <div class="col-lg-7 mx-auto">
  <h1>Register User</h1>

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

 <div><a href="tel:+7020048677"><span><i class="fa fa-phone"></i></span> <span>+1012 3456 789 </span></a></div>
 <div><a href="mailto:foodtechmate@gmail.com"><span><i class="fa fa-envelope"></i></span> <span>foodtechmate@gmail.com </span></a></div>
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
      <form action="register-user" method="post">
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
           <label for="email" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
          <span class="text-danger">{{ $errors->first('password') }}</span>
          </div>
        </div>
        <div class="row row-cols-md-2 row-cols-sm-1">
           <div class="col mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter phone number">
              <span class="text-danger">{{ $errors->first('mobile') }}</span>
          </div>
           <div class="col mb-3">
              <label for="phone" class="form-label">Company Name</label>
              <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Company Name">
              <span class="text-danger">{{ $errors->first('cname') }}</span>
          </div>
        </div>
        <div class="row row-cols-md-2 row-cols-sm-1">
            <div class="mb-3">
              <label for="category" class="form-label">Business Category</label>
              <select class="form-control" name="category">
                  <option value="">Select Category</option>
                  <?php foreach ($business_category as $category){ ?>
                    <option value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
                  <?php } ?>
              </select>
              <span class="text-danger">{{ $errors->first('category') }}</span>
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Country</label>
              <select class="form-control" name="country">
                 <option value="">Select Country</option>
                <option value="india" selected="">India</option>
              </select>
              <span class="text-danger">{{ $errors->first('country') }}</span>
            </div>
        </div>
        <div class="row row-cols-md-2 row-cols-sm-1">
           <div class="col mb-3">
              <label for="phone" class="form-label">State</label>
              <input type="text" class="form-control" id="state" name="state" placeholder="Enter state">
              <span class="text-danger">{{ $errors->first('state') }}</span>
          </div>
           <div class="col mb-3">
              <label for="phone" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
              <span class="text-danger">{{ $errors->first('city') }}</span>
          </div>
        </div>
            <button type="submit" class="btn btn-send">Submit</button>
        </form>
        
  </div>
</div>

</div>
  </div>
</section>


@extends('layouts.footer')

  </body>
</html>
