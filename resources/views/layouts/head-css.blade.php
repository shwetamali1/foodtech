@yield('css')

@php
    $versionedAsset = function ($path) {
        $fullPath = public_path($path);
        return asset($path) . (file_exists($fullPath) ? '?v=' . filemtime($fullPath) : '');
    };
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
   <title>Food Tech Mate</title>

<!-- Bootstrap core CSS -->
 <link href="{{ $versionedAsset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ $versionedAsset('assets/front/css/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ $versionedAsset('assets/front/css/main-style.css') }}" rel="stylesheet">
<link href="{{ $versionedAsset('assets/front/css/home.css') }}" rel="stylesheet">
<link href="{{ $versionedAsset('assets/front/css/license.css') }}" rel="stylesheet">
<link href="{{ $versionedAsset('assets/front/css/label.css') }}" rel="stylesheet">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


  </head>
  

  
