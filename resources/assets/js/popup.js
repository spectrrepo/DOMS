$( document ).ready(function() {

  $('span.click-ready').on('click', function () {
    $('.menu-item').removeClass('active-menu-item');
    $('.sidebar-modal').removeClass('block-view');
    $(this).parent('.menu-item').addClass('active-menu-item');
    $(this).nextAll(".sidebar-modal").addClass('block-view');
  });

  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.menu-item').removeClass('active-menu-item');
  });

  $('li.item-moodal-sidebar').on('click', function () {
    $(this).children('.choose-ico').toggleClass('active-choose-ico');
    $('<li class="choose-sort-item">'+
        '<span class="name-sort-item">Красота</span>' +
        '<i class="close-sort-item">x</i>' +
    '</li>').appendTo('.menu-item');
  });
});
