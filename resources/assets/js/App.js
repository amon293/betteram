"use strict";
var App = (function () {
    function App() {
    }
    App.prototype.init = function () {
        $('.message .close').on('click', function () {
            $(this).closest('.message').transition('fade');
        });
        $('.ui.dropdown').dropdown();
    };
    return App;
}());
exports.App = App;
/**
 * Init By itself... temporarily
 */
new App().init();
//# sourceMappingURL=App.js.map