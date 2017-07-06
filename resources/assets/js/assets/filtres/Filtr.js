import {Photo} from './Photo';
import {Comment} from './photoInfo/Comment';
import {Description} from './photoInfo/Description';
import {Tag} from './photoInfo/Tag';
import {View} from './photoInfo/View';

/**
* класс для работы с фильтрами сайта для фото
* @class Filter
*/
export class Filtr {
  /**
   * @constructor
   */
  constructor() {
  }
  /**
   * @method changeURL
   * @param bool - boollean
   * @return resultURL - строка
   */
  changeURL(param, value){
    let URL = JSON.parse(
                window.location.pathname
                               .replace('/filter=', '')
                               .replace('%7B','{')
                               .replace('%7D', '}')
                               .replace(/%22/g,'"')
              );
     let diffURL;
     let params = JSON.parse(decodeURIComponent(location.search.substr(1)))
     params[param] = value;
     JSON.stringify(params);
     window.history.pushState(null, null, params);
  }

    /**
     *
     * @param string
     * @returns {*}
     */
  filterComponation (string ) {
    if (string.length < 3) {
      string.push(); //- добавляет в конец массива
    } else {
      string.shift(); //- удаляет первый элемент массива
      string.push();
    }
    return string;
  }

    /**
     *
     * @param array
     */
  filterAdd (array) {
    if (components < 3) {
      (el).appendTo();
    }else{
      $(el)[0].remove();
      $(elNew).appendTo();
    }
  }
  /**
   * @method subItem - добавленеие фильтра
   * @param value - элементы
   * @param color @default false
   * @return result - шаблонная строка
   */
  subItem(el, color=false){

    return `<li class="choose-sort-item ${color ? 'choose-sort-item-color' : ''}">
                <span class="name-sort-item ${color ? 'color-sort-item' : ''}"
                  style="${color ? background : ''}">${el.title}</span>
                <i class="close-sort-item">×</i>
            </li>`;

  }
  // добавление элемента подкатегории
  /**
   * @function addElForList - функция для добавления элемента подкатегории
   *
   */
  addElForList(dataList, title, where, elem) {
    $(subItem(el, color)).appendTo(where);
  }

    /**
     *
     * @param elem
     */
  addActiveMenuItem(elem) {
    if ($(elem).next().is('.block-view')){
      $(elem).next().removeClass('block-view');
      $(elem).removeClass('active-menu-item');
    }
    else {
      $('span.click-ready').removeClass('active-menu-item')
                           .next()
                           .removeClass('block-view');
      $(elem).next().addClass('block-view');
      $(elem).addClass('active-menu-item');
    }
  }
  /**
   * @method result
   */
  result () {
    photo = new Photo;
    description = new DescriptionClass;
    tag = new TagClass;
    view = new ViewClass;
  }
}
