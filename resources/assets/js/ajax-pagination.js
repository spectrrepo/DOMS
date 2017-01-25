$( document ).ready(function() {

  $('.b-next-page').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastIdJS = $('#pole').children('.item-gallery:last-child').index(),
          sortSorting = $('input[name=sortSorting]').val();
          styleSorting = $('input[name=styleSorting]').val();
          roomSorting = $('input[name=roomSorting]').val();
          colorSorting = $('input[name=colorSorting]').val();

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
  });
});
