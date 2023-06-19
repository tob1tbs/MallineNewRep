$(".login-button").click(function() {

    var form = $('#loginForm')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/dashboard/ajax/login/submit",
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
            $('#loginForm').block({
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
            $('#loginForm').unblock();
            
            if(data['status'] == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'დაფიქსირდა შეცდომა...',
                    text: data['message'],
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                });
            } else {
                window.location.replace(data['redirect_url']);
            }
        },
        error: function (data) {
            $('#loginForm').unblock();
            $(".ajax-error-text").html('');
            $(".ajax-error-input").removeClass('error');
            var errors = $.parseJSON(data.responseText)['errors'];
            $.each(errors, function (key, value) {
                $("#"+key).addClass('error');
                $("#"+key+'_text').append(value);
            });
        }
    });
});

$(".restore-button").click(function() {

    var form = $('#passwordRestoreForm')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/dashboard/ajax/restore/submit",
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
            $('#passwordRestoreForm').block({
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
            $('#passwordRestoreForm').unblock();
            
            if(data['status'] == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'დაფიქსირდა შეცდომა...',
                    text: data['message'],
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: data['message'],
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                    window.location.replace(data['redirect_url']);
                })
            }
        },
        error: function (data) {
            $('#passwordRestoreForm').unblock();
            $(".ajax-error-text").html('');
            $(".ajax-error-input").removeClass('error');
            var errors = $.parseJSON(data.responseText)['errors'];
            $.each(errors, function (key, value) {
                $("#"+key).addClass('error');
                $("#"+key+'_text').append(value);
            });
        }
    });
});

$(".create-user-button").click(function() {
    var form = $('#userCreateForm')[0];
    var data = new FormData(form);

    $.ajax({
        dataType: 'json',
        url: "/dashboard/ajax/create/submit",
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
            $('#userCreateForm').block({
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
            $('#userCreateForm').unblock();
            
            if(data['status'] == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'დაფიქსირდა შეცდომა...',
                    text: data['message'],
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: data['message'],
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                }).then(function() {
                    window.location.replace(data['redirect_url']);
                })
            }
        },
        error: function (data) {
            $('#userCreateForm').unblock();
            $(".ajax-error-text").html('');
            $(".ajax-error-input").removeClass('error');
            var errors = $.parseJSON(data.responseText)['errors'];
            $.each(errors, function (key, value) {
                $("#"+key).addClass('error');
                $("#"+key+'_text').append(value);
            });
        }
    });
})

function UserActive(user_id, elem) {
    if($(elem).is(":checked")) {
        user_active = 1;
    } else {
        user_active = 0
    }

    $.ajax({
        dataType: 'json',
        url: "/dashboard/ajax/active/submit",
        type: "POST",
        data: {
            user_id: user_id,
            user_active: user_active,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == false) {
                Swal.fire({
                    icon: 'error',
                    title: 'შეცდომა...',
                    text: data['message'],
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    },
                    buttonsStyling: false
                });
            } else {
                return;
            }
        },
        error: function (data) {
            Swal.fire({
                icon: 'error',
                title: 'დაფიქსირდა შეცდომა...',
                text: 'გთხოვთ სცადოთ თავიდან.',
                customClass: {
                  confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
        }
    });
}