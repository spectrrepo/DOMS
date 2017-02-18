$( document ).ready(function () {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});

  $(window).resize(function() {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  });

  $('#close-modal-likes').on('click', function(){
    $('#allPhotoLikes').fadeOut();
  });

  $('.like').hover(function(){
    $('.margin-like-tooltip').show();
  });

  $('.like').mouseleave(function(){
    $('.margin-like-tooltip').show();
  });
  
  $('footer').on('click', function () {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'id': id
      },
      url:'/load_all_likes',

      success: function (data) {
          $('.place-likes').empty();
          $('#allPhotoLikes').fadeIn();
          for(var i=0; i<data.length; i++) {
            if (data[i].quadro_ava === null) {
                portret = '/img/user.png';
            }else {
                portret = data[i].quadro_ava;
            }
            $('<div class="item-like">'+
              '<a href="/profile/'+data[i].id+'" class="like-portret">'+
                '<img src="'+portret+'"></a>'+
              '<a href="/profile/'+data[i].id+'" class="name-like">'+
                data[i].name+'</a></div>').appendTo('.place-likes');
          }
      }
    });
  });
});
