<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
   <link href="{{ URL::asset('assets/front/css/FSSAIL.css') }}" rel="stylesheet" type="text/css" />
<body>
    <main>

<!-- header -->

<header>
 <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/home"><img src="{{ URL::asset('assets/img/small-logo3.png') }}" alt="Logo"></a>
      
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
            <a class="nav-link" href="/reports">Reports</a>
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

<section class="bannerbox2">
  <div class="container">
    <h1> <?php echo $services->services ?></h2>
  
</div>
</section>

 <section style="margin-top:30px">
<div class="container">


  <div class="row FSSAI-banner">
    <div class=" container-fluid ">
        <h2 class="Fassi-heading"><?php echo $services->services ?></h2>

        <?php echo $services->description ?>
        
    </div>
   
  </div>
  <div class="butns mb-4">
    <span class="price"><?php if(!empty($services->price)) { echo $services->price; } ?> </span>
    <!--<button class="buy-butn">Buy Now</button>-->
</div>
<div class="butns mb-4">
    <a href="/subscriptions" class="buy-butn" style="text-decoration:none">Subscribe Service</a>
</div>

</div>
</section>
@extends('layouts.footer')

  </body>
</html>
