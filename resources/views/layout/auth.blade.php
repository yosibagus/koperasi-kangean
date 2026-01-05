<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <!--Title-->
  <title>{{ $title }}</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="TurboMain">
  <meta name="robots" content="index, follow">

  <meta name="twitter:image" content="social-image.png">
  <meta name="twitter:card" content="summary_large_image">

  <!-- MOBILE SPECIFIC -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon icon -->
  <link rel="icon" type="{{ asset('') }}assets/image/png" sizes="16x16" href="images/favicon.png">
  <link href="{{ asset('') }}assets/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="{{ asset('') }}assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link class="main-css" href="{{ asset('') }}assets/css/style.css" rel="stylesheet">

  <style>
    input {
      autocomplete: off !important;
      /* Tidak semua browser mendukung ini */
    }

    /* Atau sembunyikan saran browser */
    input::-webkit-autofill {
      display: none !important;
    }

    /* Hapus daftar autocomplete */
    input::-webkit-autofill,
    input::-webkit-autofill:hover,
    input::-webkit-autofill:focus,
    input::-webkit-autofill:active {
      box-shadow: 0 0 0px 1000px white inset !important;
      -webkit-text-fill-color: inherit !important;
    }
    .swal2-select {
            display: none !important;
        }
  </style>

</head>

<body class="h-100">
  <div class="login-account">
    <div class="row h-100">
      <div class="col-lg-6 align-self-start">
        <div class="account-info-area" style="background-image: url({{ asset('assets') }}/images/rainbow.gif)">
          <div class="login-content">
            <p class="sub-title">Amanah, Ridho, Barokah, Sejahtera</p>
            <h1 class="title">BMT Syari'ah <span style="font-size: 60%">Maslahatul Ummah</span></h1>
            <p class="text">Kami menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi Anda. Kebijakan
              Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, mengungkapkan, dan melindungi informasi
              Anda saat Anda menggunakan layanan kami.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
        <div class="login-form">
          <div class="login-head">
            <h3 class="title">Selamat Datang</h3>
            <p>Lengkapi form ini untuk registrasi akun atau login aplikasi</p>
          </div>
          <h6 class="login-title mb-3"><span>{{ $title }}</span></h6>
          @yield('form')
        </div>
      </div>
    </div>
  </div>


  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->


  <x-part.auth-alert></x-part.auth-alert>

  <script src="{{ asset('') }}assets/vendor/global/global.min.js"></script>
  <script src="{{ asset('') }}assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="{{ asset('') }}assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="{{ asset('') }}assets/js/custom.min.js"></script>
  <script src="{{ asset('') }}assets/js/deznav-init.js"></script>
  <script src="{{ asset('') }}assets/js/demo.js"></script>
  <script src="{{ asset('') }}assets/js/styleSwitcher.js"></script>

</body>

</html>
