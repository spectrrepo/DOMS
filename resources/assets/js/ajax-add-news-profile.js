$( document ).ready(function() {
  $('.b-next-page').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastIdJS = $('#pole').children('.item-gallery:last-child').index(),

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
              '<div class="b-portret-blogger"><img src="'++'" alt="">'+
              '</div></div><div class="col-news-big">'+
              '<div class="b-name-redactor"><a href="'++'">'++'</a></div>'+
              '<div class="b-post-body"><div class="b-photo-post">'+
              '<img src="'++'" class="img-post" alt="">'+
              '</div><div class="b-iformation"><div class="b-date">'+
              13 Dec 2016+
              '</div><div class="b-statistics"><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-eye"></span>'+
              '<span class="num-stat">'++'</span>'+
              '<span class="tooltip-stat other-margin-tooltip1">'+
              '<span class="text-tooltip-stat">количество просмотров</span>'+
              '<span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-heart"></span>'+
              '<span class="num-stat">'++'</span>'+
              '<span class="tooltip-stat other-margin-tooltip2">'+
              '<span class="text-tooltip-stat">понравилось'+
              '</span><span class="triangle-tooltip-stat"></span>'+
              '</span></div><div class="b-item-stat">'+
              '<span class="ico uk-icon-justify uk-icon-star"></span>'+
              '<span class="num-stat">'++'</span>'+
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
