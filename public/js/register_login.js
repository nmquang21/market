$(document).ready(function () {
    userApp.init();
});

let userApp = {
    init: function () {
        $(document).on('click', '#user-submit', function () {
            userApp.createUser();
        });

        $('#loginModal').on('hide.bs.modal', function () {
            userApp.clearDataUser();
        });

        $(document).on('click', '#user-login', function () {
            userApp.loginUser();
        });
    },

    createUser: function () {
        let formData = new FormData($("#addUserForm")[0]);
        $('#user-submit').prop('disabled', true);
        $.ajax ({
            url: 'register',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                userApp.clearDataUser();
                let status = 'danger';
                if (data.status) {
                    status = 'success';
                }
                let message = '<div class="text-' + status + '">' + data.message + '</div>';
                $('#message').html(message);
                $('#user-submit').prop('disabled', false);
            },
            error: function (res) {
                $('#user-submit').prop('disabled', false);
                $.each(
                    $('.text-error'), function () {
                        let dataError = $(this).data('error');
                        if (res.responseJSON.errors[dataError]) {
                            $(this).html(res.responseJSON.errors[dataError][0]);
                        } else {
                            $(this).html('');
                        }
                    }
                );
            }
        });
    },

    loginUser: function () {
        let formData = new FormData($("#loginUserForm")[0]);
        $('#user-login').prop('disabled', false);
        $.ajax ({
            url: 'login',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                userApp.clearDataUser();
                if (data.status) {
                    $('#loginModal').modal('hide');
                    window.location.reload();
                }
                let message = '<div class="text-danger">' + data.message + '</div>';
                $('#message').html(message);
                $('#user-login').prop('disabled', false);
            },
            error: function (res) {
                $('#user-login').prop('disabled', false);
                $.each(
                    $('.text-error'), function () {
                        let dataError = $(this).data('error');
                        if (res.responseJSON.errors[dataError]) {
                            $(this).html(res.responseJSON.errors[dataError][0]);
                        } else {
                            $(this).html('');
                        }
                    }
                );
            }
        });
    },

    clearDataUser: function () {
        $('#loginModal').find('span.text-error').html('');
        $('#loginModal').find('#message').html('');
        $('#loginModal').find("input[type='text']").val('');
        $('#loginModal').find("input[type='password']").val('');
    },
};
