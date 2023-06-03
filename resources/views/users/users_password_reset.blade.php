@extends('layout.layout')

@section('content')
<main class="main pages">
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="reset-login-error">
                        
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 m-auto pt-30">
                    <div class="login_wrap widget-taber-content background-white">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <img class="border-radius-15" src="{{ asset('assets/imgs/page/forgot_password.svg') }}" alt="" />
                                <h2 class="mb-15 mt-15">{{ trans('site.forgot_your_password') }}</h2>
                                <p class="mb-30">{{ trans('site.forgot_your_password_text') }}</p>
                            </div>
                            <form id="password_restore" class="form-block">
                                <div class="form-group">
                                    <input type="text" name="user_phone" id="user_phone" placeholder="{{ trans('site.restore_phone') }} *" />
                                </div>
                                <div class="form-group pb-30">
                                    <button type="button" class="btn btn-heading btn-block hover-up" onclick="PasswordRestore()">{{ trans('site.continue') }}</button>
                                </div>
                            </form>
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