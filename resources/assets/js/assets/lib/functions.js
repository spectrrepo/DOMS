// ============================================================================
// =============== file with functions, which use in app ======================
// ============================================================================
import { DWNLD_MAIN_PHOTO } from './constant';
import { URL_READ_COM } from './constant';
import { URL_DELETE_VIEWS } from './constant';

/**
 * @function photoID - возвращает id текущей фотографии
 * @return integer
 */
export let photoID = photoID => $('.active-slide').data('id');

/**
 * @function csrftoken - возвращает текущий токен приложения
 * @return string
 */
export let csrftoken = csrftoken => $('meta[name=_token]').attr('content');

/**
 * @function user_id - возвращает id пользователя
 * @return string
 */
export let user_id = user_id => $('input[name=user_id]').val();

/**
 * @function authID - хз чем отличается от id
 * @return {[type]} [description]
 */
export let authID = authID => $('meta[name=authID]').attr('content');

/**
 * @function dwnldIndexPhoto - подгрузка новых фотографий на главной странице
 * @param  string - sortSorting - один из трех видов сортировки
 * @param  array - styleSorting - массив id стилей
 * @param  array - roomSorting - массив id комнат
 * @param  integer - colorSorting - id цвета
 * @param  string - tagSorting - тег
 */
// TODO:надо подумать
export function dwnldIndexPhoto(sortSorting,
                         styleSorting,
                         roomSorting,
                         colorSorting,
                         tagSorting, obj) {
  var lastIdJS = $('#pole').children('.item-gallery:last-child').index();
  $.ajax({
      type:'POST',
      data: {
              'lastId': lastIdJS,
              '_token': csrftoken,
              'sortSorting': sortSorting,
              'styleSorting': styleSorting,
              'roomSorting': roomSorting,
              'colorSorting': colorSorting,
              'tag': tagSorting
      },
      url:DWNLD_MAIN_PHOTO,

      success: function (data) {
        for(var i=0; i<data.length; i++) {
          $(obj(roomSorting, styleSorting, colorSorting, tagSorting, data[i].min_path))
                .appendTo('.uk-grid-width-small-1-2');
        }
      }
  });
}

/**
 * @function LoadAllComments
 * @param string - btn - элемент, принажатии на который показываются все комментарии
 */
export function loadAllComments(btn) {
  $(btn).on('click', function() {
    $.ajax({
        type:'POST',
          data: {
          'lastId': lastIdJS,
              '_token': csrftoken,
              'sortSorting': sortSorting,
              'styleSorting': styleSorting,
              'roomSorting': roomSorting,
              'colorSorting': colorSorting,
              'tag': tagSorting
        },
        url:DWNLD_MAIN_PHOTO,

          success: function (data) {
          for(var i=0; i<data.length; i++) {
              $(obj(roomSorting, styleSorting, colorSorting, tagSorting, data[i].min_path))
                  .appendTo('.uk-grid-width-small-1-2');
          }
        }
    });
    $(btn).fadeOut();
  });
}

/**
 * @function openModal - открытие модального окна
 * @param string - el - элемент, при клике на который открыватеся модальное окно
 */
export function openModal(el) {
    $('.overlay').fadeOut();
    $(el).fadeIn();
}

/**
 * @function closeModal - функция для закрытия модального окна
 * @param string - el - элемент, при клике на который закроется модальное окно
 */
export function closeModal (el) {
    $(el).fadeOut();
}
/**
 * @function slider - функция для инициализации слайдера
 * @param string - activeEl - css class для активного элемента
 * @param string - leftEl - css class для левого элемента
 * @param string - rightEl - css class для правого элемента
 * @param string - el - css class для элемента слайдера
 */
