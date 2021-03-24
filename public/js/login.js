/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/login.js ***!
  \*******************************/
jQuery(document).ready(function () {
  $('#login-form-submit').click(function () {
    var email = $('input[name="email"]').val();
    var password = $('input[name="password"]').val();
    var rememberMe = $('#remember').is(':checked') ? 1 : 0;
    $.ajax({
      type: 'POST',
      url: objConfig.objRoutes.sLogin,
      data: {
        _token: objConfig.sCsrf,
        email: email,
        password: password,
        rememberMe: rememberMe
      },
      success: function success(response) {
        if (response.validationMessage === 'success') {
          return document.location.href = objConfig.objRoutes.sAdmin;
        }

        $('#login-error').removeClass('d-none');
        $('#login-error').children('strong').text(response.validationMessage);
      }
    });
  });
});
/******/ })()
;