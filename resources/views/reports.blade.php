<!doctype html>
<html lang="en">
  @extends('layouts.head-css')
  
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

<section class="bannerbox2" style="height:70vh !important">
  <div class="container">
    <h1> Our Reports</h2>
   <p style="color:#FFF">Choose a subscription that aligns with your business goals and start 
managing your food operations with ease today!</p>
<form action="/reports" method="GET">
<div class="col-lg-6 mx-auto">
    <div class="select-box-sech">

    <select class="form-select" name="category" aria-label="Default select example">
      <option selected value="">Select Services</option>
      <?php foreach($categories as $category){ ?>
      <option {{ request('category') == $category->id ? 'selected' : '' }} value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
      <?php } ?>
    </select>
    
    <div class="search">
      <span class="fa fa-search"></span>
      <input placeholder="Search here" name="search">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>

</div>
</div>
</form>
</section>

 


@foreach($reports as $report)

@if($loop->odd)

<section class="ourreports-section">
   <div class="container">
    <div class="row align-items-center">
      <div class="col-md-9">
<h2><?php echo $report->reports_title ?></h2>
<p>{{ Str::limit(strip_tags($report->description), 150, '...') }}</p>
<h4>
<?php 
  $price = str_replace('RS', '',  $report->price);
  echo $price.' RS';
  ?>
</h4>
<a href="{{ route('reportsDetails', $report->slug) }}">Buy Now</a>

</div>
<div class="col-md-3">
     <?php if(!empty($report->uploaded_video)) {
          
              $filenames = json_decode($report->uploaded_video, true);
              if ($filenames && is_array($filenames)) {
              foreach($filenames as $file){
              ?>
                    <img src="{{ asset('images/'.$file) }}" class="img-fluid" style="font-size: 25px; color: #ffd21b;">
          
             <?php } ?>
    
        <?php } } else { ?>
            <a href="{{ asset('front/images/reports.webp') }}" class="img-fluid">
            <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i>
          </a>
         <?php } ?>
    
    </div>
   </div> 
</section>

@else

<section class="ourreports-section">
   <div class="container">
    <div class="row align-items-center">

<div class="col-md-3">
        <?php if(!empty($report->uploaded_video)) {
          
              $filenames = json_decode($report->uploaded_video, true);
              if ($filenames && is_array($filenames)) {
              foreach($filenames as $file){
              ?>
                    <img src="{{ asset('images/'.$file) }}" class="img-fluid" style="font-size: 25px; color: #ffd21b;">
          
             <?php } ?>
    
        <?php } } else { ?>
            <a href="{{ asset('front/images/reports.webp') }}" target="_blank">
            <i class="bi bi-file-pdf" style="font-size: 25px; color: #ffd21b;"></i>
          </a>
         <?php } ?>
     
    </div>

      <div class="col-md-9">
<h2><?php echo $report->reports_title ?></h2>
<p>{{ Str::limit(strip_tags($report->description), 150, '...') }}</p>
<h4>
<?php 
  $price = str_replace('RS', '',  $report->price);
  echo $price.' RS';
  ?>
</h4>
<a href="{{ route('reportsDetails', $report->slug) }}">Buy Now</a>
</div>

    </div>
   </div> 
</section>
@endif
@endforeach





<!--<section>-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--<nav aria-label="Page navigation example">-->
<!--  <ul class="pagination">-->
<!--    <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
<!--    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--    <li class="page-item active"><a class="page-link" href="#">2</a></li>-->
<!--    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--    <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
<!--  </ul>-->
<!--</nav>-->
<!--</div></div>-->
<!--</section>-->

@extends('layouts.footer')

  </body>
</html>
