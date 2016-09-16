export class App {

    init() {
        console.log('initializing plugins')
        $('.message .close').on('click', function () {
            $(this).closest('.message').transition('fade');
        });
        $('.ui.dropdown').dropdown();
        $('.ui.checkbox').checkbox();
    }

}

/**
 * Init By itself... temporarily
 */
new App().init()

