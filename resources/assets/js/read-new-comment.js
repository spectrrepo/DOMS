$(document).ready(function () {
  $('.item-admin-row').on('click', function () {
    var csrftoken = $('meta[name=_token]').attr('content'),
        commentId = parseInt($(this).children('.id-cell').text());
    $.ajax({
        type:'POST',

        data: {
                  '_token'  : csrftoken,
                  'id' : commentId,
        },
        url: '/read_new_comment',

        success: function () {
          $('.id-cell:contains("'+commentId+'")').parent().removeClass('none-check');
        }
    });
  });
});
