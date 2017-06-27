(function ($) {

    $(document).ready(function () {
    

        // hide all content but for the first tab
        $('.tb_innercontent').hide();
        $('.tb_innercontent:first-child').show();
        // set id for first tab as active
        $('li.tab1').attr('id', 'tb_activetab');

            // set content for clicked tab and set active tab
            $('.tb_tabs ul li ').click(function () {

                    var showTab = $(this).attr('class');
                    $('.tb_tabs ul li').attr('id', '');
                    $(this).attr('id', 'tb_activetab');
                    $('.tb_innercontent').each(function () {

                            if ($(this).hasClass(showTab)) {

                                $(this).show();

                            } else {

                                $(this).hide();

                            }

                    }); // end tb_innercontent function

            }); // end ul li function

    }); // end document ready
}(jQuery));