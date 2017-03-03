import { URL_DESCR } from '../../lib/constant';
import { photoID,
         csrftoken,
         user_id,
         authID } from '../../lib/functions';
/**
* Класс для описания фотографий
* @class Description
*/
export class Description{
  /**
  * Конструктор
  * @constructor Comment
  * @param
  */
  constructor () {
    this.title = this.getJSON().title;
    this.description = this.getJSON().description;
  }

  /**
  * Конструктор
  * @method Comment
  * @param
  * @return
  */
  render () {

  }

  /**
  * Конструктор
  * @method Comment
  * @return data - JSON-object - описание и заголовок фото
  */
  getJSON () {
    let data;
    $.ajax({
        token : $('meta[name=_token]').attr('content'),
        type:'POST',
        data: data,
        URL: URL_DESCR,

        success: function(d){
          data = d;
        }
    });
    return data;
  }

}
