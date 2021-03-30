/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/admin_order.js ***!
  \*************************************/
jQuery(document).ready(function () {
  var page = 1;
  var sort = "default";
  var day = null;
  var status = null;
  fetch_data(page); // Ajax pagination next/before

  $(document).on("click", ".page-link", function (event) {
    event.preventDefault();
    page = $(this).attr("href").split("page=")[1];
    fetch_data(page);
  });
  setInterval(function () {
    fetch_data(page);
  }, 5000); // Ajax fetch table orders

  function fetch_data(page) {
    var _token = objConfig.sCsrf;
    $.ajax({
      url: objConfig.objRoutes.sFetchOrder,
      method: "POST",
      data: {
        _token: _token,
        page: page,
        sort_type: sort,
        day: day,
        status: status
      },
      success: function success(data) {
        $("#orders-table-data").html(data);
      }
    });
  }

  $("#sort-form-submit").click(function () {
    day = $('input[name="datetime"]').val();
    status = $('select[name="status"]').val();
    $("#order-form").modal("hide");
    fetch_data(page);
  });
  $(document).delegate(".sort-button", "click", function () {
    if ($(this).attr("data-sort") === "date") {
      $("#order-form").modal("show");
      $(".modal-title").text("Сортировать по дате");
      $("#status-form-group-label").addClass("d-none");
      $("#sort-form-submit").removeClass("d-none");
      $("#order-update-form-submit").addClass("d-none");
      $("#datetime-form-group-label").removeClass("d-none");
      $("#form-error").addClass("d-none");
      $(this).siblings().removeClass("btn-success");
      $(this).addClass("btn-success");
      return null;
    } else if ($(this).attr("data-sort") === "status") {
      $("#order-form").modal("show");
      $(".modal-title").text("Сортировать по статусу");
      $("#status-form-group-label").removeClass("d-none");
      $("#datetime-form-group-label").addClass("d-none");
      $("#sort-form-submit").removeClass("d-none");
      $("#order-update-form-submit").addClass("d-none");
      $("#form-error").addClass("d-none");
      $(this).siblings().removeClass("btn-success");
      $(this).addClass("btn-success");
      return null;
    } else if ($(this).attr("data-sort") === "default") {
      status = null;
      day = null;
    }

    sort = $(this).attr("data-sort");
    $(this).siblings().removeClass("btn-success");
    $(this).addClass("btn-success");
    fetch_data(page);
  }); // Open modal window with form update order model

  $(document).delegate(".open-update-form", "click", function () {
    $("#order-form").modal("show");
    $(".modal-title").text("Изменить запись");
    var id = $(this).attr("data-index");
    var datetime = $(this).parent().siblings('td[data-index="coming_at"]').text();
    var status = $(this).parent().siblings('td[data-index="status"]').text();
    $("input[name='order-form-id']").val(id).change();
    $("#datetime").val(datetime.slice(0, -3).replace(" ", "T"));
    $("#status-form-group-label").removeClass("d-none");
    $("#status-input").val(status).change();
    $("#order-update-form-submit").removeClass("d-none");
    $("#sort-form-submit").addClass("d-none");
    $("#form-error").addClass("d-none");
  }); // Send request a update order model to backend

  $(document).delegate("#order-update-form-submit", "click", function () {
    var datetime = $('input[name="datetime"]').val();
    var status = $('select[name="status"]').val();
    var id = $('input[name="order-form-id"]').val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sUpdOrder,
      data: {
        _token: objConfig.sCsrf,
        datetime: datetime,
        status: status,
        id: id
      },
      success: function success(response) {
        if (response.validationMessage === "success") {
          fetch_data(page);
          return $("#order-form").modal("hide");
        }

        $("#form-error").removeClass("d-none");
        $("#form-error").children("strong").text(response.validationMessage);
      }
    });
  });
  $(document).delegate(".order-delete-form-submit", "click", function () {
    var id = $(this).val();
    $.ajax({
      type: "POST",
      url: objConfig.objRoutes.sDelOrder,
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