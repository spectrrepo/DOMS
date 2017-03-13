(function (exports) {
'use strict';

// ============================================================================
// ========================== comments export  constants ==============================
// ============================================================================






// ============================================================================
// ========================= description export  constant =============================
// ============================================================================

var URL_DESCR = '';

// ============================================================================
// ============================ views export  constant ================================
// ============================================================================


var URL_DELETE_VIEWS = '/delete_view';




// ============================================================================
// ============================= tags export  constant ================================
// ============================================================================

var URL_DWNLD_TAGS = '/load_tags';


// ============================================================================
// ========================== photoes export  constant ================================
// ============================================================================
var URL_DWNLD_PHOTO$1 = '/load_sort_photo';



var LOAD_INFO_PHOTO = '/load_info_slide';
var LOAD_AUTHOR_PHOTO = '/load_user';
var LOAD_MORE_PHOTO = '/load_slides';
var LOAD_LIKE_PHOTO = '/load_like';
var LOAD_ACTIVE_LIKE_PHOTO = '/load_active_like';
var LOAD_ACTIVE_FAVORITE_PHOTO = '/load_active_favorite';

// ============================================================================
// ============================ filtr export  constant ========================
// ============================================================================


// ============================================================================
// ============================ main export  constant =========================
// ============================================================================



// ============================================================================
// ======================= copyright export  constant =========================
// ============================================================================

var ADD_COPY = '/add_copyright';

//
var LOAD_LIKES = '/load_all_likes';

// ============================================================================
// ======================= links export  constant =========================
// ============================================================================

var ADD_LINK = '/add_links';
var EDIT_LINK = '/edit_links';
var DEL_LINK = '/delete_links';

// ============================================================================
// =============== file with functions, which use in app ======================
// ============================================================================
/**
 * @function photoID - возвращает id текущей фотографии
 * @return integer
 */
var photoID = function (photoID) { return $('.active-slide').data('id'); };

/**
 * @function csrftoken - возвращает текущий токен приложения
 * @return string
 */
var csrftoken$1 = function (csrftoken) { return $('meta[name=_token]').attr('content'); };

/**
 * @function user_id - возвращает id пользователя
 * @return string
 */
var user_id = function (user_id) { return $('input[name=user_id]').val(); };

/**
 * @function authID - хз чем отличается от id
 * @return {[type]} [description]
 */


/**
 * @function dwnldIndexPhoto - подгрузка новых фотографий на главной странице
 * @param  string - sortSorting - один из трех видов сортировки
 * @param  array - styleSorting - массив id стилей
 * @param  array - roomSorting - массив id комнат
 * @param  integer - colorSorting - id цвета
 * @param  string - tagSorting - тег
 */
// TODO:надо подумать


/**
 * @function openModalDescription - функция для открытия
 *                                  модального окна с описанием к фото
 */


/**
 * @function LoadAllComments
 * @param string - btn - элемент, принажатии на который показываются все комментарии
 */


/**
 * @function openModal - открытие модального окна
 * @param string - el - элемент, при клике на который открыватеся модальное окно
 */
function openModal(el) {
    $('.overlay').fadeOut();
    $(el).fadeIn();
}

/**
 * @function closeModal - функция для закрытия модального окна
 * @param string - el - элемент, при клике на который закроется модальное окно
 */
function closeModal (el) {
    $(el).fadeOut();
}
/**
 * @function slider - функция для инициализации слайдера
 * @param string - activeEl - css class для активного элемента
 * @param string - leftEl - css class для левого элемента
 * @param string - rightEl - css class для правого элемента
 * @param string - el - css class для элемента слайдера
 */
function slider (activeEl, leftEl, rightEl, el) {
  if ($(this).data('direction') === 'prev') {
      if ($(el+':first').hasClass(activeEl)) {
            $(el+':not('+el+':last)').addClass(leftEl).removeClass(activeEl)
                                                      .removeClass(rightEl);
            $(el+':last').addClass(activeEl).removeClass(rightEl);
        } else {
            $(activeEl).prev().addClass(activeEl).removeClass(leftEl);
            $(activeEl+':last').removeClass(activeEl).addClass(rightEl);
        }
    } else {
        if ($(el+':last').hasClass(activeEl)) {
            $(el+':not('+el+'first)').addClass(rightEl).removeClass(activeEl)
                                                       .removeClass(leftEl);
            $(el+':first').addClass(activeEl).removeClass(leftEl);
        } else {
            $(activeEl).next().addClass(activeEl).removeClass(rightEl);
            $(activeEl+':first').removeClass(activeEl).addClass(leftEl);
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



function handleFileOneSelect(evt) {
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


function handleFileSelect(evt) {
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
                span.id = id;
                span.className = 'deleteSome';
                span.innerHTML = [
                    '<img class="thumb" src="',
                    e.target.result,
                    '" title="',
                    escape(theFile.name),
                    '"/>' + '<span class="b-hover-add-view">' + '<span class="uk-icon-justify uk-icon-remove vertical-align">' + '</span>'
                ].join('');
                document.getElementById('wrap-d').insertBefore(span, null);
                var lastInp = $('#files').clone().appendTo('#wrap-d');
                lastInp.removeClass('input-dwnld-view-photo').addClass('new').css({'display': 'none'}).attr('name', 'files[]').attr('id', id);

                id += 1;
                $('.deleteSome').on('click', function() {
                    $(this).remove();
                    $('[id = ' + $(this).attr("id") + '][class = new]').remove();
                });
            };
        })(f);
        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
    }
}


/**
 * @function confirmModal
 */


/**
 * @function deleteView - функция для удаления ракурса фотографии
 */
function deleteView () {
  var id = $('input[name=id]').val();
  $.ajax({
    type:'POST',
    data: {
      '_token'  : csrftoken$1,
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
function addArrowForMoreInfo () {
  var height = parseInt($('pre').css('height'));
  if (height > 119){
    $('.b-about-person').append(
      '<span class="to-bottom ico uk-icon-justify uk-icon-chevron-down"></span>'
    );
  }
}
/**
 * @function showUserInfoMore - показывает вю информацию о пользоваетеле
 */
function showUserInfoMore () {
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

/**
* Класс для описания фотографий
* @class Photo
*/
var Photo = function Photo() {
  this.render();
};
/**
 * @method htmlSlide - view
 * @param - integer - id
 * @param - string - img_src
 * @return - string
 */
Photo.prototype.HTML = function HTML (id, img_src, page){
  var result;
  switch(page) {
    case 'slider':
      result = "<div class=\"photo-item\" data-id=\"" + id + "\">\n                    <img class=\"img-slider\" src=\"" + img_src + "\">\n                  </div>";
      break;

    case 'gallery':
      result = "<a data-id=\"" + id + "\" href=\"" + (link(id,array)) + "\"\n                       class=\"item-gallery\"\n                       data-grid-prepared=\"true\"\n                       style=\"position: absolute;\">\n                      <div class=\"uk-panel-box\">\n                        <img src=\"" + path + "\">\n                      </div>\n                  </a>";
      break;

    default:
      result = 'error';
      break;
  }

};
/**
 * @method render
 * @param
 */
Photo.prototype.render = function render (array, where){
  array.forEach(function (item, i, array) {
      HTML(item.id, item.img_src ).appendTo(where);
  });
};

  /**
   * @method getJSON - получение данных от сервера
 * @param URL - адрес, на который посылается запрос
 * @param DATA - массив значений посылаемых на сервер
 * @return data - JSON-строка ответ сервера
 */
Photo.prototype.getJSON = function getJSON () {
  var data;
  $.ajax({
    URL : '/load_sort_photo',
      type:'POST',
    data: DATA,
      url: URL_DWNLD_PHOTO$1,
    success: function (d) {data=d;}
    });
    return data;
  };

/**
* Класс комментарий для фотографий
* @class Comment
* @extends
*/
var Comment$1 = function Comment() {};

  Comment$1.prototype.newCommentValue = function newCommentValue () {
      $('.input-comment').val();
  };

  Comment$1.prototype.commentId = function commentId () {
      $(this).children('.delete_comment_id').data('id');
  };

  /**
* Класс комментарий для фотографий
* @method Comment
* @param
* @return
*/
  Comment$1.prototype.deleteBTN = function deleteBTN (id) {
      return ("<span class=\"remove-comment uk-icon-justify uk-icon-remove\">\n          <span class=\"delete_comment_id\" data-id=\"" + id + "\"></span>\n        </span>");
  };

  /**
* Класс комментарий для фотографий
* @method Comment
* @param
* @return
*/
  Comment$1.prototype.getAllComments = function getAllComments () {
      $.ajax({
        type:'POST',
        data: {
              '_token': csrftoken$1,
              'comment' : comment,
              'post_id' : post_id,
              'user_id' : user_id
        },
        url: ADD_COM,

        success: function (data) {

        }
     });
  };

  Comment$1.prototype.getLastComment = function getLastComment () {

  };

  Comment$1.prototype.addLastComment = function addLastComment () {

  };

  Comment$1.prototype.render = function render (array) {
      HTML(profile, user_quadro_ava, user_name, text_comment, rus_date).appendTo();
  };

  /**
* Класс комментарий для фотографий
* @method Comment
* @param
* @return
*/
  Comment$1.prototype.destroy = function destroy () {
      $.ajax({
          type: 'POST',
          data: {
              '_token': csrftoken$1,
                'delete_comment_id': id
            },
            url: DEL_COM,
            success: function() {
              $(this).parent('.b-comment-wrap').remove();
          }
      });
  };

  /**
* Класс комментарий для фотографий
  * @method Comment
* @param
* @return
*/
  Comment$1.prototype.HTML = function HTML (user_id$$1, user_quadro_ava, user_name, text_comment, rus_date) {
      return ("<div class=\"b-comment-wrap\">\n                    " + (authId === authorId ? deleteBTN(id) : '') + "\n                    <a href=\"profile/" + user_id$$1 + "\" class=\"b-photo-comment\">\n                      <img src=\"" + user_quadro_ava + "\"/>\n                    </a>\n                    <div class=\"b-comment\">\n                      <a href=\"profile/'" + user_id$$1 + "'\" class=\"b-name-comment\">\n                        " + user_name + "\n                      </a>\n                      <div class=\"b-text-comment\">\n                        " + text_comment + "\n                      </div>\n                      <div class=\"b-date-comment\">\n                        " + rus_date + "\n                      </div>\n                    </div>\n                    <div class=\"clear\"></div>\n                </div>");
  };

/**
* Класс для описания фотографий
* @class Description
*/
var Description = function Description () {
  this.title = this.getJSON().title;
  this.description = this.getJSON().description;
};

/**
* Конструктор
* @method Comment
* @param
* @return
*/
Description.prototype.render = function render () {

};

/**
* Конструктор
* @method Comment
* @return data - JSON-object - описание и заголовок фото
*/
Description.prototype.getJSON = function getJSON () {
  var data;
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
};

/**
* Класс тегов фото
* @class Tags
* @extends
*/
var Tag$1 = function Tag () {

};
/**
 * @method HTML - представление тега
 * @return string
 */
Tag$1.prototype.HTML = function HTML () {
  return ("<div class=\"tag-item\">" + tag + "</div>");
};
/**
 * @method getJSON получение JSON данных тегов
 * @param id
 * @return data
 */
Tag$1.prototype.getJSON = function getJSON (id){
  var data;
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
};

/**
* @method render
* @param json
*/
Tag$1.prototype.render = function render (json) {
  json.forEach( function functionName() {
    HTML().appendTo();
  });
  };

/**
* Класс для работы с видами фотографий
* @class View
*/
var View$1 = function View ( ) {

};
/**
* @method HTML - представление
* @param array - массив данных о представлении
* @return string
*/
View$1.prototype.HTML = function HTML (array){
 return ("<div class=\"item-view-min\">\n            <img src=\"" + (array.path) + "\" alt=\"\" />\n           </div>");
};
/**
 * Конструктор
 * @method Comment
 * @param
 * @return
*/
View$1.prototype.getJSON = function getJSON () {

};

/**
 * Конструктор
 * @method Comment
 * @param
*/
View$1.prototype.render = function render () {

};

/**
* класс для работы с фильтрами сайта для фото
* @class Filter
*/
var Filtr = function Filtr() {
};
/**
 * @method changeURL
 * @param bool - boollean
 * @return resultURL - строка
 */
Filtr.prototype.changeURL = function changeURL (param, value){
  var URL = JSON.parse(
              window.location.pathname
                             .replace('/filtr=', '')
                             .replace('%7B','{')
                             .replace('%7D', '}')
                             .replace(/%22/g,'"')
            );
   var diffURL;
   var params = JSON.parse(decodeURIComponent(location.search.substr(1)));
   params[param] = value;
   JSON.stringify(params);
   window.history.pushState(null, null, params);
};

/**
 * @method filtrComponation
 * @param string - string
 * @param el - literal
 * @return string - строка
 */
Filtr.prototype.filtrComponation = function filtrComponation (string ) {
  if (string.length < 3) {
    string.push(); //- добавляет в конец массива
  } else {
    string.shift(); //- удаляет первый элемент массива
    string.push();
  }
  return string;
};
/**
 * @method filtrAdd - добавленеие фильтра
 * @param array - элементы
 */
Filtr.prototype.filtrAdd = function filtrAdd (array) {
  if (components < 3) {
    (el).appendTo();
  }else{
    $(el)[0].remove();
    $(elNew).appendTo();
  }
};
/**
 * @method subItem - добавленеие фильтра
 * @param value - элементы
 * @param color @default false
 * @return result - шаблонная строка
 */
Filtr.prototype.subItem = function subItem (el, color){
    if ( color === void 0 ) color=false;


  return ("<li class=\"choose-sort-item " + (color ? 'choose-sort-item-color' : '') + "\">\n                <span class=\"name-sort-item " + (color ? 'color-sort-item' : '') + "\"\n                  style=\"" + (color ? background : '') + "\">" + (el.title) + "</span>\n                <i class=\"close-sort-item\">×</i>\n            </li>");

};
// добавление элемента подкатегории
/**
 * @function addElForList - функция для добавления элемента подкатегории
 *
 */
Filtr.prototype.addElForList = function addElForList (dataList, title, where, elem) {
  $(subItem(el, color)).appendTo(where);
};

Filtr.prototype.addActiveMenuItem = function addActiveMenuItem (elem) {
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
};
/**
 * @method result
 */
Filtr.prototype.result = function result () {
  photo = new Photo;
  description = new DescriptionClass;
  tag = new TagClass;
  view = new ViewClass;
};

//=============================================================================
//=============== file with export default function for manipulation links ===================
//=============================================================================
/**
 * @functionHTML - хтмл шаблон всплывающей подсказки
 * @return string
 */
function HTML$1 (text) {
  return ("<div class=\"uk-alert uk-alert-success\" data-uk-alert=\"\"\n               style=\"display: block;\">\n             <a href=\"\" class=\"uk-alert-close uk-close\"></a>\n             <p>Ссылка " + text + "</p>\n          </div>");
}

/**
 * @functionaddLink - функция для добавления ссылки на соц сеть
 */
function addLink () {
  $('#add-link-form').submit(function(e) {
      e.preventDefault();
      var link = $('input[name=link]').val();
      $.ajax({
          type: 'POST',
          data: {
              '_token': csrftoken$1,
              'link': link,
              'user_id': user_id
          },
          url: ADD_LINK,
          success: function(data) {
              $('input[name=link]').val('');
              $('#dialogLinkAdd').fadeOut();
              $('.open-di-link').before();
              $('.uk-alert').remove();
              $('#editUser').prepend();
              save();
              openModalLink();
              setTimeout(function() { $('.uk-alert').css({'height': '0'}).remove();
              }, 10000);
          }
      });
      return false;
  });
}

/**
 * @functionsave - функция для сохранения ссылки
 */
function save() {
  $('#save-link-form').submit(function(e) {
  e.preventDefault();
  var link = $('input[name=link]').val(),
      old_link = $('input[name=old_link]').val();

      $.ajax({
        type: 'POST',
        data: {
              '_token': csrftoken$1,
              'link': link,
              'old_link': old_link,
              'user_id': user_id
        },
        url: EDIT_LINK,
        success: function() {
          $('input[name=link]').val('');
          $('#dialogLinkAdd').fadeOut();
          $('.uk-alert').remove();
          $('#editUser').prepend(HTML$1());
          $('li.item-links[data-id=' + $('#save-link-form').data('id') + ']')
                        .children('input.soc-set-edit').val(link);
          setTimeout(function() {
            $('.uk-alert').css({'height': '0'}).remove();}, 10000);
          }
        });
        return false;
      });
    }

/**
 * @functiondeleteLink - функция для удаления ссылки
 */
function deleteLink() {
  $('#delete-btn').on('click', function() {
      var link = $('input[name=link]').val();
      $.ajax({
          type: 'POST',
          data: {
                '_token': csrftoken$1,
                'link': link,
                'user_id': user_id
          },
          url: DEL_LINK,
          success: function() {
              $('input[name=link]').val('');
              $('#dialogLinkAdd').fadeOut();
              $('#editUser').prepend();
              $('li[data-id=' + $('#save-link-form').data('id') + ']').remove();
              setTimeout(function() {$('.uk-alert').css({'height': '0'}).remove();
                    }, 10000);
                }
            });
        });
}

/**
 * @functionopenModalLink - функция для открытия модального окна
 */
function openModalLink() {
  $('.open-modal-link').on('click', function() {
    $('.links-control').removeAttr('id').attr('id', 'save-link-form');
    $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
    $('input[name=link]').val($(this).children('input.soc-set-edit').val());
    $('#save-link-form').attr('data-id', $(this).data('id'));
    $('h3.title-form').empty().append();
    $('.mini-modal-submit').removeClass('uk-icon-plus').addClass('uk-icon-save');
    $('#dialogLinkAdd').fadeIn();
        deleteLink();
    });
}

// ============================================================================
// ============================================================================
// ============================================================================

$('.open-modal-link').on('click', function() {
  if ($(this).data('action') === 'addLinks') {
    $('h3.title-form').empty().text('Добавить ссылку');
    $('.mini-modal-submit').removeClass('uk-icon-save').addClass('uk-icon-plus');
    $('.links-control').removeAttr('id').attr('id', 'add-link-form');
    addLink ();
  } else {
    $('.links-control').removeAttr('id').attr('id', 'save-link-form');
    $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
    $('input[name=link]').val($(this).children('input.soc-set-edit').val());
    $('#save-link-form').attr('data-id', $(this).data('id'));
    $('h3.title-form').empty().append();
    $('.mini-modal-submit').removeClass('uk-icon-plus').addClass('uk-icon-save');

    deleteLink();
    save();
    openModalLink();
  }
  $('#dialogLinkAdd').fadeIn();
});

// ============================================================================
// =================== file with export function  for user action =============
// ============================================================================
/**
 * @export export function   like - функция для создания отметки о понравившемся фото
 */
function  like () {
  var url = $('input[name=url-like]').val();
  $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken$1,
                'post_id' : photoID,
                'user_id' : user_id
      },
      url:url,

      success: function  (data) {
            if ( url === '/like') {
              $('.uk-icon-heart').addClass('active-like');
              $('#value-like').text(data);
              $('input[name=url-like]').val();
              $('input[name=url-like]').val('/delete_like');
            }else {
              $('.uk-icon-heart').removeClass('active-like');
              $('#value-like').text( $('#value-like').text() - 1) ;
              $('input[name=url-like]').val('/like');
            }
      }
  });
}

/**
 * @function liked - функция для добавление в избранное
 */
function  liked () {
  var url = $('input[name=url-liked]').val();
  $.ajax({
      type:'POST',
      data: {
                '_token'  : csrftoken$1,
                'post_id' : photoID,
                'user_id' : user_id
      },
      url:url,

      success: function  (data) {
        if ( data === 'liked') {
          $('#num_liked').removeClass('active-favorite');
          $('input[name=url-liked]').val('/liked');
        }else{
          $('#num_liked').addClass('active-favorite');
          $('input[name=url-liked]').val('/delete_liked');
        }

      }
  });
}

/**
 * @function changeIcoPretense - функция отслеживания процесса
 */
function  changeIcoPretense () {
  $('.wrap-file-modal-law').addClass('uk-icon-thumbs-o-up');
  $('.wrap-file-modal-law').removeClass('uk-icon-plus');
}

/**
 * @function sendPretense - функция для отправки претензии на сервер
 */
function  sendPretense () {
  e.preventDefault();
  var csrftoken$$1 = $('input[name=_token]').val(),
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
function  allPhotoLikes () {
  $.ajax({
    type:'POST',
    data: {
              '_token'  : csrftoken$1,
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

/**
 * @function commonValid - общая валидация
 * @param string - text - текст, который появляется при пустых полях
 * @param string - where - перед каким элементом вставить текст
 */

/**
 * @function validateBack - функция для валидации обратной связи
 */

// ============================================================================
// =============== file with functions for tags operate  ======================
// ============================================================================

/**
 * @function addTag - функция для добавления тега
 */


/**
 * @function hiddenTagMask
 */


/**
 * @function renderPhoto
 */

/**
 * @function esc
 */

/**
 * @function moveTagMask - функция для передвижения при помощи клавиш ввверх и
 *                         вниз по вариантам тегов
 */

/**
 * @function enter -
 */

/**
 * @function renderTagsMask - функция для вывода вариантов тегов
 */

/**
 * @function form - функция для рендера фотографий при изменнении тега
 */

/**
 * @function commentDownload
 */
function commentDownload() {
    new Comment;
}
/**
 * @function tagsDownload
 */
function tagsDownload() {
    new Tag();
}

/**
 * @function viewsDownload
 */
function viewsDownload() {
    new View;
}

/**
 * @function infoPhotoDownload
 */
function infoPhotoDownload() {
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken$1,
            'id': photoID
        },
        url: LOAD_INFO_PHOTO,

        success: function(data) {
            if (!data.views_count) {
                $('#num_views').text(0);
                $('#num_views_zoom').text(0);

            } else {
                $('#num_views').text(data.views_count);
                $('#num_views_zoom').text(data.views_count);
            }
            if (!data.comments_count) {
                $('#num_comment').text(0);
                $('#num_comment_zoom').text(0);

            } else {
                $('#num_comment').text(data.comments_count);
                $('#num_comment_zoom').text(data.comments_count);
            }
            if (!data.full_path) {} else {
                $('img.img-max-center').attr("src", data.full_path);
            }
            if (!data.likes_count) {
                $('#value-like').text(0);
            } else {
                $('#value-like').text(data.likes_count);
            }
            if ((!data.title) && (!data.description)) {
                $('#description-pole').fadeOut();
                $('#description').fadeOut();
            } else {
                if (!data.description) {
                    $('#description-pole').fadeIn();
                    $('#description').fadeIn();
                    $('.view-photo-slide p').text(0);
                } else {
                    $('#description-pole').fadeIn();
                    $('#description').fadeIn();
                    $('.view-photo-slide p').text(data.description);
                }
                if (!data.title) {
                    $('#description-pole').fadeIn();
                    $('#description').fadeIn();
                    $('.view-photo-slide h3').text(0);
                } else {
                    $('#description-pole').fadeIn();
                    $('#description').fadeIn();
                    $('.view-photo-slide h3').text(data.title);
                }
            }
        }
    });
}

/**
 * @function userInfoDownload
 */

function userInfoDownload() {
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken$1,
            'id': photoID
        },
        url: LOAD_AUTHOR_PHOTO,

        success: function(data) {
            if (data === 'error_user') {
                $('.author-portret').empty();
                $('.author-name').empty();
            } else {
                $('.b-pretense a').attr('href', '/profile/' + data.id);
                if (!(data.quadro_ava === null)) {
                    $('.author-portret').empty();
                    $('.author-portret-zoom').empty();
                    $('<img src="/img/user.png">').appendTo('.author-portret');
                    $('<img src="/img/user.png">').appendTo('.author-portret-zoom');
                } else {
                    $('<img src="' + data.quadro_ava + '">').appendTo('.author-portret');
                    $('<img src="' + data.quadro_ava + '">').appendTo('.author-portret-zoom');
                }
                $('.author-name').text(data.name);
                $('.author-name-zoom').text(data.name);
            }
        }
    });

}

/**
 * @function newPhotoDownload
 * @param  string - direction
 */
function newPhotoDownload(direction) {
    var sortSort = $('input[name=sortSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        styleSort = $('input[name=styleSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tag = $('input[name=tagSorting]').val(),
        currentPosition = +$('#current-position').text() + 1;
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken$1,
            'id': photoID,
            'direction': direction,
            'sortSort': sortSort,
            'roomSort': roomSort,
            'styleSort': styleSort,
            'colorSort': colorSort,
            'tag': tag,
            'currentPosition': currentPosition
        },
        url: LOAD_MORE_PHOTO,
        async: false,
        success: function(data) {
            if (data === 'error_download') {
                return data;
            } else {
                if (direction === 'left') {
                    data = data.reverse();
                    for (var i = 0; i < data.length; i++) {
                        $('<div class="photo-item left-slide" data-id="' + data[i].id + '">' + '<img class="img-slider" src="' + data[i].full_path + '"></div>').prependTo('.wrap-slider');
                    }
                } else {
                    for (var i = 0; i < data.length; i++) {
                        $('<div class="photo-item right-slide" data-id="' + data[i].id + '">' + '<img class="img-slider" src="' + data[i].full_path + '"></div>').insertAfter('.right-slide:last');
                    }
                }
            }
        }
    });
}

/**
 * @function likeWhom
 */
function likeWhom() {
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken$1,
            'id': photoID
        },
        url: LOAD_LIKE_PHOTO,

        success: function(data) {
            if (data === 'error_like') {
                $('#like-whom-pole').empty();
            } else {
                $('#like-whom-pole').empty();
                for (var i = 0; i < data.length; i++) {
                    $('<a class="mini-avatar"' +
                        'href="/user/' + data[i][0].id + '"' + 'title="' + data[i][0].name + '">' + '<img src="' + data[i][0].quadro_ava + '"></a>').appendTo('#like-whom-pole');
                }
            }
        }
    });

}

