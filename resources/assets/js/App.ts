export class App {

    init() {
        console.log('initializing plugins')
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
            })

    }

}

/**
 * Init By itself... temporarily
 */
new App().init()

