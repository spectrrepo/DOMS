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
    if ($(this).attr('data-erw2') !== undefined && $(this).attr('data-erw2') !== false) {

      $(this).children('.choose-ico').removeClass('active-choose-ico');
      $(this).removeAttr('data-erw2');
      $(this).closest('.menu-item').children('.choose-sort-item[data-erw='+$(this).data('erw2')+']').remove();
      erw -= 1;
    } else {
      if ($('.choose-sort-item[data-erw = 3]').length === 1){
            // $('.menu-item').children('[data-erw   choose-ico');

          $('[data-erw2 = 1]').children('.choose-ico')
                              .removeClass('active-choose-ico');
          $('[data-erw2 = 1]').removeAttr('data-erw2');
          $('[data-erw2 = 2]').attr('data-erw2', 1);
          $('[data-erw2 = 3]').attr('data-erw2', 2);

          $(this).closest('.menu-item').children('.choose-sort-item').first().remove();
          $(this).closest('.menu-item').children('.choose-sort-item').attr('data-erw', 1);
          $(this).closest('.menu-item').children('.choose-sort-item').attr('data-erw', 2);

          $(this).attr('data-erw2', 3);
          $(this).children('.choose-ico').toggleClass('active-choose-ico');

          $('<li class="choose-sort-item" data-erw="'+3+'" data-type="'+$(this).data('type')+'">'+
              '<span class="name-sort-item">'+title+'</span>' +
              '<i class="close-sort-item">x</i>' +
          '</li>').appendTo('.active-item-click');

      } else {
        $(this).children('.choose-ico').toggleClass('active-choose-ico');
        $(this).attr('data-erw2', erw);
        if ($('.choose-sort-item').data('erw') === $(this).data('erw2')) {
          $('.choose-sort-item[data-erw = '+$(this).data('erw2')+']').remove();
        }else {
          $('<li class="choose-sort-item" data-erw="'+erw+'" data-type="'+$(this).data('type')+'">'+
              '<span class="name-sort-item">'+title+'</span>' +
              '<i class="close-sort-item">x</i>' +
          '</li>').appendTo('.active-item-click');
          erw += 1;
        }
      }
    }


      $('li.choose-sort-item').click(function () {
        if ($(this).data('erw') === 1) {
          $('.item-moodal-sidebar[data-erw2 = 1]').children('.active-choose-ico').removeClass('.active-choose-ico');
          $(this).remove();
        }
        else if ($(this).data('erw') === 2) {
          $('.item-moodal-sidebar[data-erw2 = 2]').children('.active-choose-ico').removeClass('.active-choose-ico');
          $(this).remove();
        }
        else{
          $('.item-moodal-sidebar[data-erw2 = 3]').children('.active-choose-ico').removeClass('.active-choose-ico');
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
    $('#login').on('click', function() {
      $('#login-popup').css({'display':'block'});
    });
    $('#registration').on('click', function() {
      $('#popup-registr').css({'display':'block'});
    });
    $('#recover-pswd').on('click', function () {
      $('.overlay').css({'display':'none'});
      $('#passwd-popup').css({'display':'block'});
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
    /*
     *  Simple image gallery. Uses default settings
     */

     $('.fancybox').fancybox();

});
