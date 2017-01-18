$( document ).ready(function() {
  var dataURL = 0,
      csrftoken = $('meta[name=_token]').attr('content');
      var queue = 1;
      var queueStyle = 1;
  // functions for work with control of image
  //=============================BEGIN========================================
  function addActiveMenuItem(elem) {
    if ($(elem).next().is('.block-view')){
      $(elem).next().removeClass('block-view');
      $(elem).removeClass('active-menu-item');
    }
    else {
      $('span.click-ready').removeClass('active-menu-item');
      $('span.click-ready').next().removeClass('block-view');
      $(elem).next().addClass('block-view');
      $(elem).addClass('active-menu-item');
    }
  }
  function changeURL(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort) {
    queue = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
  }

  function changeURlStyle(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort) {
    queueStyle = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
  }
  function addElemForList(dataList, title, where, elem) {
    $('<li class="choose-sort-item" data-list="'+dataList+'" '+
    'data-url="'+$(elem).data('url')+'">'+
    '<span class="name-sort-item">'+title+'</span>' +
    '<i class="close-sort-item">×</i>' +
    '</li>').appendTo(where);
  }
  function ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort) {
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'sortSort': $('input[name=sortSorting]').val(),
                'styleSort': $('input[name=styleSorting]').val(),
                'roomSort': $('input[name=roomSorting]').val(),
                'colorSort': $('input[name=colorSorting]').val(),
                'tag': $('input[name=tagSorting]').val()
      },
      url:'/load_sort_photo',

      success: function (data) {
        $('#pole').empty();
        if ((data === 'error_download')) {
          $('.b-next-page').fadeOut();
          $('.info-text-message').fadeIn();
        }else {
          $('.info-text-message').fadeOut();
          $('.b-next-page').fadeIn();
          for(var i=0; i<data.length; i++) {
            $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']"'+
            'class="item-gallery" data-grid-prepared="true"'+
            'style="position:absolute;">'+
            '<div class="uk-panel-box">'+
            '<img src="'+data[i].min_path+'">'+
            '</div>'+
            '</a>').appendTo('#pole');

          }
        }
      }
    });
  }
  //variable


  //==============================END=========================================

  $('.close').on('click', function () {
    $(this).parent("div.sidebar-modal").removeClass('block-view');
    $('.click-ready').removeClass('active-menu-item');
  });

  // placements sort control
  $('#placements span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#placements .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

    if (!($('#placements .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#placements .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          // if ($('#placements .item-moodal-sidebar').data('queue').length === 3) {

            $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
            $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
            $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
            $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          //
          // } else if (($('#placements .item-moodal-sidebar').data('queue').length === 2)) {
          //
          // } else {
          //
          // }
          var deleteURL = $(this).data('url');
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

              changeURL(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

            }
          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {

            changeURL(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

            changeURL(1, '0', deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#placements .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){

            changeURL(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 1) {

            changeURL(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 0) {

            changeURL(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#placements .item-moodal-sidebar[data-queue=1]').data('url');
          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

          $('#placements .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#placements .choose-sort-item[data-list=1]').remove();
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);

          addElemForList(3, title, '#placements', this);

          --queue;
          $('input[name=roomSorting]').val(dataURL);
        }
    }
    $('#placements .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val(),
          deleteURL = $(this).data('url');
          // console.log($(this).index +1 );
      $('#placements .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);
      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#placements .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queue = 2;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queue = 2;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }
      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#placements .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queue = 3;
        history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);

      }
      $('#placements .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // styles sort control
  $('#styles span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#styles .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

    if (!($('#styles .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#styles .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles .choose-sort-item[data-list=3]').attr('data-list', 2);
          var deleteURL = $(this).data('url');
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

              changeURlStyle(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);
            }
          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {

            changeURlStyle(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);


          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

            changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
            console.log(5);

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#styles .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){
            console.log(6);

            changeURlStyle(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 1) {
            console.log(7);

            changeURlStyle(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 0) {
            console.log(8);

            changeURlStyle(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#styles .item-moodal-sidebar[data-queue=1]').data('url');

          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;

          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('#styles .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#styles .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#styles .choose-sort-item[data-list=1]').remove();
          $('#styles .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles .choose-sort-item[data-list=3]').attr('data-list', 2);
          addElemForList(3, title, '#styles', this);

          --queueStyle;
          $('input[name=styleSorting]').val(dataURL);
          console.log(9);
        }
    }
    $('#styles .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          deleteURL = $(this).data('url')
          tagSort = $('input[name=tagSorting]').val();

      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {
        queueStyle = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);
      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queueStyle = 2;
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queueStyle = 2;
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }
      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queueStyle = 3;
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);

      }
      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tag);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // colors sort control
  $('#colors span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#colors .colors-space-item').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

   if($(this).is('.active-choose-ico')) {
          $('#colors .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);
          $('input[name=colorSorting]').val(dataURL);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+dataURL+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
          $('#colors .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#colors .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#colors', this);
          $('#colors .choose-sort-item').children('.name-sort-item')
                              .css({
                                'display': 'block',
                                'margin': '2px',
                                'height': '8px',
                                'width': '18px',
                                'background': $(this).data('color'),
                              });
          $('#colors .choose-sort-item').css({
            'width': '40px'
          });
          $('input[name=colorSorting]').val(dataURL);
    }

    $('#colors .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val(),
      tagSort = $('input[name=tagSorting]').val();

      $('input[name=colorSorting]').val(0);
      history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
      $('#colors .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // order sort control
  $('#orders span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#orders .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();

   if($(this).is('.active-choose-ico')) {
          $('#orders .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort);
          $('input[name=sortSorting]').val(dataURL);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+dataURL+'"],tag=['+tagSort+']');
          $('#orders .item-moodal-sidebar').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#orders .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#orders', this);
          $('input[name=sortSorting]').val(dataURL);
    }

    $('#orders .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val();

      $('input[name=sortSorting]').val(0);
      history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=["'+sortSort+'"],tag=['+tagSort+']');
      $('#orders .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
  });

// tags finder
$('.ajax-search').on('submit', function(){
  var sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val(),
      tag = $('input[name=tagSearch]').val();

  $('input[name=tagSorting]').val(tag);
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken,
              'sortSort': sortSort,
              'styleSort': styleSort,
              'roomSort': roomSort,
              'colorSort': colorSort,
              'tag': tag
    },
    url:'/load_sort_photo',

    success: function (data) {
      $('#pole').empty();
      history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+tag+'"]');
      for(var i=0; i<data.length; i++) {
      $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]"'+
            'class="item-gallery" data-grid-prepared="true"'+
            'style="position:absolute;">'+
           '<div class="uk-panel-box">'+
             '<img src="'+data[i].min_path+'">'+
           '</div>'+
         '</a>').appendTo('#pole');

      }
    }
  });
  return false;
});


    $('#foot-about').on('click', function() {
      $('#popup-about').fadeIn();
    });

    $('#foot-feedback').on('click', function() {
      $('#popup-feedback').fadeIn();
    });
    $('.login').on('click', function() {
      $('#login-popup').fadeIn();
    });
    $('#registration').on('click', function() {
      $('#popup-registr').fadeIn();
    });
    $('#recover-pswd').on('click', function () {
      $('.overlay').fadeOut();
      $('#passwd-popup').fadeIn();
    });
    $('.popup-close').on('click', function() {
      $('.overlay').fadeOut();
    });

    $(".owl-carousel").owlCarousel({

        navigation : true,
        slideSpeed : 300,
        paginationSpeed : 400,
        items : 1,
        nav : true,
        pagination : false,

    });

    /*
     *  Simple image gallery. Uses default settings
     */

});
