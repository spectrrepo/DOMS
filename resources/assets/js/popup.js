$( document ).ready(function() {
  var queue = 1,
      dataURL = 0,
      csrftoken = $('meta[name=_token]').attr('content');
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
  function changeURL(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort) {
    queue = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']');
  }
  function addElemForList(dataList, title, where, elem) {
    $('<li class="choose-sort-item" data-list="'+dataList+'" '+
    'data-url="'+$(elem).data('url')+'">'+
    '<span class="name-sort-item">'+title+'</span>' +
    '<i class="close-sort-item">×</i>' +
    '</li>').appendTo(where);
  }
  function ajaxRequest(roomSort, styleSort, colorSort, sortSort) {
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'sortSort': $('input[name=sortSorting]').val(),
                'styleSort': $('input[name=styleSorting]').val(),
                'roomSort': $('input[name=roomSorting]').val(),
                'colorSort': $('input[name=colorSorting]').val()
      },
      url:'/load_sort_photo',

      success: function (data) {
        $('#pole').empty();
        for(var i=0; i<data.length; i++) {
        $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']"'+
              'class="item-gallery" data-grid-prepared="true"'+
              'style="position:absolute;">'+
             '<div class="uk-panel-box">'+
               '<img src="'+data[i].min_path+'">'+
             '</div>'+
           '</a>').appendTo('#pole');

        }
      }
    });
  }
  //variable


  //==============================END=========================================


  var queue = 1,
      dataURL = 0,
      csrftoken = $('meta[name=_token]').attr('content'),
      sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val();

  $('.close').on('click', function () {
    $('.click-ready').removeClass('active-menu-item');
    $('.sidebar-modal').fadeOut();
  });

  // placements sort control
  $('#placements span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#placements .item-moodal-sidebar').on('click', function () {
    sortSort = $('input[name=sortSorting]').val(),
    styleSort = $('input[name=styleSorting]').val(),
    roomSort = $('input[name=roomSorting]').val(),
    colorSort = $('input[name=colorSorting]').val();
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val();

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
          var deleteURL = $(this).data('url');
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
            queue = 3;
            if ($(this).data('queue') === 2) {

              changeURL(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort);

            }
            }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {

              changeURL(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort);

            }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

              changeURL(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']');


            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            commonLabel.appendTo('#placements');

            addElemForList(queue, title, '#placements', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');

            history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']');
            history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            commonLabel.appendTo('#placements');

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

            changeURL(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort);

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 1) {

            changeURL(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort);

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 0) {

            changeURL(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#placements .item-moodal-sidebar[data-queue=3]').data('url');
          dataURL = dataURL.replace(replace, replaceString);
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']');

          $('#placements .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#placements .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#placements .choose-sort-item[data-list=1]').remove();
          $('#placements .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements .choose-sort-item[data-list=3]').attr('data-list', 2);
          commonLabel.appendTo('#placements');

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
          deleteURL = $(this).data('url');
          // console.log($(this).index +1 );
      $('#placements .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 2;
        if ($(this).data('list') === 1){
          alert('[eq]');
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(deleteURL+',', '');
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(','+deleteURL, '');
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }
      }
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+']');
        $('input[name=roomSorting]').val(dataURL);
      }
      ajaxRequest;
    });
    ajaxRequest;
  });



