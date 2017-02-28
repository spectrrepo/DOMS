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

  }
  photoID () {
      $().get();
  }
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
    URL: '/load_tags',
    let data;
    $.ajax({
        token : $('meta[name=_token]').attr('content');
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
    fadeOut(wrap);
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
    json.forEach( function functionName() {
      HTML().appendTo();
    });
    }
  }
}
