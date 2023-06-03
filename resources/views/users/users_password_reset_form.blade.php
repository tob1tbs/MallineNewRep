@extends('layout.layout')

@section('content')
<main class="main pages">
    <div class="page-content pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1 class="pb-30 Center font-neue">პაროლის აღდგენა</h1>
                    <div class="password-reset text">
                        <div class="reset">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="reset-form-login-error"></div>
                                <div class="padding_eight_all bg-white ">
                                    <form method="post" class="form-block" id="user_reset_form">
                                        <div class="form-group ">
                                            <input type="password" required="" name="reset_password" class="check-input" id="reset_password" placeholder="პაროლი" />
                                            <input type="password" required="" name="reset_repeat_password" class="check-input" id="reset_repeat_password" placeholder="გაიმეორეთ პაროლი" />
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-heading btn-block hover-up" onclick="PasswordRestoreSubmit()">პაროლის განახლება</button>
                                        </div>
                                        <input type="hidden" name="hash_id" value="{{ request()->hash_id }}">
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