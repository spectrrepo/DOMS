/**
* Класс тегов фото
* @class Tags
* @extends
*/
export default class Tag{
  /** Конструктор
  * @constructor Tag
  * @param
  */
  constructor () {

  },
  /** @property @private*/
  token : $('meta[name=_token]').attr('content');
  URL: '/load_tags';
  photoID: $().get();
  HTML() {
     `<div class="tag-item">${tag}</div>`
  }
  /**
   * @method _getJSON
   * @private
   * @param attribute
   * @return data
   */
  _getJSON (attribute){
    let data;
    $.ajax({
        type:'POST',
        data: data,
        url: URL,

        success: function(d){
          data = d;
        }
    });
    return data
  }
  /**
  * @method clear
  * @param wrap
  */
  clear(wrap) {
    $(wrap).empty();
  }
  /**
  * @method hide
  * @param wrao
  */
  hide (wrap) {
    fadeOut();
  }
  /**
  * @method show
  * @param wrap
  */
  show (wrap) {
    fadeIn(wrap);
  }
  /**
  * @method render
  * @param json
  */
  render(json) {
    for (variable of iterable) {
      HTML().appendTo();
    }
  }
}
$('#colors .choose-sort-item').children('.name-sort-item')
                    .css({
                      'display': 'block',
                      'margin': '2px',
                      'height': '8px',
                      'width': '18px',
                      'background': $(this).data('color'),
                    });
$('#colors .choose-sort-item').css({
  'width': '40px'
});

var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id
        },
        url: '/load_tags',

        success: function(data) {
            if (data === 'error_tags') {
                $('.pole-tag').empty();
                $('.pole-tag').fadeOut();
                $('#tag').fadeOut();

            } else {
                $('.pole-tag').empty();
                $('.pole-tag').fadeIn();
                $('#tag').fadeIn();
                for (var i = 0; i < data.length; i++) {
                    if (data[i].length != 0) {
                        $('<div class="tag-item"></div').appendTo('.pole-tag').text(data[i]);
                    }
                }
            }
        }
    });
