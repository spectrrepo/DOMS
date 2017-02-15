$(document).ready(function() {
    $('.btn-all-comments-news').on('click', function() {
        $(this).next().children().fadeIn();
        $(this).remove();
    });
});
