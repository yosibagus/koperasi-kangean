<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Essential CSS Files -->
  <link rel="stylesheet" href="{{ asset('') }}landing/css/swiper-bundle.min.css">
  <link rel="stylesheet" href="{{ asset('') }}landing/css/flaticon_finto.css">
  <link rel="stylesheet" href="{{ asset('') }}landing/css/scrollCue.css">
  <link rel="stylesheet" href="{{ asset('') }}landing/css/remixicon.css">
  <link rel="stylesheet" href="{{ asset('') }}landing/css/style.css">
  <link rel="stylesheet" href="{{ asset('') }}landing/css/responsive.css">

  <!-- Title & Favicon -->
  <title>KSPPS BMT Maslahatul Ummah</title>
  <link rel="icon" type="image/png" href="{{ asset('') }}images/logo/@pusat('logo')">
</head>

<body>
  <!-- Start Preloader Area -->
  <div class="preloader-area text-center position-fixed top-0 bottom-0 start-0 end-0" id="preloader">
    <div class="loader position-absolute start-0 end-0">
      <div class="wavy position-relative fw-light">
        <span class="d-inline-block">
          <script type="text/javascript" style="display:none">
            //<![CDATA[
            window.__mirage2 = {
              petok: "1jHlrIFoiRpq4Fg9nrMhgWfOsIdXUUWN1lnMHVuJ9WE-1800-0.0.1.1"
            };
            //]]>
          </script>
          <script type="text/javascript"
            src="{{ asset('') }}landing/ajax.cloudflare.com/cdn-cgi/scripts/04b3eb47/cloudflare-static/mirage2.min.js">
          </script>
          <img alt="favicon" data-cfsrc="{{ asset('') }}images/logo/@pusat('logo')"
            style="display:none;visibility:hidden;"><noscript><img src="{{ asset('') }}images/logo/@pusat('logo')"
              alt="favicon"></noscript>
        </span>
        <span class="d-inline-block">A</span>
        <span class="d-inline-block">R</span>
        <span class="d-inline-block">B</span>
        <span class="d-inline-block">S</span>
      </div>
    </div>
  </div>
  <!-- End Preloader Area -->

  <div class="top-header-info">
    <!-- Start Top Header Area -->
    <div class="top-header-area bg-color-0c3a30">
      <div class="container-fluid side-padding">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <ul class="left-side">
              <li>
                <span>KSPPS BMT Maslahatul Ummah</span>
              </li>
              <li>
                <a href="tel:0018085550148">
                  <i class="flaticon-phone-call"></i>
                  <b>Call:</b> +62 808 5550 1148
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="flaticon-email-1"></i>
                  <b>Mail:</b>
                  <span>bmt@gmail.com</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Top Header Area -->

    <!-- Start Navbar Area -->
    <nav class="navbar navbar-expand-lg bg-color-ffffff" id="navbar">
      <div class="container-fluid side-padding position-relative">
        <a class="navbar-brand logo-brand px-0 py-0 mx-0 my-0" href="/">
          <img alt="image" data-cfsrc="{{ asset('') }}images/logo/@pusat('logo')" width="15%"
            style="display:none;visibility:hidden;"><noscript><img
              src="{{ asset('') }}images/logo/@pusat('logo')" alt="image" width="15%"></noscript>
        </a>
        <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button"
          aria-controls="navbarOffcanvas">
          <span class="burger-menu">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
          </span>
        </a>

        <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="/" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Home
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle scroll-link" href="#service" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Services
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle scroll-link" href="#tabungan" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Jenis tabungan
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link scroll-link" href="#contact">
                Contact
              </a>
            </li>
          </ul>
        </div>

        <div class="others-options" style="margin-left: -20px">
          <ul class="d-flex justify-content-around align-items-center ps-0 mb-0 list-unstyled">
            <li class="">
              <a href="/login" class="search-btn login"><i class="ri-account-circle-line"></i> Log in</a>
            {{-- </li>
            <li class="">
              <a href="/register" class="search-btn register"><i class="ri-account-circle-line"></i> Register</a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar Area -->
  </div>

  <!-- Start Mobile Navbar Area -->
  <div class="mobile-navbar offcanvas offcanvas-end border-0" data-bs-backdrop="static" tabindex="-1"
    id="navbarOffcanvas">
    <div class="offcanvas-header">
      <a href="/" class="logo d-inline-block">
        <img alt="logo" data-cfsrc="{{ asset('') }}images/logo/@pusat('logo')" width="15%"
          style="display:none;visibility:hidden;"><noscript><img
            src="{{ asset('') }}images/logo/@pusat('logo')" width="15%" alt="logo"></noscript>
      </a>

      <button type="button" class="close-btn bg-transparent position-relative lh-1 p-0 border-0"
        data-bs-dismiss="offcanvas" aria-label="close">
        <i class="ri-close-fill"></i>
      </button>
    </div>

    <div class="offcanvas-body">
      <ul class="mobile-menu">
        <li class="mobile-menu-list active without-icon">
          <a href="/" class="nav-link">
            Home
          </a>
        </li>

        <li class="mobile-menu-list without-icon">
          <a href="#service" class="nav-link scroll-link">
            Services
          </a>

        </li>
        <li class="mobile-menu-list without-icon">
          <a href="#service" class="nav-link scroll-link">
            Jenis tabungan
          </a>
        </li>

        <li class="mobile-menu-list without-icon">
          <a href="#contact" class="nav-link scroll-link">
            Contact
          </a>
        </li>
      </ul>

      <!-- Others options -->
      <div class="others-options">
        <ul class="d-flex align-items-center ps-0 mb-0 list-unstyled">
          <li>
            <a href="/login" class="search-btn login"><i class="ri-account-circle-line"></i> Log in</a>
          </li>
          <li>
            <a href="/register" class="search-btn login"><i class="ri-account-circle-line"></i> Register</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Mobile Navbar Area -->>

  <!-- Start Main Banner Area -->
  <div class="main-banner-area overflow-hidden position-relative"
    style="background-image: url({{ asset('') }}landing/images/hero/hero-image-1.svg)">
    <div class="container-fluid side-padding pb-100">
      <div class="row align-items-center">
        <div class="col-xl-5 col-lg-12" data-cues="slideInRight" data-duration="800">
          <div class="main-banner-content">
            <span class="sub-t">Selamat Datang di KSPPS BMT Maslahatul Ummah</span>
            <h1>Amanah, <span><img src="{{ asset('') }}landing/images/svg/your.svg" alt="image"> Ridho,</span>
              Barokah, Sejahtera.</h1>
          </div>
        </div>
        <div class="col-xl-7 col-lg-12" data-cues="slideInLeft" data-duration="800">
          <div class="info">
            <p
              style="font-family: 'Georgia', serif; font-style: italic; font-size: 18px; line-height: 1.8; color: #333; text-align: justify; background-color: #f9f9f9; padding: 15px; border-left: 5px solid #4CAF50;">
              "Kami berkomitmen untuk menjadi mitra terpercaya dalam layanan keuangan, dengan menghadirkan solusi
              tabungan, peminjaman, dan pegadaian yang amanah. Misi kami adalah memberikan layanan yang inovatif dan
              mudah diakses, sesuai dengan prinsip Amanah, Ridho, Barokah, dan Sejahtera."
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card-area">
      <div class="container-fluid side-padding">
        <div class="row g-4 justify-content-center" data-cues="slideInUp" data-duration="800">
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="banner-card bg-color-ffffff radius-30">
              <div class="flex-warp position-relative">
                <i>
                  <img src="{{ asset('') }}landing/images/svg/grow.svg" alt="image">
                </i>
                <h3>Buat Rekening dengan Mudah</h3>
              </div>
              <div class="banner-card-body bg-color-def1ee">
                <img alt="image" data-cfsrc="{{ asset('') }}assets/images/card/3.jpg" width="100%"
                  style="display:none;visibility:hidden;"><noscript><img
                    src="{{ asset('') }}assets/images/card/3.jpg" alt="image" width="100%"></noscript>
              </div>
            </div>

            <!-- Advice Area Start -->
            <div class="advice-area bg-color-ffffff radius-20">
              <div class="container-fluid">
                <div class="advice-content">
                  <ul>
                    <li>Tabungan</li>
                    <li>Pinjaman</li>
                    <li>Pegadaian</li>
                    <li>Rekening</li>
                    <li>Tabungan</li>
                    <li>Pinjaman</li>
                    <li>Pegadaian</li>
                    <li>Rekening</li>
                    <li>Tabungan</li>
                    <li>Pinjaman</li>
                    <li>Pegadaian</li>
                    <li>Rekening</li>
                    <li>Tabungan</li>
                    <li>Pinjaman</li>
                    <li>Pegadaian</li>
                    <li>Rekening</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="banner-card part-two bg-color-9edd05 radius-30 position-relative">
              <div class="flex-warp position-relative">
                <i>
                  <img src="{{ asset('') }}landing/images/svg/corporation.svg" alt="image">
                </i>
                <h3>Tracking Saldo dan tagihan</h3>
              </div>
              <p class="mb-0">Our digital solutions transform money management investing and transaction.</p>
              <div class="banner-card-image">
                <div class="text-end">
                  <img alt="image" data-cfsrc="{{ asset('') }}landing/images/service/service-image-2.png"
                    style="display:none;visibility:hidden;"><noscript><img
                      src="{{ asset('') }}landing/images/service/service-image-2.png" alt="image"></noscript>
                </div>
              </div>

              <div class="total bg-color-ffffff radius">
                <h4>Total Saldo</h4>
                <h5>RP. 900.647</h5>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="banner-card part-three bg-color-ffffff radius-30 position-relative">
              <div class="flex-warp position-relative">
                <i>
                  <img src="{{ asset('') }}landing/images/svg/euro.svg" alt="image">
                </i>
                <h3>Tracking Histori Tabungan, dan Histori Transaksi dengan satu aplikasi</h3>
              </div>
              <div class="banner-image-body">
                <div class="text-end">
                  <img class="service-image-3" alt="image"
                    data-cfsrc="{{ asset('') }}landing/images/service/service-image-3.png"
                    style="display:none;visibility:hidden;"><noscript><img class="service-image-3"
                      src="{{ asset('') }}landing/images/service/service-image-3.png" alt="image"></noscript>
                </div>
                <img class="service-image-4" alt="image"
                  data-cfsrc="{{ asset('') }}landing/images/service/service-image-4.png"
                  style="display:none;visibility:hidden;"><noscript><img class="service-image-4"
                    src="{{ asset('') }}landing/images/service/service-image-4.png" alt="image"></noscript>
              </div>
              <i class="flaticon-star-5 star-5 moveHorizontal_reverse"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Banner Area -->

  <!-- Start Service Area -->
  <div class="features-area bg-color-0c3a30 ptb-120 overflow-hidden" id="service">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-6 col-lg-12" data-cues="slideInRight" data-duration="800">
          <div class="features-image bg-color-9edd05 radius-30 position-relative">
            <img class="feature-image-1" alt="image"
              data-cfsrc="{{ asset('') }}landing/images/feature/feature-image-1.png"
              style="display:none;visibility:hidden;"><noscript><img class="feature-image-1"
                src="{{ asset('') }}landing/images/feature/feature-image-1.png" alt="image"></noscript>
            <img class="feature-image-2 bounce" alt="image"
              data-cfsrc="{{ asset('') }}landing/images/feature/feature-image-2.png"
              style="display:none;visibility:hidden;"><noscript><img class="feature-image-2 bounce"
                src="{{ asset('') }}landing/images/feature/feature-image-2.png" alt="image"></noscript>
            <img class="feature-shape-1 moveVertical" alt="image"
              data-cfsrc="{{ asset('') }}landing/images/shape/feature-shape-1.png"
              style="display:none;visibility:hidden;"><noscript><img class="feature-shape-1 moveVertical"
                src="{{ asset('') }}landing/images/shape/feature-shape-1.png" alt="image"></noscript>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12" data-cues="slideInLeft" data-duration="800">
          <div class="features-content">
            <div class="section-heading">
              <span class="sub-title">LAYANAN UTAMA</span>
              <h2 class="text-white">Mari Tingkatkan <span><img
                    src="{{ asset('') }}landing/images/svg/lines-1.svg" alt="image">Kesejahteraan</span>
                Bersama</h2>
              <p class="text-white">Dengan layanan yang berlandaskan prinsip Amanah, Ridho, Barokah, dan Sejahtera,
                kami hadir untuk
                memenuhi kebutuhan keuangan Anda melalui tabungan, pinjaman, dan pegadaian yang terpercaya.</p>
            </div>

            <ul>
              <li class="bg-color-29594b radius-20">
                <i class="flaticon-businessman-1"></i>
                <h3 class="text-white">Layanan Tabungan</h3>
                <p class="text-white">Nikmati berbagai pilihan tabungan yang fleksibel dan aman untuk membantu Anda
                  mengelola
                  keuangan dengan lebih baik.</p>
              </li>
              <li class="bg-color-29594b radius-20">
                <i class="flaticon-payment-method"></i>
                <h3 class="text-white">Layanan Pinjaman</h3>
                <p class="text-white">Kami menyediakan pinjaman dengan proses yang mudah dan cepat untuk mendukung
                  kebutuhan Anda,
                  baik usaha maupun pribadi.</p>
              </li>
              <li class="bg-color-29594b radius-20">
                <i class="flaticon-laptop-2"></i>
                <h3 class="text-white">Layanan Pegadaian</h3>
                <p class="text-white">Solusi gadai yang aman dan transparan untuk membantu Anda mendapatkan dana dengan
                  jaminan
                  barang berharga.</p>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>

    <div class="partner-area pt-120">
      <div class="container">
        <div class="title">
          <p>SUPPORTED BY</p>
        </div>
        <div class="partner-items">
          <div class="swiper partner-slide">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="partner-logo ">
                  <img alt="image" data-cfsrc="{{ asset('') }}images/partner/turbo.png"
                    style="display:none;visibility:hidden;"><noscript><img
                      src="{{ asset('') }}images/partner/turbo.png" alt="image"></noscript>
                      {{-- <h4 class="text-white">Kasih Logo Turbo Biar menyala</h4> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Service Area -->

  <!-- Start Jenis Tabungan Area -->
  <div class="services-area ptb-120 position-relative overflow-hidden" id="tabungan">
    <div class="container left-padding">
      <div class="row align-items-center">
        <div class="col-xl-4 col-lg-12" data-cues="slideInLeft" data-duration="800">
          <div class="section-heading position-relative mb-0">
            <span class="sub-title">JENIS TABUNGAN</span>
            <h2>Beragam <span><img src="{{ asset('') }}landing/images/svg/lines-2.svg" alt="">Pilihan
                Tabungan</span>
              Untuk Anda</h2>
            <p class="mb-5">Kami menyediakan berbagai jenis tabungan dengan keuntungan tambahan bagi hasil bulanan
              yang menarik, sesuai dengan kebutuhan dan tujuan finansial Anda.</p>

            <a href="#about" class="default-btn two">Tentang Kami<i class="ri-arrow-right-up-line"></i></a>

            <div class="services-btn">
              <div class="swiper-button-next">
                <i class="ri-arrow-right-line"></i>
              </div>
              <div class="swiper-button-prev">
                <i class="ri-arrow-left-line"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-12">
          <div class="services-items">
            <div class="swiper services-slide">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="services-card position-relative">
                    <img class="radius-30" alt="image"
                      data-cfsrc="{{ asset('') }}landing/images/service/service-image-5.jpg"
                      style="display:none;visibility:hidden;"><noscript><img class="radius-30"
                        src="{{ asset('') }}landing/images/service/service-image-5.jpg"
                        alt="image"></noscript>
                    <div class="services-card-body bg-color-fffaeb radius-30">
                      <i class="flaticon-businessman-5 businessman"></i>
                      <h3>
                        <a href="service-details.html">Tabungan Mudarabah</a>
                      </h3>
                      <p class="mb-0">Dapatkan tambahan bagi hasil menarik setiap bulan jika saldo minimal mencapai
                        Rp. 10.000.000. Tabungan ini cocok untuk Anda yang ingin menabung sambil berbagi keuntungan.</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="services-card position-relative">
                    <img class="radius-30" alt="image"
                      data-cfsrc="{{ asset('') }}landing/images/service/service-image-6.jpg"
                      style="display:none;visibility:hidden;"><noscript><img class="radius-30"
                        src="{{ asset('') }}landing/images/service/service-image-6.jpg"
                        alt="image"></noscript>
                    <div class="services-card-body bg-color-fffaeb radius-30">
                      <i class="flaticon-browser-1 businessman"></i>
                      <h3>
                        <a href="service-details.html">Tabungan Pendidikan</a>
                      </h3>
                      <p class="mb-0">Dirancang untuk kebutuhan pendidikan anak Anda. Tambahan bagi hasil bulanan
                        tersedia jika saldo minimal Rp. 10.000.000.</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="services-card position-relative">
                    <img class="radius-30" alt="image"
                      data-cfsrc="{{ asset('') }}landing/images/service/service-image-7.jpg"
                      style="display:none;visibility:hidden;"><noscript><img class="radius-30"
                        src="{{ asset('') }}landing/images/service/service-image-7.jpg"
                        alt="image"></noscript>
                    <div class="services-card-body bg-color-fffaeb radius-30">
                      <i class="flaticon-laptop-1 businessman"></i>
                      <h3>
                        <a href="service-details.html">Tabungan Umum</a>
                      </h3>
                      <p class="mb-0">Tabungan fleksibel untuk segala kebutuhan Anda. Tambahan bagi hasil bulanan
                        diberikan jika saldo minimal mencapai Rp. 20.000.000.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End Jenis Tabungan Area -->

  <!-- Start About Us Area -->
  <div class="about-us-area pb-120 overflow-hidden">
    <div class="container">
      <div class="about-top mb-5">
        <div class="row align-items-center" data-cues="slideInUp" data-duration="800">
          <div class="col-lg-7 col-md-7">
            <div class="section-heading mb-0">
              <span class="sub-title">TENTANG KAMI</span>
              <h2 class="mb-0">Memanfaatkan Teknologi <span><img
                    src="{{ asset('') }}landing/images/svg/lines-3.svg" alt="image">Untuk</span> Solusi
                Keuangan Modern</h2>
            </div>
          </div>
          <div class="col-lg-5 col-md-5">
            <div class="content">
              <p>Kami menggabungkan teknologi canggih dengan keahlian finansial untuk memberikan layanan lengkap yang
                sesuai dengan kebutuhan individu dan bisnis.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="about-info bg-color-edf1ee radius-30">
        <div class="row g-4">
          <div class="col-lg-6" data-cues="slideInRight" data-duration="800">
            <div class="about-content">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="miss-tab" data-bs-toggle="tab"
                    data-bs-target="#miss-tab-pane" type="button" role="tab" aria-controls="miss-tab-pane"
                    aria-selected="true">Misi Kami</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="qua-tab" data-bs-toggle="tab" data-bs-target="#qua-tab-pane"
                    type="button" role="tab" aria-controls="qua-tab-pane" aria-selected="false">Kualitas
                    Kami</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="vis-tab" data-bs-toggle="tab" data-bs-target="#vis-tab-pane"
                    type="button" role="tab" aria-controls="vis-tab-pane" aria-selected="false">Visi
                    Kami</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="top-tab" data-bs-toggle="tab" data-bs-target="#top-tab-pane"
                    type="button" role="tab" aria-controls="top-tab-pane" aria-selected="false">Keamanan
                    Terbaik</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="miss-tab-pane" role="tabpanel" aria-labelledby="miss-tab"
                  tabindex="0">
                  <div class="title">
                    <h2>Dedikasi Untuk Mendukung Keuangan Anda</h2>
                    <p class="mb-0">Kami menawarkan produk-produk inovatif mulai dari perbankan digital hingga
                      aplikasi manajemen kekayaan dan blockchain.</p>
                  </div>

                  <ul class="check">
                    <li>
                      <i class="ri-check-line"></i>
                      Membayar Tagihan Tepat Waktu Dengan Mudah
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Membuat dan Mengirimkan Faktur Dalam Hitungan Detik
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Mengelola Arus Kas Secara Fleksibel
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="qua-tab-pane" role="tabpanel" aria-labelledby="qua-tab"
                  tabindex="0">

                  <div class="title">
                    <h2>Solusi Keuangan Berkualitas Tinggi</h2>
                    <p class="mb-0">Kami berkomitmen untuk memberikan layanan terbaik melalui teknologi modern dan
                      tim ahli di bidang keuangan.</p>
                  </div>

                  <ul class="check">
                    <li>
                      <i class="ri-check-line"></i>
                      Pembayaran Tagihan yang Cepat dan Aman
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Sistem Faktur Digital yang Mudah Digunakan
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Transparansi dan Kendali Penuh atas Keuangan Anda
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="vis-tab-pane" role="tabpanel" aria-labelledby="vis-tab"
                  tabindex="0">
                  <div class="title">
                    <h2>Visi Kami Untuk Masa Depan Keuangan</h2>
                    <p class="mb-0">Menjadi mitra keuangan terbaik dengan solusi yang berorientasi pada kebutuhan
                      masa depan Anda.</p>
                  </div>

                  <ul class="check">
                    <li>
                      <i class="ri-check-line"></i>
                      Solusi Finansial yang Disesuaikan dengan Kebutuhan
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Inovasi yang Mendukung Masa Depan Keuangan
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Komitmen pada Keamanan dan Keandalan
                    </li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="top-tab-pane" role="tabpanel" aria-labelledby="top-tab"
                  tabindex="0">
                  <div class="title">
                    <h2>Keamanan Adalah Prioritas Kami</h2>
                    <p class="mb-0">Kami memastikan data dan transaksi Anda selalu terlindungi dengan sistem keamanan
                      terbaik.</p>
                  </div>

                  <ul class="check">
                    <li>
                      <i class="ri-check-line"></i>
                      Teknologi Enkripsi Terkini
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Proses Verifikasi yang Cepat dan Akurat
                    </li>
                    <li>
                      <i class="ri-check-line"></i>
                      Perlindungan 24/7 Terhadap Ancaman Digital
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-cues="slideInLeft" data-duration="800">
            <div class="about-image bg-color-ffffff radius-30">
              <img class="about-image-1" alt="image"
                data-cfsrc="{{ asset('') }}landing/images/about/about-image-1.jpg"
                style="display:none;visibility:hidden;"><noscript><img class="about-image-1"
                  src="{{ asset('') }}landing/images/about/about-image-1.jpg" alt="image"></noscript>
              <img class="about-image-2" alt="image"
                data-cfsrc="{{ asset('') }}landing/images/about/about-image-1.png"
                style="display:none;visibility:hidden;"><noscript><img class="about-image-2"
                  src="{{ asset('') }}landing/images/about/about-image-1.png" alt="image"></noscript>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- End About Us Area -->

  <!-- Start Why Choose Us Area -->
  <div class="why-choose-us-area mb-5 overflow-hidden">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-12" data-cues="slideInRight" data-duration="800">
          <div class="choose-image position-relative">
            <img class="radius-30" alt="image"
              data-cfsrc="{{ asset('') }}landing/images/about/about-image-2.jpg"
              style="display:none;visibility:hidden;"><noscript><img class="radius-30"
                src="{{ asset('') }}landing/images/about/about-image-2.jpg" alt="image"></noscript>
          </div>
        </div>
        <div class="col-lg-6 col-md-12" data-cues="slideInLeft" data-duration="800">
          <div class="why-choose-us-content">
            <div class="section-heading mb-0">
              <span class="sub-title">KENAPA MEMILIH KAMI</span>
              <h2>Tumbuhkan <span><img src="{{ asset('') }}landing/images/svg/lines-1.svg" alt="image">
                  Transaksi</span> Anda ke Tingkat yang Lebih Tinggi</h2>
              <p class="mb-5">Dengan berbagai produk unggulan mulai dari perbankan digital, pengolahan pembayaran,
                hingga manajemen kekayaan dan aplikasi blockchain, kami memberdayakan klien kami untuk mencapai tujuan
                finansial mereka.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Why Choose Us Area -->

  <!-- Start How It Works Area -->
  <div class="how-it-works-area bg-color-0c3a30 ptb-120">
    <div class="container">
      <div class="about-top mb-5">
        <div class="row align-items-center">
          <div class="col-lg-7 col-md-7" data-cues="slideInRight" data-duration="800">
            <div class="section-heading mb-0">
              <span class="sub-title text-white">CARA MENABUNG, MEMINJAM, DAN GADAI</span>
              <h2 class="text-white mb-0">Proses yang Mudah untuk <span><img
                    src="{{ asset('') }}landing/images/svg/lines-1.svg" alt="image"> Menabung, Meminjam, dan
                  Gadai</span></h2>
            </div>
          </div>
          <div class="col-lg-5 col-md-5" data-cues="slideInLeft" data-duration="800">
            <div class="content">
              <p class="text-white">Dengan layanan yang mudah dan cepat, Anda dapat menabung, meminjam, atau
                menggadaikan barang dengan sistem yang transparan dan terpercaya. Berikut adalah alur lengkapnya:</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-xl-4 col-lg-12">
          <div class="works-btn">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-menabung" data-bs-toggle="tab"
                  data-bs-target="#menabung-tab-pane" type="button" role="tab"
                  aria-controls="menabung-tab-pane" aria-selected="true">Cara Menabung <i
                    class="ri-arrow-right-up-line"></i></button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-minjam" data-bs-toggle="tab" data-bs-target="#minjam-tab-pane"
                  type="button" role="tab" aria-controls="minjam-tab-pane" aria-selected="false">Cara Meminjam
                  <i class="ri-arrow-right-up-line"></i></button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-gadai" data-bs-toggle="tab" data-bs-target="#gadai-tab-pane"
                  type="button" role="tab" aria-controls="gadai-tab-pane" aria-selected="false">Cara Gadai <i
                    class="ri-arrow-right-up-line"></i></button>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-8 col-lg-12">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="menabung-tab-pane" role="tabpanel"
              aria-labelledby="tab-menabung" tabindex="0">
              <div class="row g-4" data-cues="slideInUp" data-duration="800">
                <div class="col-lg-6">
                  <div class="single-works-image">
                    <img class="radius-30" alt="image"
                      data-cfsrc="{{ asset('') }}landing/images/about/about-image-3.jpg"
                      style="display:none;visibility:hidden;">
                    <noscript><img class="radius-30" src="{{ asset('') }}landing/images/about/about-image-3.jpg"
                        alt="image"></noscript>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-works-card bg-color-29594b radius-30">
                    <h3 class="text-white">Cara Menabung</h3>
                    <p class="text-white">Datang ke teller untuk membuka rekening tabungan Anda. Teller akan memproses
                      dan membuatkan buku rekening, sehingga Anda bisa mencatat setiap transaksi masuk dan keluar. Anda
                      dapat menarik tunai kapan saja selama jam kerja bank.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="minjam-tab-pane" role="tabpanel" aria-labelledby="tab-minjam"
              tabindex="0">
              <div class="row" data-cues="slideInUp" data-duration="800">
                <div class="col-lg-6">
                  <div class="single-works-image">
                    <img class="radius-30" alt="image"
                      data-cfsrc="{{ asset('') }}landing/images/about/about-image-10.jpg"
                      style="display:none;visibility:hidden;">
                    <noscript><img class="radius-30" src="{{ asset('') }}landing/images/about/about-image-10.jpg"
                        alt="image"></noscript>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-works-card bg-color-29594b radius-30">
                    <h3 class="text-white">Cara Meminjam</h3>
                    <p class="text-white">Kunjungi teller untuk mengajukan permohonan pinjaman. Setelah disetujui,
                      teller akan membuatkan buku rekening yang mencatat cicilan pinjaman Anda. Proses ini memudahkan
                      Anda dalam mengelola pinjaman dan cicilan secara transparan.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="gadai-tab-pane" role="tabpanel" aria-labelledby="tab-gadai"
              tabindex="0">
              <div class="row" data-cues="slideInUp" data-duration="500">
                <div class="col-lg-6">
                  <div class="single-works-image">
                    <img class="radius-30" alt="image"
                      data-cfsrc="{{ asset('') }}landing/images/about/about-image-11.jpg"
                      style="display:none;visibility:hidden;">
                    <noscript><img class="radius-30" src="{{ asset('') }}landing/images/about/about-image-11.jpg"
                        alt="image"></noscript>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="single-works-card bg-color-29594b radius-30">
                    <h3 class="text-white">Cara Gadai</h3>
                    <p class="text-white">Proses gadai hampir sama seperti pinjaman. Anda dapat mengunjungi teller
                      untuk mengajukan gadai, dan teller akan membuatkan buku rekening untuk mencatat barang yang
                      digadaikan serta transaksi terkait.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- End How It Works Area -->

  <!-- Start Blog Area -->
  <div class="blog-area pb-120">
    <div class="container">
    </div>
  </div>
  <!-- End Blog Area -->

  <!-- Start Faq Area -->
  <div class="faq-area pb-120 overflow-hidden">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6 col-md-12" data-cues="slideInRight" data-duration="800">
          <div class="question-card bg-color-9edd05 radius-30">
            <div class="section-heading">
              <span class="sub-title">FAQ</span>
              <h2>Pertanyaan <span><img src="{{ asset('') }}landing/images/svg/lines-4.svg" alt="image">Yang
                  Sering Ditanyakan</span>
              </h2>
              <p>Kami menyediakan berbagai produk yang meliputi layanan tabungan, peminjaman, dan pegadaian yang amanah
                dan dapat dipercaya untuk memenuhi kebutuhan Anda dalam meraih kesejahteraan.</p>
            </div>
            <img class="radius-30" alt="image"
              data-cfsrc="{{ asset('') }}landing/images/blog/blog-image-4.jpg"
              style="display:none;visibility:hidden;"><noscript><img class="radius-30"
                src="{{ asset('') }}landing/images/blog/blog-image-4.jpg" alt="image"></noscript>
          </div>
        </div>
        <div class="col-lg-6 col-md-12" data-cues="slideInLeft" data-duration="800">
          <div class="faq-content">
            <div class="accordion" id="accordionFAQ">
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseBang" aria-expanded="false" aria-controls="collapseBang">
                  1. Mengapa saya perlu peduli dengan perencanaan keuangan?
                </button>
                <div id="collapseBang" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">
                    <p>Misi kami adalah menjembatani kesenjangan antara perbankan tradisional dan layanan keuangan
                      modern
                      dengan menawarkan layanan inovatif yang dapat memenuhi kebutuhan individu dan bisnis yang terus
                      berkembang, dengan pendekatan yang amanah.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseSunam" aria-expanded="false" aria-controls="collapseSunam">
                  2. Apa saja jenis investasi yang tersedia?
                </button>
                <div id="collapseSunam" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">
                    <p>Investasi adalah salah satu cara untuk mengembangkan aset Anda, baik dalam bentuk tabungan atau
                      peminjaman. Kami menyediakan berbagai pilihan investasi yang aman dan menguntungkan untuk Anda.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseDinaj" aria-expanded="false" aria-controls="collapseDinaj">
                  3. Bagaimana cara saya mulai menabung untuk pensiun?
                </button>
                <div id="collapseDinaj" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">
                    <p>Mulailah dengan menabung secara rutin dan manfaatkan produk tabungan kami yang dirancang khusus
                      untuk memastikan Anda memiliki dana yang cukup untuk masa pensiun.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage">
                  4. Mengapa dana darurat itu penting?
                </button>
                <div id="collapsePage" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">
                    <p>Dana darurat sangat penting untuk menghadapi kondisi tak terduga. Tabungan darurat kami
                      memberikan
                      solusi aman untuk menyiapkan masa depan yang lebih sejahtera.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseLoan" aria-expanded="false" aria-controls="collapseLoan">
                  5. Untuk apa saya bisa menggunakan pinjaman pribadi?
                </button>
                <div id="collapseLoan" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">
                    <p>Pinjaman pribadi dapat digunakan untuk berbagai kebutuhan, seperti biaya pendidikan, renovasi
                      rumah,
                      atau kebutuhan mendesak lainnya. Kami menawarkan layanan pinjaman dengan proses yang mudah dan
                      cepat.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseScore" aria-expanded="false" aria-controls="collapseScore">
                  6. Berapa skor kredit yang dibutuhkan untuk pinjaman pribadi?
                </button>
                <div id="collapseScore" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                  <div class="accordion-body">
                    <p>Skor kredit Anda akan mempengaruhi keputusan pinjaman. Kami menyediakan solusi untuk membantu
                      Anda
                      memahami dan meningkatkan skor kredit Anda agar dapat memenuhi syarat untuk pinjaman.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Faq Area -->

  <!-- Start Footer Area -->
  <div class="footer-area bg-color-0c3a30 pt-120" id="contact">
    <div class="container">
      <div class="row" data-cues="slideInUp" data-duration="800">
        <!-- Subscribe Newsletter -->
        <div class="col-xl-4 col-lg-9 col-md-6">
          <div class="footer-weight">
            <h2 class="text-white">Hubungi Kami</h2>
            <form class="footer-form position-relative">
              <input type="email" class="form-control" placeholder="Masukkan Email Anda">
              <button onclick="event.preventDefault()" type="submit" class="default-btn">Langganan <i class="ri-arrow-right-up-line"></i></button>
            </form>
            <ul class="social">
              <li><span>Ikuti Kami:</span></li>
              <li>
                <a href="https://www.facebook.com/" target="_blank">
                  <i class="ri-facebook-fill"></i>
                </a>
              </li>
              <li>
                <a href="https://www.twitter.com/" target="_blank">
                  <i class="ri-twitter-x-line"></i>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/" target="_blank">
                  <i class="ri-instagram-line"></i>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/" target="_blank">
                  <i class="ri-linkedin-fill"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="col-xl-2 col-lg-4 col-md-6">
          <div class="footer-weight part-two ps-5">
            <h3 class="text-white">Tautan Cepat</h3>
            <ul class="service-link">
              <li><a href="terms-conditions.html">Syarat & Ketentuan</a></li>
              <li><a href="blog.html">Blog & Berita</a></li>
              <li><a href="about.html">Tentang Kami</a></li>
              <li><a href="services.html">Layanan Kami</a></li>
              <li><a href="pricing.html">Harga Paket</a></li>
            </ul>
          </div>
        </div>

        <!-- Our Services -->
        <div class="col-xl-3 col-lg-4 col-md-6">
          <div class="footer-weight part-three ps-5">
            <h3 class="text-white">Layanan Kami</h3>
            <ul class="service-link">
              <li><a href="services.html">Perbankan Digital</a></li>
              <li><a href="services.html">Keamanan Terpadu</a></li>
              <li><a href="services.html">Dompet Digital</a></li>
              <li><a href="services.html">Alat Perencanaan Keuangan</a></li>
              <li><a href="services.html">Transaksi Keuangan</a></li>
            </ul>
          </div>
        </div>

        <!-- Get In Touch -->
        <div class="col-xl-3 col-lg-4 col-md-6">
          <div class="footer-weight ps-5">
            <h3 class="text-white">Hubungi Kami</h3>
            <ul class="get-touch">
              <li>
                <img src="{{ asset('') }}landing/images/svg/map.svg" alt="image">
                <span class="text-white"><b>Alamat:</b></span>
                <a href="https://www.google.com/maps" target="_blank">Jl. Tanglewood 18, Gulfport</a>
              </li>
              <li>
                <img class="phone" src="{{ asset('') }}landing/images/svg/mail.svg" alt="image">
                <span class="text-white"><b>Email:</b></span>
                <a href="mailto:contact@website.com">contact@website.com</a>
              </li>
              <li>
                <img class="phone" src="{{ asset('') }}landing/images/svg/phone.svg" alt="image">
                <span class="text-white"><b>Telepon:</b></span>
                <a href="tel:+0018085550148">+001 (808) 5550148</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Footer Area -->


  <!-- Start Copyright Area -->
  <div class="copyright-area bg-color-0c3a30">
    <div class="container">
      <div class="copyright-border">
        <div class="row g-4 align-items-center">
          <div class="col-lg-4 col-md-6">
            <p>© <span>BMT Mahlahatul Ummah</span> Is Proudly Owned By <a href="https://turbo-main.com/"
                target="_blank">TURBO-MAIN</a></p>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="copy-image" data-cues="zoomIn" data-duration="700">
              <a href="index.html" class="d-block">
                <img alt="image" data-cfsrc="{{ asset('') }}images/logo/@pusat('logo')" width="40%"
                  style="display:none;visibility:hidden;"><noscript><img width="20%"
                    src="{{ asset('') }}images/logo/@pusat('logo')" alt="image"></noscript>
              </a>
            </div>
          </div>
          <div class="col-lg-4 col-md-12">
            <ul>
              <li>
                <a href="privacy-policy.html">Privacy Policy</a>
              </li>
              <li>
                <a href="terms-conditions.html">Terms & Conditions</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Copyright Area -->

  <!-- Go top Btn -->
  <div class="go-top">
    <i class="ri-arrow-up-fill"></i>
  </div>
  <!-- Go top Btn End -->

  <!-- JS Files -->
  <script data-cfasync="false"
    src="{{ asset('') }}landing/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="{{ asset('') }}landing/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}landing/js/swiper-bundle.min.js"></script>
  <script src="{{ asset('') }}landing/js/fslightbox.min.js"></script>
  <script src="{{ asset('') }}landing/js/smooth-scroll.js"></script>
  <script src="{{ asset('') }}landing/js/scrollCue.min.js"></script>
  <script src="{{ asset('') }}landing/js/script.js"></script>

  <script>
    document.querySelectorAll('.scroll-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah perilaku default klik tautan
            const targetId = this.getAttribute('href').substring(1); // Ambil ID dari href
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth', // Smooth scrolling
                    block: 'start', // Scroll ke awal elemen
                });
            }
        });
    });
</script>
</body>

</html>
