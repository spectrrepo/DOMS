/**
* класс для работы с фото
* @class Photo
*/
// addEventListener
export default class Photo {
  constructor() {

  }
  /*private properties*/
  _csrftoken = $('meta[name=_token]').attr('content'),
  _URL = '/load_sort_photo';
  _sortSorting = $('input[name=sortSorting]').val(),
  _styleSorting = $('input[name=styleSorting]').val(),
  _roomSorting = $('input[name=roomSorting]').val(),
  _colorSorting = $('input[name=colorSorting]').val(),
  _tagSorting = $('input[name=tagSorting]').val(),
  HTML(){
    `<a data-id="44" href="${id}">
      <div class="uk-panel-box">
        <img src="${path}">
      </div>
     </a>`,
  }
  destroy () {

  }
  render (firstEl, finishEl){

  }
}
