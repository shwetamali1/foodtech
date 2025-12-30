<!doctype html>
<html lang="en">

<head>
    @extends('layouts.head-css')

    <title>
        {{ $reports->meta_title ?? $reports->reports_title }}
    </title>

    <meta name="description"
          content="{{ $reports->meta_description }}">

    <link href="{{ URL::asset('assets/front/css/FSSAIL.css') }}" rel="stylesheet" type="text/css" />
</head>

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
            <a class="nav-link" aria-current="page" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/subscriptions">Subscriptions</a>
          </li>

            <li class="nav-item">
            <a class="nav-link active" href="/reports">Food Business Plans</a>
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
    <h1> <?php echo $reports->reports_title ?></h2>
  
</div>
</section>

 <section style="margin-top:30px">
<div class="container">


  <div class="row FSSAI-banner">
    <div class=" container-fluid ">
        <h2 class="Fassi-heading"><?php echo $reports->reports_title ?></h2>

        <?php echo $reports->description ?>
        
    </div>
   
  </div>
  <div class="butns mb-4">
      <span class="price">
        <?php 
          $price = str_replace('RS', '',  $reports->price);
          echo number_format($price, 2).' RS';
          ?>
         </span>
    <a href="/login" class="buy-butn" style="text-decoration:none">Buy Now</a>
</div>


</div>
</section>
@extends('layouts.footer')

  </body>
</html>
