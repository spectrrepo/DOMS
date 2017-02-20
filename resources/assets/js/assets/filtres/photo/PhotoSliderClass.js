import Photo from '';
/**
* класс для работы с фото
* @class Photo
*/
export default class PhotoSlider {
  constructor() {

  }
  csrftoken = $('meta[name=_token]').attr('content'),
  URL = '/load_sort_photo';
  sortSorting = $('input[name=sortSorting]').val(),
  styleSorting = $('input[name=styleSorting]').val(),
  roomSorting = $('input[name=roomSorting]').val(),
  colorSorting = $('input[name=colorSorting]').val(),
  tagSorting = $('input[name=tagSorting]').val();
  clear () {

  },
  render (){

  }
  active: 'active-slide',
  right: 'right-slide',
  left: 'left-slide',
  HTML: `<div class="photo-item ${}" data-id="${img_id}">
    <img class="img-slider" src="${img}">
  </div>`;
}
