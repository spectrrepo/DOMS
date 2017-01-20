$( document ).ready(function() {
  $('#close-modal-views').on('click', function() {
    $('#modalViewsZoom').fadeOut();
  });

  $('.min-nav-views').on('click', function () {
    if ($(this).data('direction') === 'prev') {
      if ($('.item-view-min:first').hasClass('active-view-min')) {
        $('.item-view-min:not(.item-view-min:last)')
                  .addClass('left-view-min')
                  .removeClass('active-view-min')
                  .removeClass('right-view-min');
        $('.item-view-min:last')
              .addClass('active-view-min')
              .removeClass('right-view-min');
      }else {
        $('.active-view-min')
          .prev()
          .addClass('active-view-min')
          .removeClass('left-view-min');
        $('.active-view-min:last')
          .removeClass('active-view-min')
          .addClass('right-view-min');
      }
    }else {
      if ($('.item-view-min:last').hasClass('active-view-min')) {
        $('.item-view-min:not(.item-view-min:first)')
                  .addClass('right-view-min')
                  .removeClass('active-view-min')
                  .removeClass('left-view-min');
        $('.item-view-min:first')
              .addClass('active-view-min')
              .removeClass('left-view-min');
      }else {
        $('.active-view-min')
          .next()
          .addClass('active-view-min')
          .removeClass('right-view-min');
        $('.active-view-min:first')
          .removeClass('active-view-min')
          .addClass('left-view-min');
      }
    }
  });

  $('.nav-zoom-views').on('click', function () {
    if ($(this).data('direction') === 'prev') {
      if ($('.item-views-zoom:first').hasClass('active-slide-zoom-views')) {
        $('.item-views-zoom:not(.item-views-zoom:last)')
                  .addClass('left-slide-zoom-views')
                  .removeClass('active-slide-zoom-views')
                  .removeClass('right-slide-zoom-views');
        $('.item-views-zoom:last')
              .addClass('active-slide-zoom-views')
              .removeClass('right-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle:first').removeClass('active-cicle');

      }
      else {
        $('.active-slide-zoom-views')
          .prev()
          .addClass('active-slide-zoom-views')
          .removeClass('left-slide-zoom-views');
        $('.active-slide-zoom-views:last')
          .removeClass('active-slide-zoom-views')
          .addClass('right-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle').next().removeClass('active-cicle');
      }
    } else {
      if ($('.item-views-zoom:last').hasClass('active-slide-zoom-views')) {
        $('.item-views-zoom:not(.item-views-zoom:first)')
                  .addClass('right-slide-zoom-views')
                  .removeClass('active-slide-zoom-views')
                  .removeClass('left-slide-zoom-views');
        $('.item-views-zoom:first')
              .addClass('active-slide-zoom-views')
              .removeClass('left-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle:last').removeClass('active-cicle');

      }else {
        $('.active-slide-zoom-views')
          .next()
          .addClass('active-slide-zoom-views')
          .removeClass('right-slide-zoom-views');
        $('.active-slide-zoom-views:first')
          .removeClass('active-slide-zoom-views')
          .addClass('left-slide-zoom-views');
        $('.nav-cicle:eq('+$('.active-slide-zoom-views').index()+')')
          .addClass('active-cicle');
        $('.nav-cicle').prev().removeClass('active-cicle');

      }
    }
  });
});
