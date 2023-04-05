@extends('layout.layout')

@section('content')
<main class="main pages">
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{ asset('assets/imgs/page/login-1.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white ">
                                    <div class="heading_s1 ">
                                        <h1 class="mb-25">{{ trans('site.sign-in') }}</h1>
                                        <p class="mb-30">{{ trans('site.dont_have_acc') }}: <a href="{{ route('actionUsersSignUp') }}">{{ trans('site.place_sign_up') }}</a></p>
                                    </div>
                                    <form id="user_signInPage">
                                        <div class="form-group">
                                            <input type="text" name="user_email" id="user_email" class="check-input" placeholder="{{ trans('site.user_email') }} *" />
                                        </div>
                                        <div class="form-group" style="position: relative;">
                                            <div style="position: absolute; right: 25px; top: 15px; cursor: pointer;" onclick="ShowHidePassword('password', 'togglePassword')">
                                                <i class="fi-rs-eye-crossed togglePassword"></i>
                                            </div>
                                            <input type="password" name="user_password" id="pass2" class="password check-input" placeholder="{{ trans('site.user_password') }} *" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="user_remember_me" id="user_remember_me" value="1">
                                                    <label class="form-check-label" for="user_remember_me"><span>{{ trans('site.user_remember_me') }}</span></label>
                                                </div>
                                            </div>
                                            <a class="text-muted" href="{{ route('actionUsersRestore') }}">{{ trans('site.user_password_restore') }}</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-heading btn-block hover-up" onclick="UserSignInSubmitPage()">{{ trans('site.user_login_button') }}</button>
                                        </div>
										<p class="fmhoveran">ან</p>
										<div class="form-group Center">
                                            <button type="button" class="fmhoverbtn4" onclick="javascript:location.href = '{{ route('actionFacebookRedirect') }}'">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<g>
														<path fill="#4267b2" stroke="null"  d="m297.061454,170.770307l0,-50.7383c0,-22.905479 5.060513,-34.49139 40.617274,-34.49139l44.612416,0l0,-85.22969l-74.442807,0c-91.222402,0 -121.319136,41.815816 -121.319136,113.595196l0,56.864184l-59.927126,0l0,85.22969l59.927126,0l0,255.689069l110.532254,0l0,-255.689069l75.108664,0l10.121026,-85.22969l-85.22969,0z"></path>
													</g>
												</svg>    
											</button>
                                            <button type="button" class="fmhoverbtn4" onclick="javascript:location.href = '{{ route('actionGoogleRedirect') }}'">
												<svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<path d="M17.64,9.20454545 C17.64,8.56636364 17.5827273,7.95272727 17.4763636,7.36363636 L9,7.36363636 L9,10.845 L13.8436364,10.845 C13.635,11.97 13.0009091,12.9231818 12.0477273,13.5613636 L12.0477273,15.8195455 L14.9563636,15.8195455 C16.6581818,14.2527273 17.64,11.9454545 17.64,9.20454545 L17.64,9.20454545 Z" fill="#4285F4"></path>
														<path d="M9,18 C11.43,18 13.4672727,17.1940909 14.9563636,15.8195455 L12.0477273,13.5613636 C11.2418182,14.1013636 10.2109091,14.4204545 9,14.4204545 C6.65590909,14.4204545 4.67181818,12.8372727 3.96409091,10.71 L0.957272727,10.71 L0.957272727,13.0418182 C2.43818182,15.9831818 5.48181818,18 9,18 L9,18 Z" fill="#34A853"></path>
														<path d="M3.96409091,10.71 C3.78409091,10.17 3.68181818,9.59318182 3.68181818,9 C3.68181818,8.40681818 3.78409091,7.83 3.96409091,7.29 L3.96409091,4.95818182 L0.957272727,4.95818182 C0.347727273,6.17318182 0,7.54772727 0,9 C0,10.4522727 0.347727273,11.8268182 0.957272727,13.0418182 L3.96409091,10.71 L3.96409091,10.71 Z" fill="#FBBC05"></path>
														<path d="M9,3.57954545 C10.3213636,3.57954545 11.5077273,4.03363636 12.4404545,4.92545455 L15.0218182,2.34409091 C13.4631818,0.891818182 11.4259091,0 9,0 C5.48181818,0 2.43818182,2.01681818 0.957272727,4.95818182 L3.96409091,7.29 C4.67181818,5.16272727 6.65590909,3.57954545 9,3.57954545 L9,3.57954545 Z" fill="#EA4335"></path>
														<path d="M0,0 L18,0 L18,18 L0,18 L0,0 Z"></path>
													</g>
												</svg>
											</button>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')

@endsection