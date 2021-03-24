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

    // Ajax fetch table class
    function fetch_data(page) {
        var _token = objConfig.sCsrf;
        $.ajax({
            url: objConfig.objRoutes.sFetchClass,
            method: "POST",
            data: { _token: _token, page: page },
            success: function (data) {
                $("#classes-table-data").html(data);
            },
        });
    }

    // Open modal window with form update class model
    $(document).delegate(".open-update-form", "click", function () {
        $("#class-form").modal("show");
        $(".modal-title").text("Изменить марку");
        let title = $(this).parent().siblings('td[data-index="title"]').text();
        let price = $(this).parent().siblings('td[data-index="price"]').text();
        $("#title").val(title).change();
        $("#price").val(parseInt(price)).change();
        $("#class-update-form-submit").removeClass("d-none");
        $("#class-add-form-submit").addClass("d-none");
        $("#form-error").addClass("d-none");
    });

    // Send request a update class model to backend
    $(document).delegate("#class-update-form-submit", "click", function () {
        let title = $("#title").val();
        let price = $("#price").val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sUpdClass,
            data: {
                _token: objConfig.sCsrf,
                title: title,
                price: price,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#class-form").modal("hide");
                }
                $("#form-error").removeClass("d-none");
                $("#form-error")
                    .children("strong")
                    .text(response.validationMessage);
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
});
