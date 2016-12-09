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
      $('#current-position').text($('.active-slide').index());
      $('input[name=post_id]').val($('.active-slide').data('id'));
      history.pushState('', '', $('.active-slide').data('id'));
    }

  });
  $('.btn-next').on('click', function (){
    if ($('.wrap-slider').find(".photo-item:last").data('id') === $('.active-slide').data('id') ) {
      $('#popup-error-slider').fadeIn();
    }else {
      $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
      $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
      $('#current-position').text($('.active-slide').index());
      $('input[name=post_id]').val($('.active-slide').data('id'));
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
