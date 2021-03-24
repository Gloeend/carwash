jQuery(document).ready(() => {
    let page = 1;
    fetch_data(page);
    // Ajax pagination next/before
    $(document).on("click", ".page-link", function (event) {
        event.preventDefault();
        page = $(this).attr("href").split("page=")[1];
        fetch_data(page);
    });

    setInterval(() => {
        fetch_data(page);
    }, 5000);

    // Ajax fetch table services
    function fetch_data(page) {
        var _token = objConfig.sCsrf;
        $.ajax({
            url: objConfig.objRoutes.sFetchService,
            method: "POST",
            data: { _token: _token, page: page },
            success: function (data) {
                $("#services-table-data").html(data);
            },
        });
    }

    // Open modal window with form add service model
    $("#open-add-form").click(() => {
        $("#service-form").modal("show");
        $(".modal-title").text("Добавить новую услугу");
        $("#service-update-form-submit").addClass("d-none");
        $("#service-add-form-submit").removeClass("d-none");
        $("#title").val("").change();
        $("#price").val("").change();
        $("#form-error").addClass("d-none");
    });
    // Open modal window with form update service model
    $(document).delegate(".open-update-form", "click", function () {
        $("#service-form").modal("show");
        $(".modal-title").text("Изменить услугу");
        let id = $(this).attr("data-index");
        let title = $(this).parent().siblings('td[data-index="title"]').text();
        let price = $(this).parent().siblings('td[data-index="price"]').text();
        let type = $(this).parent().siblings('td[data-index="type"]').text();
        $("input[name='service-form-id']").val(id).change();
        $("#title").val(title).change();
        $("#price").val(parseInt(price)).change();
        $("#type").val(type).change();
        $("#service-update-form-submit").removeClass("d-none");
        $("#service-add-form-submit").addClass("d-none");
        $("#form-error").addClass("d-none");
    });
    // Send request a create service model to backend
    $("#service-add-form-submit").click(() => {
        let title = $('input[name="title"]').val();
        let type = $('select[name="type"]').val();
        let price = $('input[name="price"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sAddService,
            data: {
                _token: objConfig.sCsrf,
                title: title,
                type: type,
                price: price,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#service-form").modal("hide");
                }
            },
            statusCode: {
                422: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    for (const key in err.errors) {
                        $("#form-error").removeClass("d-none");
                        $("#form-error")
                            .children("strong")
                            .html(err.errors[key][0]);
                    }
                },
            },
        });
    });
    // Send request a update service model to backend

    $(document).delegate("#service-update-form-submit", "click", function () {
        let title = $("#title").val();
        let price = $("#price").val();
        let type = $("#type").val();
        let id = $('input[name="service-form-id"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sUpdService,
            data: {
                _token: objConfig.sCsrf,
                title: title,
                price: price,
                type: type,
                id: id,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#service-form").modal("hide");
                }
                $("#form-error").removeClass("d-none");
                $("#form-error")
                    .children("strong")
                    .text(response.validationMessage);
            },
        });
    });
    $(document).delegate(".service-delete-form-submit", "click", function () {
        let title = $(this).val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sDelService,
            data: {
                _token: objConfig.sCsrf,
                title: title,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    return fetch_data(page);
                }
                return alert("Что-то не так");
            },
        });
    });
});
