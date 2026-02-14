<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="{{$settings->site_name}}- Login to Dashboard">
    <meta name="author" content="{{$settings->site_name}}- Login to Dashboard">
    <meta name="keywords" content="{{$settings->site_name}}- Login to Dashboard">
    <title>@yield('title') | {{ $settings->site_name }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}" type="image/x-icon" />

    <!-- Title -->
    <title>{{$settings->site_name}}- Login to Dashboard</title>

    <!-- Bootstrap css-->
    <link id="style" href="{{ asset('temp/auth/main/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Icons css-->
    <link href="{{ asset('temp/auth/main/assets/web-fonts/icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('temp/auth/main/assets/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('temp/auth/main/assets/web-fonts/plugin.css')}}" rel="stylesheet" />

    <!-- Style css-->
    <link href="{{ asset('temp/auth/main/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('temp/auth/main/assets/css/plugins.css')}}" rel="stylesheet">
    <script src="{{ asset('temp/auth/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
    <script src="{{ asset('temp/auth/plugins/sweetalerts/promise-polyfill.js')}}"></script>
    <link href="{{ asset('temp/auth/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/sweetalert2%407.8.2/dist/sweetalert2.all.js"></script>

</head>

<body class="main-body leftmenu ltr dark-theme">
    <style>
    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(1),
    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(2),
    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(3) {
        display: none;
    }

    div#google_translate_element div.goog-te-gadget-simple {
        margin: 0px;
        padding: 10px;
        display: inline-block;
        background-color:#0080db00;
        border: 1px solid #0080db00;
    }

    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value {
        color: white;
    }

    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value::after {
        content: "Translate Site";
        padding-right: 5px;
    }

    div#google_translate_element div.goog-te-gadget-simple img:nth-of-type(1) {
        display: none;
    }
    </style>

    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript"
        src="translate.google.com/translate_a/elementa0d8a0d8.html?cb=googleTranslateElementInit"></script>

    <!-- Loader -->
    {{-- <div id="global-loader">
        <img src="{{ asset('temp/auth/main/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
    </div> --}}
    <!-- End Loader -->

    <!-- Page -->
    <div class="page main-signin-wrapper">




        @yield('content')



 @include('layouts.lang')
    </div>
    <!-- End Page -->

    <!-- Jquery js-->
    <script src="{{ asset('temp/auth/main/assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('temp/auth/main/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{ asset('temp/auth/main/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Bootstrap Show Password js-->
    <script src="{{ asset('temp/auth/main/assets/js/bootstrap-show-password.min.js')}}"></script>

    <!-- generate-otp js -->
    <script src="{{ asset('temp/auth/main/assets/js/generate-otp.js')}}"></script>

    <!-- Perfect-scrollbar js -->
    <script src="{{ asset('temp/auth/main/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <!-- Select2 js-->
    <script src="{{ asset('temp/auth/main/assets/plugins/select2/js/select2.min.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('temp/auth/main/assets/js/themeColors.js')}}"></script>

    <!-- swither styles js -->
    <script src="{{ asset('temp/auth/main/assets/js/swither-styles.js')}}"></script>

    <!-- Custom js -->
    <script src="{{ asset('temp/auth/main/assets/js/custom.js')}}"></script>
    <!-- Smartsupp Live Chat script -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://use.fontawesome.com/b69656bbf6.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap%405.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

</body>

</html>

