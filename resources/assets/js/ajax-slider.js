$( document ).ready(function() {
  $('.btn-prew').on('click', function (){
    if ($('.wrap-slider').find(".photo-item:first").index() === $('.active-slide').index() ) {
      var csrftoken = $('meta[name=_token]').attr('content');
      if (($('.active-slide').data('id') - 3) > 1) {
        lastPhoto = $('.active-slide').data('id') - 4;
      }else {
        lastPhoto = 0;
      }
      $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'lastPhoto'  : lastPhoto
            },
            url:'http://localhost:8000/load_left_images',

            success: function (data) {
              rev_data = data.reverse();
              rev_data.forEach( function(item, i, rev_data) {
                $('<div class="photo-item left-slide" data-id="'+item.id+'">' +
                  '<img class="img-slider" '+
                  'src="/system/App/Image/photos/000/'+
                  '000/006/original/6.jpg"></div>').prependTo('.wrap-slider');
              });
            }
      });
      // $('#popup-error-slider').css({'display':'block'});
    }else {
      var prewPoint = $('.active-slide').data('id') - 1;
      $('.active-slide').removeClass('active-slide').addClass('right-slide');
      $('.left-slide[data-id='+prewPoint+']').addClass('active-slide').removeClass('left-slide');
      $('#current-position').text($('.active-slide').data('id'));
      history.pushState('', '', $('.active-slide').data('id'));
    }

  });
  $('.btn-next').on('click', function (){
    if ($('.wrap-slider').find(".photo-item:last").index() === $('.active-slide').index() ) {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastPhoto = $('.active-slide').data('id');
      if (($('.active-slide').data('id') - 3) > 1) {
          lastPhoto = $('.active-slide').data('id') - 4;
      }else {
        lastPhoto = 0;
      }
      $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'lastPhoto'  : lastPhoto
            },
            url:'http://localhost:8000/load_right_images',

            success: function (data) {
              data.forEach( function(item, i, data) {
                $('<div class="photo-item right-slide" data-id="'+item.id+'">' +
                  '<img class="img-slider" '+
                  'src="/system/App/Image/photos/000/'+
                  '000/006/original/6.jpg"></div>').appendTo('.wrap-slider');
              });
            }
      });
      // $('#popup-error-slider').css({'display':'block'});
    }else {
      var nextPoint = $('.active-slide').data('id') + 1;
      $('.active-slide').removeClass('active-slide').addClass('left-slide');
      $('.right-slide[data-id='+nextPoint+']').addClass('active-slide').removeClass('right-slide');
      $('#current-position').text($('.active-slide').data('id'));
      history.pushState('', '', $('.active-slide').data('id'));
    }
  });
  $('.popup-error-close').on('click', function () {
    $('#popup-error-slider').css({'display':'none'});
  });
});
