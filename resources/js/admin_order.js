jQuery(document).ready(() => {
    let page = 1;
    let sort = "default";
    let day = null;
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

    // Ajax fetch table orders
    function fetch_data(page) {
        var _token = objConfig.sCsrf;
        $.ajax({
            url: objConfig.objRoutes.sFetchOrder,
            method: "POST",
            data: { _token: _token, page: page, sort_type: sort, day: day },
            success: function (data) {
                $("#orders-table-data").html(data);
            },
        });
    }

    $("#sort-form-submit").click(function () {
        day = $('input[name="datetime"]').val();
        $("#order-form").modal("hide");
        fetch_data(page);
    });
    $(document).delegate(".sort-button", "click", function () {
        if ($(this).attr("data-sort") === "date") {
            $("#order-form").modal("show");
            $(".modal-title").text("Сортировать по дате");
            $("#sort-form-submit").removeClass("d-none");
            $("#order-update-form-submit").addClass("d-none");
            $("#form-error").addClass("d-none");
            $(this).siblings().removeClass("btn-success");
            $(this).addClass("btn-success");
            return null;
        }
        sort = $(this).attr("data-sort");
        day = null;
        $(this).siblings().removeClass("btn-success");
        $(this).addClass("btn-success");
        fetch_data(page);
    });

    // Open modal window with form update order model
    $(document).delegate(".open-update-form", "click", function () {
        $("#order-form").modal("show");
        $(".modal-title").text("Изменить время записи");
        let id = $(this).attr("data-index");
        let datetime = $(this)
            .parent()
            .siblings('td[data-index="coming_at"]')
            .text();
        $("input[name='order-form-id']").val(id).change();
        $("#datetime").val(datetime.slice(0, -3).replace(" ", "T"));
        $("#order-update-form-submit").removeClass("d-none");
        $("#sort-form-submit").addClass("d-none");
        $("#form-error").addClass("d-none");
    });
    // Send request a update order model to backend

    $(document).delegate("#order-update-form-submit", "click", function () {
        let datetime = $('input[name="datetime"]').val();
        let id = $('input[name="order-form-id"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sUpdOrder,
            data: {
                _token: objConfig.sCsrf,
                datetime: datetime,
                id: id,
            },
            success: function (response) {
                if (response.validationMessage === "success") {
                    fetch_data(page);
                    return $("#order-form").modal("hide");
                }
                $("#form-error").removeClass("d-none");
                $("#form-error")
                    .children("strong")
                    .text(response.validationMessage);
            },
        });
    });
    $(document).delegate(".order-delete-form-submit", "click", function () {
        let id = $(this).val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sDelOrder,
            data: {
                _token: objConfig.sCsrf,
                id: id,
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
