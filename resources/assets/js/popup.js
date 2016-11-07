$( document ).ready(function() {
var erw = 1;
  $('span.click-ready').on('click', function () {
    $('.menu-item').removeClass('active-item-click');
    $('.click-ready').removeClass('active-menu-item');
    $('.sidebar-modal').removeClass('block-view');
    $(this).parent('.click-ready').addClass('active-menu-item');
    $(this).parent('.menu-item').addClass('active-item-click');
    $(this).nextAll(".sidebar-modal").addClass('block-view');
  });

  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.click-ready').removeClass('active-menu-item');
  });

  $('li.item-moodal-sidebar').on('click', function () {
    var id = $('.item-moodal-sidebar').data('id');
    var title = $(this).children('.item-modal-text').text();
    if ($('.menu-item').children('li.choose-sort-item:last-child').data('erw') === 3){

        $('.menu-item').children('[data-erw = 1]').remove();
        $('.menu-item').children('[data-erw = 2]').attr('data-erw', 1);
        $('.menu-item').find('li.choose-sort-item:last-child')
                       .attr('data-erw', 2);
        $('.menu-item').find('active-choose-ico:first-child')
                       .removeClass('active-choose-ico');

        $('[data-erw2 = 1]').children('.choose-ico')
                            .removeClass('active-choose-ico');
        $('[data-erw2 = 1]').removeAttr('data-erw2');
        $('[data-erw2 = 2]').attr('data-erw2', 1);
        $('[data-erw2 = 3]').attr('data-erw2', 2);

        $(this).attr('data-erw2', 3);
        $(this).children('.choose-ico').toggleClass('active-choose-ico');

        $('<li class="choose-sort-item" data-erw="'+3+'" data-id="'+id+'">'+
            '<span class="name-sort-item">'+title+'</span>' +
            '<i class="close-sort-item">x</i>' +
        '</li>').appendTo('.active-item-click');

    } else {
      $(this).children('.choose-ico').toggleClass('active-choose-ico');
      $(this).attr('data-erw2', erw);

      $('<li class="choose-sort-item" data-erw="'+erw+'" data-id="'+id+'">'+
          '<span class="name-sort-item">'+title+'</span>' +
          '<i class="close-sort-item">x</i>' +
      '</li>').appendTo('.active-item-click');
      erw += 1;
    }
      $('li.choose-sort-item').click(function () {
        if ($(this).data('erw') === 1) {
          $('[data-erw2 = 1]').children('.active-choose-ico').removeClass('.active-choose-ico');
          $(this).remove();
        }
        else if ($(this).data('erw') === 2) {
          $('[data-erw2 = 2]').children('.active-choose-ico').removeClass('.active-choose-ico');
          $(this).remove();
        }
        else{
          $('[data-erw2 = 3]').children('.active-choose-ico').removeClass('.active-choose-ico');
          $(this).remove();
        }
      });
    });

    $('#foot-about').on('click', function() {
      $('#popup-about').css({'display':'block'});
    });

    $('#foot-feedback').on('click', function() {
      $('#popup-feedback').css({'display':'block'});
    });

    $('.popup-close').on('click', function() {
      $('.overlay').css({'display':'none'});
    });

    $("#owl-demo").owlCarousel({

        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem : true,
        navigationText : false,
        pagination : false,

    });
});
