// ============================================================================
// =============== file with functions, which use in app ======================
// ============================================================================

/**
 * @function photoID - возвращает id текущей фотографии
 * @return integer
 */
export default function photoID () {
  return $('.active-slide').data('id');
}

/**
 * @function csrftoken - возвращает текущий токен приложения
 * @return string
 */
export default function csrftoken () {
  return $('meta[name=_token]').attr('content');
}

/**
 * @function user_id - возвращает id пользователя
 * @return string
 */
export default function user_id () {
  return $('input[name=user_id]').val();
}

/**
 * @function authID - хз чем отличается от id
 * @return {[type]} [description]
 */
export default function authID () {
  return $('meta[name=authID]').attr('content');
}

/**
 * @function dwnldIndexPhoto - подгрузка новых фотографий на главной странице
 * @param  string - sortSorting - один из трех видов сортировки
 * @param  array - styleSorting - массив id стилей
 * @param  array - roomSorting - массив id комнат
 * @param  integer - colorSorting - id цвета
 * @param  string - tagSorting - тег
 */
export default function dwnldIndexPhoto(sortSorting,
                         styleSorting,
                         roomSorting,
                         colorSorting,
                         tagSorting) {
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
      url:'/pagination_index',

      success: export default function (data) {
        for(var i=0; i<data.length; i++) {
              $('<a href="/photo/id=['+data[i].id+
                  '],room=['+roomSorting+
                  '],styles=['+styleSorting+
                  '],colors=['+colorSorting+
                  '],sort=['+sortSorting+
                  '],tag=['+tagSorting+']" class="item-gallery" '+
                  'data-grid-prepared="true"style="position:absolute;">' +
                  '<div class="uk-panel-box">' +
                    '<img src="'+data[i].min_path+'">'+
                   '</div>' +
                 '</a>').appendTo('.uk-grid-width-small-1-2');
        }
      }
  });
}

/**
 * @function openModalDescription - функция для открытия
 *                                  модального окна с описанием к фото
 */
export default function openModalDescription () {
  $('.description-scroll-place').empty();
  $('<h3 class="title-description-popup"></h3>')
                .appendTo('.description-scroll-place')
                .text($(this).text());
  $('<p></p>').appendTo('.description-scroll-place')
              .text($('#description-pole p').text());
  $('#modalDescriptionFull').fadeIn();
}

/**
 * @function LoadAllComments
 * @param string - btn - элемент, принажатии на который показываются все комментарии
 */
export default function loadAllComments(btn) {
  $(btn).on('click', function() {
    $('.b-comment-wrap').fadeIn();
    $(btn).fadeOut();
  });
}

/**
 * @function openModal - открытие модального окна
 * @param string - el - элемент, при клике на который открыватеся модальное окно
 */
export default function openModal(el) {
    $('.overlay').fadeOut();
    $(el).fadeIn();
}

/**
 * @function closeModal - функция для закрытия модального окна
 * @param string - el - элемент, при клике на который закроется модальное окно
 */
export default function closeModal (el) {
    $(el).fadeOut();
}
/**
 * @function slider - функция для инициализации слайдера
 * @param string - activeEl - css class для активного элемента
 * @param string - leftEl - css class для левого элемента
 * @param string - rightEl - css class для правого элемента
 * @param string - el - css class для элемента слайдера
 */
export default function slider (activeEl, leftEl, rightEl, el) {
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
export default function readComment () {
  var csrftoken = $('meta[name=_token]').attr('content'),
      commentId = parseInt($(this).children('.id-cell').text());
  $.ajax({
      type:'POST',

      data: {
                '_token'  : csrftoken,
                'id' : commentId,
      },
      url: '/read_new_comment',

      success: export default function () {
        $('.id-cell:contains("'+commentId+'")').parent().removeClass('none-check');
      }
  });
}


var id = 1;
export default function handleFileOneSelect(evt) {
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

document.getElementById('file').addEventListener('change', handleFileOneSelect, false);

export default function handleFileSelect(evt) {
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

$('#files').on('change', handleFileSelect);
});

/**
 * @function confirmModal
 */
export default function confirmModal() {
  if(confirm('Вы уверены?')) {
    $('#userform').submit();
  }
}

/**
 * @function deleteView - функция для удаления ракурса фотографии
 */
export default function deleteView () {
  var csrftoken = $('meta[name=_token]').attr('content'),
  id = $('input[name=id]').val();
  $.ajax({
    type:'POST',
    data: {
      '_token'  : csrftoken,
      'id'      : id
    },
    url: '/delete_view',

  });
  $(this).empty().remove();
}