export function slider (activeEl, leftEl, rightEl, el) {
    if ($(this).data('direction') === 'prev') {
        if ($('.'+el+':first').hasClass(activeEl)) {
              $('.'+el+':not(.'+el+':last)').addClass(leftEl).removeClass(activeEl)
                                                        .removeClass(rightEl);
              $('.'+el+':last').addClass(activeEl).removeClass(rightEl);
          } else {
              $('.'+activeEl).prev().addClass(activeEl).removeClass(leftEl);
              $('.'+activeEl+':last').removeClass(activeEl).addClass(rightEl);
          }
      } else {
          if ($('.'+el+':last').hasClass(activeEl)) {
              $('.'+el+':not(.'+el+':first)').addClass(rightEl).removeClass(activeEl)
                                                         .removeClass(leftEl);
              $('.'+el+':first').addClass(activeEl).removeClass(leftEl);
          } else {
              $('.'+activeEl).next().addClass(activeEl).removeClass(rightEl);
              $('.'+activeEl+':first').removeClass(activeEl).addClass(leftEl);
          }
      }
}
// ============================================================================
// ============================================================================
// ============================================================================
// ============================================================================
/**
 * @function readComment - прочтение нового комментария в админ панели
 */
export function readComment () {
  var commentId = parseInt($(this).children('.id-cell').text());
  $.ajax({
      type:'POST',

      data: {
                '_token'  : csrftoken,
                'id' : commentId,
      },
      url: URL_READ_COM,

      success: function () {
        $('.id-cell:contains("'+commentId+'")').parent().removeClass('none-check');
      }
  });
}

//TODO:refactor
export function handleFileOneSelect(evt) {
    $('#main-wrap-photo span img').parent('span').remove();
    var files = evt.target.files; // FileList object
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
            return function(e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = [
                    '<img class="img-full-width" src="',
                    e.target.result,
                    '" title="',
                    escape(theFile.name),
                    '"/>'
                ].join('');
                document.getElementById('main-wrap-photo').insertBefore(span, null);
            };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
    $('#main-wrap-photo').children('.add-photo-ico').css({'display': 'none'});
    $('#main-wrap-photo').children('.add-photo-text').css({'display': 'none'});
}

//TODO:refactor
export function handleFileSelect(evt) {
    let files = evt.target.files;

    for (let i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }

        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                let id = Math.random() * (100000 - 1) + 1;
                $('#files').attr('id', id).attr('style', 'display:none;');
                let client = `<li data-id="${id}" class="racurs-list-item uk-margin-bottom uk-margin-top uk-padding-remove">
                                <div class="uk-overlay uk-width-1-1">
                                    <img src="${e.target.result}">
                                    <div class="uk-overlay-area">
                                        <div class="uk-overlay-area-content">
                                            <span class="fz-big">×</span>
                                        </div>
                                    </div>
                                </div>
                              </li>`;
                $('.uk-list').append(client);

                $('.racurs-list-item').on('click', function() {
                    document.getElementById($(this).data('id')).remove();
                    $(this).remove();
                });

                $('<input id="files" class="input-dwnld-view-photo" type="file" name="views[]">').appendTo('.wrap-dwnld-photo');

                $('#files').on('change', handleFileSelect);
            };
        })(f);

        reader.readAsDataURL(f);
    }
}
/**
 *
 * @returns {boolean}
 */
export function commentAdd () {
    let comment = $('.input-comment').val();
    let postId = $('input[name=post_id]').val();
    let csrf = $('input[name=csrf]').val();

    $.ajax({
        type:'POST',
        data: {
            '_token'  : csrf,
            'comment' : comment,
            'post_id' : postId
        },
        url: '/comments/add',
        success: function (data) {
            let newComment =   `<div class="b-comment-wrap uk-clearfix">
                                    <div class="remove-comment uk-icon-justify uk-icon-remove">
                                        <span class="delete_comment_id" data-id="${data.id}"></span>
                                    </div>
                                    <a href="/user/${data.user_id}" class="b-photo-comment">
                                        <img src="${data.user_img}">
                                    </a>
                                    <div class="b-comment">
                                        <a href="/user/${data.user_id}" class="b-name-comment">
                                            ${data.user_name}
                                        </a>
                                        <div class="b-text-comment">
                                            ${data.comment}
                                        </div>
                                        <div class="b-date-comment">
                                            ${data.date}
                                        </div>
                                    </div>
                                </div>`;
            $(newComment).appendTo('#insertComment');
            $('.input-comment').val('');
        }
    });

    return false;
}

