jQuery(document).ready(() => {
    $('#login-form-submit').click(() => {
        let email = $('input[name="email"]').val();
        let password = $('input[name="password"]').val();
        let rememberMe = $('#remember').is(':checked') ? 1 : 0;
        $.ajax({
            type: 'POST',
            url: objConfig.objRoutes.sLogin,
            data: {
                _token: objConfig.sCsrf,
                email: email,
                password: password,
                rememberMe: rememberMe
            },
            success: function (response) {
                if (response.validationMessage === 'success') {
                    return (document.location.href = objConfig.objRoutes.sAdmin);
                }
                $('#login-error').removeClass('d-none');
                $('#login-error').children('strong').text(response.validationMessage);
            }
        });
    });
});
