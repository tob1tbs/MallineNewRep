<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    @yield('meta')
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=1.1') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css?v=1.1') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">

    @yield('css')
</head>
<body>
    @include('include.header')
    @yield('content')

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('assets/imgs/theme/mallline.png') }}" alt="" />
                </div>
                <div class="loader loader--style2" title="1">
                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                    <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                      <animateTransform attributeType="xml"
                        attributeName="transform"
                        type="rotate"
                        from="0 25 25"
                        to="360 25 25"
                        dur="0.6s"
                        repeatCount="indefinite"/>
                      </path>
                    </svg>
                </div>  
                <div class="preloader-text" style="display: none;">მიმდინარეობს მაღაზიის შექმნა გთხოვთ არ გათიშოთ აღნიშნული ფანჯარა, პროცესი ძალიან მალე დასრულდება.</div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mdl" role="document">
            <div class="modal-content">
                <button class="close" style="opacity: 1; top: -15px;" onclick="CloseLoginModal()">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 1L1 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M1 1L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
                <div class="auth-content -login">
                    <h2 class="heading font-neue">
                        <span>შემოგვიერთდი</span>
                    </h2>
                    <ul class="nav nav-pills mb-3" id="auth-tab" role="tablist">
                        <li class="nav-item switch-auth" role="presentation">
                          <button class="nav-link active" id="auth_content_tab" data-bs-toggle="pill" data-bs-target="#auth_content" type="button" role="tab" aria-controls="auth_content" aria-selected="true">ავტორიზაცია</button>
                        </li>
                        <li class="nav-item switch-auth" role="presentation">
                          <button class="nav-link" id="registration_content_tab" data-bs-toggle="pill" data-bs-target="#registration_content" type="button" role="tab" aria-controls="registration_content" aria-selected="false">რეგისტრაცია</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="auth_content" role="tabpanel" aria-labelledby="auth_content_tab">
                            <form autocomplete="off" id="user_signIn">
                                <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen undefined" style="margin: 0px 0px 12px;">
                                    <input type="email" name="user_email" id="user_email" class="check-input styled__Input-jo9xo0-1 jTEdgw" placeholder="{{ trans('site.user_email') }} *">
                                </div>
                                <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px; position: relative;">
                                    <div style="position: absolute; right: 15px; top: 12px; cursor: pointer;" onclick="ShowHidePassword('modal-password', 'togglePassword')">
                                        <i class="fi-rs-eye-crossed togglePassword"></i>
                                    </div>
                                    <input type="password" name="user_password" id="user_password" placeholder="{{ trans('site.user_password') }} *" class="modal-password check-input styled__Input-jo9xo0-1 jwXZdt password-input">
                                </div>
                                <a class="update-password" href="{{ route('actionUsersRestore') }}" style="opacity: 1; font-size: 13px; margin-bottom: 8px;">დაგავიწყდა პაროლი?</a>
                                <button class="styled__AuthPrimaryBtn-mh0716-2 dCwCil font-neue" onclick="UserSignInSubmit()" type="button"> {{ trans('site.user_login_button') }}</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="registration_content" role="tabpanel" aria-labelledby="registration_content_tab">
                            <form autocomplete="off" id="user_signUp">
                                <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px;">
                                    <input type="text" name="modal_user_email" id="modal_user_email" placeholder="{{ trans('site.user_email') }}" class="styled__Input-jo9xo0-1 jTEdgw check-input">
                                </div>
                                <div class="passwords">
                                    <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px; width: 48%;">
                                        <input type="text" name="modal_user_name" id="modal_user_name" placeholder="{{ trans('site.name') }}" class="styled__Input-jo9xo0-1 jTEdgw check-input">
                                    </div>
                                    <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px; width: 48%;">
                                        <input type="text" name="modal_user_lastname" id="modal_user_lastname" placeholder="{{ trans('site.lastname') }}" class="styled__Input-jo9xo0-1 jTEdgw check-input">
                                    </div>
                                </div>
                                <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px;">
                                    <input type="text" name="modal_user_personal_id" id="modal_user_personal_id" placeholder="{{ trans('site.user_personal_id') }}" class="styled__Input-jo9xo0-1 jTEdgw check-input">
                                </div>
                                <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px;">
                                    <input type="date" name="modal_user_bday" id="modal_user_bday" placeholder="{{ trans('site.user_bday') }}" class="styled__Input-jo9xo0-1 jTEdgw check-input">
                                </div>
                                <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px;">
                                    <input type="text" name="modal_user_phone" id="modal_user_phone" placeholder="{{ trans('site.user_phone') }}" class="styled__Input-jo9xo0-1 jTEdgw check-input">
                                </div>
                                <div class="passwords">
                                    <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px; width: 48%;">
                                        <div style="position: absolute; right: 15px; top: 12px; cursor: pointer;" onclick="ShowHidePassword('modal-password2', 'togglePassword2')">
                                            <i class="fi-rs-eye-crossed togglePassword2"></i>
                                        </div>
                                        <input type="password" name="modal_user_password" id="modal_user_password" placeholder="{{ trans('site.user_password') }}" class="modal-password2 styled__Input-jo9xo0-1 jwXZdt check-input">
                                    </div>
                                    <div class="styled__CustomInputWrapper-jo9xo0-0 kMBKen" style="margin: 0px 0px 12px; width: 48%;">
                                        <div style="position: absolute; right: 15px; top: 12px; cursor: pointer;" onclick="ShowHidePassword('modal-password3', 'togglePassword3')">
                                            <i class="fi-rs-eye-crossed togglePassword3"></i>
                                        </div>
                                        <input type="password" name="modal_user_conf_password" id="modal_user_conf_password" placeholder="{{ trans('site.user_password') }}" class="modal-password3 styled__Input-jo9xo0-1 jwXZdt check-input">
                                    </div>
                                </div>
                                <div class="terms mb-10">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input check-input" type="checkbox" name="modal_user_term_policy" id="modal_user_term_policy" value="1">
                                            <label class="form-check-label" for="modal_user_term_policy"><span><a href="{{ route('actionMainTerms') }}">{{ trans('site.user_terms') }}</a></span></label>
                                        </div>
                                    </div>
                                </div>
                                <button class="mb-10 styled__AuthPrimaryBtn-mh0716-2 dCwCil font-neue" type="button" onclick="UserSignUpSubmit()">{{ trans('site.sign-up') }}</button>
                            </form>
                        </div>
                    </div>
                    <div class="divider2">
                        <span>ან</span>
                    </div>
                    <div class="alt-auth" style="opacity: 1;">
                        <button type="button" onclick="javascript:location.href = '{{ route('actionFacebookRedirect') }}'">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 8.00002C16 3.58174 12.4183 2.00272e-05 8 2.00272e-05C3.58172 2.00272e-05 0 3.58174 0 8.00002C0 11.9931 2.92548 15.3027 6.75 15.9028V10.3125H4.71875V8.00002H6.75V6.23752C6.75 4.23252 7.94434 3.12502 9.77172 3.12502C10.647 3.12502 11.5625 3.28127 11.5625 3.28127V5.25002H10.5537C9.55992 5.25002 9.25 5.86669 9.25 6.49935V8.00002H11.4688L11.1141 10.3125H9.25V15.9028C13.0745 15.3027 16 11.9931 16 8.00002Z" fill="#1877F2"></path>
                            </svg>Facebook-ით შესვლა
                        </button>
                        <button type="button" onclick="javascript:location.href = '{{ route('actionGoogleRedirect') }}'">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.9999 9.20008C17.9999 8.46009 17.9386 7.92009 17.806 7.36011H9.18359V10.7H14.2448C14.1428 11.5301 13.5917 12.7801 12.3672 13.62L12.3501 13.7318L15.0763 15.8016L15.2652 15.82C16.9999 14.25 17.9999 11.94 17.9999 9.20008Z" fill="#4285F4"></path><path d="M9.18358 18C11.6631 18 13.7447 17.1999 15.2652 15.82L12.3672 13.62C11.5917 14.1499 10.5509 14.5199 9.18358 14.5199C6.75503 14.5199 4.69382 12.95 3.95906 10.78L3.85136 10.789L1.01656 12.939L0.979492 13.04C2.48968 15.9799 5.59172 18 9.18358 18Z" fill="#34A853"></path><path d="M3.95913 10.7803C3.76526 10.2203 3.65306 9.62025 3.65306 9.00028C3.65306 8.38025 3.76526 7.78028 3.94893 7.22029L3.9438 7.10103L1.07348 4.9165L0.979566 4.96028C0.357146 6.18028 0 7.5503 0 9.00028C0 10.4503 0.357146 11.8202 0.979566 13.0402L3.95913 10.7803Z" fill="#FBBC05"></path><path d="M9.18358 3.47995C10.908 3.47995 12.0713 4.20994 12.7346 4.81997L15.3264 2.33998C13.7346 0.889996 11.6631 0 9.18358 0C5.59172 0 2.48968 2.01997 0.979492 4.95992L3.94886 7.21993C4.69382 5.04995 6.75503 3.47995 9.18358 3.47995Z" fill="#EB4335"></path>
                            </svg>Google-ით შესვლა 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="compare-side no-print responsive_compare">
        <div class="compare-side-blur blur"></div>
        <div class="compare-button" id="comparebtn">
            <span class="rotated">
                კალათა
            </span>
            <span class="compare-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="21.763" height="21.841" viewBox="0 0 21.763 21.841">
                    <path style="fill: #fff;fill-rule: evenodd;" d="M405.121,515.729a2.713,2.713,0,0,0-2.1-1H389.428v-1.365A1.365,1.365,0,0,0,388.063,512h-2.718a1.365,1.365,0,0,0,0,2.73h1.365v9.555a2.73,2.73,0,0,0,2.718,2.73H401.66a2.721,2.721,0,0,0,2.665-2.195L405.69,518a2.73,2.73,0,0,0-.569-2.266Zm-15.693,8.556V517.46h13.591l-1.365,6.825H389.421Zm-1.365,4.1a2.717,2.717,0,1,0,.005,0Zm13.592,0a2.715,2.715,0,1,0,.005,0Z" transform="translate(-383.98 -512)" />
                </svg>
            </span>
        </div>
        <div class="compare-content-b compare_not_responsive cart-body" id="compare-content" style="display: none;">
            @if(count(Cart::getContent()) > 0)
            @foreach(Cart::getContent() as $cart_item)
            @if($loop->index <= 2)
            <div class="comp-product cart-item-{{$cart_item->id}}">
                <div class="comp-product-remove" onclick="RemoveFromCart({{ $cart_item->id }})"></div>
                <div class="comp-product-img" style="background-image: url(@if(!empty($cart_item['attributes']['photo'])) {{ $cart_item['attributes']['photo'] }} @endif)">
                </div>
                <div class="comp-product-inf">
                    <span style="cursor:pointer;" onclick="location.href = '{{ route('actionProductsView', $cart_item->id) }}'" class="font-neue">{{ $cart_item->name }}</span>
                    <span class="font-neue">{{ $cart_item->quantity }} × ₾ {{ $cart_item->price}}</span>
                </div>
            </div>
            @endif
            @endforeach
            <div>
                <div class="comp-product-start" onclick="location.href = '{{ route('actionMainCart') }}'">
                    {{ trans('site.full_cart') }}
                </div>
                <div class="comp-product-start white" onclick="location.href = '{{ route('actionMainCheckout') }}'">
                    {{ trans('site.checkout') }}
                </div>
            </div>
            @else
            <div class="alert alert-primary text-center" role="alert" style="margin-bottom: 0;">{{ trans('site.your_cart_is_empty') }}</div>
            @endif
            <div class="c-circle-right" id="compare-close"></div>
        </div>
    </div>
    <footer class="main">
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="footer-link-widget col">
                        <h4 class="widget-title font-neue">{{ trans('site.about_us') }}</h4>
                        <ul class="footer-list mb-sm-4 mb-md-0">
                            <li><a href="{{ route('actionMainPrivacy') }}">{{ trans('site.privacy') }}</a></li>
                            <li><a href="{{ route('actionMainTerms') }}">{{ trans('site.terms') }}</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col hide">
                        <h4 class="widget-title font-neue">წესები & პირობები</h4>
                        <ul class="footer-list mb-sm-4 mb-md-0">
                            <li><a href="{{ route('actionVendorsIndex') }}">{{ trans('site.vendors') }}</a></li>
                            <li><a href="{{ route('actionVendorsGuide') }}">{{ trans('site.vendors_guide') }}</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col hide">
                        <h4 class="widget-title font-neue">გამოგვყევი</h4>
                        <ul class="footer-list footer-icon-list mb-sm-4 mb-md-0">
                            @if(!empty($parametersArray['facebook']))
                            <li><a href="{{ $parametersArray['facebook'] }}" target="_blank"><img src="{{ url('assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" />Facebook</a></li>
                            @endif
                            @if(!empty($parametersArray['instagram']))
                            <li><a href="{{ $parametersArray['instagram'] }}" target="_blank"><img src="{{ url('assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" />Instagram</a></li>
                            @endif
                            @if(!empty($parametersArray['youtube']))
                            <li><a href="{{ $parametersArray['youtube'] }}" target="_blank"><img src="{{ url('assets/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" />Youtube</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="footer-link-widget col hide">
                        <h4 class="widget-title font-neue">კონტაქტი</h4>
                        <ul class="footer-list footer-icon-list mb-sm-4 mb-md-0">
                            <li><a href="tel: +995599002452" target="_blank"><img src="{{ url('assets/imgs/theme/icons/phone-call.svg') }}" alt="" style="filter: brightness(0.5);" />+995 599 002 452</a></li>
                            <li><a href="mailto: chikhladze.mt@gmail.com" target="_blank"><img src="{{ url('assets/imgs/theme/icons/icon-email.svg') }}" alt="" style="filter: brightness(0.5);" />chikhladze.mt@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-30">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="font-sm mb-0">&copy; {{ \Carbon\Carbon::now()->format('Y') }} Molline.io | {{ trans('site.all_right_reserved') }}</p>
                </div>
                <div class="col-lg-6">
                    <p class="font-sm mb-0" style="text-align: right;">Build With Love For Mallline</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slider-range.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script> -->
    <script src="{{ asset('assets/js/main.js?v=5.2') }}"></script>
    <script src="{{ asset('assets/js/shop.js?v=5.222') }}"></script>
    @yield('js')
    <script src="{{ asset('assets/scripts/global.js?v=1.1') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/users_scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '435205588210356',
          cookie     : true,
          xfbml      : true,
          version    : '{api-version}'
        });
          
        FB.AppEvents.logPageView();   
          
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
    /*-------------------------------
        Compare
    -----------------------------------*/
    $("#comparebtn").click(function(){
        if($("#compare-content").css('display') == 'none') {
            $(".rotated").html('დახურვა');
            $("#compare-content").show();
        } else {
            $(".rotated").html('კალათა');
            $("#compare-content").hide();
        }
    });

    function CloseCart() {
        $(".rotated").html('კალათა');
        $("#compare-content").hide();
    }

    $("#compare-close").click(function(){
        $(".rotated").html('კალათა');
        $("#compare-content").hide();
    });

    $("#comparebtn").click(function(){
        
    });
    </script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: false,
                nav: true,
                navText: [
                    "<i class='fi-rs-arrow-small-left'></i>",
                    "<i class='fi-rs-arrow-small-right'></i>"
                ],
                autoplay: false,
                margin: 15,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 6
                    }
                }
            })
        })

        function CloseLoginModal() {
            $("#exampleModalCenter").modal('hide');
        }
    </script>
</body>
</html>