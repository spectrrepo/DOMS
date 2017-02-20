import Photo from '';
export default class PhotoGallery extends PhotoClass {
  constructor() {
    this.render();
  }
  /*private properties*/
  let _URL : '/load_sort_photo',
  _link (id,array ) {
    `/photo/
    id=[${id}],
    room=[${room}],
    styles=[${style}],
    colors=[${color}],
    sort=[${sort}],
    tag=[${tag}]`
  },

  /**
   * @method getJSON - получение данных от сервера
   * @param id - адрес, на который посылается запрос
   * @param path - массив значений посылаемых на сервер
   * @param array - массив значений посылаемых на сервер
   * @return string - строка, содержащая HTML
   */
  _HTML(id, path, array) {
    let string =
    `<a data-id="44" href="${link(id,array)}"
        class="item-gallery"
        data-grid-prepared="true"
        style="position: absolute;">
        <div class="uk-panel-box">
          <img src="${path}">
        </div>
     </a>`;
     return string;
  },

  /**
   * @method getJSON - получение данных от сервера
   * @param URL - адрес, на который посылается запрос
   * @param DATA - массив значений посылаемых на сервер
   * @return data - JSON-строка ответ сервера
   */
  _getJSON (_URL) {
    var data;
    $.ajax({
      type:'POST',
      data: DATA,
      url:URL,
      success: function (d) {data=d}
    });
    return data;
  },
  /**
   * @method getJSON - получение данных от сервера
   * @param array - ассоциативный массив значений
   * @param where - ассоциативный массив значений
   */
  render (array, where) {
    for (object of item) {
      HTML(id, path, array).appendTo()
    }
  },
  /**
   *@method clear - clearing space with photo
   *@param area - clearing space with photo
   */
  clear (area) {
    $(area).epmty();
  }
}
