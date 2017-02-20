$( document ).ready(function() {

  $('.b-next-page').on('click', function() {
      var
          lastIdJS = $('#pole').children('.item-gallery:last-child').index(),
          sortSorting = $('input[name=sortSorting]').val(),
          styleSorting = $('input[name=styleSorting]').val(),
          roomSorting = $('input[name=roomSorting]').val(),
          colorSorting = $('input[name=colorSorting]').val(),
          tagSorting = $('input[name=tagSorting]').val();

      $.ajax({
          type:'POST',
          data: {
                  'lastId': lastIdJS,
                  '_token': csrftoken,
                  'sortSorting': sortSorting,
                  'styleSorting': styleSorting,
                  'roomSorting': roomSorting,
                  'colorSorting': colorSorting,
                  'tag': tagSorting
          },
          url:'/pagination_index',

          success: function (data) {
            for(var i=0; i<data.length; i++) {
                  $('<a href="/photo/id=['+data[i].id+
                      '],room=['+roomSorting+
                      '],styles=['+styleSorting+
                      '],colors=['+colorSorting+
                      '],sort=['+sortSorting+
                      '],tag=['+tagSorting+']" class="item-gallery" '+
                      'data-grid-prepared="true"style="position:absolute;">' +
                      '<div class="uk-panel-box">' +
                        '<img src="'+data[i].min_path+'">'+
                       '</div>' +
                     '</a>').appendTo('.uk-grid-width-small-1-2');
            }
          }
      });
  });
});