=======
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
        $('input[name=roomSorting]').val(dataURL);
      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#placements .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queue = 2;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queue = 2;
          history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
          $('input[name=roomSorting]').val(dataURL);
        }
      } else if ($('#placements .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#placements .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queue = 3;
        history.pushState(null, null, 'room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
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
        colorSort = $('input[name=colorSorting]').val();

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

              changeURL(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort);

            }
          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {

            changeURL(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort);

          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

            changeURL(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#styles', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#styles', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
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

            changeURL(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort);

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 1) {

            changeURL(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort);

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 0) {

            changeURL(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#styles .item-moodal-sidebar[data-queue=1]').data('url');
          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');

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

          --queue;
          $('input[name=roomSorting]').val(dataURL);
        }
    }
    $('#styles .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          deleteURL = $(this).data('url');
          // console.log($(this).index +1 );
      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
        $('input[name=roomSorting]').val(dataURL);
      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queue = 2;
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queue = 2;
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
          $('input[name=roomSorting]').val(dataURL);
        }
      } else if ($('#styles .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#styles .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queue = 3;
        history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=["'+sortSort+'"]');
        $('input[name=roomSorting]').val(dataURL);

      }
      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // colors sort control
  $('#colors span.click-ready').on('click', function () {
    if ($(this).next().is('.block-view')){
      $(this).next().removeClass('block-view');
      $(this).removeClass('active-menu-item');
    }
    else {
      $('span.click-ready').removeClass('active-menu-item');
      $('span.click-ready').next().removeClass('block-view');
      $(this).next().addClass('block-view');
      $(this).addClass('active-menu-item');
    }
  });


  $('#colors .colors-space-item').on('click', function () {
    var id = $(this).data('id');
    var color = $(this).data('color');

    if ($(this).is('[data-queue]')) {
          $('#colors .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#colors .colors-space-item[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#colors .colors-space-item[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          dataURL = 0;
          history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+$('input[name=]').val()+'],colors=['+dataURL+'],sort=["'+$('input[name=]').val()+'"]');
          $('input[name=colorSorting]').val(dataURL);
        }else {
            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+$('input[name=]').val()+'],colors=['+dataURL+'],sort=["'+$('input[name=]').val()+'"]');

            $(this).attr('data-queue', queue);
            $('.colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
            $('#colors').children('.choose-sort-item').remove();
            $(this).children('.choose-ico').addClass('active-choose-ico');

            $('<li class="choose-sort-item" data-list="'+queue+'" '+
            'data-url="'+$(this).data('url')+'">'+
            '<span class="name-sort-item">'+color+'</span>' +
            '<i class="close-sort-item">×</i>' +
            '</li>').appendTo('#colors');

            $('input[name=colorSorting]').val(dataURL);
        }

    $('.choose-sort-item').click(function () {
      $('#colors .colors-space-item[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      $('#colors .colors-space-item[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();

      if ($('#colors .colors-space-item[data-queue]').length === 2){
        queue = 3
      }
      if ($('#colors .colors-space-item[data-queue]').length === 1) {
        queue = 2;
        if ($(this).data('list') === 1){
          alert('[eq]');
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(deleteURL+',', '');
          history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+dataURL+'],colors=['+$('input[name=]').val()+'],sort=["'+$('input[name=]').val()+'"]');
          $('input[name=styleSorting]').val(dataURL);
        }else {
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(','+deleteURL, '');
          history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+dataURL+'],colors=[0],sort=["'+$('input[name=]').val()+'"]');
          $('input[name=styleSorting]').val(dataURL);
        }
      }
      if ($('#colors .colors-space-item[data-queue]').length === 0) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+dataURL+'],colors=['+$('input[name=]').val()+'],sort=["'+$('input[name=]').val()+'"]');
        $('input[name=styleSorting]').val(dataURL);
      }
      $.ajax({
        type:'POST',
        data: {
                  '_token'  : csrftoken,
                  'sortSort': $('input[name=sortSorting]').val(),
                  'styleSort': $('input[name=styleSorting]').val(),
                  'roomSort': $('input[name=roomSorting]').val(),
                  'colorSort': $('input[name=colorSorting]').val()
        },
        url:'/load_sort_photo',

        success: function (data) {
          $('#pole').empty();
          for(var i=0; i<data.length; i++) {
          $( '<a href="/photo/id=['+data[i].id+'],room=[0],styles=[0],colors=[0],sort=[""]"'+
                'class="item-gallery" data-grid-prepared="true"'+
                'style="position:absolute;">'+
               '<div class="uk-panel-box">'+
                 '<img src="'+data[i].min_path+'">'+
               '</div>'+
             '</a>').appendTo('#pole');

          }
        }
      });
    });
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'sortSort': $('input[name=sortSorting]').val(),
                'styleSort': $('input[name=styleSorting]').val(),
                'roomSort': $('input[name=roomSorting]').val(),
                'colorSort': $('input[name=colorSorting]').val()
      },
      url:'/load_sort_photo',

      success: function (data) {
        $('#pole').empty();
        for(var i=0; i<data.length; i++) {
        $( '<a href="/photo/id=['+data[i].id+'],room=[0],styles=[0],colors=[0],sort=[""]"'+
              'class="item-gallery" data-grid-prepared="true"'+
              'style="position:absolute;">'+
             '<div class="uk-panel-box">'+
               '<img src="'+data[i].min_path+'">'+
             '</div>'+
           '</a>').appendTo('#pole');

        }
      }
    });
  });
  // order sort control
  $('#orders span.click-ready').on('click', function () {
    if ($(this).next().is('.block-view')){
      $(this).next().removeClass('block-view');
      $(this).removeClass('active-menu-item');
    }
    else {
      $('span.click-ready').removeClass('active-menu-item');
      $('span.click-ready').next().removeClass('block-view');
      $(this).next().addClass('block-view');
      $(this).addClass('active-menu-item');
    }
  });


  $('#orders .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text();

    if ($(this).is('[data-queue]')) {
          $('#orders .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#orders .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#orders .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          dataURL = 0;
          history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+$('input[name=]').val()+'],colors=['+$('input[name=]').val()+'],sort=["'+dataURL+'"]');
          $('input[name=sortSorting]').val(dataURL);
        }else {
            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+$('input[name=]').val()+'],colors=['+$('input[name=]').val()+'],sort=["'+dataURL+'"]');

            $(this).attr('data-queue', queue);
            $('.item-moodal-sidebar').children('.choose-ico').removeClass('active-choose-ico');
            $('#orders').children('.choose-sort-item').remove();
            $(this).children('.choose-ico').addClass('active-choose-ico');

            $('<li class="choose-sort-item" data-list="'+queue+'" '+
            'data-url="'+$(this).data('url')+'">'+
            '<span class="name-sort-item">'+title+'</span>' +
            '<i class="close-sort-item">×</i>' +
            '</li>').appendTo('#orders');

            $('input[name=sortSorting]').val(dataURL);
        }

    $('.choose-sort-item').click(function () {
      $('#orders .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      $('#orders .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();

      if ($('#orders .item-moodal-sidebar[data-queue]').length === 2){
        queue = 3
      }
      if ($('#orders .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 2;
        if ($(this).data('list') === 1){
          alert('[eq]');
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(deleteURL+',', '');
          history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+dataURL+'],colors=['+$('input[name=]').val()+'],sort=[""]');
          $('input[name=styleSorting]').val(dataURL);
        }else {
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(','+deleteURL, '');
          history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');
          $('input[name=styleSorting]').val(dataURL);
        }
      }
      if ($('#orders .item-moodal-sidebar[data-queue]').length === 0) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');
        $('input[name=styleSorting]').val(dataURL);
      }
      $.ajax({
        type:'POST',
        data: {
                  '_token'  : csrftoken,
                  'sortSort': $('input[name=sortSorting]').val(),
                  'styleSort': $('input[name=styleSorting]').val(),
                  'roomSort': $('input[name=roomSorting]').val(),
                  'colorSort': $('input[name=colorSorting]').val()
        },
        url:'/load_sort_photo',

        success: function (data) {
          $('#pole').empty();
          for(var i=0; i<data.length; i++) {
          $( '<a href="/photo/id=['+data[i].id+'],room=[0],styles=[0],colors=[0],sort=[""]"'+
                'class="item-gallery" data-grid-prepared="true"'+
                'style="position:absolute;">'+
               '<div class="uk-panel-box">'+
                 '<img src="'+data[i].min_path+'">'+
               '</div>'+
             '</a>').appendTo('#pole');

          }
        }
      });
    });
    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken,
                'sortSort': $('input[name=sortSorting]').val(),
                'styleSort': $('input[name=styleSorting]').val(),
                'roomSort': $('input[name=roomSorting]').val(),
                'colorSort': $('input[name=colorSorting]').val()
      },
      url:'/load_sort_photo',

      success: function (data) {
        $('#pole').empty();
        for(var i=0; i<data.length; i++) {
        $( '<a href="/photo/id=['+data[i].id+'],room=[0],styles=[0],colors=[0],sort=[""]"'+
              'class="item-gallery" data-grid-prepared="true"'+
              'style="position:absolute;">'+
             '<div class="uk-panel-box">'+
               '<img src="'+data[i].min_path+'">'+
             '</div>'+
           '</a>').appendTo('#pole');

        }
      }
    });
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
