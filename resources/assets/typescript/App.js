"use strict";
var App = (function () {
    function App() {
    }
    App.prototype.init = function () {
        $('.message .close').on('click', function () {
            $(this).closest('.message').transition('fade');
        });
        $('.ui.dropdown').dropdown();
        $('.ui.checkbox').checkbox();
        /**
         * Shopping Popup menu
         */
        $('.shopping')
            .popup({
            inline: false,
            hoverable: true,
            position: 'bottom right',
            delay: {
                show: 20,
                hide: 20
            }
        });
    };
    return App;
}());
exports.App = App;
/**
 * Init By itself... temporarily
 */
new App().init();
//# sourceMappingURL=App.js.map