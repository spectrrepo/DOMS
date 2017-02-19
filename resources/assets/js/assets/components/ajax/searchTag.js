$( document ).ready(function() {
  // ===========================================================================
  // ===========================================================================
  // ===========================================================================
  // ===========================================================================
  // ===========================================================================
  $('.popup-tag').keydown( function(e){
    if (e.which === 27) {
        $('.popup-search-tag').empty();
        $('.popup-search-tag').fadeOut();
    }
  });

  $('.popup-tag').keydown( function(e) {
    if (e.which === 38) {  // клавиша вверх
      if ($('.drop-item-tag:first').hasClass('active-drop-item')) {
          $('.drop-item-tag:last').addClass('active-drop-item');
          $('.drop-item-tag:first').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }else if (!$('.drop-item-tag').hasClass('active-drop-item')) {
          $('.drop-item-tag:last').addClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());

      }else {
          $('.active-drop-item').prev().addClass('active-drop-item');
          $('.active-drop-item:last').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }
    } else if (e.which === 40) { // клавиша вниз
      if ($('.drop-item-tag:last').hasClass('active-drop-item')) {
          $('.drop-item-tag:first').addClass('active-drop-item');
          $('.drop-item-tag:last').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }else if (!$('.drop-item-tag').hasClass('active-drop-item')) {
          $('.drop-item-tag:first').addClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }else {
          $('.active-drop-item').next().addClass('active-drop-item');
          $('.active-drop-item:first').removeClass('active-drop-item');
          $('input[name=tagSorting]').val($('.active-drop-item').text());
      }
    }
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
        url:'/load_sort_photo',

        success: function (data) {
            $('.popup-search-tag').fadeOut().empty();
            if (data === 'error_download') {
              $('.info-text-message').fadeIn();
              $('.b-next-page').fadeOut();
            }else {
              history.pushState(null, null, 'room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=["'+sortSort+'"],tag=["'+$('input[name=tagSorting]').val()+'"]');
              for(var i=0; i<data.length; i++) {
              $( '<a href="/photo/id=['+data[i].id+'],room=['+roomSort+'],styles=['+styleSort+'],colors=['+colorSort+'],sort=['+sortSort+'],tag=["'+$('input[name=tagSorting]').val()+'"]"'+
                    ' class="item-gallery" data-grid-prepared="true"'+
                    'style="position:absolute;">'+
                   '<div class="uk-panel-box">'+
                     '<img src="'+data[i].min_path+'">'+
                   '</div>'+
                 '</a>').appendTo('#pole');
              }
            }
        }
      });
      return false;
  }
  });

  $('.popup-tag').on('input', function(){
    $.ajax({
      type:'POST',
      data: {
                '_token'  : $('meta[name=_token]').attr('content'),
                'current': $(this).val(),
      },
      url:'/load_tags_mask',

      success: function (data) {
          $('.popup-search-tag').empty();
          var length;
          if ((data.length <= 7) && (data.length != 0) ) {
            length = data.length;
            for(var i=0; i<length; i++) {
              if (data[i].title != '') {
                $('<li class="drop-item-tag">'+data[i].title+'</li>')
                .appendTo('.popup-search-tag');
              }
            }
            $('.popup-search-tag').fadeIn();
          }else if(data.length === 0) {
            $('.popup-search-tag').fadeOut();
          }else {
            length = 7;
            for(var i=0; i<length; i++) {
              if (data[i].title != '') {
                $('<li class="drop-item-tag">'+data[i].title+'</li>')
                .appendTo('.popup-search-tag');
              }
            }
            $('.popup-search-tag').fadeIn();
          }
      }
    });
  });

});
$( document ).ready(function() {
  $('form').on('submit', function() {
    $.ajax({
        type:'POST',
        data: {
                'lastId': lastIdJS,
                '_token': csrftoken,
                'sortSorting': sortSorting,
                'styleSorting': styleSorting,
                'roomSorting': roomSorting,
                'colorSorting': colorSorting
        },
        url:'/pagination_index',

        success: function (data) {
              data.forEach( function(item, i, data) {
                $('<a href="/photo/id=['+item.id+
                    '],room=['+$('input[name=roomSort]').val()+
                    '],styles=['+$('input[name=styleSort]').val()+
                    '],colors=['+$('input[name=colorSort]').val()+
                    '],sort=['+$('input[name=sortSort]').val()+
                    ']" class="item-gallery" data-grid-prepared="true"style="position:absolute;">' +
                    '<div class="uk-panel-box">' +
                      '<img src="'+item.min_path+'">'+
                     '</div>' +
                   '</a>').appendTo('.uk-grid-width-small-1-2');
          });
        }
    });

}
