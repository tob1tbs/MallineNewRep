function UserSignUpSubmit() {
    var form = $('#user_signUp')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/user/ajax/sign-up",
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
            $('#user_signUp').block({
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
            $('#user_signUp').unblock();
            if(data['status'] == true) {
                $(".error-message-input").html('');
                $(".check-input").removeClass('input-error');
                if(data['errors'] == true) {
                    $.each(data['message'], function(key, value) {
                        $(".register-login-error").html('<div class="alert alert-danger text-center" role="alert">'+value+'</div>');
                        $('#'+key).addClass('input-error');
                    })
                } else {
                    location.reload();
                }
            }
        }
    });
}

function UserSignInSubmit() {
    var form = $('#user_signIn')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/user/ajax/sign-in",
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
            $('#user_signIn').block({
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
            $('#user_signIn').unblock();
            if(data['status'] == true) {
                $(".auth-login-error").html('');
                $(".check-input").removeClass('input-error');
                
                if(data['errors'] == true) {
                    $.each(data['message'], function(key, value) {
                        $(".auth-login-error").html('<div class="alert alert-danger text-center" role="alert">'+value+'</div>');
                        $('#'+key).addClass('input-error');
                    })
                } else {
                    location.reload();
                }
            }
        }
    });
}

function UserUpdateSubmit() {
    var form = $('#user_update')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/user/ajax/update",
        type: "POST",
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                toastr.success('პროფილი წარმატებით დარედაქტირდა');
            } else {
                toastr.options = {
                  "closeButton": true,
                  "positionClass": "toast-bottom-right",
                }
                $(".check-input").removeClass('input-error');
                $.each(data['message'], function(key, value) {
                    $('#'+key).addClass('input-error');
                    toastr.warning(value);
                })
            }
        }
    });
}

function UserUpdatePasswordSubmit() {
    var form = $('#user_update_password')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/user/ajax/updatePassword",
        type: "POST",
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                toastr.success('პროფილი წარმატებით დარედაქტირდა');
            } else {
                toastr.options = {
                  "closeButton": true,
                  "positionClass": "toast-bottom-right",
                }
                $(".check-input").removeClass('input-error');
                $.each(data['message'], function(key, value) {
                    $('#'+key).addClass('input-error');
                    toastr.warning(value);
                })
            }
        }
    });
}

function PasswordRestore() {
    var form = $('#password_restore')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/user/ajax/restore",
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
            $('.form-block').block({
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
            $('.form-block').unblock();
            $(".check-input").removeClass('input-error');
            $(".reset-login-error").html('');
            
            if(data['status'] == true) {
                window.location.href = data['redirect_url'];
            } else {
                $.each(data['message'], function(key, value) {
                    $(".reset-login-error").html('<div class="alert alert-danger text-center" role="alert">'+value+'</div>');
                    $('#'+key).addClass('input-error');
                })
            }
        }
    });
}

function PasswordRestoreSubmit() {
    var form = $('#user_reset_form')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/user/ajax/restore/submit",
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
            $('.form-block').block({
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
            $('.form-block').unblock();
            $(".check-input").removeClass('input-error');
            $(".reset-form-login-error").html('');
            
            if(data['status'] == true) {
                $(".reset-form-login-error").html('<div class="alert alert-success text-center" role="alert">პაროლი წარმატებით განახლდა!!!</div>');
                setTimeout(function() { 
                    window.location.href = data['redirect_url'];
                }, 1500);
            } else {
                $.each(data['message'], function(key, value) {
                    $(".reset-form-login-error").html('<div class="alert alert-danger text-center" role="alert">'+value+'</div>');
                    $('#'+key).addClass('input-error');
                })
            }
        }
    });
}