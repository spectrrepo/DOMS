/**
 * @function commonValid - общая валидация
 * @param string - text - текст, который появляется при пустых полях
 * @param string - where - перед каким элементом вставить текст
 */
export function commonValid(text, where) {
    $('#p-info').remove();
    if (($('.modal-login-inp').val() === '')) {
        e.preventDefault();
        $('<p id="p-info" style="color:red">' + text + '</p>').prependTo(where);
        return false;
    } else {
        return true;
    }
}
/**
 * @function validateBack - функция для валидации обратной связи
 */
export function validateBack() {
    if (($('.input-feedback').val() === '') || $('.textarea-feddback').val() === '') {
        e.preventDefault();
        $(this).children().addClass('error');
        return false;
    } else {
        return true;
    }
}
