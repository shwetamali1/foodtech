<!doctype html>
<html lang="en">

<head>
    @extends('layouts.head-css')

    <title>
        {{ $reports->meta_title ?? $reports->reports_title }}
    </title>

    <meta name="description"
          content="{{ $reports->meta_description }}">

    <link href="{{ asset('assets/front/css/FSSAIL.css') }}?v={{ filemtime(public_path('assets/front/css/FSSAIL.css')) }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <main>

<!-- header -->
@include('layouts.header-menu')

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
