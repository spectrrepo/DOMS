$( document ).ready(function() {
  var queue = 1,
      dataURL = 0,
      csrftoken = $('meta[name=_token]').attr('content'),
      sortSort = $('input[name=sortSort]').val(),
      styleSort = $('input[name=styleSort]').val(),
      roomSort = $('input[name=roomSort]').val(),
      colorSort = $('input[name=colorSort]').val();

  $('.close').on('click', function () {
    $('.click-ready').removeClass('active-menu-item');
    $('.sidebar-modal').fadeOut();
  });

  // placements sort control
  $('#placements span.click-ready').on('click', function () {
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
          var deleteURL = $('#placements .item-moodal-sidebar[data-queue='+
          $(this).data('queue')+']').data('url');
          console.log(deleteURL);
          dataURL = dataURL.replace(deleteURL+',', '');
          history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 2){
            queue = 3;

          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
            queue = 2;
          }else if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {
            queue = 1;
            dataURL = 0;
            history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {
          if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            $('<li class="choose-sort-item" data-list="'+queue+'" '+
            'data-url="'+$(this).data('url')+'">'+
            '<span class="name-sort-item">'+title+'</span>' +
            '<i class="close-sort-item">×</i>' +
            '</li>').appendTo('#placements');

            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            $('<li class="choose-sort-item" data-list="'+queue+'" '+
            'data-url="'+$(this).data('url')+'">'+
            '<span class="name-sort-item">'+title+'</span>' +
            '<i class="close-sort-item">×</i>' +
            '</li>').appendTo('#placements');

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
            queue = 3;
            dataURL = dataURL.replace(deleteURL+',', '');
            history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 1) {
            queue = 2;
            dataURL = dataURL.replace(deleteURL, '');
            history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');

          }
          if ($('#placements .item-moodal-sidebar[data-queue]').length  === 0) {
            queue = 1;
            dataURL = 0;
            history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#placements .item-moodal-sidebar[data-queue=1]').data('url');
          dataURL = dataURL.replace(replace, replaceString);
          history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');

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
          'data-url="'+$(this).data('url')+'">'+
          '<span class="name-sort-item">'+title+'</span>' +
          '<i class="close-sort-item">×</i>' +
          '</li>').appendTo('#placements');

          --queue;
          $('input[name=roomSorting]').val(dataURL);
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
        queue = 3
      }
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 2;
        if ($(this).data('list') === 1){
          alert('[eq]');
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(deleteURL+',', '');
          history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          var deleteURL = $(this).data('url');
          dataURL = dataURL.replace(','+deleteURL, '');
          history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');
          $('input[name=roomSorting]').val(dataURL);
        }
      }
      if ($('#placements .item-moodal-sidebar[data-queue]').length === 0) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'room=['+dataURL+'],styles=[0],colors=[0],sort=[""]');
        $('input[name=roomSorting]').val(dataURL);
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
  // styles sort control
  $('#styles span.click-ready').on('click', function () {
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


  $('#styles .item-moodal-sidebar').on('click', function () {
    var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text();

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
          var deleteURL = $('#styles .item-moodal-sidebar[data-queue='+
          $(this).data('queue')+']').data('url');
          console.log(deleteURL);
          dataURL = dataURL.replace(deleteURL+',', '');
          history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){
            queue = 3;

          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {
            queue = 2;
          }else if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {
            queue = 1;
            dataURL = 0;
            history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {
          if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            $('<li class="choose-sort-item" data-list="'+queue+'" '+
            'data-url="'+$(this).data('url')+'">'+
            '<span class="name-sort-item">'+title+'</span>' +
            '<i class="close-sort-item">×</i>' +
            '</li>').appendTo('#styles');

            ++queue;
            $('input[name=styleSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            $('<li class="choose-sort-item" data-list="'+queue+'" '+
            'data-url="'+$(this).data('url')+'">'+
            '<span class="name-sort-item">'+title+'</span>' +
            '<i class="close-sort-item">×</i>' +
            '</li>').appendTo('#styles');

            ++queue;
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
            queue = 3;
            dataURL = dataURL.replace(deleteURL+',', '');
            history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 1) {
            queue = 2;
            dataURL = dataURL.replace(deleteURL, '');
            history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');

          }
          if ($('#styles .item-moodal-sidebar[data-queue]').length  === 0) {
            queue = 1;
            dataURL = 0;
            history.pushState(null, null, 'room=[0],styles=['+dataURL+'],colors=[0],sort=[""]');

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#styles .item-moodal-sidebar[data-queue=1]').data('url');
          dataURL = dataURL.replace(replace, replaceString);
          history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+dataURL+'],colors=['+$('input[name=]').val()+'],sort=["'+$('input[name=]').val()+'"]');

          $('#styles .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#styles .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#styles .choose-sort-item[data-list=1]').remove();
          $('#styles .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles .choose-sort-item[data-list=3]').attr('data-list', 2);
          $('<li class="choose-sort-item" data-list="'+3+'" '+
          'data-url="'+$(this).data('url')+'">'+
          '<span class="name-sort-item">'+title+'</span>' +
          '<i class="close-sort-item">×</i>' +
          '</li>').appendTo('#styles');

          --queue;
          $('input[name=styleSorting]').val(dataURL);
        }
    }
    $('.choose-sort-item').click(function () {
      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      $('#styles .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();

      if ($('#styles .item-moodal-sidebar[data-queue]').length === 2){
        queue = 3
      }
      if ($('#styles .item-moodal-sidebar[data-queue]').length === 1) {
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
          history.pushState(null, null, 'room=['+$('input[name=]').val()+'],styles=['+dataURL+'],colors=['+$('input[name=]').val()+'],sort=["'+$('input[name=]').val()+'"]');
          $('input[name=styleSorting]').val(dataURL);
        }
      }
      if ($('#styles .item-moodal-sidebar[data-queue]').length === 0) {
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
