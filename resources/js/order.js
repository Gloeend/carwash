const { isInteger } = require("lodash");

class OrderService {
    constructor() {
        this.index = 0;
        this.sum = 0;
        this.cart = [];
        this.mark = "";
        this.model = "";
        this.class = "";
    }

    change(el) {
        let sIndex = $(el).attr("data-index");
        let listItem = $(
            '.list-services__service-item[data-index="' + sIndex + '"]'
        );
        if (sIndex === this.index) {
            return false;
        }
        $(el).siblings().removeClass("choice-of-type-selected");
        $(el).addClass("choice-of-type-selected");
        listItem
            .addClass("d-flex")
            .siblings('[data-index="' + this.index + '"]')
            .removeClass("d-flex")
            .addClass("d-none");
        this.index = sIndex;
        return true;
    }

    clickCart(el) {
        let sIndex = $(el).children("button").attr("data-index");
        if (sIndex == 1) {
            return this.removeCart(el);
        }
        $(el).children("button").children("img").removeClass("d-none");
        $(el).children("button").attr("data-index", 1);
        this.cart.push({
            title: $(el).children("div").children("p:first-child").text(),
            price: $(el)
                .children("div")
                .children("p:last-child")
                .children("span")
                .text(),
        });
        return true;
    }

    removeCart(el) {
        let sItem = $(el).children("div").children("p:first-child").text();
        $(el).children("button").children("img").addClass("d-none");
        $(el).children("button").attr("data-index", 0);
        for (let i = 0; i < this.cart.length; ++i) {
            if (this.cart[i].title === sItem) return this.cart.splice(i, 1);
        }
        return false;
    }

    changePrice() {
        this.sum = 0;
        for (let i = 0; i < this.cart.length; ++i) {
            this.sum += parseInt(this.cart[i].price);
        }
        if (isInteger(this.class.price)) this.sum += this.class.price;
        $(".list-services__end")
            .children("p:last-child")
            .children("span")
            .html(this.sum + " ₽");
        return true;
    }

    changeCartLength() {
        $(".list-services__end")
            .children("p:first-child")
            .children("span")
            .html(this.cart.length);
        return true;
    }

    setMark(id) {
        this.mark = id;
        let result;
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sOrderGetModels,
            data: { _token: objConfig.sCsrf, id_mark: id },
            cache: false,
            async: false,
            success: function (response) {
                result = response.obModels;
            },
        });
        $('select[name="model"]').html("<option value='nothing'></option>>");
        for (let i = 0; i < result.length; ++i)
            $(`select[name="model"]`).append(
                '<option value="' +
                    result[i].id +
                    '">' +
                    result[i].title +
                    "</option>"
            );
    }

    setModel(id) {
        this.model = id;
        if (id !== 0) {
            console.log(id);
            this.setClass(id);
            $("#model-class-price").html(
                '<p class="align-self-center mb-1 ml-2 w-100">Класс автомобиля -' +
                    this.class.title +
                    ", стоимость - " +
                    this.class.price +
                    "₽</span></p>"
            );
        } else {
            this.class = {};
            $("#model-class-price").html("");
        }
        this.changePrice;
    }

    setClass(id_model) {
        let result = {};
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sOrderGetClass,
            data: { _token: objConfig.sCsrf, id_model: id_model },
            cache: false,
            async: false,
            success: function (response) {
                result.title = response.title;
                result.price = parseInt(response.price);
            },
        });
        this.class = result;
    }

    sendForm() {
        let phoneReplaceChars = ["(", ")", "-", " ", "+", "_"];
        let phone = $('input[name="phone"]').val();
        for (let i = 0; i < phoneReplaceChars.length; i++) {
            phone = phone.split(phoneReplaceChars[i]).join("");
        }
        let fio = $('input[name="fio"]').val();
        $.ajax({
            type: "POST",
            url: objConfig.objRoutes.sRequest,
            data: {
                _token: objConfig.sCsrf,
                id_mark: this.mark,
                id_model: this.model,
                cart: this.cart,
                phone: phone,
                fio: fio,
            },
            cache: false,
            async: false,
            success: function (response) {
                $(".alert-danger").removeClass("d-none").addClass("d-none");
                return $(".alert-success")
                    .removeClass("d-none")
                    .children("p")
                    .html(
                        "Спасибо за отправку заявки! Вам перезвонят в ближайшее время для уточнения даты"
                    );
            },

            statusCode: {
                422: function (xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    for (const key in err.errors) {
                        return $(".alert-danger")
                            .removeClass("d-none")
                            .children("p")
                            .html(err.errors[key][0]);
                    }
                },
            },
        });
    }
}

let app = new OrderService();
jQuery(document).ready(function () {
    $("input[name='phone']").inputmask("+7 (999) 999-9999");
    $(".choose-btn").click(function () {
        app.change($(this));
    });
    $(".list-services__service-item").click(function () {
        app.clickCart($(this));
        app.changePrice();
        app.changeCartLength();
    });
    $('select[name="mark"]').change(function () {
        if ($(this).val() === "nothing") return app.setMark(0);
        app.setMark($(this).val());
    });
    $('select[name="model"]').change(function () {
        if ($(this).val() === "nothing") return app.setModel(0);
        app.setModel($(this).val());
    });
    $("form")
        .children("button.button")
        .click(function () {
            app.sendForm();
        });
});
