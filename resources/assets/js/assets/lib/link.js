//=============================================================================
//=============== file with export default function for manipulation links ===================
//=============================================================================

/**
 * @functionHTML - хтмл шаблон всплывающей подсказки
 * @return string
 */
export default function HTML (text) {
  '<div class="uk-alert uk-alert-success" data-uk-alert=""' +
  'style="display: block;">' +
  '<a href="" class="uk-alert-close uk-close"></a>' +
  '<p>Ссылка '+text+'</p></div>'
}

/**
 * @functionHTMLlink - хтмл шаблон всплывающей подсказки
 * @return string
 */
export default function HTMLlink () {
  '<li class="item-links uk-icon-external-link ' +
  'open-modal-link" data-action="editLinks"data-id="' + data.id + '">' +
  '<input class="contact-item-value soc-set-edit" name="soc_net' + data.id + '"' +
  'value="' + link + '" type="hidden"></li>'
}

/**
 * @functiontextPopupLink - хтмл - шаблон для шапки мродального окна
 * @return string
 */
export default function textPopupLink() {
  'Изменить ссылку для ' +
  $(this).children('input.soc-set-edit').val() + ' или ' +
  '<span id="delete-btn" class="remove-this-links">удалить</span>'
}

/**
 * @functionaddLink - функция для добавления ссылки на соц сеть
 */
export default function addLink () {
  $('#add-link-form').submit(export default function(e) {
      e.preventDefault();
      var link = $('input[name=link]').val();
      $.ajax({
          type: 'POST',
          data: {
              '_token': csrftoken,
              'link': link,
              'user_id': user_id
          },
          url: '/add_links',
          success: export default function(data) {
              $('input[name=link]').val('');
              $('#dialogLinkAdd').fadeOut();
              $('.open-di-link').before(;
              $('.uk-alert').remove();
              $('#editUser').prepend();
              save();
              openModalLink();
              setTimeout(export default function() { $('.uk-alert').css({'height': '0'}).remove()
              }, 10000);
          }
      });
      return false;
  });
}

/**
 * @functionsave - функция для сохранения ссылки
 */
export default function save() {
  $('#save-link-form').submit(export default function(e) {
  e.preventDefault();
  var link = $('input[name=link]').val(),
      old_link = $('input[name=old_link]').val();

      $.ajax({
        type: 'POST',
        data: {
              '_token': csrftoken,
              'link': link,
              'old_link': old_link,
              'user_id': user_id
        },
        url: '/edit_links',
        success: export default function() {
          $('input[name=link]').val('');
          $('#dialogLinkAdd').fadeOut();
          $('.uk-alert').remove();
          $('#editUser').prepend(HTML());                       );
          $('li.item-links[data-id=' + $('#save-link-form').data('id') + ']')
                        .children('input.soc-set-edit').val(link);
          setTimeout(export default function() {
            $('.uk-alert').css({'height': '0'}).remove()}, 10000)
          }
        });
        return false;
      });
    }

/**
 * @functiondeleteLink - функция для удаления ссылки
 */
export default function deleteLink() {
  $('#delete-btn').on('click', export default function() {
      var link = $('input[name=link]').val();
      $.ajax({
          type: 'POST',
          data: {
                '_token': csrftoken,
                'link': link,
                'user_id': user_id
          },
          url: '/delete_links',
          success: export default function() {
              $('input[name=link]').val('');
              $('#dialogLinkAdd').fadeOut();
              $('#editUser').prepend();
              $('li[data-id=' + $('#save-link-form').data('id') + ']').remove();
              setTimeout(export default function() {$('.uk-alert').css({'height': '0'}).remove()
                    }, 10000)
                }
            });
        });
}

/**
 * @functionopenModalLink - функция для открытия модального окна
 */
export default function openModalLink() {
  $('.open-modal-link').on('click', export default function() {
    $('.links-control').removeAttr('id').attr('id', 'save-link-form');
    $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
    $('input[name=link]').val($(this).children('input.soc-set-edit').val());
    $('#save-link-form').attr('data-id', $(this).data('id'));
    $('h3.title-form').empty().append();
    $('.mini-modal-submit').removeClass('uk-icon-plus').addClass('uk-icon-save')
    $('#dialogLinkAdd').fadeIn();
        deleteLink();
    });
}

// ============================================================================
// ============================================================================
// ============================================================================

$('.open-modal-link').on('click', export default function() {
  if ($(this).data('action') === 'addLinks') {
    $('h3.title-form').empty().text('Добавить ссылку');
    $('.mini-modal-submit').removeClass('uk-icon-save').addClass('uk-icon-plus');
    $('.links-control').removeAttr('id').attr('id', 'add-link-form');
    addLink ();
  } else {
    $('.links-control').removeAttr('id').attr('id', 'save-link-form');
    $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
    $('input[name=link]').val($(this).children('input.soc-set-edit').val())
    $('#save-link-form').attr('data-id', $(this).data('id'));
    $('h3.title-form').empty().append();
    $('.mini-modal-submit').removeClass('uk-icon-plus').addClass('uk-icon-save')

    deleteLink();
    save();
    openModalLink();
  }
  $('#dialogLinkAdd').fadeIn();
});
