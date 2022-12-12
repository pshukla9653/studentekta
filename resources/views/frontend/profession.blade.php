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
    
    <div class="header header-fixed header-logo-center ">
        <a href="index.html" class="header-title">
            <img src="{{ asset('/frontend/images/logo.png') }}" alt="">
        </a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-share" class="header-icon header-icon-2"><i class="fas fa-share-alt"></i></a>
    </div>
    
   
    
        
    <div class="page-content header-clear-medium" id="mobilebox">
        
          <div class="inputwidth">
            <div class="card card-style p-4">
                <div>
                    <h6 class="text-center mb-0 color-highlight opacity-60">MEET APPKIT</h6>
                    <h1 class="font-800 font-30 text-center line-height-xl">Elite Quality <br>Mobile Website</h1>
                    <p class="font-16 opacity-80 text-center line-height-l">
                        We create stunning Mobile Website and PWA's  so 
                        your website feels like an app and runs as smooth as butter
                    </p>
					<div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
						<div class="alert alert-danger" id="error" style="display: none;"></div>
                    <div class="row mb-0">
                        <div class="col-3">
        
                            <div class="input-style has-borders no-icon input-style-always-active mb-4">
                                <label for="form5" class="color-highlight font-500">Country</label>
                                <select id="form5">
                                    
                                    @foreach($countries as $country)
										<option value="+{{$country->isd_code}}" {{$country->isd_code==91?'selected':''}}>{{$country->country_name}}(+{{$country->isd_code}})</option>
									@endforeach
                                </select>
                                <span><i class="fa fa-chevron-down"></i></span>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <i class="fa fa-check disabled invalid color-red-dark"></i>
                                <em></em>
                            </div>
        
                           
                        </div>
                        <div class="col-9">
						
                            <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
                               
                                <input type="number" class="form-control validate-name font-20 font-900" pattern="^[0-9]+$" onkeypress="if(this.value.length==10) return false;" id="number" name="number" placeholder="Enter Mobile Number to Register" required="">
                                <br>
								<div id="recaptcha-container"></div>
                                <label for="form1" class="color-highlight font-500">Mobile Number</label>
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                            </div>
							
                        </div>
                    </div>
        
                    <a href="#" class="btn btn-primary mt-2" onclick="checkmobile();">Next</a>
                </div>
              
                
            </div>
        
          </div>

         
       
       
    </div>
 
 <div class="page-content  header-clear-medium" id="otpbox" style="display:none;">
    <div class="card card-style">
    <div class="content">
    <div class="text-center">
    <p class="font-600 color-highlight mb-n1">Let's start</p>
    <h1 class="font-24">One Time Passcode</h1>
    <p>
    Enter your verification code below to verify your identity and access your account.
    </p>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> <p class="font-20 font-900">Verification Code: 1556</p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="inputwidthotp">
                    <form action="registration.html" method="post" class="digit-group" data-group-name="digits" autocomplete="off">
    
                        <input type="hidden" value="9888888888" name="mobilenumber" maxlength="1">
                        <input class="otp mx-1 rounded-sm text-center font-20 font-900" id="digit-1" name="digit-1" data-next="digit-2" type="tel" value="●" autofocus="" maxlength="1">
                        <input class="otp mx-1 rounded-sm text-center font-20 font-900" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" type="tel" value="●" maxlength="1">
                        <input class="otp mx-1 rounded-sm text-center font-20 font-900" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" type="tel" value="●" maxlength="1">
                        <input class="otp mx-1 rounded-sm text-center font-20 font-900" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" type="tel" value="●" maxlength="1">
						<input class="otp mx-1 rounded-sm text-center font-20 font-900" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" type="tel" value="●" maxlength="1">
						<input class="otp mx-1 rounded-sm text-center font-20 font-900" id="digit-6" name="digit-6" data-previous="digit-5" type="tel" value="●" maxlength="1">
                        
                        <p class="text-center my-4 font-11">Didn't get your code? <a href="#">Resend Code</a></p>
                    
                        <button type="submit" class="btn btn-lg btn-l btn-info font-600 font-13 gradient-highlight mt-4 rounded-s border-0" >Next</button>
                        
                        </form>
                </div>
   
    </div>
    </div>
    </div>
    
    </div>
</div>

<script type="text/javascript" src="{{ asset('/frontend/scripts/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/frontend/scripts/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
<script>
      
  var firebaseConfig = {
    apiKey: "AIzaSyAhNXOPnc5JHpmZcHF0eSfUEiPtPDRBqWk",
    authDomain: "studentekta-4b39f.firebaseapp.com",
    projectId: "studentekta-4b39f",
    storageBucket: "studentekta-4b39f.appspot.com",
    messagingSenderId: "1015351065403",
    appId: "1:1015351065403:web:a61343ed1d82c492bf951e",
    measurementId: "G-WECBVR7G4S"
  };
    
  firebase.initializeApp(firebaseConfig);
</script>
  
<script type="text/javascript">
  
    window.onload=function () {
      render();
    };
  
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
  
    function phoneSendAuth() {
           
        var number = $("#form5").val() + $("#number").val();
         // alert(number);
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
              
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            console.log(coderesult);
  
            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();
			$("#mobilebox").hide();
			$("#otpbox").show();
              
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
  
    }
  
    function codeverify() {
  
        var code = $("#verificationCode").val();
  
        coderesult.confirm(code).then(function (result) {
            var user=result.user;
            console.log(user);
  
            $("#successRegsiter").text("you are register Successfully.");
            $("#successRegsiter").show();
  
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
	
	function checkmobile(){
		var mobile = $("#number").val();
				alert(mobile);
                
                $.ajax({
                    url: "{{url('api/fetch-mobile')}}",
                    type: "POST",
                    data: {
                        mobile: mobile,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
						if(result == ''){
							console.log(result);
						}
						else {
							if(result[0]['step_1'] == 1 ){
								if(result[0]['step_2'] == 0){
									window.location.href = "{{}}";
								}
								else{
									window.location.href = "http://www.w3schools.com";
								}
							}
							else{
								phoneSendAuth();
							}
							
						} 
						
                    }
                });
	}
</script>
</body>
