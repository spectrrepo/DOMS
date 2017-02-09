$( document ).ready(function() {
  $('.btn-all-comments-news').on('click', function() {
      $(this).next().children().fadeIn();
      $(this).remove();
  });

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
            var icoEvent, textAboutEvent, quadro_ava_add,
                quadro_ava_user_event, views_count, likes_count, favs_count;
            for (var i = 0; i < data.length; i++) {
              if (data[i].type === 'favorite'){
                icoEvent = '<span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>';
                if (data[i].sex_user_event === 1 ){
                  textAboutEvent = ' добавил фотографию в избранное';
                }
                else if (data[i].sex_user_event === 2){
                  textAboutEvent = ' добавила фотографию в избранное';
                }
                else{
                  textAboutEvent = ' добавил(а) фотографию в избранное';
                }
              } else if (data[i].type === 'like'){
                icoEvent = '<span class="ico ico-news ico-news-star uk-icon-justify uk-icon-heart"></span>';
                if (data[i].sex_user_event === 1 ){
                  textAboutEvent = ' оценил фотографию';
                }
                else if (data[i].sex_user_event === 2){
                  textAboutEvent = ' оценилa фотографию';
                }
                else{
                  textAboutEvent = ' оценил(a) фотографию';
                }
              }

              if (data[i].quadro_ava_add !== null) {
                quadro_ava_add = data[i].quadro_ava_add;
              }else {
                quadro_ava_add = '/img/user.png';
              }
              if (data[i].quadro_ava_user_event != null) {
                  quadro_ava_user_event = data[i].quadro_ava_user_event;
              } else {
                  quadro_ava_user_event = '/img/user.png';
              }
              if (data[i].views_count !== null) {
                views_count = data[i].views_count;
              } else {
                views_count = '0';
              }
              if (data[i].likes_count !== null) {
                likes_count = data[i].likes_count;
              } else {
                likes_count = '0';
              }
              if (data[i].favs_count !== null) {
                favs_count = data[i].favs_count;
              } else {
                favs_count = '0';
              }

              $('<div class="b-person-post"><div class="col-news-min">'+
              '<div class="b-portret-blogger"><img src="'+ quadro_ava_add +'"/>'+
              '</div></div><div class="col-news-big">'+
              '<div class="b-name-redactor">'+
              '<a href="/profile/'+data[i].user_id_add+'">'+data[i].name_user_add+'</a></div>'+
              '<div class="b-post-body"><div class="b-photo-post">'+
              '<img src="'+data[i].img_photo+'" class="img-post" alt="" />'+
              '</div><div class="b-iformation"><div class="b-date">'+
              data[i].date_event+'</div><div class="b-statistics">'+
              '<div class="b-item-stat"><span class="ico uk-icon-justify uk-icon-eye"></span>'+
              '<span class="num-stat">'+ views_count +'</span>'+
              '<span class="tooltip-stat margin-num-comment-tooltip">'+
              '<span class="text-tooltip-stat">количество просмотров</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-heart"></span>'+
              '<span class="num-stat">'+ likes_count +'</span>'+
              '<span class="tooltip-stat margin-like-tooltip">'+
              '<span class="text-tooltip-stat">понравилось</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-star"></span>'+
              '<span class="num-stat">'+ favs_count +'</span>'+
              '<span class="tooltip-stat margin-liked-tooltip">'+
              '<span class="text-tooltip-stat">избранное</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div></div></div><div class="clear"></div>'+
              '</div><div class="clear"></div></div>'+
              '<div class="col-news-min">'+
              '<div class="b-portret-blogger"><img src="'+ quadro_ava_user_event +'"/>'+icoEvent+'</div></div>'+
              '<div class="col-news-big"><div class="b-name-redactor">'+
              '<a href="/profile/data[i].id_user_event">'+data[i].user_name_event+
              '</a><span class="event-text">'+textAboutEvent+'</span>'+
              '<p class="date-event-text">'+data[i].date_event+
              '</p></div></div><div class="clear"></div></div>')
              .appendTo('.b-personal-news');
            }

          }
      });
  });
});
