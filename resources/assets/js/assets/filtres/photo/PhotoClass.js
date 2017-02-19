import defaultMember from "module-name";
/**
* класс для работы с фото
* @class Photo
*/
// addEventListener
export class Photo {
  constructor() {

  }
  HTML = '<a data-id="44" href="">''
          '<div class="uk-panel-box">'
              '<img src="/system/App/Picture/photos/000/000/044/small/f.jpg">'
          '</div>'
      </a>',
  render = function(){

  }
}
$( document ).ready(function() {

  $('.b-next-page').on('click', function() {
      var csrftoken = $('meta[name=_token]').attr('content'),
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
