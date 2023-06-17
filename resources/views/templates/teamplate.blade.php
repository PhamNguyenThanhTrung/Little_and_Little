<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Little And Little - L</title>

    <!-- Latest compiled and minified CSS -->
    <link href="{{  asset('bootstrap-5.1.3-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="{{  asset('bootstrap-5.1.3-dist/js/bootstrap.min.js')}}"></script>
    <!-- link css -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=iCiel+Koni&display=swap">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-Wwp6i2JIn01nsRvKviE/7W3P6zNCQStHMWRFcHccF58XYRMm8dgA/6H9yrAK2O/7" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@^4.6.3/dist/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@^4.6.3/dist/flatpickr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset( 'storage/app/public/assets/images/Little & Little Logo page.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset( 'assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset( 'assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">

    <link href="{{ asset('storage/app/public/assets/css/flatpickr.min.css') }}" rel="stylesheet">
    <!-- link js -->
    <script src="{{  asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset( 'assets/js/slick.min.js') }}"></script>
    <script src="{{ asset( 'assets/js/carousel-multiple-items.js') }}"></script>
    <script src="{{ asset( 'assets/js/flatpickr.js') }}"></script>

    <script src="{{ asset( 'assets/js/Successpayment.js') }}"></script>
    <script src="{{ asset( 'assets/js/paymentpage.js') }}"></script>

</head>

<body>
 
    @include('includes.header')
    @yield('homepage')
    @yield('eventpage')
    @yield('contactpage')
    @yield('paymentpage')
    <script src="{{ asset( 'assets/js/custom-calendar.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/payment.css') }}">

</body>

</html>
