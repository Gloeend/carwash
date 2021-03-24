const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.styles(
    [
        "resources/css/style.css",
        "resources/css/media.css",
        "resources/css/fonts-variables.css",
    ],
    "public/css/app.css"
);
mix.js(["resources/js/script.js"], "public/js");
mix.js("resources/js/order.js", "public/js");
mix.js("resources/js/login.js", "public/js");
mix.js("resources/js/user.js", "public/js");
mix.js("resources/js/service.js", "public/js");
mix.js("resources/js/type_service.js", "public/js");
mix.js("resources/js/mark.js", "public/js");
mix.js("resources/js/class.js", "public/js");
mix.js("resources/js/admin_order.js", "public/js");
mix.js("resources/js/mmc.js", "public/js");
