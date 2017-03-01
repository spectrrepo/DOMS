/**
 * @function commonValid - общая валидация
 * @param string - text - текст, который появляется при пустых полях
 * @param string - where - перед каким элементом вставить текст
 */
export default function  commonValid(text, where) {
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
export default function  validateBack() {
    if (($('.input-feedback').val() === '') || $('.textarea-feddback').val() === '') {
        e.preventDefault();
        $(this).children().addClass('error');
        return false;
    } else {
        return true;
    }
}

$('#feedback').children().on('click', export default function () {
    $(this).removeClass('error');
});
