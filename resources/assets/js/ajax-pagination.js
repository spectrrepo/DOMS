$( document ).ready(function() {
  $('.b-next-page').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastIdJS = $('#pole').children('.item-gallery:last-child').index() + 1;

          sortSort = $('input[name=sortSort]').val();
          styleSort = $('input[name=styleSort]').val();
          roomSort = $('input[name=roomSort]').val();
          colorSort = $('input[name=colorSort]').val();

      $.ajax({
          type:'POST',
          data: {
                  'lastId': lastIdJS,
                  '_token': csrftoken,
                  'sortSort': sortSort,
                  'styleSort': styleSort,
                  'roomSort': roomSort,
                  'colorSort': colorSort
          },
          url:'/pagination_index',

          success: function (data) {
                data.forEach( function(item, i, data) {
                  $('<a href="/photo/'+item.id+'" class="item-gallery" data-grid-prepared="true"style="position:absolute;">' +
                      '<div class="uk-panel-box">' +
                        '<img src="'+item.min_path+'">'+
                       '</div>' +
                     '</a>').appendTo('.uk-grid-width-small-1-2');
                   });
          }
      });
  });
});