/**
 * @function activeLike
 */
function activeLike() {
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken$1,
            'id': photoID
        },

        url: LOAD_ACTIVE_LIKE_PHOTO,

        success: function(data) {
            if (data === 'success') {
                $('.uk-icon-heart').addClass('active-like');
            } else {
                $('.uk-icon-heart').removeClass('active-like');
            }
        }
    });
}

/**
 * @function activeLiked
 */
function activeLiked() {
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken$1,
            'id': photoID
        },
        url: LOAD_ACTIVE_FAVORITE_PHOTO,

        success: function(data) {
            if (data === 'success') {
                $('.uk-icon-star').addClass('active-favorite');
            } else {
                $('.uk-icon-star').removeClass('active-favorite');
            }
        }
    });
}

/**
 * @function rightSliderChange
 */
function rightSliderChange () {
  $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
  $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
  $('#current-position').text($('.active-slide').index() + 1);
  $('#current-position-zoom').text($('.active-slide').index() + 1);
  $('input[name=post_id]').val($('.active-slide').data('id'));

  id = 'id=[' + $('.active-slide').data('id') + ']';
  newLocal = window.location.href;
  newLocal = newLocal.replace('id=[' + $('.active-slide').prev().data('id') + ']', id);
  history.pushState('', '', newLocal);
}

