$( document ).ready(function() {
  $('div.liked').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          post_id = $('input[name=post_id]').val(),
          user_id = $('input[name=user_id]').val();

      $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'post_id' : post_id,
                    'user_id' : user_id
          },
          url:'/liked',

          success: function () {
                $('.uk-icon-star').addClass('active-favorite');
          }
      });
  });
});
