$( document ).ready(function() {
  $('.b-next-page').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
          lastIdJS = $('#pole').children('.item-gallery:last-child').index() + 1;
      $.ajax({
          type:'POST',
          data: {
                  'lastId': lastIdJS,
                  '_token': csrftoken
          },
          url:'http://localhost:8000/pagination_index',

          success: function (data) {
                data.forEach( function(item, i, data) {
                  $('<a href="/photo/'+1+'" class="item-gallery" data-grid-prepared="true"style="position:absolute;">' +
                      '<div class="uk-panel-box">' +
                        '<img src="/system/App/Image/photos/000/000/0'+item.id+'/small/'+item.photo_file_name+'">'+
                       '</div>' +
                     '</a>').appendTo('.uk-grid-width-small-1-2');
                   });
          }
      });
  });
});