/**
 * @function leftSliderChange
 */
function leftSliderChange() {
  $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
  $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
  $('#current-position').text($('.active-slide').index() + 1);
  $('#current-position-zoom').text($('.active-slide').index() + 1);
  $('input[name=post_id]').val($('.active-slide').data('id'));

  id = 'id=[' + $('.active-slide').data('id') + ']';
  newLocal = window.location.href;
  newLocal = newLocal.replace('id=[' + $('.active-slide').next().data('id') + ']', id);
  history.pushState('', '', newLocal);
}

/**
 * @function mainSliderPhoto - инициализация главного слайдера
 */
function mainSliderPhoto() {

    var ret,direction = $(this).data('direction');

    if (direction === 'right') {
      if ($('.active-slide').index() + 1 === $('.photo-item:last').index()) {
        newPhotoDownload(direction);

        rightSliderChange();

        commentDownload();
        likeWhom();
        tagsDownload();
        viewsDownload();
        infoPhotoDownload();
        userInfoDownload();
        activeLike();
        activeLiked();
      } else if ($('.active-slide').index() === $('.photo-item:last').index()) {

        $('#popup-error-slider').fadeIn();

      } else {
        rightSliderChange();

        commentDownload();
        tagsDownload();
        likeWhom();
        viewsDownload();
        infoPhotoDownload();
        userInfoDownload();
        activeLike();
        activeLiked();
      }
    } else if (direction === 'left') {
      if ($('.active-slide').index() === $('.photo-item:first').index()) {
        newPhotoDownload(direction, ret);
        if ($('.active-slide').index() === $('.photo-item:first').index()) {
            $('#popup-error-slider').fadeIn();
        } else {
            leftSliderChange();

            commentDownload();
            tagsDownload();
            viewsDownload();
            infoPhotoDownload();
            userInfoDownload();
            likeWhom();
            activeLike();
            activeLiked();
        }
      } else {
        leftSliderChange();

        commentDownload();
        likeWhom();
        viewsDownload();
        tagsDownload();
        infoPhotoDownload();
        userInfoDownload();
        activeLike();
        activeLiked();
      }
    }
}

