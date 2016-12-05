$( document ).ready(function() {
  $('div.like').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          post_id = $('input[name=post_id]').val(),
          user_id = $('input[name=user_id]').val();
          url = $('input[name=url-like]').val();
      $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'post_id' : post_id,
                    'user_id' : user_id
          },
          url:url,

          success: function (data) {
                if ( url === '/like') {
                  $('.uk-icon-heart').addClass('active-like');
                  $('#value-like').text(data);
                  $('input[name=url-like]').val();
                  $('input[name=url-like]').val('/delete_like');
                }else {
                  $('.uk-icon-heart').removeClass('active-like');
                  $('#value-like').text( $('#value-like').text() - 1) ;
                  $('input[name=url-like]').val('/like');
                }
          }
      });
  });
});
