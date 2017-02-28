/**
* Класс для описания фотографий
* @class Photo
*/
export default class Photo{
  constructor() {
    this.render();
  }
  /*private properties*/
  // _csrftoken = $('meta[name=_token]').attr('content'),
  HTML(id, img_src){
    `<div class="photo-item" data-id="${id}">
      <img class="img-slider" src="${img_src}">
     </div>`
  }
  render (array){
    array.forEach(function functionName() {
      _HTML(iterable.id, iterable.img_src ).appendTo();
    });
  }
  /**
   * @method getJSON - получение данных от сервера
   * @param id - адрес, на который посылается запрос
   * @param path - массив значений посылаемых на сервер
   * @param array - массив значений посылаемых на сервер
   * @return string - строка, содержащая HTML
   */
  _HTML(id, path, array) {
    let string =
    `<a data-id="${id}" href="${link(id,array)}"
        class="item-gallery"
        data-grid-prepared="true"
        style="position: absolute;">
        <div class="uk-panel-box">
          <img src="${path}">
        </div>
     </a>`;
     return string;
  }
  /**
   * @method getJSON - получение данных от сервера
   * @param URL - адрес, на который посылается запрос
   * @param DATA - массив значений посылаемых на сервер
   * @return data - JSON-строка ответ сервера
   */
  _getJSON (_URL) {
    var data;
    $.ajax({
      URL : '/load_sort_photo',
      type:'POST',
      data: DATA,
      url:URL,
      success: function (d) {data=d}
    });
    return data;
  }
  /**
   *@method clear - clearing space with photo
   *@param area - clearing space with photo
   */
  clear (area) {
    $(area).epmty();
  }
}
