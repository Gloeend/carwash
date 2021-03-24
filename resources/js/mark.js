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
            url: objConfig.objRoutes.sFetchMark,
            method: "POST",
            data: { _token: _token, page: page },
            success: function (data) {
                $("#marks-table-data").html(data);
            },
        });
    }

    // Open modal window with form add type model
    $("#open-add-form").click(() => {
        $("#mark-form").modal("show");
        $(".modal-title").text("Добавить новую марку");
        $("#mark-update-form-submit").addClass("d-none");
        $("#mark-add-form-submit").removeClass("d-none");
        $("#title").val("").change();
        $("#form-error").addClass("d-none");
    });

    // Open modal window with form update type model
    $(document).delegate(".open-update-form", "click", function () {
        $("#mark-form").modal("show");
        $(".modal-title").text("Изменить марку");
        let id = $(this).attr("data-index");
        let title = $(this).parent().siblings('td[data-index="title"]').text();
        $("input[name='mark-form-id']").val(id).change();
        $("#title").val(title).change();
        $("#mark-update-form-submit").removeClass("d-none");
        $("#mark-add-form-submit").addClass("d-none");
        $("#form-error").addClass("d-none");
    });
    // Send request a create mark model to backend
    $("#mark-add-form-submit").click(() => {
        let title = $('input[name="title"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sAddMark,
            data: {
                _token: objConfig.sCsrf,
                title: title,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#mark-form").modal("hide");
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
    // Send request a update mark model to backend

    $(document).delegate("#mark-update-form-submit", "click", function () {
        let title = $("#title").val();
        let id = $('input[name="mark-form-id"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sUpdMark,
            data: {
                _token: objConfig.sCsrf,
                title: title,
                id: id,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#mark-form").modal("hide");
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
    $(document).delegate(".mark-delete-form-submit", "click", function () {
        let title = $(this).val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sDelMark,
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
