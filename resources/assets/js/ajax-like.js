$( document ).ready(function() {
  $('div.like').on('click', function() {
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
          url:'http://localhost:8000/like',

          success: function (data) {
                $('#value-like').text(data);
                $('.uk-icon-heart').addClass('active-like');
          }
      });
  });
});
