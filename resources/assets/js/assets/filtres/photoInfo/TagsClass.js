import PhotoAbout from 'PhotoAbout';
/**
* Класс тегов фото
* @class Tags
* @extends
*/
export default class Tags extends PhotoAbout{
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