// import { $, Jquery } from '../vendor/jquery.min';

// инициализация главного слайдера
$('.btn-nav').addEventListener('click', mainSliderPhoto(), false);
$('.nav-zoom').addEventListener('click', mainSliderPhoto(), false);

// работа с тегами
// $().addEventListener('click', addTag(), false);
// $().addEventListener('click', hiddenTagMask(), false);
// $().addEventListener('click', renderPhoto(), false);
// $().addEventListener('click', esc(), false);
// $().addEventListener('click', moveTagMask(), false);
// $().addEventListener('click', enter(), false);
// $().addEventListener('click', renderTagsMask(), false);
// $().addEventListener('click', form(), false);

// форма добавления фото
$('.deleteSome').addEventListener('click', deleteView(), false);
$('#file').addEventListener('change', handleFileOneSelect, false);
$('#files').on('change', handleFileSelect);

// Подтверждение удаления
// $().addEventListener('click', confirmModal(), false);

// Чтение комментария в админке
// $().addEventListener('click', readComment (), false);

// Инициализация слайдеров
// $().addEventListener('click', slider (activeEl, leftEl, rightEl, el), false);
// $().addEventListener('click', slider (activeEl, leftEl, rightEl, el), false);
// $().addEventListener('click', slider (activeEl, leftEl, rightEl, el), false);

