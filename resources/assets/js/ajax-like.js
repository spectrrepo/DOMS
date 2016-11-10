$( document ).ready(function() {
  $('.submit-comment').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          comment = $('.input-comment').val(),
          post_id = $('input[name=post_id]').val(),
          user_id = $('input[name=user_id]').val();

      $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'comment' : comment,
                    'post_id' : post_id,
                    'user_id' : user_id
          },
          url:'http://localhost:8000/comment',

          success: function (data) {
                $('.b-all-comment').empty();
                $().appendTo('.b-all-comment');
          }
      });
  });
});
