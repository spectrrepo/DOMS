// ============================================================================
// =============== file with functions for tags operate  ======================
// ============================================================================

/**
 * @function addTag - функция для добавления тега
 */
export function addTag() {
    $('input[name=data-tags]').val($('input[name=data-tags]').val() + $('.input-tag-name').val() + ';');
    $('<span class="item-tag-show">' + $('.input-tag-name').val() + '</span>').appendTo('.wrap-add-tag');
    $('.input-tag-name').val("");
    $('.item-tag-show').click(function() {
        var replaceString = $('input[name=data-tags]').val();
        $('input[name=data-tags]').val(replaceString.replace($(this).text() + ';', ''));
        $(this).remove();
    });
    return false;
}

/**
 * @function hiddenTagMask
 */
export function hiddenTagMask() {
    var container = $(".overlay");
    if (container.has(e.target).length === 0) {
        container.fadeOut();
    }
}

/**
 * @function renderPhoto
 */
export function renderPhoto() {
    $('input[name=tagSorting]').val(tag);
    var tag = $('input[name=tagSorting]').val();
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'sortSort': sortSort,
            'styleSort': styleSort,
            'roomSort': roomSort,
            'colorSort': colorSort,
            'tag': tag
        },
        url: URL_DWNLD_PHOTO,

        success: function(data) {
            $('#pole').empty();
            if (!(data === 'error_download')) {
                $('.info-text-message').fadeOut();
                $('.b-next-page').fadeIn();
                filtr.render();
                for (var i = 0; i < data.length; i++) {
                    Tag.render();
                }
            } else {
                $('.info-text-message').fadeIn();
                $('.b-next-page').fadeOut();
            }
        }
    });
    return false;
}
/**
 * @function esc
 */
export function esc() {
    $('.popup-tag').keydown(function(e) {
        if (e.which === 27) {
            $('.popup-search-tag').empty();
            $('.popup-search-tag').fadeOut();
        }
    });
}
/**
 * @function moveTagMask - функция для передвижения при помощи клавиш ввверх и
 *                         вниз по вариантам тегов
 */
export function moveTagMask() {
    $('.popup-tag').keydown(function(e) {
        if (e.which === 38) { // клавиша вверх
            if ($('.drop-item-tag:first').hasClass('active-drop-item')) {
                $('.drop-item-tag:last').addClass('active-drop-item');
                $('.drop-item-tag:first').removeClass('active-drop-item');
                $('input[name=tagSorting]').val($('.active-drop-item').text());
            } else if (!$('.drop-item-tag').hasClass('active-drop-item')) {
                $('.drop-item-tag:last').addClass('active-drop-item');
                $('input[name=tagSorting]').val($('.active-drop-item').text());
            } else {
                $('.active-drop-item').prev().addClass('active-drop-item');
                $('.active-drop-item:last').removeClass('active-drop-item');
                $('input[name=tagSorting]').val($('.active-drop-item').text());
            }
        } else if (e.which === 40) { // клавиша вниз
            if ($('.drop-item-tag:last').hasClass('active-drop-item')) {
                $('.drop-item-tag:first').addClass('active-drop-item');
                $('.drop-item-tag:last').removeClass('active-drop-item');
                $('input[name=tagSorting]').val($('.active-drop-item').text());
            } else if (!$('.drop-item-tag').hasClass('active-drop-item')) {
                $('.drop-item-tag:first').addClass('active-drop-item');
                $('input[name=tagSorting]').val($('.active-drop-item').text());
            } else {
                $('.active-drop-item').next().addClass('active-drop-item');
                $('.active-drop-item:first').removeClass('active-drop-item');
                $('input[name=tagSorting]').val($('.active-drop-item').text());
            }
        }
    });
}
/**
 * @function enter -
 */
export function enter() {
    $('.ajax-input-search').keydown(function(e) {
        if ((e === 13) && ($('li').is('.active-drop-item'))) {
            e.preventDefault();
            var sortSort = $('input[name=sortSorting]').val(),
                styleSort = $('input[name=styleSorting]').val(),
                roomSort = $('input[name=roomSorting]').val(),
                colorSort = $('input[name=colorSorting]').val();

            $.ajax({
                type: 'POST',
                async: false,
                data: {
                    '_token': $('meta[name=_token]').attr('content'),
                    'sortSort': sortSort,
                    'styleSort': styleSort,
                    'roomSort': roomSort,
                    'colorSort': colorSort,
                    'tag': $('input[name=tagSorting]').val()
                },
                url: URL_DWNLD_PHOTO,

                success: function(data) {
                    $('.popup-search-tag').fadeOut().empty();
                    if (data === 'error_download') {
                        $('.info-text-message').fadeIn();
                        $('.b-next-page').fadeOut();
                    } else {
                        for (var i = 0; i < data.length; i++) {
                            Tag.render()
                        }
                    }
                }
            });
            return false;
        }
    });

}
/**
 * @function renderTagsMask - функция для вывода вариантов тегов
 */
export function renderTagsMask() {
    $('.popup-tag').on('input', function() {
        $.ajax({
            type: 'POST',
            data: {
                '_token': $('meta[name=_token]').attr('content'),
                'current': $(this).val()
            },
            url: URL_DWNLD_TAGS_MASK,

            success: function(data) {
                $('.popup-search-tag').empty();
                var length;
                if ((data.length <= 7) && (data.length != 0)) {
                    length = data.length;
                    for (var i = 0; i < length; i++) {
                        if (data[i].title != '') {
                            $('<li class="drop-item-tag">' + data[i].title + '</li>').appendTo('.popup-search-tag');
                        }
                    }
                    $('.popup-search-tag').fadeIn();
                } else if (data.length === 0) {
                    $('.popup-search-tag').fadeOut();
                } else {
                    length = 7;
                    for (var i = 0; i < length; i++) {
                        if (data[i].title != '') {
                            $('<li class="drop-item-tag">' + data[i].title + '</li>').appendTo('.popup-search-tag');
                        }
                    }
                    $('.popup-search-tag').fadeIn();
                }
            }
        });
    });
}
/**
 * @function form - функция для рендера фотографий при изменнении тега
 */
export function form() {
    $.ajax({
        type: 'POST',
        data: {
            'lastId': lastIdJS,
            '_token': csrftoken,
            'sortSorting': sortSorting,
            'styleSorting': styleSorting,
            'roomSorting': roomSorting,
            'colorSorting': colorSorting
        },
        url: URL_DWNLD_TAGS_MASK,

        success: function(data) {
            data.forEach(function(item, i, data) {
                Tag.render()
            });
        }
    });
}
