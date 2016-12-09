$( document ).ready(function() {
  var id, newLocal;
  $('#all-photo').text($('.photo-item').length);
  $('#current-position').text($('.photo-item:first').length);
  $('.btn-prew').on('click', function (){
    if ($('.wrap-slider').find(".photo-item:first").data('id') === $('.active-slide').data('id') ) {
      $('#popup-error-slider').fadeIn();
    }else {
      $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
      $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
      $('#current-position').text($('.active-slide').index()+1);
      $('input[name=post_id]').val($('.active-slide').data('id'));
      id = 'id=['+$('.active-slide').data('id')+']';
      newLocal = window.location.href;
      $('#num_comment').empty();
      var a = $('#allComments').children('div[data-postid='+$('.active-slide').data('id')+']')
                       .length;
      $('#num_comment').text(a);
      var sd = $('#allComments').children('div[data-postid='+$('.active-slide').data('id')+']');
      if (typeof(sd[0]) !== "undefined") {
        $('.b-all-comment').empty();
        for(var i=0; i<sd.length; i++) {
                    $('<div class="b-comment">'+
                      '<a style="background:url(/system/App/User/avatars/000/000/0'+
                      sd[i].getAttribute('data-user')
                      +'/original/'+sd[i].getAttribute('data-path')
                      +')" href="http://localhost:8000/profile/'
                      +sd[i].getAttribute('data-user')+'" class="b-photo-comment"></a>'+
                      '<div class="b-comment">'+
                        '<a href="http://localhost:8000/profile/16" class="b-name-comment">'+
                          sd[i].getAttribute('data-name')+
                        '</a><div class="b-text-comment">'+
                          sd[i].innerHTML+
                        '</div><div class="b-date-comment">'+
                          sd[i].getAttribute('data-date')+
                        '</div></div></div>').appendTo('.b-all-comment');
        }
      }else{
        $('.b-all-comment').empty();
      }
      $('#value-like').empty();
      var b = $('#allLikes').children('div[data-postid='+$('.active-slide').data('id')+']')
                       .length;
      $('#value-like').text(b);
      var tags = $('#allTags').children('div[data-postid='+$('.active-slide').data('id')+']');
      if (typeof(tags[0]) !== "undefined") {
        if ($('.pole-tag').length !== 0) {
          $('.pole-tag').empty();
          for(var i=0; i<tags.length; i++) {
                  $('<div class="tag-item"></div').appendTo('.pole-tag').text(tags[i].innerHTML);
          }
          $('<div class="clear"></div').appendTo('.pole-tag');

        }else{

          $('.col-descreption-photo div:first').prepend('<div class="title-tag">Теги</div>'+
                                                        '<div class="pole-tag"></div></div>');

          for(var i=0; i<tags.length; i++) {
            $('<div class="tag-item"></div').appendTo('.pole-tag').text(tags[i].innerHTML);
            }
            $('<div class="clear"></div').appendTo('.pole-tag');
        }
      }else{

        $('.pole-tag').remove();
      }
      var description = $('#allDescriptionPhoto').children('div[data-id='+$('.active-slide').data('id')+']');
      if (description !== null) {
        if ($('.view-photo-slide p').text() !== null) {
          $('.view-photo-slide p').empty();
          $('.view-photo-slide p').append(description.text());
        }else{
          $('.view-photo-slide p').append(description.text());
        }
      }else{
        $('.view-photo-slide p').text('')
      }
      var description = $('#allTitlePhoto').children('div[data-id='+$('.active-slide').data('id')+']');
      if (description !== null) {
        if ($('.view-photo-slide h3').text() !== null) {
          $('.view-photo-slide h3').empty();
          $('.view-photo-slide h3').append(description.text());
        }else{
          $('.view-photo-slide h3').append(description.text());
        }
      }else{
        $('.view-photo-slide h3').text('')
      }
      newLocal = newLocal.replace('id=['+$('.active-slide').next().data('id')+']', id);
      history.pushState('', '', newLocal);
    }

  });
  $('.btn-next').on('click', function (){
    if ($('.wrap-slider').find(".photo-item:last").data('id') === $('.active-slide').data('id') ) {
      $('#popup-error-slider').fadeIn();
    }else {
      $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
      $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
      $('#current-position').text($('.active-slide').index()+1);
      $('input[name=post_id]').val($('.active-slide').data('id'));
      $('#num_comment').empty();
      var a = $('#allComments').children('div[data-postid='+$('.active-slide').data('id')+']')
                       .length;
      $('#num_comment').text(a);
      var sd = $('#allComments').children('div[data-postid='+$('.active-slide').data('id')+']');
      if (typeof(sd[0]) !== "undefined") {
        $('.b-all-comment').empty();
        for(var i=0; i<sd.length; i++) {
                    $('<div class="b-comment">'+
                      '<a style="background:url(/system/App/User/avatars/000/000/0'+
                      sd[i].getAttribute('data-user')
                      +'/original/'+sd[i].getAttribute('data-path')
                      +')" href="http://localhost:8000/profile/'
                      +sd[i].getAttribute('data-user')+'" class="b-photo-comment"></a>'+
                      '<div class="b-comment">'+
                        '<a href="http://localhost:8000/profile/16" class="b-name-comment">'+
                          sd[i].getAttribute('data-name')+
                        '</a><div class="b-text-comment">'+
                          sd[i].innerHTML+
                        '</div><div class="b-date-comment">'+
                          sd[i].getAttribute('data-date')+
                        '</div></div></div>').appendTo('.b-all-comment');
        }
      }else{
        $('.b-all-comment').empty();
      }
      $('#value-like').empty();
      var b = $('#allLikes').children('div[data-postid='+$('.active-slide').data('id')+']')
                       .length;
      $('#value-like').text(b);
      var tags = $('#allTags').children('div[data-postid='+$('.active-slide').data('id')+']');
      if (typeof(tags[0]) !== "undefined") {
        if ($('.pole-tag').length !== 0) {
          $('.pole-tag').empty();
          for(var i=0; i<tags.length; i++) {
                  $('<div class="tag-item"></div').appendTo('.pole-tag').text(tags[i].innerHTML);
          }
          $('<div class="clear"></div').appendTo('.pole-tag');

        }else{

          $('.col-descreption-photo div:first').prepend('<div class="title-tag">Теги</div>'+
                                                        '<div class="pole-tag"></div></div>');

          for(var i=0; i<tags.length; i++) {
            $('<div class="tag-item"></div').appendTo('.pole-tag').text(tags[i].innerHTML);
        }
            $('<div class="clear"></div').appendTo('.pole-tag');
        }
      }else{

        $('.pole-tag').remove();
      }



      var description = $('#allDescriptionPhoto').children('div[data-id='+$('.active-slide').data('id')+']');
      if (description !== null) {
        if ($('.view-photo-slide p').text() !== null) {
          $('.view-photo-slide p').empty();
          $('.view-photo-slide p').append(description.text());
        }else{
          $('.view-photo-slide p').append(description.text());
        }
      }else{
        $('.view-photo-slide p').text('')
      }
      var description = $('#allTitlePhoto').children('div[data-id='+$('.active-slide').data('id')+']');
      if (description !== null) {
        if ($('.view-photo-slide h3').text() !== null) {
          $('.view-photo-slide h3').empty();
          $('.view-photo-slide h3').append(description.text());
        }else{
          $('.view-photo-slide h3').append(description.text());
        }
      }else{
        $('.view-photo-slide h3').text('')
      }
      var viewCount = $('#allUserViews').children('div[data-id='+$('.active-slide').data('id')+']');
          $('#num_views').text(viewCount.data('count'));
      id = 'id=['+$('.active-slide').data('id')+']';
      newLocal = window.location.href;
      newLocal = newLocal.replace('id=['+$('.active-slide').prev().data('id')+']', id);
      history.pushState('', '', newLocal);
    }
  });
  $('.popup-error-close').on('click', function () {
    $('#popup-error-slider').fadeOut();
  });
});
