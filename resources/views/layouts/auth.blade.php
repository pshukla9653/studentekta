<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>{{ config('app.name', 'StudentEkta') }}</title>

    <!-- vendor css -->
	
    <link href="{{ asset('backend/lib/%40fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bracket.css') }}">
  </head>

<body>
      @yield('content')
	  <script src="{{ asset('frontend/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('frontend/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{ asset('frontend/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>