export function deleteComment() {
    let csrf = $('input[name=csrf]').val();
    let id = $(this).children('.delete_comment_id').data('id');
    $.ajax({
        type:'GET',
        url: '/comments/delete/'+id,
    });
    $(this).closest('.b-comment-wrap').remove();
}

export function getAllComments() {
    let csrf = $('input[name=csrf]').val();
    let postId = $('input[name=post_id]').val();

    $.ajax({
        type:'POST',
        data: {
            '_token'  : csrf,
            'id' : postId
        },
        url: '/comments/allCommentsLoad',
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                let newComment =   `<div class="b-comment-wrap uk-clearfix">
                                        <div class="remove-comment uk-icon-justify uk-icon-remove">
                                            <span class="delete_comment_id" data-id="${data[i].id}"></span>
                                        </div>
                                        <a href="/user/${data[i].user_id}" class="b-photo-comment">
                                            <img src="${data[i].user_img}">
                                        </a>
                                        <div class="b-comment">
                                            <a href="/user/${data[i].user_id}" class="b-name-comment">
                                                ${data[i].user_name}
                                            </a>
                                            <div class="b-text-comment">
                                                ${data[i].comment}
                                            </div>
                                            <div class="b-date-comment">
                                                ${data[i].date}
                                            </div>
                                        </div>
                                    </div>`;
                $(newComment).prependTo('#insertComment');
                $('span[data-id='+data[i].id+']').parent().on('click', deleteComment);
            }
        }
    });
    $(this).remove();
}

/**
 * @function confirmModal
 */
export function confirmModal() {
  if(confirm('Вы уверены?')) {
    $('#userform').submit();
  }
}

/**
 * @function deleteView - функция для удаления ракурса фотографии
 */
export function deleteView () {
  var id = $('input[name=id]').val();
  $.ajax({
    type:'POST',
    data: {
      '_token'  : csrftoken,
      'id'      : id
    },
    url: URL_DELETE_VIEWS,

  });
  $(this).empty().remove();
}

/**
 * @function addArrowForMoreInfo - вычисляет высоту и в зависимости от высоты
 *                                 добавляет стрелку
 */
export function addArrowForMoreInfo () {
  let height = parseInt($('pre').css('height'));
  if (height > 119){
    $('.b-about-person').append(
      '<span class="to-bottom ico uk-icon-justify uk-icon-chevron-down"></span>'
    );
  }
}
/**
 * @function showUserInfoMore - показывает вю информацию о пользоваетеле
 */
export function showUserInfoMore () {
  if ($(this).hasClass('uk-icon-chevron-down')) {
    $('.b-about-person').css({'height':'auto'});
    $(this).removeClass('uk-icon-chevron-down')
           .addClass('uk-icon-chevron-up');
  } else {
    $('.b-about-person').css({'height':'105px'});
    $(this).removeClass('uk-icon-chevron-up')
           .addClass('uk-icon-chevron-down');
  }
}


//               count = data.length;
//               if ((count > 3) && (comment_last_id != '')) {
//                   if (count + 1 === 4) {
//                       ending = 'я';
//                   } else {
//                       ending = 'ев';
//                   }
//                   btnTwo = '<div class="btn-all-comments">Показать все ' + count + ' комментари' + ending + '</div>';
//               } else {
//                   btnTwo = '';
//               }
//               $(btnTwo).appendTo('.b-all-comment');
//
//                   if ((i <= count - 3) && (count > 3)) {
//                       style = 'style="display:none"';
//                   } else {
//                       style = '';
//                   }
