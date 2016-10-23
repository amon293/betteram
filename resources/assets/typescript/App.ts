interface Semantic extends JQuery {
    transition(params?: any): any;
    dropdown(params?: any): any;
    checkbox(params?: any): any;
    popup(params?: any): any;
}

export class App {

    init() {

        $('.message .close').on('click', function () {
            (<Semantic>$(this).closest('.message')).transition('fade');
        });
        (<Semantic>$('.ui.dropdown')).dropdown();
        (<Semantic>$('.ui.checkbox')).checkbox();

        /**
         * Shopping Popup menu
         */
        (<Semantic>$('.shopping'))
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
