import {PhotoClass} from './photo/Photo';
import {CommentClass} from './photoInfo/CommentClass';
import {DescriptionClass} from './photoInfo/DescriptionClass';
import {TagClass} from './photoInfo/TagClass';
import {ViewClass} from './photoInfo/ViewClass';
// import $ from '../../../vendor/jquery.min';
/**
* класс для работы с фильтрами сайта для фото
* @class Filter
*/
export default class Filtr {
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
    var URL = JSON.parse(
                window.location.pathname
                               .replace('/filtr=', '')
                               .replace('%7B','{')
                               .replace('%7D', '}')
                               .replace(/%22/g,'"')
              );
     let diffURL;
     var params = JSON.parse(decodeURIComponent(location.search.substr(1)))
     params[param] = value;
     JSON.stringify(params);
     window.history.pushState(null, null, params);
  }

  /**
   * @method filtrComponation
   * @param string - string
   * @param el - literal
   * @return string - строка
   */
  filtrComponation (string ) {
    if (string.length < 3) {
      string.push(); //- добавляет в конец массива
    } else {
      string.shift(); //- удаляет первый элемент массива
      string.push();
    }
    return string;
  }
  /**
   * @method filtrAdd - добавленеие фильтра
   * @param array - элементы
   */
  filtrAdd (array) {
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
  subItem(value, color=false){
    let liClassDop, spanClassDop, styleSpan;
    if (color === true){
      liClassDop = ' choose-sort-item-color';
      spanClassDop = ' color-sort-item';
      styleSpan = ` style="${background}"`;
    } else {
      liClassDop = '';
      spanClassDop = '';
      styleSpan = ``;
    }
    var result = `<li class="choose-sort-item ${liClassDop}">
                    <span class="name-sort-item ${spanClassDop}"
                      ${styleSpan}>${title}</span>
                    <i class="close-sort-item">×</i>
                  </li>`;
    return result;
  }
  // добавление элемента подкатегории
  addElForList(dataList, title, where, elem) {
    this.HTML().appendTo(where);
  }
  // добавление активного меню
  // toggle();
  addActiveMenuItem(elem) {
    if ($(elem).next().is('.block-view')){
      $(elem).next().removeClass('block-view');
      $(elem).removeClass('active-menu-item');
    }
    else {
      $('span.click-ready').removeClass('active-menu-item');
      $('span.click-ready').next().removeClass('block-view');
      $(elem).next().addClass('block-view');
      $(elem).addClass('active-menu-item');
    }
  }
}
