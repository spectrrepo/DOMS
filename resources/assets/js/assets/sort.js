$( document ).ready(function() {
  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.click-ready').removeClass('active-menu-item');
  });

  // placements sort control
  $('#placements span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#placements .item-moodal-sidebar').on('click', function () {
    if (!($('#placements .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

            }
          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {

          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

          }
        }else {
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

          }else {
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 1) {

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 0) {

          }
        }else {

        }
    }
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {

      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#placements .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {

        }else {

        }
      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 3) {

        }else {

        }
      }
    });
  });



  // styles sort control
  $('#styles span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#styles .item-moodal-sidebar').on('click', function () {
    if (!($('#styles .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

            }
          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {

          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

          }
        }else {
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

          }else {

          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 1) {

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 0) {

          }
        }else {

        }
    }
      if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {

      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {

        }else {

        }
      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {

        }else {

        }
      }
    });
  });

  $('#colors .colors-space-item').on('click', function () {
   if($(this).is('.active-choose-ico')) {

    }else {

    }
    });
  });

  $('#orders .item-moodal-sidebar').on('click', function () {
   if($(this).is('.active-choose-ico')) {

    }else {

    }

  });
});
