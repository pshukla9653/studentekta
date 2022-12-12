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
    
<div id="page">
    
   <div class="page-content header-clear-medium">
        
          <div class="inputwidth">
            <div class="card card-style p-4 text-center registration">
               <h2 class="pb-4">Registration to <span>AAPKA SARTHI</span></h2>
                 
                  <div class="row">
                    <div class="col-12 pb-2">
                        <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                           
                            <input type="text" class="form-control validate-name font-20 font-900"  placeholder="Your Name" >
                            
                            <label for="form1" class="color-highlight  font-500">Your Name</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                        </div>
                    </div>
                    <div class="col-12 pb-2">
                        <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                           
                            <input type="text" class="form-control validate-name font-900"  placeholder="Set User Name" >
                            <label for="form1" class="color-highlight font-500">Set User Name</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                        </div>
                    </div>
                    <div class="col-12 pb-2">
                        <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                           
                           <input type="text" class="form-control validate-name font-900"  placeholder="Enter Valid Mail id" >
                            
                            <label for="form1" class="color-highlight font-500">Email id</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                        </div>
                    </div>

                    <div class="col-12 pb-2">
                        <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                           
                            <input type="text" class="form-control validate-name font-900"  placeholder="Set Password" >
                            <i class="far fa-eye-slash"></i>
                            <label for="form1" class="color-highlight font-500">Set Password</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                           
                            <input type="text" class="form-control validate-name font-900"  placeholder="Re enter password" >
                            <i class="far fa-eye-slash"></i>
                            <label for="form1" class="color-highlight font-500">Confirm Password</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                        </div>
                    </div>
                  </div>
                       
                 
        
                    <a href="#" class="btn btn-primary mt-2">Submit</a>
                </div>
              
                
            </div>
        
          </div>
    

</div>

<script type="text/javascript" src="{{ asset('/frontend/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/frontend/scripts/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
