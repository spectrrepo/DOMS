$( document ).ready(function() {
  $('.btn-dwnld-new').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastIdJS = $('.b-person-post').length;
      $.ajax({
          type:'POST',
          data: {
                  'lastId': lastIdJS,
                  '_token': csrftoken

          },
          url:'/pagination_news',

          success: function (data) {
            for (var i = 0; i < data.length; i++) {
              $('<div class="b-person-post"><div class="col-news-min">'+
              '<div class="b-portret-blogger" style="background:url('+data[i].path_full+')'+
              'center no-repeat;background-size: cover;"></div>'+
              '</div><div class="col-news-big">'+
              '<div class="b-name-redactor"><a href="'+data[i].user_upload_id+'">'+data[i].name+'</a></div>'+
              '<div class="b-post-body"><a href="'+data[i].id+'" class="b-photo-post">'+
              '<img src="'+data[i].full_path+'" class="img-post" alt="">'+
              '</a><div class="b-iformation"><div class="b-date">'+
              +data[i].photo_update_at+
              '</div><div class="b-statistics"><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-eye"></span>'+
              '<span class="num-stat">'+data[i].views_count+'</span>'+
              '<span class="tooltip-stat other-margin-tooltip1">'+
              '<span class="text-tooltip-stat">количество просмотров</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-heart"></span>'+
              '<span class="num-stat">'+data[i].likes_count+'</span>'+
              '<span class="tooltip-stat other-margin-tooltip2">'+
              '<span class="text-tooltip-stat">понравилось'+
              '</span><span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-star"></span>'+
              '<span class="num-stat">'+data[i].favs_count+'</span>'+
              '<span class="tooltip-stat"><span class="text-tooltip-stat">избранное'+
              '</span><span class="triangle-tooltip-stat"></span>'+
              '</span></div></div></div><div class="clear"></div></div>'+
              '<div class="clear"></div></div><div class="clear"></div></div>')
              .appendTo('.b-personal-news');
            }

          }
      });
  });
});
