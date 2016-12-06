$( document ).ready(function() {
  var queue = 1,
      csrftoken = $('meta[name=_token]').attr('content'),
      sortSort = $('input[name=sortSort]').val(),
      styleSort = $('input[name=styleSort]').val(),
      roomSort = $('input[name=roomSort]').val(),
      colorSort = $('input[name=colorSort]').val();

  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.click-ready').removeClass('active-menu-item');
  });

  // placements sort control
  $('#placements span.click-ready').on('click', function () {
    $(this).next().toggleClass('block-view');
    $(this).toggleClass('active-menu-item');
  });

  $('#placements .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text();

    if (!($('#placements .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#placements .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
            queue = 3;
          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
            queue = 2;
          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {
            queue = 1;
          }
        }else {
          $(this).attr('data-queue', queue);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('<li class="choose-sort-item" data-list="'+queue+'" '+
          'data-type="'+$(this).data('type')+'">'+
          '<span class="name-sort-item">'+title+'</span>' +
          '<i class="close-sort-item">×</i>' +
          '</li>').appendTo('#placements');

          ++queue;
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#placements .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
            queue = 3;
          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
            queue = 2;
          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {
            queue = 1;
          }
        }else {
          $('#placements .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#placements .choose-sort-item[data-list=1]').remove();
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          $('<li class="choose-sort-item" data-list="'+3+'" '+
          'data-type="'+$(this).data('type')+'">'+
          '<span class="name-sort-item">'+title+'</span>' +
          '<i class="close-sort-item">×</i>' +
          '</li>').appendTo('#placements');

          --queue;
        }
    }
    $('.choose-sort-item').click(function () {
      $('#placements .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      $('#placements .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();

      if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
        queue = 3;
      }
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 2;
      }
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {
        queue = 1;
      }
    });
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'sortSort': sortSort,
                'styleSort': styleSort,
                'roomSort': roomSort,
                'colorSort': colorSort
      },
      url:'/load_sort_photo',

      success: function (data) {
        $('#pole').empty();
        rev_data = data.reverse();
        rev_data.forEach( function(item, i, rev_data) {
          $( '<a href="/photo/id=[33],room=[0],styles=[0],colors=[0],sort=[&quot;&quot;]"'+
                'class="item-gallery" data-grid-prepared="true"'+
                'style="position:absolute;">'+
               '<div class="uk-panel-box">'+
                 '<img src="'+data.path_min+'">'+
               '</div>'+
             '</a>').prependTo('#pole');
        });
      }
    });
  });
  // styles sort control
  // colors sort control
  // order sort control



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
