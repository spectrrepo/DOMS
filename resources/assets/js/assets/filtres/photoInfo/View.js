import { URL_DESCR } from '../../lib/constant';
import { photoID,
         csrftoken,
         user_id,
         authID } from '../../lib/functions';
/**
* Класс для работы с видами фотографий
* @class View
*/
export class View{
  /** Конструктор
  * @constructor Comment
  * @param
  */
  constructor ( ) {

  }
  /**
  * @method HTML - представление
  * @param array - массив данных о представлении
  * @return string
  */
  HTML(array){
   return `<div class="item-view-min">
            <img src="${array.path}" alt="" />
           </div>`;
  }
  /**
   * Конструктор
   * @method Comment
   * @param
   * @return
  */
  getJSON () {

  }

  /**
   * Конструктор
   * @method Comment
   * @param
  */
  render () {

  }
  /**
   * Конструктор
   * @method Comment
   * @param
  */

}
