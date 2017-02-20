/**
* класс для работы с фильтром
* @class Filter
*/
export default class Filter {
  constructor() {

  }
  limit =
  url =
  `
  room=['+dataURL+'],
  styles=['+styleSort+'],
  colors=['+colorSort+'],
  sort=['+sortSort+'],
  tag=['+tagSort+']
  `
  // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  // тут прочитай про работу с массивами. дабы не обосраться
  // решена проблема количетсва
  filtrComponation () {
    if (string.length < 3) {
      string.append(num)
    } else {
      string[0].delete
      stting[string.length] = 3
    }
    return string;
  }
  // добавил фильтр
  filtrAdd () {
    if (components < 3) {
      (el).appendTo();
    }else{
      $(el)[0].remove();
      $(elNew).appendTo();
    }
  }
  arraySort :
  {
    'room'   : '',
    'styles' : '',
    'colors' : '',
    'sort'   : ''
    'tag'    : ''
  },
  HTML =
  `
  <li class="choose-sort-item" data-list="${variable}" '+
    data-url="${$(elem).data('url')}">
    <span class="name-sort-item">${title}</span>
    <i class="close-sort-item">×</i>
  </li>
  `
  active = ' active-choose-ico';

  overloadMemorizeValue() {

  }
  changeURL(queueChange, dataURL, deleteURL, newUrl) {

  }
  addElForList(dataList, title, where, elem) {
    this.HTML().appendTo(where);
  }
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
  ajaxRequest(roomSort, styleSort, colorSort, sortSort, tagSort) {
    $.ajax({
      type:'POST',
      data: data,
      url: URL,

      success: function (data) {
        $('#pole').empty();
        if ((data === 'error_download')) {
          $('.b-next-page').fadeOut();
          $('.info-text-message').fadeIn();
        }else {
          $('.info-text-message').fadeOut();
          $('.b-next-page').fadeIn();
          for(var i=0; i<data.length; i++) {
            HTML().appendTo('#pole');

          }
        }
      }
    });
    addActiveMenuItem(elem)
}
}
