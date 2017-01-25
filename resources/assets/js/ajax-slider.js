$( document ).ready(function() {
  $('#current-position, #current-position-zoom').text($('.active-slide').index()+1);
  var id, newLocal;


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
                   data[i].rus_date+
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
                data[i].rus_date+
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
        sortSort = $('input[name=sortSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        styleSort = $('input[name=styleSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tag = $('input[name=tagSorting]').val(),
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


  $('.btn-nav, .nav-zoom').on('click', function () {
    var ret,direction = $(this).data('direction');
    if (direction === 'right') {
      if ($('.active-slide').index()+1 === $('.photo-item:last').index()) {
        newPhotoDownload(direction);
          $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
          $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
          $('#current-position').text($('.active-slide').index()+1);
          $('#current-position-zoom').text($('.active-slide').index()+1);
          $('input[name=post_id]').val($('.active-slide').data('id'));
          id = 'id=['+$('.active-slide').data('id')+']';
          newLocal = window.location.href;
          newLocal = newLocal.replace('id=['+$('.active-slide').prev().data('id')+']', id);
          history.pushState('', '', newLocal);
          commentDownload();
          likeWhom();
          tagsDownload();
          viewsDownload();
          infoPhotoDownload();
          userInfoDownload();
          activeLike();
          loadZoomPhoto();
          activeLiked();
      }else if ($('.active-slide').index() === $('.photo-item:last').index()) {

        $('#popup-error-slider').fadeIn();


      }else {

        $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
        $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
        $('#current-position').text($('.active-slide').index()+1);
        $('#current-position-zoom').text($('.active-slide').index()+1);
        $('input[name=post_id]').val($('.active-slide').data('id'));
        id = 'id=['+$('.active-slide').data('id')+']';
        newLocal = window.location.href;
        newLocal = newLocal.replace('id=['+$('.active-slide').prev().data('id')+']', id);
        history.pushState('', '', newLocal);

        commentDownload();
        tagsDownload();
        likeWhom();
        viewsDownload();
        infoPhotoDownload();
        userInfoDownload();
        activeLike();
        loadZoomPhoto();
        activeLiked();
      }
    } else if (direction === 'left') {
      if ($('.active-slide').index()=== $('.photo-item:first').index()) {
        newPhotoDownload(direction,ret);
        if ( $('.active-slide').index()=== $('.photo-item:first').index() ) {
          $('#popup-error-slider').fadeIn();
        }else {
          $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
          $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
          $('#current-position').text($('.active-slide').index()+1);
          $('#current-position-zoom').text($('.active-slide').index()+1);
          $('input[name=post_id]').val($('.active-slide').data('id'));
          id = 'id=['+$('.active-slide').data('id')+']';

          newLocal = window.location.href;
          newLocal = newLocal.replace('id=['+$('.active-slide').next().data('id')+']', id);
          history.pushState('', '', newLocal);
          commentDownload();
          tagsDownload();
          viewsDownload();
          infoPhotoDownload();
          userInfoDownload();
          likeWhom();
          activeLike();
          loadZoomPhoto();
          activeLiked();
        }
     }else {
        $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
        $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
        $('#current-position').text($('.active-slide').index()+1);
        $('#current-position-zoom').text($('.active-slide').index()+1);
        $('input[name=post_id]').val($('.active-slide').data('id'));
        id = 'id=['+$('.active-slide').data('id')+']';

        newLocal = window.location.href;
        newLocal = newLocal.replace('id=['+$('.active-slide').next().data('id')+']', id);
        history.pushState('', '', newLocal);

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

  $('.popup-error-close').on('click', function () {
    $('#popup-error-slider').fadeOut();
  });
  $('.full-scrn').on('click', function () {
    $('#zoom-slider').fadeIn();
  });
  $('.slider-close').on('click', function () {
    $('#zoom-slider').fadeOut();
  });
});
