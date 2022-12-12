<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>{{ config('app.name', 'StudentEkta AppKit') }}</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/styles/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/styles/style.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/fonts/css/fontawesome-all.min.css')}}">    
<link rel="manifest" href="{{ asset('/frontend/_manifest.json')}}" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/frontend/app/icons/icon-192x192.png')}}">
</head>

<style>
   
</style>
    
<body class="theme-light">
   <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    <div class="header header-fixed header-logo-center ">
        <a href="index.html" class="header-title">
            <img src="images/logo.png" alt="">
        </a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-share" class="header-icon header-icon-2"><i class="fas fa-share-alt"></i></a>
    </div>
@yield('content')

<script type="text/javascript" src="{{ asset('/frontend/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/frontend/scripts/custom.js')}}"></script>
</body>