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


<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="index.html" class="header-title">Subscriptions</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>       
    <div class="page-content pb-0">
        
            
        <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-1" data-splide='{"autoplay":false}'>
            <div class="splide__track">
                <div class="splide__list">
                    <div class="splide__slide">
                        <div class="card rounded-0" data-card-height="cover-full">
                            <div class="card-top text-center mt-5">
                                <h1 class="font-18 font-700 color-highlight mb-n1">Say Hello to</h1>
                                <h1 class="font-40 font-800 pb-4">AppKit</h1>
                                <h4 class="opacity-60 mb-4 pb-4">Explore endless possibilties <br> like never seen before on Mobile.</h4>
                                <h1 class="text-center"><img src="{{ asset('/frontend/images/side-1.png')}}" class="mx-auto" width="240"></h1>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card rounded-0" data-card-height="cover-full">
                            <div class="card-top text-center  mt-5">
                                <h1 class="font-18 font-700 color-highlight mb-n1">Appkit Is</h1>
                                <h1 class="font-34 font-800 pb-4">PWA Ready</h1>
                                <h4 class="opacity-60 mb-4 pb-4">Add it to your Home Screen <br> Use it like a Native Application.</h4>
                                <h1 class="text-center"><img src="{{ asset('/frontend/images/side-2.png')}}" class="mx-auto" width="240"></h1>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card rounded-0" data-card-height="cover-full">
                            <div class="card-top text-center  mt-5">
                                <h1 class="font-18 font-700 color-highlight mb-n1">Lights off with</h1>
                                <h1 class="font-34 font-800 pb-4">Dark Mode</h1>
                                <h4 class="opacity-60 mb-4 pb-4">Add it to your Home Screen <br> Use it like a Native Application.</h4>
                                <h1 class="text-center"><img src="{{ asset('/frontend/images/side-3.png')}}" class="mx-auto" width="240"></h1>
                            </div>
                        </div>
                    </div>
                    <div class="splide__slide">
                        <div class="card rounded-0" data-card-height="cover-full">
                            <div class="card-top text-center  mt-5">
                                <h1 class="font-18 font-700 color-highlight mb-n1">Familiar Code</h1>
                                <h1 class="font-34 font-800 pb-4">Bootstrap</h1>
                                <h4 class="opacity-60 mb-4 pb-4">Code you understand <br> made easy to customise.</h4>
                                <h1 class="text-center">
                                    <img src="{{ asset('/frontend/images/side-4.png')}}" class="mx-auto" width="240"></h1>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
           
        
  
    
        
        <div class="slider-bottom-button mb-4">
            <a href="{{ route('mobile')}}" class="btn btn-primary">Get Started</a>  </div>
        
        
        
    </div>
	
    <!-- Page content ends here-->
</div>

<script type="text/javascript" src="{{ asset('/frontend/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/frontend/scripts/custom.js')}}"></script>
</body>

