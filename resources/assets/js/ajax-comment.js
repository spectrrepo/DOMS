$( document ).ready(function() {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
    $(window).resize(function() {
      $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
    });
  $('.remove-comment').on('click', function(){
    var csrftoken = $('meta[name=_token]').attr('content'),
        id = $(this).children('.delete_comment_id').data('id'),
        positive = false;
        $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'delete_comment_id' : id,
            },
            url:'/delete_comment',
        });
        $(this).parent('.b-comment-wrap').remove();

  });
  $('.comment-add-form').on('submit', function() {
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
          url:'/comment',

          success: function (data) {
            $('.input-comment').val('');
                  if (data[0].user_quadro_ava === null) {
                    '/img/user.png';
                    $('<div class="b-comment-wrap">' +
                      '<span class="remove-comment uk-icon-justify uk-icon-remove">'+
                      '<span class="delete_comment_id" data-id="'+data[0].id+'"></span>'+
                      '</span>'+
                      '<a href="/profile/'+data[0].user_id +
                      '" class="b-photo-comment" style="background:url(/img/user.png)'+
                      'center no-repeat;background-size:cover;"></a>' +
                      '<div class="b-comment">' +
                        '<a href="/profile/'+
                        data[0].user_id +'" class="b-name-comment"> ' +
                          data.user_name +
                        '</a>' +
                        '<div class="b-text-comment">' +
                          data[0].text_comment +
                        '</div>' +
                        '<div class="b-date-comment">' +
                          data[0].rus_date +
                        '</div>'+
                      '</div>'+
                    '</div>').appendTo('.b-all-comment');
                  }else {

                  $('<div class="b-comment-wrap">' +
                    '<span class="remove-comment uk-icon-justify uk-icon-remove">'+
                    '<span class="delete_comment_id" data-id="'+data.id+'"></span>'+
                    '</span>'+
                    '<a href="/profile/'+data[0].user_id +
                    '" class="b-photo-comment" style="background:url('+
                    data[0].user_quadro_ava+')'+
                    'center no-repeat;background-size:cover;"></a>' +
                    '<div class="b-comment">' +
                      '<a href="/profile/'+
                      data[0].user_id +'" class="b-name-comment"> ' +
                        data[0].user_name +
                      '</a>' +
                      '<div class="b-text-comment">' +
                        data[0].text_comment +
                      '</div>' +
                      '<div class="b-date-comment">' +
                        data[0].rus_date +
                      '</div>'+
                    '</div>'+
                  '</div>').appendTo('.b-all-comment');
                }
                  $('.remove-comment').click( function(){
                    var csrftoken = $('meta[name=_token]').attr('content'),
                        id = $(this).children('.delete_comment_id').data('id'),
                        positive = false;
                        $.ajax({
                            type:'POST',
                            data: {
                                      '_token'  : csrftoken,
                                      'delete_comment_id' : id,
                            },
                            url:'/delete_comment',
                        });
                        $(this).parent('.b-comment-wrap').remove();

                  });
          }
      });
      return false;
  });
});
