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

                  $('<div class="b-comment">' +
                    '<a href="http://localhost:8000/profile/'+data.user_id +'" class="b-photo-comment">' +
                    '<img class="img-full-width" src="'+'">' +
                    '</a>' +
                    '<div class="b-comment">' +
                      '<a href="http://localhost:8000/profile/'+data.user_id +'" class="b-name-comment"> ' +
                        data.user_id +
                      '</a>' +
                      '<div class="b-text-comment">' +
                        data.text_comment +
                      '</div>' +
                      '<div class="b-date-comment">' +
                      '</div>'+
                    '</div>'+
                  '</div>').appendTo('.b-all-comment');

          }
      });
  });
});
