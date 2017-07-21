// ============================================================================
// =================== file with export function  for user action =============
// ============================================================================
import { photoID } from './helpers';
import { csrftoken } from './helpers';
import { user_id } from './helpers';
import { ADD_COPY } from './constant';
import { LOAD_LIKES } from './constant';

/**
 * @export export function   like - функция для создания отметки о понравившемся фото
 */
export function like () {
    let url = $('input[name=url-like]').val();
    let csrf = $('input[name=csrf]').val();
    let post_id = $('input[name=post_id]').val();

    $.ajax({
        type: 'POST',
        data: {
            '_token'  : csrf,
            'post_id' : post_id
        },
        url: url,

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
export function liked () {
    let url = $('input[name=url-liked]').val();
    let csrf = $('input[name=csrf]').val();
    let post_id = $('input[name=post_id]').val();

    $.ajax({
        type:'POST',
        data: {
          '_token'  : csrf,
          'post_id' : post_id
        },
        url: url,

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
export function changeIcoPretense () {
  $('.wrap-file-modal-law').addClass('uk-icon-thumbs-o-up');
  $('.wrap-file-modal-law').removeClass('uk-icon-plus');
}

/**
 * @function sendPretense - функция для отправки претензии на сервер
 */
export function sendPretense () {
    let token = $('meta[name=_token]').attr('content'),
        postId = $('input[name=post_id]').val(),
        textPretense = $('.text-pretense').val(),
        filePretense = new FormData($(this).get(0));
    console.log(new FormData($(this).get(0)).get('_token'));

    $.ajax({
        type:'POST',
        data: filePretense,
        url: '/claims/add',
        dataType: 'json',
        cache: false,
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
export function allPhotoLikes () {
    $.ajax({
        type:'POST',
        data: {
            '_token'  : csrftoken,
            'id': photoID
        },
        url: '/likes/loadAllLikes',

        success: function  (data) {
            $('.place-likes').empty();
            $('#allPhotoLikes').fadeIn();
            for(var i=0; i<data.length; i++) {
                $('<div class="item-like">'+
                    '<a href="/user/'+data[i].user_id+'" class="like-portret">'+
                    '<img src="'+data[i].user_img+'"></a>'+
                    '<a href="/user/'+data[i].user_id+'" class="name-like">'+
                    data[i].user_name+'</a></div>').appendTo('.place-likes');
        }
    }
  });
}