// инициализация слайдеров
// $('').addEventListener('click', slider('.active-about',
//                               '.left-about',
//                               '.right-about',
//                               '.item' ), false);
$('.min-nav-views').addEventListener('click', slider('.active-view-min',
                                            '.left-view-min',
                                            '.right-view-min',
                                            '.item-view-min'), false);
$('.nav-zoom-views').addEventListener('click', slider('.active-slide-zoom-views',
                                                      '.left-slide-zoom-views',
                                                      '.right-slide-zoom-views',
                                                      '.item-views-zoom'), false);

// прослушка кнопок закрытия попапов
// $('').addEventListener('click', closeModal('#modalDescriptionFull'), false);
$('#close-modal-law').addEventListener('click', closeModal('#modalLaw'), false);
$('.popup-close-news').addEventListener('click', closeModal('.modal-news'), false);
$('#closeLink').addEventListener('click', closeModal('#dialogLinkAdd'), false);
$('.popup-close').addEventListener('click', closeModal('.overlay'), false);
$('#close-modal-likes').addEventListener('click', closeModal('#allPhotoLikes'), false);
$('#close-modal-views').addEventListener('click', closeModal('#modalViewsZoom'), false);
$('.popup-error-close').addEventListener('click', closeModal('#popup-error-slider'), false);
$('.slider-close').addEventListener('click', closeModal('#zoom-slider'), false);

