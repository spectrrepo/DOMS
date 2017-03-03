import { URL_DWNLD_TAGS } from '../../lib/constant';
import { photoID,
         csrftoken,
         user_id,
         authID, } from '../../lib/functions';
/**
* Класс тегов фото
* @class Tags
* @extends
*/
export class Tag{
  /** Конструктор
  * @constructor Tag
  * @param
  */
  constructor () {

  }
  /**
   * @method HTML - представление тега
   * @return string
   */
  HTML() {
    return `<div class="tag-item">${tag}</div>`;
  }
  /**
   * @method getJSON получение JSON данных тегов
   * @param id
   * @return data
   */
  getJSON (id){
    let data;
    $.ajax({
        type:'POST',
        data: {
          id : '',
          csrftoken : ''
        },
        url: URL_DWNLD_TAGS,

        success: function(d){
          data = d;
        }
    });
    return data
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
