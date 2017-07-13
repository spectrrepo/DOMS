// ============================================================================
// =================== file with export function  for user action =============
// ============================================================================
import { photoID } from './functions';
import { csrftoken } from './functions';
import { user_id } from './functions';
import { ADD_COPY } from './constant';
import { LOAD_LIKES } from './constant';

/**
 * @export export function   like - функция для создания отметки о понравившемся фото
 */
export function  like () {
  let url = $('input[name=url-like]').val();
  let csrf = $('input[name=csrf]').val();
  let post_id = $('input[name=post_id]').val();

    $.ajax({
      type:'POST',
      data: {
                '_token'  : csrf,
                'post_id' : post_id
      },
      url:url,

      success: function  (data) {
            if ( url === '/likes/delete') {
              $('.uk-icon-heart').removeClass('active-like');
              $('#num_liked').text(data);
              $('input[name=url-like]').val('/likes/add');
            }else {
              $('.uk-icon-heart').addClass('active-like');
              $('#num_liked').text(data) ;
              $('input[name=url-like]').val('/likes/delete');
            }
      }
  });
}

/**
 * @function liked - функция для добавление в избранное
 */
export function  liked () {
    let url = $('input[name=url-liked]').val();
    let csrf = $('input[name=csrf]').val();
    let post_id = $('input[name=post_id]').val();

  $.ajax({
      type:'POST',
      data: {
          '_token'  : csrf,
          'post_id' : post_id
      },
      url:url,

      success: function  (data) {
        if ( url === '/favorites/delete') {
          $('.uk-icon-star').removeClass('active-favorite');
          $('input[name=url-liked]').val('/favorites/add');
        }else{
          $('.uk-icon-star').addClass('active-favorite');
          $('input[name=url-liked]').val('/favorites/delete');
        }

      }
  });
}

/**
 * @function changeIcoPretense - функция отслеживания процесса
 */
export function  changeIcoPretense () {
  $('.wrap-file-modal-law').addClass('uk-icon-thumbs-o-up');
  $('.wrap-file-modal-law').removeClass('uk-icon-plus');
}

/**
 * @function sendPretense - функция для отправки претензии на сервер
 */
export function  sendPretense () {
  e.preventDefault();
  var csrftoken = $('input[name=_token]').val(),
      postId = $('.active-slide').data('id'),
      textPretense = $('input[name=text_pretense]').val(),
      filePretense = new FormData($(this).get(0));
  $.ajax({
      type:'POST',
      data: filePretense,
      url: ADD_COPY,
      dataType: 'json',
      processData: false,
      contentType: false,
      success: function  (data) {
        $('#modalLaw').fadeOut();
        $('.b-pretense').text('OK');
      }
  });
  return false;

}

/**
 * @function allPhotoLikes - вывод всех лайков с фото
 */
export function  allPhotoLikes () {
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken,
              'id': photoID
    },
    url: LOAD_LIKES,

    success: function  (data) {
        $('.place-likes').empty();
        $('#allPhotoLikes').fadeIn();
        for(var i=0; i<data.length; i++) {
          if (data[i].quadro_ava === null) {
              portret = '/img/user.png';
          }else {
              portret = data[i].quadro_ava;
          }
          $('<div class="item-like">'+
            '<a href="/profile/'+data[i].id+'" class="like-portret">'+
              '<img src="'+portret+'"></a>'+
            '<a href="/profile/'+data[i].id+'" class="name-like">'+
              data[i].name+'</a></div>').appendTo('.place-likes');
        }
    }
  });
}
