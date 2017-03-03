import {URL_DWNLD_PHOTO} from '../lib/constant';
import { photoID,
         csrftoken,
         user_id,
         authID } from '../lib/functions';
/**
* Класс для описания фотографий
* @class Photo
*/
export class Photo{
  constructor() {
    this.render();
  }
  /**
   * @method htmlSlide - view
   * @param - integer - id
   * @param - string - img_src
   * @return - string
   */
  HTML(id, img_src, page){
    let result;
    switch(page) {
      case 'slider':
        result = `<div class="photo-item" data-id="${id}">
                    <img class="img-slider" src="${img_src}">
                  </div>`;
        break;

      case 'gallery':
        result = `<a data-id="${id}" href="${link(id,array)}"
                       class="item-gallery"
                       data-grid-prepared="true"
                       style="position: absolute;">
                      <div class="uk-panel-box">
                        <img src="${path}">
                      </div>
                  </a>`;
        break;

      default:
        result = 'error';
        break;
    }

  }
  /**
   * @method render
   * @param
   */
  render (array, where){
    array.forEach(function (item, i, array) {
      HTML(item.id, item.img_src ).appendTo(where);
    });
  }

  /**
   * @method getJSON - получение данных от сервера
   * @param URL - адрес, на который посылается запрос
   * @param DATA - массив значений посылаемых на сервер
   * @return data - JSON-строка ответ сервера
   */
  getJSON () {
    let data;
    $.ajax({
      URL : '/load_sort_photo',
      type:'POST',
      data: DATA,
      url: URL_DWNLD_PHOTO,
      success: function (d) {data=d}
    });
    return data;
  }

}
