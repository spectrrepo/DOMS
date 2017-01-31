$( document ).ready(function() {
  $('div.liked').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          post_id = $('input[name=post_id]').val(),
          user_id = $('input[name=user_id]').val(),
          url = $('input[name=url-liked]').val();
      $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'post_id' : post_id,
                    'user_id' : user_id
          },
          url:url,

          success: function () {
            if ( url === '/liked') {
              $('.uk-icon-star').addClass('active-favorite');
              $('input[name=url-liked]').val('/delete_liked');
            }else {
              $('.uk-icon-star').removeClass('active-favorite');
              $('input[name=url-liked]').val('/liked');
            }

          }
      });
  });
});
