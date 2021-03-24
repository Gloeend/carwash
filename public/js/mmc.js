/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/mmc.js ***!
  \*****************************/
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
  }, 5000); // Ajax fetch table services

  function fetch_data(page) {
    var _token = objConfig.sCsrf;
    $.ajax({
      url: objConfig.objRoutes.sFetchMmc,
      method: "POST",
      data: {
        _token: _token,
        page: page
      },
      success: function success(data) {
        $("#mmcs-table-data").html(data);
      }
    });
  } // Open modal window with form add service model


  $("#open-add-form").click(function () {
    $("#mmc-form").modal("show");
    $(".modal-title").text("Добавить новую модель");
    $("#mmc-update-form-submit").addClass("d-none");
    $("#mmc-add-form-submit").removeClass("d-none");
    $("#title").val("").change();
    $("#class").prop("selectedIndex", 0);
    $("#mark").prop("selectedIndex", 0);
    $("#form-error").addClass("d-none");
  }); // Open modal window with form update mmc model

  $(document).delegate(".open-update-form", "click", function () {
    $("#mmc-form").modal("show");
    $(".modal-title").text("Изменить модель");
    var id = $(this).attr("data-index");
    var title = $(this).parent().siblings('td[data-index="model"]').text();
    var mark = $(this).parent().siblings('td[data-index="mark"]').text();
    var sClass = $(this).parent().siblings('td[data-index="class"]').text();
    $("input[name='mmc-form-id']").val(id).change();
    $("#title").val(title).change();
    $("#mark").val(mark).change();
    $("#class").val(sClass).change();
    $("#mmc-update-form-submit").removeClass("d-none");
    $("#mmc-add-form-submit").addClass("d-none");
    $("#form-error").addClass("d-none");
  }); // Send request a create mmc model to backend

  $("#mmc-add-form-submit").click(function () {
    var title = $('input[name="title"]').val();
    var mark = $('select[name="mark"]').val();
    var sClass = $('select[name="class"]').val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sAddMmc,
      data: {
        _token: objConfig.sCsrf,
        title: title,
        mark: mark,
        "class": sClass
      },
      success: function success(response) {
        if (response.validationMessage === "success") {
          fetch_data(page);
          return $("#mmc-form").modal("hide");
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
  }); // Send request a update mmc model to backend

  $(document).delegate("#mmc-update-form-submit", "click", function () {
    var title = $('input[name="title"]').val();
    var mark = $('select[name="mark"]').val();
    var sClass = $('select[name="class"]').val();
    var id = $('input[name="mmc-form-id"]').val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sUpdMmc,
      data: {
        _token: objConfig.sCsrf,
        title: title,
        mark: mark,
        "class": sClass,
        id: id
      },
      success: function success(response) {
        if (response.validationMessage === "success") {
          fetch_data(page);
          return $("#mmc-form").modal("hide");
        }

        $("#form-error").removeClass("d-none");
        $("#form-error").children("strong").text(response.validationMessage);
      }
    });
  });
  $(document).delegate(".mmc-delete-form-submit", "click", function () {
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sDelMmc,
      data: {
        _token: objConfig.sCsrf,
        id: id
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