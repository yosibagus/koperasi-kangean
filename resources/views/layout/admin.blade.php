<!DOCTYPE html>
<html lang="en">

<head>
    <!--Title-->
    <title>{{ $title }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('') }}images/logo/@myprofile('logo')">

    <link href="{{ asset('assets') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/chartist/css/chartist.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Datatable -->
    <link href="{{ asset('assets') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="{{ asset('assets') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link class="main-css" href="{{ asset('assets') }}/css/style.css" rel="stylesheet">

    <!-- Daterange picker -->
    <link href="{{ asset('assets') }}/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('assets') }}/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="{{ asset('assets') }}/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/pickadate/themes/default.date.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/toastr/css/toastr.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    {{ $style ?? '' }}
    <style>
        /* Hides the spinner controls in Chrome, Safari, Edge, and Opera */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hides the spinner controls in Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input {
            autocomplete: off !important;
            /* Tidak semua browser mendukung ini */
        }

        /* Atau sembunyikan saran browser */
        input::-webkit-autofill {
            display: none !important;
        }

        .swal2-select {
            display: none !important;
        }
    </style>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('') }}images/logo/@myprofile('logo')" alt="">
                <img class="logo-compact" src="{{ asset('') }}images/logo/@myprofile('logo_text')" alt=""
                    width="100%">
                <img class="brand-title" src="{{ asset('') }}images/logo/@myprofile('logo_text')" alt=""
                    width="100%">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Chat box start
        ***********************************-->
        <x-part.chatbox></x-part.chatbox>
        <!--**********************************
            Chat box End
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <x-part.header></x-part.header>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <x-part.sidebar></x-part.sidebar>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body default-height">
            {{ isset($slot) ? $slot : '' }}
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://turbo-main.com/"
                        target="_blank">TurboMain</a>
                    <span class="current-year">2024</span>
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    {{-- <x-part.auth-alert></x-part.auth-alert> --}}

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <script src="{{ asset('assets') }}/vendor/chart-js/chart.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/owl-carousel/owl.carousel.js"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('assets') }}/vendor/peity/jquery.peity.min.js"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('assets') }}/vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('assets') }}/js/dashboard/dashboard-1.js"></script>

    <!-- Datatable -->
    <script src="{{ asset('assets') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/responsive/responsive.js"></script>
    <script src="{{ asset('assets') }}/js/plugins-init/datatables.init.js"></script>

    <!-- Jquery Validation -->
    <script src="{{ asset('assets') }}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Form validate init -->
    <script src="{{ asset('assets') }}/js/plugins-init/jquery.validate-init.js"></script>

    <script src="{{ asset('assets') }}/js/custom.min.js"></script>
    <script src="{{ asset('assets') }}/js/deznav-init.js"></script>
    <script src="{{ asset('assets') }}/js/demo.js"></script>
    <script src="{{ asset('assets') }}/js/styleSwitcher.js"></script>

    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{ asset('assets') }}/vendor/moment/moment.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="{{ asset('assets') }}/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <!-- asColorPicker -->
    <script src="{{ asset('assets') }}/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="{{ asset('assets') }}/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>
    <!-- pickdate -->
    <script src="{{ asset('assets') }}/vendor/pickadate/picker.js"></script>
    <script src="{{ asset('assets') }}/vendor/pickadate/picker.time.js"></script>
    <script src="{{ asset('assets') }}/vendor/pickadate/picker.date.js"></script>

    <!-- SheetJS untuk Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <!-- jsPDF untuk PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>


    <!-- Daterangepicker -->
    <script src="{{ asset('assets') }}/js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="{{ asset('assets') }}/js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="{{ asset('assets') }}/js/plugins-init/jquery-ascolorpicker.init.js"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('assets') }}/js/plugins-init/material-date-picker-init.js"></script>
    <!-- Pickdate -->
    <script src="{{ asset('assets') }}/js/plugins-init/pickadate-init.js"></script>

    <!-- Toastr -->
    <script src="{{ asset('assets') }}/vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="{{ asset('assets') }}/js/plugins-init/toastr-init.js"></script>

  <x-part.alert></x-part.alert>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    <script>
        function carouselReview() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                nav: false,
                center: true,
                rtl: true,
                dots: false,
                navText: ['<i class="fas fa-caret-left"></i>', '<i class="fas fa-caret-right"></i>'],
                responsive: {
                    0: {
                        items: 2
                    },
                    400: {
                        items: 3
                    },
                    700: {
                        items: 5
                    },
                    991: {
                        items: 6
                    },

                    1200: {
                        items: 4
                    },
                    1600: {
                        items: 5
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                carouselReview();

            }, 1000);
        });


        // jQuery(document).ready(function(){
        // 	setTimeout(function(){
        // 		dezSettingsOptions.version = 'light';
        // 		new dezSettings(dezSettingsOptions);

        // 		setCookie('version','light');

        // 	},1500)
        // });
    </script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#Logout').on('click', function(e) {
                e.preventDefault();
                const url = jQuery(this).attr('href');
                const token = jQuery('meta[name="csrf-token"]').attr('content');
                jQuery.post(url, {
                    _token: token
                }).done(function(response) {
                    window.location.href = '/';
                }).fail(function(xhr) {
                    console.log(xhr.responseText);
                });
            });
        });
    </script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-tooltip="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>
    {{ $script ?? '' }}
</body>

</html>