// прослушка кнопок открытия попапов
$('.full-scrn').addEventListener('click', openModal('#zoom-slider'), false);
$('.b-pretense').addEventListener('click', openModal('#modalLaw'), false);
$('#foot-about').addEventListener('click', openModal('#popup-about'), false);
$('#foot-feedback').addEventListener('click', openModal('#popup-feedback'), false);
$('.login').addEventListener(openModalView('click', '#login-popup'), false);
$('#registration').addEventListener(openModal('click', '#popup-registr'), false);
$('#recover-pswd').addEventListener(openModal('click', '#passwd-popup'), false);

// Подгрузить все комментарии
// $().addEventListener('click', loadAllComments(btn), false);

// Открытие модального окна описания
// $().addEventListener('click', openModalDescription (), false);

// Инициализация кнопки для показа полной информации о пользователе
addArrowForMoreInfo();
$('.to-bottom').addEventListener('click', showUserInfoMore, false);

// попапы новостей
$('.item-news-title').on('click', function(){
    $('.'+$(this).attr('rel')).fadeIn();
});

// активность пользователя
$('.like button').addEventListener('click', like(), false);
$('.liked button').addEventListener('click', liked(), false);
$('#pretense-file').addEventListener('change', changeIcoPretense(), false);
$('#formPretense').addEventListener('submit', sendPretense(), false);
$('p.asd').addEventListener('click', allPhotoLikes(), false);

// валидация форм
// $().addEventListener('submit', commonValid(text, where), false);
// $().addEventListener('submit', commonValid(text, where), false);
// $().addEventListener('submit', commonValid(text, where), false);
// $().addEventListener('submit', validateBack(), false);

$('#feedback').children().on('click', function () {
    $(this).removeClass('error');
});


$( document ).ready(function () {
  $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  $(window).resize(function() {
    $('.one-picture-place').css({'height': document.documentElement.clientHeight*0.823});
  });
});




$('#current-position, #current-position-zoom').text($('.active-slide').index() + 1);
table.onclick = function(event) {
  var target = event.target; // где был клик?

  if (target.tagName != 'TD') { return; } // не на TD? тогда не интересует

  highlight(target); // подсветить TD
};

}((this.LaravelElixirBundle = this.LaravelElixirBundle || {})));

//# sourceMappingURL=all.js.map
