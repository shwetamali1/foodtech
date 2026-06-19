<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $services->meta_title }}</title>
    <meta name="description" content="{{ $services->meta_description }}">
    <meta name="robots" content="index, follow">
</head>
 
  @extends('layouts.head-css')
   <link href="{{ asset('assets/front/css/FSSAIL.css') }}?v={{ filemtime(public_path('assets/front/css/FSSAIL.css')) }}" rel="stylesheet" type="text/css" />
<body>
    <main>

<!-- header -->

@include('layouts.header-menu')

<section class="bannerbox2">
  <div class="container">
    <h1> <?php echo $services->services ?></h1>
  
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
