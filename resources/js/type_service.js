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

    // Ajax fetch table type
    function fetch_data(page) {
        var _token = objConfig.sCsrf;
        $.ajax({
            url: objConfig.objRoutes.sFetchType,
            method: "POST",
            data: { _token: _token, page: page },
            success: function (data) {
                $("#types-table-data").html(data);
            },
        });
    }

    // Open modal window with form add type model
    $("#open-add-form").click(() => {
        $("#type-form").modal("show");
        $(".modal-title").text("Добавить новый тип услуг");
        $("#type-update-form-submit").addClass("d-none");
        $("#type-add-form-submit").removeClass("d-none");
        $("#title").val("").change();
        $("#form-error").addClass("d-none");
    });
    // Open modal window with form update type model
    $(document).delegate(".open-update-form", "click", function () {
        $("#type-form").modal("show");
        $(".modal-title").text("Изменить тип услуг");
        let id = $(this).attr("data-index");
        let title = $(this).parent().siblings('td[data-index="title"]').text();
        $("input[name='type-form-id']").val(id).change();
        $("#title").val(title).change();
        $("#type-update-form-submit").removeClass("d-none");
        $("#type-add-form-submit").addClass("d-none");
        $("#form-error").addClass("d-none");
    });
    // Send request a create service model to backend
    $("#type-add-form-submit").click(() => {
        let title = $('input[name="title"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sAddType,
            data: {
                _token: objConfig.sCsrf,
                title: title,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#type-form").modal("hide");
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

    $(document).delegate("#type-update-form-submit", "click", function () {
        let title = $("#title").val();
        let id = $('input[name="type-form-id"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sUpdType,
            data: {
                _token: objConfig.sCsrf,
                title: title,
                id: id,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#type-form").modal("hide");
                }
                $("#form-error").removeClass("d-none");
                $("#form-error")
                    .children("strong")
                    .text(response.validationMessage);
            },
        });
    });
    $(document).delegate(".type-delete-form-submit", "click", function () {
        let title = $(this).val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sDelType,
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
