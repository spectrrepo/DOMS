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
            $('.'+el+':not(.'+el+':last)').addClass(leftEl).removeClass(activeEl).removeClass(rightEl);
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
    let id = $(this).data('id');
    let _token = $('meta[name=_token]').attr('content');

    $.ajax({
        type:'POST',
        data: {
            '_token'  : _token,
            'id'      : id
        },
        url: '/views/delete',
    });

    $(this).remove();
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
