jQuery(document).ready(function ($) {
    $('#adminmenu li.menu-top').hover(function () {
        var submenu = $(this).find('.wp-submenu');
        if (submenu.length) {
            var submenuOffset = submenu.offset();
            var submenuHeight = submenu.outerHeight();
            var windowHeight = $(window).height();
            var scrollTop = $(window).scrollTop();

            // Check if the submenu extends beyond the bottom edge of the window
            if (submenuOffset.top + submenuHeight > windowHeight + scrollTop) {
                // Align submenu upwards
                submenu.css({
                    top: 'auto',
                    bottom: 0
                });
            } else {
                // Align submenu downwards
                submenu.css({
                    top: 0,
                    bottom: 'auto'
                });
            }
        }
    });
});
