
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Mallline Setup</title>
    <link rel="apple-touch-icon" href="{{ asset('assets-dashboard/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets-dashboard/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/vendors/css/forms/select/select2.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/core/menu/menu-types/horizontal-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/pages/authentication.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-dashboard/css/style.css') }}">
    <!-- END: Custom CSS-->

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menuv" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="index.html">
                            <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h2 class="brand-text text-primary ms-1">Mallline</h2>
                        </a>
                        <!-- /Brand logo-->

                        <!-- Left Text-->
                        <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center">
                                <img class="img-fluid w-100" src="{{ asset('assets-dashboard/images/illustration/create-account.svg') }}" alt="multi-steps" />
                            </div>
                        </div>
                        <!-- /Left Text-->

                        <!-- Register-->
                        <div class="col-lg-9 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-5 pt-3">
                            <div class="mx-auto">
                                <form class="bs-stepper register-multi-steps-wizard shadow-none" id="setup_form">
                                    <span class="bs-stepper-label" style="margin: 10px 0"> 
                                        <span class="bs-stepper-title font-neue"><b>თქვენი პირველი მომხმარებელი</b></span>
                                    </span>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="admin_name">თქვენი სახელი</label>
                                            <input type="text" name="admin_name" id="admin_name" class="form-control check-input">
                                            <span id="admin_name_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="admin_lastname">თქვენი გვარი</label>
                                            <input type="email" name="admin_lastname" id="admin_lastname" class="form-control check-input">
                                            <span id="admin_name_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label font-helvetica" for="admin_email">ელ-ფოსტა</label>
                                            <input type="email" name="admin_email" id="admin_email" class="form-control check-input">
                                            <span id="admin_email_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="password">პაროლი</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            <span id="admin_password_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="confirm-password">პაროლის განმეორება</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input type="password" name="admin_cpassword" id="admin_cpassword" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            <span id="admin_cpassword_text" class="ajax-error-text error"></span>
                                        </div>
                                    </div>
                                    <span class="bs-stepper-label" style="margin: 10px 0"> 
                                        <span class="bs-stepper-title font-neue"><b>ვებ გვერდის პარამეტრები</b></span>
                                    </span>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="name_ge">ვებ გვერდის დასახელება (ქართულად)</label>
                                            <input type="text" name="name_ge" id="name_ge" class="form-control check-input">
                                            <span id="name_ge_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="name_en">ვებ გვერდის დასახელება (ინგლისურად)</label>
                                            <input type="email" name="name_en" id="name_en" class="form-control check-input">
                                            <span id="name_en_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label font-helvetica" for="logotype">აირჩიეთ ლოგოს სურათო</label>
                                            <input type="file" name="logotype" id="logotype" class="form-control check-input">
                                            <span id="logotype_text" class="ajax-error-text error"></span>
                                        </div>
                                    </div>
                                    <span class="bs-stepper-label" style="margin: 10px 0"> 
                                        <span class="bs-stepper-title font-neue"><b>საკონტაქტო ინფორმაცია</b></span>
                                    </span>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="{{ $info_parameter[0]->key }}">ელ-ფოსტა</label>
                                            <input type="text" name="{{ $info_parameter[0]->key }}" id="{{ $info_parameter[0]->key }}" class="form-control check-input">
                                            <span id="{{ $info_parameter[0]->key }}_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label class="form-label font-helvetica" for="{{ $info_parameter[1]->key }}">ტელეფონის ნომერი</label>
                                            <input type="email" name="{{ $info_parameter[1]->key }}" id="{{ $info_parameter[1]->key }}" class="form-control check-input">
                                            <span id="{{ $info_parameter[1]->key }}_text" class="ajax-error-text error"></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label font-helvetica" for="{{ $info_parameter[2]->key }}">მისამართი</label>
                                            <input type="email" name="{{ $info_parameter[2]->key }}" id="{{ $info_parameter[2]->key }}" class="form-control check-input">
                                            <span id="{{ $info_parameter[2]->key }}_text" class="ajax-error-text error"></span>
                                        </div>
                                    </div>
                                    <button class="btn btn-success font-neue mt-1" type="button" onclick="SaveSetup()">შექმენი</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <style type="text/css"> 
        .input-error {
            border: 1px solid red;
        }
    </style>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets-dashboard/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets-dashboard/vendors/js/ui/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets-dashboard/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets-dashboard/js/scripts/pages/auth-register.js') }}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('assets-dashboard/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/scripts/components/components-bs-toast.js') }}"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        function SaveSetup() {
            var form = $('#setup_form')[0];
            var data = new FormData(form);

            $.ajax({
                dataType: 'json',
                url: "/dashboard/ajax/setup",
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    $('#setup_form').block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
                        css: {
                          backgroundColor: 'transparent',
                          border: '0'
                        },
                        overlayCSS: {
                          backgroundColor: '#fff',
                          opacity: 0.8
                        }
                    });
                },
                success: function(data) {
                    $("#setup_form").unblock();
                    $(".ajax-error-text").html('');
                    if(data['status'] == true) {
                        window.location.href = data['redirect_url'];
                    } else {
                        $(".check-input").removeClass('input-error');
                        $.each(data['message'], function(key, value) {
                            $('#'+key).addClass('input-error');
                            $('#'+key+'_text').append(value);
                        })
                    }
                }
            });
        }
    </script>
</body>
</html>