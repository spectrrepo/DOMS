$(document).ready(function() {
    $('.nav-slide-about').on('click', function() {
        if ($(this).data('direction') === 'prev') {
            if ($('.item:first').hasClass('active-about')) {
                $('.item:not(.item:last)')
                    .addClass('left-about')
                    .removeClass('active-about')
                    .removeClass('right-about');
                $('.item:last')
                    .addClass('active-about')
                    .removeClass('right-about');
            } else {
                $('.active-about')
                    .prev()
                    .addClass('active-about')
                    .removeClass('left-about');
                $('.active-about:last')
                    .removeClass('active-about')
                    .addClass('right-about');
            }
        } else {
            if ($('.item:last').hasClass('active-about')) {
                $('.item:not(.item:first)')
                    .addClass('right-about')
                    .removeClass('active-about')
                    .removeClass('left-about');
                $('.item:first')
                    .addClass('active-about')
                    .removeClass('left-about');
            } else {
                $('.active-about')
                    .next()
                    .addClass('active-about')
                    .removeClass('right-about');
                $('.active-about:first')
                    .removeClass('active-about')
                    .addClass('left-about');
            }
        }
    });
});
