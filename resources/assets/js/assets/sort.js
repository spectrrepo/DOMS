$( document ).ready(function() {
  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.click-ready').removeClass('active-menu-item');
  });

  $('#placements .item-moodal-sidebar').on('click', function () {
  });

  $('#styles .item-moodal-sidebar').on('click', function () {

  });

  $('#colors .colors-space-item').on('click', function () {
  });

  $('#orders .item-moodal-sidebar').on('click', function () {
  });
});
