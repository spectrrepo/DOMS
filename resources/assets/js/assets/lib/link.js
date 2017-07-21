//=============================================================================
//=============== file with export default function for manipulation links ===================
//=============================================================================
import { ADD_LINK } from './constant';
import { EDIT_LINK } from './constant';
import { DEL_LINK } from './constant';
import { csrftoken } from './helpers';
import { user_id } from './helpers';

/**
 * @functionHTML - хтмл шаблон всплывающей подсказки
 * @return string
 */
function HTML (text) {
    return `<div class="uk-alert uk-alert-success" data-uk-alert=""
               style="display: block;">
             <a href="" class="uk-alert-close uk-close"></a>
             <p>Ссылка ${text}</p>
          </div>`;
}

/**
 * @functionHTMLlink - хтмл шаблон всплывающей подсказки
 * @return string
 */
function HTMLlink (data, link) {
    return `<li class="item-links uk-icon-external-link
          open-modal-link" data-action="editLinks" data-id="${data}">
          <input class="contact-item-value soc-set-edit" name="soc_net${data}"
           value="${link}" type="hidden"></li>`;
}

/**
 * @functiontextPopupLink - хтмл - шаблон для шапки мродального окна
 * @return string
 */
function textPopupLink(value) {
    return `Изменить ссылку для
          ${value} или 
          <span id="delete-btn" class="remove-this-links">
            удалить
          </span>`;
}

/**
 * @functionaddLink - функция для добавления ссылки на соц сеть
 */
export function addLink () {
    $('#add-link-form').submit(function(e) {
        e.preventDefault();
        let link = $('input[name=link]').val();
        $.ajax({
            type: 'POST',
            data: {
                '_token': csrftoken,
                'link': link,
                'user_id': user_id
            },
            url: '/social/add',
            success: function(data) {
                $('input[name=link]').val('');
                $('#dialogLinkAdd').fadeOut();
                $('.open-di-link').before();
                $('.uk-alert').remove();
                $('#editUser').prepend(HTML(link+' добавлена'));
                save();
                $('.uk-clearfix.list-links').prepend(HTMLlink(data, link));
                openModalLink();
                setTimeout(function() { $('.uk-alert').css({'height': '0'}).remove()
                }, 10000);
            }
        });
        return false;
    });
}

/**
 * @functionsave - функция для сохранения ссылки
 */
export function save() {
    $('#save-link-form').submit(function(e) {
        e.preventDefault();
        let link = $('input[name=link]').val(),
            old_link = $('input[name=old_link]').val();

        $.ajax({
            type: 'POST',
            data: {
                '_token': csrftoken,
                'link': link,
                'old_link': old_link,
                'user_id': user_id
            },
            url: '/social/edit',
            success: function() {
                $('input[name=link]').val('');
                $('#dialogLinkAdd').fadeOut();
                $('.uk-alert').remove();

                $('#editUser').prepend(HTML(link+' сохранена'));
                $('li.item-links[data-id=' + $('#save-link-form').data('id') + ']')
                    .children('input.soc-set-edit').val(link);
                setTimeout(function() {
                    $('.uk-alert').css({'height': '0'}).remove()}, 10000)
            }
        });
        return false;
    });
}

/**
 * @functiondeleteLink - функция для удаления ссылки
 */
export function deleteLink() {
    $('#delete-btn').on('click', function() {
        var link = $('input[name=link]').val();
        $.ajax({
            type: 'POST',
            data: {
                '_token': csrftoken,
                'link': link,
                'user_id': user_id
            },
            url: '/social/delete',
            success: function() {
                $('input[name=link]').val('');
                $('#dialogLinkAdd').fadeOut();
                $('#editUser').prepend(HTML(link+' удалена'));
                $('li[data-id=' + $('#save-link-form').data('id') + ']').remove();
                setTimeout(function() {
                    $('.uk-alert').css({'height': '0'}).remove()
                }, 10000);
            }
        });
    });
}

/**
 * @functionopenModalLink - функция для открытия модального окна
 */
export function openModalLink() {
    $('.open-modal-link').on('click', function() {

        $('.links-control').removeAttr('id').attr('id', 'save-link-form');
        $('input[name=old_link]').val($(this).children('input.soc-set-edit').val());
        $('input[name=link]').val($(this).children('input.soc-set-edit').val());
        $('#save-link-form').attr('data-id', $(this).data('id'));
        $('.mini-modal-submit').removeClass('uk-icon-plus').addClass('uk-icon-save')
        $('#dialogLinkAdd').fadeIn();

        deleteLink();
    });
}
