export class App {

    init() {
        $('.message .close').on('click', function () {
            $(this).closest('.message').transition('fade');
        });
    }

}

/**
 * Init By itself... temporarily
 */
new App().init()

