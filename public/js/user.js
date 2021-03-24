/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/user.js ***!
  \******************************/
jQuery(document).ready(function () {
  var page = 1;
  fetch_data(page); // Ajax pagination next/before

  $(document).on("click", ".page-link", function (event) {
    event.preventDefault();
    page = $(this).attr("href").split("page=")[1];
    fetch_data(page);
  });
  setInterval(function () {
    fetch_data(page);
  }, 5000); // Ajax fetch table users

  function fetch_data(page) {
    var _token = objConfig.sCsrf;
    $.ajax({
      url: objConfig.objRoutes.sFetchUser,
      method: "POST",
      data: {
        _token: _token,
        page: page
      },
      success: function success(data) {
        $("#users-table-data").html(data);
      }
    });
  } // Open modal window with form add user model


  $("#open-add-form").click(function () {
    $("#user-form").modal("show");
    $(".modal-title").text("Добавить нового пользователя");
    $("#user-update-form-submit").addClass("d-none");
    $("#user-add-form-submit").removeClass("d-none");
    $("#email").val("").change();
    $("#name").val("").change();
    $("#password").val("").change();
    $("#form-error").addClass("d-none");
  }); // Open modal window with form update user model

  $(document).delegate(".open-update-form", "click", function () {
    $("#user-form").modal("show");
    $(".modal-title").text("Изменить пользователя");
    var id = $(this).attr("data-index");
    var email = $(this).parent().siblings('td[data-index="email"]').text();
    var name = $(this).parent().siblings('td[data-index="name"]').text();
    $("#email").val(email).change();
    $("#name").val(name).change();
    $("input[name='user-form-id']").val(id).change();
    $("#password").val("").change();
    $("#user-update-form-submit").removeClass("d-none");
    $("#user-add-form-submit").addClass("d-none");
    $("#form-error").addClass("d-none");
  }); // Send request a create user model to backend

  $("#user-add-form-submit").click(function () {
    var email = $('input[name="email"]').val();
    var name = $('input[name="name"]').val();
    var password = $('input[name="password"]').val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sAddUser,
      data: {
        _token: objConfig.sCsrf,
        email: email,
        name: name,
        password: password
      },
      success: function success(response) {
        if (response.validationMessage === "success") {
          fetch_data(page);
          return $("#user-form").modal("hide");
        }
      },
      statusCode: {
        422: function _(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");

          for (var key in err.errors) {
            $("#form-error").removeClass("d-none");
            $("#form-error").children("strong").html(err.errors[key][0]);
          }
        }
      }
    });
  }); // Send request a update user model to backend

  $(document).delegate("#user-update-form-submit", "click", function () {
    var email = $("#email").val();
    var password = $("#password").val();
    var name = $("#name").val();
    var id = $('input[name="user-form-id"]').val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sUpdUser,
      data: {
        _token: objConfig.sCsrf,
        email: email,
        password: password,
        name: name,
        id: id
      },
      success: function success(response) {
        if (response.validationMessage === "success") {
          fetch_data(page);
          return $("#user-form").modal("hide");
        }

        $("#form-error").removeClass("d-none");
        $("#form-error").children("strong").text(response.validationMessage);
      },
      statusCode: {
        422: function _(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");

          for (var key in err.errors) {
            $("#form-error").removeClass("d-none");
            $("#form-error").children("strong").html(err.errors[key][0]);
          }
        }
      }
    });
  });
  $(document).delegate(".user-delete-form-submit", "click", function () {
    var email = $(this).val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sDelUser,
      data: {
        _token: objConfig.sCsrf,
        email: email
      },
      success: function success(response) {
        if (response.validationMessage === "success") {
          return fetch_data(page);
        }

        return alert("Что-то не так");
      }
    });
  });
});
/******/ })()
;