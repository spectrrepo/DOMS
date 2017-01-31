$( document ).ready(function() {
  var dataURL = 0,
      csrftoken = $('meta[name=_token]').attr('content');
      var queue = 1;
      var queueStyle = 1;




        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function commentDownload() {
            var id = $('.active-slide').data('id'),
                authID = $('meta[name=authID]').attr('content'),
                csrftoken = $('meta[name=_token]').attr('content');
            $.ajax({
              type:'POST',
              data: {
                        '_token'  : csrftoken,
                        'id': id
              },
              url:'/load_comments',

              success: function (data) {
                var btn;
                if (data === 'error_comments'){
                  $('.b-all-comment').empty();
                }else {
                  $('.b-all-comment').empty();
                  for(var i=0; i<data.length; i++) {
                    if (parseInt(authID) === parseInt(data[i].user_id)) {
                       $('<div class="b-comment-wrap">'+
                         '<span class="remove-comment uk-icon-justify '+
                         'uk-icon-remove"><span class="delete_comment_id" '+
                         'data-id="'+data[i].id+'"></span></span> '+
                         '<a style="background:url('+data[i].userPhoto+
                         ')center no-repeat;background-size:cover;'+
                         ')" href="/profile/'+data[i].author_id+
                         '" class="b-photo-comment"></a>'+
                         '<div class="b-comment">'+
                         '<a href="/profile/'+data[i].author_id+'" class="b-name-comment" '+
                         ' >'+
                         data[i].userName+
                         '</a><div class="b-text-comment">'+
                         data[i].text_comment+
                         '</div><div class="b-date-comment">'+
                         data[i].date+
                         '</div></div></div>').appendTo('.b-all-comment');
                    }
                    else {
                      $('<div class="b-comment-wrap">'+
                      '<a style="background:url('+data[i].userPhoto+
                      ')center no-repeat;background-size:cover;'+
                      +')" href="/profile/'+data[i].author_id+
                      '" class="b-photo-comment"></a>'+
                      '<div class="b-comment">'+
                      '<a href="/profile/'+data[i].author_id+'" class="b-name-comment" '+
                      ' >'+
                      data[i].userName+
                      '</a><div class="b-text-comment">'+
                      data[i].text_comment+
                      '</div><div class="b-date-comment">'+
                      data[i].date+
                      '</div></div></div>').appendTo('.b-all-comment');
                    }
                  }
                }
              }
            });
        }
        function openModalView(el) {
          $(el).on('click', function () {
            $('#modalViewsZoom').fadeIn();
          });
        }
        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function tagsDownload() {
            var id = $('.active-slide').data('id'),
            csrftoken = $('meta[name=_token]').attr('content');
            $.ajax({
              type:'POST',
              data: {
                        '_token'  : csrftoken,
                        'id': id
              },
              url:'/load_tags',

              success: function (data) {
                if (data === 'error_tags') {
                  $('.pole-tag').empty();
                  $('.pole-tag').fadeOut();
                  $('#tag').fadeOut();

                }else {
                  $('.pole-tag').empty();
                  $('.pole-tag').fadeIn();
                  $('#tag').fadeIn();
                    for(var i=0; i<data.length; i++) {
                      if (data[i].length != 0) {
                      $('<div class="tag-item"></div').appendTo('.pole-tag').text(data[i]);
                    }
                  }
                }
              }
            });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function viewsDownload() {
          var id = $('.active-slide').data('id'),
          csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_views',

            success: function (data) {
              if (data.length === 1) {
                $('#views-pole').fadeIn();
                $('#views').fadeIn();
                $('.b-change-photo').empty();
                $('.min-nav-views').fadeOut()
                $('<li class="item-views-zoom active-slide-zoom-views">'+
                          '<img class="img-views-zoom" src="'+data[0].path_full+'"></li>')
                          .appendTo('.views-zoom-list');
                $('<div class="item-view-min active-view-min"><img src="'+data[0].path_min+'"></div>').appendTo('.b-change-photo');
                openModalView('.item-view-min');
              }else if (data.length === 0) {
                $('#views-pole').fadeIn();
                $('#views').fadeIn();
                $('.b-change-photo').empty();
                $('#views').fadeOut();
                $('#views-pole').fadeOut();
              }else {
                $('.b-change-photo').empty();
                $('.min-nav-views').fadeIn()
                $('#views').fadeIn();
                $('#views-pole').fadeIn();

                  for(var i=0; i<data.length; i++) {
                    if (data[i] === data[0]) {
                      $('<div class="item-view-min active-view-min"><img src="'+data[i].path_min+'"></div>').appendTo('.b-change-photo');
                      $('<li class="item-views-zoom active-slide-zoom-views">'+
                                '<img class="img-views-zoom" src="'+data[i].path_full+'"></li>')
                                .appendTo('.views-zoom-list');
                    }else {
                      $('<div class="item-view-min right-view-min"><img src="'+data[i].path_min+'"></div>').appendTo('.b-change-photo');
                      $('<li class="item-views-zoom right-slide-zoom-views">'+
                                '<img class="img-views-zoom" src="'+data[i].path_full+'"></li>')
                                .appendTo('.views-zoom-list');
                    }
                  }

              }
              openModalView('.item-view-min');
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function infoPhotoDownload() {
          var id = $('.active-slide').data('id'),
          csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_info_slide',

            success: function (data) {
              if (!data.views_count) {
                $('#num_views').text(0);
                $('#num_views_zoom').text(0);

              }else {
                $('#num_views').text(data.views_count);
                $('#num_views_zoom').text(data.views_count);
              }
              if (!data.comments_count) {
                $('#num_comment').text(0);
                $('#num_comment_zoom').text(0);

              }else {
                $('#num_comment').text(data.comments_count);
                $('#num_comment_zoom').text(data.comments_count);
              }
              if (!data.full_path) {
              }else{
                $('img.img-max-center').attr("src",data.full_path);
              }
              if (!data.likes_count) {
                $('#value-like').text(0);
              }else {
                $('#value-like').text(data.likes_count);
              }
              if ((!data.title)&&(!data.description)) {
                $('#description-pole').fadeOut();
                $('#description').fadeOut();
              }else {
                if (!data.description) {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide p').text(0);
                }else {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide p').text(data.description);
                }
                if (!data.title) {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide h3').text(0);
                }else {
                  $('#description-pole').fadeIn();
                  $('#description').fadeIn();
                  $('.view-photo-slide h3').text(data.title);
                }
              }
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function userInfoDownload() {
          var id = $('.active-slide').data('id'),
          csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_user',

            success: function (data) {
              if (data === 'error_user') {
                $('.author-portret').empty();
                $('.author-name').empty();
              }else {
                $('.b-pretense a').attr('href','/profile/'+data.author_id);
                if (!('path_min' in data)) {
                  $('.author-portret').empty();
                }else {
                  $('<img src="'+data.userPhoto+'">').appendTo('.author-portret');
                  $('<img src="'+data.userPhoto+'">').appendTo('.author-portret-zoom');
                }
                $('.author-name').text(data.userName);
                $('.author-name-zoom').text(data.userName);
              }
            }
          });

        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */
        function newPhotoDownload(direction){
          var id = $('.active-slide').data('id'),
              sortSort = $('meta[name=sortSorting]').attr('content'),
              roomSort = $('meta[name=roomSorting]').attr('content'),
              styleSort = $('meta[name=styleSorting]').attr('content'),
              colorSort = $('meta[name=colorSorting]').attr('content'),
              tag = $('meta[name=tagSorting]').attr('content'),
              currentPosition = +$('#current-position').text()+1,
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id,
                      'direction': direction,
                      'sortSort': sortSort,
                      'roomSort': roomSort,
                      'styleSort': styleSort,
                      'colorSort': colorSort,
                      'tag': tag,
                      'currentPosition' : currentPosition
            },
            url:'/load_slides ',
            async:false,
            success: function (data) {
              if (data === 'error_download') {
                return data;
              }else {
                if (direction === 'left') {
                  data = data.reverse();
                  for(var i=0; i<data.length; i++) {
                    $('<div class="photo-item left-slide" data-id="'+data[i].id+'">'+
                    '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                    .prependTo('.wrap-slider');
                  }
                }else {
                  for(var i=0; i<data.length; i++) {
                    $('<div class="photo-item right-slide" data-id="'+data[i].id+'">'+
                    '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                    .insertAfter('.right-slide:last');
                  }
                }
              }
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function likeWhom() {
          var id = $('.active-slide').data('id'),
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_like',

            success: function (data) {
              if (data === 'error_like') {
                $('#like-whom-pole').empty();
              }else {
                $('#like-whom-pole').empty();
                for(var i=0; i<data.length; i++) {
                  $('<a class="mini-avatar"'+
                    'href="/user/'+data[i].id+'"'+
                    'title="'+data[i].name+'">'+
                    '<img src="'+data[i].path_min+'"></a>').appendTo('#like-whom-pole');
                }
              }
            }
          });

        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function activeLike() {
          var id = $('.active-slide').data('id'),
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_active_like',

            success: function (data) {
              if (data ===  'success') {
                $('.uk-icon-heart').addClass('active-like');
              }else {
                $('.uk-icon-heart').removeClass('active-like');
              }
            }
          });
        }

        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */

        function actveLiked() {
          var id = $('.active-slide').data('id'),
              csrftoken = $('meta[name=_token]').attr('content');
          $.ajax({
            type:'POST',
            data: {
                      '_token'  : csrftoken,
                      'id': id
            },
            url:'/load_active_favorite',

            success: function (data) {
              if (data ===  'success') {
                $('.uk-icon-star').addClass('active-favorite');
              }else {
                $('.uk-icon-star').removeClass('active-favorite');
              }
            }
          });
        }
        /**
         * Represents a book.
         * @constructor
         * @param {string} title - The title of the book.
         * @param {string} author - The author of the book.
         */
      function loadZoomPhoto() {
        var id = $('.active-slide').data('id'),
            csrftoken = $('meta[name=_token]').attr('content');
        $.ajax({
          type:'POST',
          data: {
                    '_token'  : csrftoken,
                    'id': id
          },
          url:'/load_zoom_photo',

          success: function (data) {
              $('.img-max-center').attr('src', data);
          }
        });
      }



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
  function changeURL(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id) {
    queue = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
  }

  function changeURlStyle(queueChange, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id) {
    queueStyle = queueChange;
    dataURL = dataURL.replace(deleteURL, '');
    history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
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
                'tag': $('input[name=tagSorting]').val(),
                'id':$('input[name=IdPhoto]').val()
      },
      url:'/load_sort_photo_slider',

      success: function (data) {
        $('.photo-item').remove();
        if ((data === 'error_download')) {
          $('.control-slide').fadeOut();
          $('<div class="pole-error-dwnld"><span class="error-text-dwnld">'+
             'По вашему запросу ничего не найдено</span></div>')
             .appendTo('.wrap-slider');
          $('.info-text-message').fadeIn();
          $('#tag').fadeOut();
          $('.pole-tag').fadeOut();
          $('#views').fadeOut();
          $('#views-pole').fadeOut();
          $('#description').fadeOut();
          $('#description-pole').fadeOut();
        }else {
          $('.control-slide').fadeIn();

          $('.pole-error-dwnld').remove();
          for(var i=0; i<data.length; i++) {
            if (data[i] === data[0]) {
              $( '<div class="photo-item active-slide" data-id="'+data[i].id+'">'+
                 '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                 .prependTo('.wrap-slider');
                 $('input[name=IdPhoto]').val(data[i].id);
                 history.pushState(null, null, 'id=['
                 +$('input[name=IdPhoto]').val()
                 +'],room=['+$('input[name=roomSorting]').val()+'],styles=['
                 +$('input[name=styleSorting]').val()+'],colors=['
                 +$('input[name=colorSorting]').val()
                 +'],sort=['+$('input[name=sortSorting]').val()+'],tag=['
                 +$('input[name=tagSorting]').val()+']');
            }else {
              $( '<div class="photo-item right-slide" data-id="'+data[i].id+'">'+
                 '<img class="img-slider" src="'+data[i].full_path+'"></div>')
                 .prependTo('.wrap-slider');
            }
          }
          commentDownload();
          likeWhom();
          viewsDownload();
          tagsDownload();
          infoPhotoDownload();
          userInfoDownload();
          activeLike();
          loadZoomPhoto();
          activeLiked();
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

  // placements-slider sort control
  $('#placements-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#placements-slider .item-moodal-sidebar').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val();
    var id = $('input[name=IdPhoto]').val();

    if (!($('#placements-slider .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#placements-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          // if ($('#placements-slider .item-moodal-sidebar').data('queue').length === 3) {

            $('#placements-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
            $('#placements-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
            $('#placements-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
            $('#placements-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          //
          // } else if (($('#placements-slider .item-moodal-sidebar').data('queue').length === 2)) {
          //
          // } else {
          //
          // }
          var deleteURL = $(this).data('url');
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {
              changeURL(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

            }
          }else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 1) {

            changeURL(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 0) {

            changeURL(1, '0', deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements-slider', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

            $(this).attr('data-queue', queue);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queue, title, '#placements-slider', this);
            ++queue;
            $('input[name=roomSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#placements-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#placements-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#placements-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 2){

            changeURL(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length  === 1) {

            changeURL(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#placements-slider .item-moodal-sidebar[data-queue]').length  === 0) {

            changeURL(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=roomSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#placements-slider .item-moodal-sidebar[data-queue=1]').data('url');
          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;
          history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

          $('#placements-slider .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#placements-slider .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#placements-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#placements-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#placements-slider .choose-sort-item[data-list=1]').remove();
          $('#placements-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#placements-slider .choose-sort-item[data-list=3]').attr('data-list', 2);

          addElemForList(3, title, '#placements-slider', this);

          --queue;
          $('input[name=roomSorting]').val(dataURL);
        }
    }
    $('#placements-slider .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val(),
          deleteURL = $(this).data('url'),
          id = $('input[name=IdPhoto]').val();

      $('#placements-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 1) {
        queue = 1;
        dataURL = 0;
        history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);
      } else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#placements-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queue = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queue = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=roomSorting]').val(dataURL);
        }
      } else if ($('#placements-slider .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#placements-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queue = 3;
        history.pushState(null, null, 'id=['+id+'],room=['+dataURL+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=roomSorting]').val(dataURL);

      }
      $('#placements-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort);

    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);

  });



  // styles sort control
  $('#styles-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#styles-slider .item-moodal-sidebar').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val(),
        id = $('input[name=IdPhoto]').val();


    if (!($('#styles-slider .item-moodal-sidebar').is('[data-queue=3]'))) {
        if($(this).is('[data-queue]')) {
          $('#styles-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          var deleteURL = $(this).data('url');
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 2){
            if ($(this).data('queue') === 2) {

              changeURlStyle(3, dataURL, ','+deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);
            }
          }else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 1) {

            changeURlStyle(2, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);


          }else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 0) {

            changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 0) {

            dataURL =$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles-slider', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }else {
            dataURL += ','+$(this).data('url');
            history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
            console.log(5);

            $(this).attr('data-queue', queueStyle);
            $(this).children('.choose-ico').addClass('active-choose-ico');

            addElemForList(queueStyle, title, '#styles-slider', this);
            ++queueStyle;
            $('input[name=styleSorting]').val(dataURL);
          }
        }
    } else {
        if ($(this).is('[data-queue]')) {
          $('#styles-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          var deleteURL = $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').data('url');
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles-slider .item-moodal-sidebar[data-queue='+$(this).data('queue')
          +']').removeAttr('data-queue');
          $('#styles-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);
          $('#styles-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 2){
            console.log(6);

            changeURlStyle(3, dataURL, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length  === 1) {
            console.log(7);

            changeURlStyle(2, dataURL, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          if ($('#styles-slider .item-moodal-sidebar[data-queue]').length  === 0) {
            console.log(8);

            changeURlStyle(1, 0, deleteURL, styleSort, roomSort, colorSort, sortSort, tagSort, id);

          }
          $('input[name=styleSorting]').val(dataURL);
        }else {

          var replaceString = $(this).data('url');
          var replace = $('#styles-slider .item-moodal-sidebar[data-queue=1]').data('url');

          dataURL = dataURL.replace(replace+',', '' );
          dataURL += ','+replaceString;

          history.pushState(null, null, 'room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('#styles-slider .item-moodal-sidebar[data-queue=1]').children('.choose-ico').removeClass('active-choose-ico');
          $('#styles-slider .item-moodal-sidebar[data-queue=1]').removeAttr('data-queue');
          $('#styles-slider .item-moodal-sidebar[data-queue=2]').attr('data-queue', 1);
          $('#styles-slider .item-moodal-sidebar[data-queue=3]').attr('data-queue', 2);

          $(this).attr('data-queue', 3);
          $(this).children('.choose-ico').addClass('active-choose-ico');

          $('#styles-slider .choose-sort-item[data-list=1]').remove();
          $('#styles-slider .choose-sort-item[data-list=2]').attr('data-list', 1);
          $('#styles-slider .choose-sort-item[data-list=3]').attr('data-list', 2);
          addElemForList(3, title, '#styles-slider', this);

          --queueStyle;
          $('input[name=styleSorting]').val(dataURL);
          console.log(9);
        }
    }
    $('#styles-slider .choose-sort-item').click(function () {
      var title = $(this).children('.item-modal-text').text(),
          sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          deleteURL = $(this).data('url')
          tagSort = $('input[name=tagSorting]').val(),
          id = $('input[name=IdPhoto]').val();


      $('#styles-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').children('.active-choose-ico')
                                .removeClass('active-choose-ico');
      if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 1) {
        queueStyle = 1;
        dataURL = 0;
        history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);
      } else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 2) {
        if (($('#styles-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 6) {
          dataURL = dataURL.replace(','+deleteURL, '');
          queueStyle = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
          queueStyle = 2;
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('input[name=styleSorting]').val(dataURL);
        }
      } else if ($('#styles-slider .item-moodal-sidebar[data-queue]').length === 3) {
        if (($('#styles-slider .choose-sort-item[data-list='+$(this).data('list')+']').index()+1) == 7) {
          dataURL = dataURL.replace(','+deleteURL, '');
        }else {
          dataURL = dataURL.replace(deleteURL+',', '');
        }
        queueStyle = 3;
        history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+dataURL+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=['+tagSort+']');
        $('input[name=styleSorting]').val(dataURL);

      }
      $('#styles-slider .item-moodal-sidebar[data-queue='+
      $(this).data('list') +']').removeAttr('data-queue');
      $(this).remove();
      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tag);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // colors sort control
  $('#colors-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#colors-slider .colors-space-item').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val(),
        id = $('input[name=IdPhoto]').val();


   if($(this).is('.active-choose-ico')) {
          $('#colors-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort,id);
          $('input[name=colorSorting]').val(dataURL);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+dataURL+'],sort=['+sortSort+'],tag=['+tagSort+']');
          $('#colors-slider .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#colors-slider .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#colors-slider', this);
          $('#colors-slider .choose-sort-item').children('.name-sort-item')
                              .css({
                                'display': 'block',
                                'margin': '2px',
                                'height': '8px',
                                'width': '18px',
                                'background': $(this).data('color'),
                              });
          $('#colors-slider .choose-sort-item').css({
            'width': '40px'
          });
          $('input[name=colorSorting]').val(dataURL);
    }

    $('#colors-slider .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val(),
      tagSort = $('input[name=tagSorting]').val();

      $('input[name=colorSorting]').val(0);
      history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=['+sortSort+'],tag=['+tagSort+']');
      $('#colors-slider .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort);
  });



  // order sort control
  $('#orders-slider span.click-ready').on('click', function () {
     addActiveMenuItem(this);
  });

  $('#orders-slider .item-moodal-sidebar').on('click', function () {
    // var id = $(this).data('id');
    var title = $(this).children('.item-modal-text').text(),
        sortSort = $('input[name=sortSorting').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tagSort = $('input[name=tagSorting]').val(),
        id = $('input[name=IdPhoto]').val();


   if($(this).is('.active-choose-ico')) {
          $('#orders-slider .choose-sort-item[data-list='+$(this).data('queue')+']').remove();
          $('active-choose-ico').children('.choose-ico').removeClass('active-choose-ico');
          var deleteURL = $(this).data('url');
          changeURlStyle(1, 0, deleteURL+',', styleSort, roomSort, colorSort, sortSort, tagSort, id);
          $('input[name=sortSorting]').val(dataURL);
    }else {
          dataURL = $(this).data('url');
          history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+dataURL+'"],tag=['+tagSort+']');
          $('#orders-slider .item-moodal-sidebar').children('.choose-ico').removeClass('active-choose-ico');
          $(this).children('.choose-ico').addClass('active-choose-ico');
          $('#orders-slider .choose-sort-item').remove();
          addElemForList(queueStyle, title, '#orders-slider', this);
          $('input[name=sortSorting]').val(dataURL);
    }

    $('#orders-slider .choose-sort-item').click(function () {
      var sortSort = $('input[name=sortSorting').val(),
          styleSort = $('input[name=styleSorting]').val(),
          roomSort = $('input[name=roomSorting]').val(),
          colorSort = $('input[name=colorSorting]').val(),
          tagSort = $('input[name=tagSorting]').val();

      $('input[name=sortSorting]').val(0);
      history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+0+'],sort=['+sortSort+'],tag=['+tagSort+']');
      $('#orders-slider .colors-space-item').children('.choose-ico').removeClass('active-choose-ico');
      $(this).remove();

      ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
    });
    ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort);
  });

// tags finder
$('.ajax-search-slider').on('submit', function(){
  var sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val();
      $('input[name=tagSorting]').val($('.active-drop-item').text());
      tag = $('input[name=tagSorting]').val(),
      id = $('input[name=IdPhoto]').val();


  $('input[name=tagSorting]').val(tag);
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken,
              'sortSort': sortSort,
              'styleSort': styleSort,
              'roomSort': roomSort,
              'colorSort': colorSort,
              'tag': tag,
              'id' : id
    },
    url:'/load_sort_photo_slider',

    success: function (data) {
      commentDownload();
      likeWhom();
      viewsDownload();
      tagsDownload();
      infoPhotoDownload();
      userInfoDownload();
      activeLike();
      loadZoomPhoto();
      // activeLiked();
      $('#pole').empty();
      history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]');
      if (data.length > 1) {
        for(var i=0; i<data.length; i++) {
          $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]"'+
          'class="item-gallery" data-grid-prepared="true"'+
          'style="position:absolute;">'+
          '<div class="uk-panel-box">'+
          '<img src="'+data[i].min_path+'">'+
          '</div>'+
          '</a>').appendTo('#pole');

        }
      }else {
          $('.photo-item').remove();
          $('.b-comment-wrap').empty();
          $('#description-pole').empty().fadeOut();
          $('#description').fadeOut();
          $('#views-pole b-change').empty();
          $('#views-pole').fadeOut();
          $('#views').fadeOut();
          $('#tag').fadeOut();
          $('.pole-tag').empty().fadeOut();


      }
    }
  });
  return false;
});

$('.ajax-input-search').keydown( function(e) {
  if ((e === 13) && ($('li').is('.active-drop-item'))) {
    e.preventDefault();
    var sortSort = $('input[name=sortSorting]').val(),
        styleSort = $('input[name=styleSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        colorSort = $('input[name=colorSorting]').val();

    $.ajax({
      type:'POST',
      async:false,
      data: {
                '_token'  : $('meta[name=_token]').attr('content'),
                'sortSort': sortSort,
                'styleSort': styleSort,
                'roomSort': roomSort,
                'colorSort': colorSort,
                'tag': $('input[name=tagSorting]').val()
      },
      url:'/load_sort_photo_slider',

      success: function (data) {
          $('.popup-search-tag').fadeOut().empty();
          if (data === 'error_download') {
            $('.info-text-message').fadeIn();
            $('.b-next-page').fadeOut();
          }else {
            history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+$('input[name=tagSorting]').val()+'"]');
            for(var i=0; i<data.length; i++) {
              commentDownload();
              likeWhom();
              viewsDownload();
              tagsDownload();
              infoPhotoDownload();
              userInfoDownload();
              activeLike();
              loadZoomPhoto();
              activeLiked();
              $('#pole').empty();
              history.pushState(null, null, 'id=['+id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+tag+'"]');
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
          }
      }
    });
    return false;
}
});

$('.tag-item').on('click', function(){
  var sortSort = $('input[name=sortSorting]').val(),
      styleSort = $('input[name=styleSorting]').val(),
      roomSort = $('input[name=roomSorting]').val(),
      colorSort = $('input[name=colorSorting]').val(),
      tag = $(this).text(),
      thisI = $(this);

  $.ajax({
    type:'POST',
    async:false,
    data: {
              '_token'  : $('meta[name=_token]').attr('content'),
              'sortSort': sortSort,
              'styleSort': styleSort,
              'roomSort': roomSort,
              'colorSort': colorSort,
              'tag': tag,
              'id': $('.active-slide').data('id'),
    },
    url:'/load_sort_photo_slider',

    success: function (data) {
        $('.popup-search-tag').fadeOut().empty();
        if (data === 'error_download') {
          $('.title-tag').fadeIn();

          $('.title-tag').children('.tag-item').text(tag);

          $('.photo-item').remove();
          $('.b-comment-wrap').empty();
          $('#description-pole').empty().fadeOut();
          $('#description').fadeOut();
          $('#views-pole b-change').empty();
          $('#views-pole').fadeOut();
          $('#views').fadeOut();
          $('#tag').fadeOut();
          $('.pole-tag').empty().fadeOut();
          $('.info-text-message').fadeIn();
        }else {
          history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+tag+'"]');
            commentDownload();
            likeWhom();
            viewsDownload();
            tagsDownload();
            infoPhotoDownload();
            userInfoDownload();
            activeLike();
            loadZoomPhoto();
            // activeLiked();
            $('.title-tag').fadeIn();
            $('.title-tag').children('.tag-item').text(tag);
            $('.photo-item').remove();
            $('tag-item').removeClass('active-tag-right');
            thisI.addClass('.active-tag-right');
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
    }
  });
});

});
