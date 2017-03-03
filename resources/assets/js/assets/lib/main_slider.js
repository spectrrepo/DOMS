/**
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function commentDownload() {
    new Comment;
}
/**
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function tagsDownload() {
    new Tag();
}

/**
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function viewsDownload() {
    new VIew;
}

/**
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function infoPhotoDownload() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id
        },
        url: '/load_info_slide',

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
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function userInfoDownload() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id
        },
        url: '/load_user',

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
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */
export function newPhotoDownload(direction) {
    var id = $('.active-slide').data('id'),
        sortSort = $('input[name=sortSorting]').val(),
        roomSort = $('input[name=roomSorting]').val(),
        styleSort = $('input[name=styleSorting]').val(),
        colorSort = $('input[name=colorSorting]').val(),
        tag = $('input[name=tagSorting]').val(),
        currentPosition = +$('#current-position').text() + 1,
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id,
            'direction': direction,
            'sortSort': sortSort,
            'roomSort': roomSort,
            'styleSort': styleSort,
            'colorSort': colorSort,
            'tag': tag,
            'currentPosition': currentPosition
        },
        url: '/load_slides ',
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
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function likeWhom() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id
        },
        url: '/load_like',

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
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function activeLike() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id
        },
        url: '/load_active_like',

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
     * Represents a book.
     * @constructor
     * @param {string} title - The title of the book.
     * @param {string} author - The author of the book.
     */

export function activeLiked() {
    var id = $('.active-slide').data('id'),
        csrftoken = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token': csrftoken,
            'id': id
        },
        url: '/load_active_favorite',

        success: function(data) {
            if (data === 'success') {
                $('.uk-icon-star').addClass('active-favorite');
            } else {
                $('.uk-icon-star').removeClass('active-favorite');
            }
        }
    });
}
$('.btn-nav, .nav-zoom').on('click', function() {
    var ret,
        direction = $(this).data('direction');
    if (direction === 'right') {
        if ($('.active-slide').index() + 1 === $('.photo-item:last').index()) {
            newPhotoDownload(direction);
            $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
            $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
            $('#current-position').text($('.active-slide').index() + 1);
            $('#current-position-zoom').text($('.active-slide').index() + 1);
            $('input[name=post_id]').val($('.active-slide').data('id'));
            id = 'id=[' + $('.active-slide').data('id') + ']';
            newLocal = window.location.href;
            newLocal = newLocal.replace('id=[' + $('.active-slide').prev().data('id') + ']', id);
            history.pushState('', '', newLocal);
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

            $('.active-slide').next().removeClass('right-slide').addClass('active-slide');
            $('.active-slide:first').removeClass('active-slide').addClass('left-slide');
            $('#current-position').text($('.active-slide').index() + 1);
            $('#current-position-zoom').text($('.active-slide').index() + 1);
            $('input[name=post_id]').val($('.active-slide').data('id'));
            id = 'id=[' + $('.active-slide').data('id') + ']';
            newLocal = window.location.href;
            newLocal = newLocal.replace('id=[' + $('.active-slide').prev().data('id') + ']', id);
            history.pushState('', '', newLocal);

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
                $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
                $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
                $('#current-position').text($('.active-slide').index() + 1);
                $('#current-position-zoom').text($('.active-slide').index() + 1);
                $('input[name=post_id]').val($('.active-slide').data('id'));
                id = 'id=[' + $('.active-slide').data('id') + ']';

                newLocal = window.location.href;
                newLocal = newLocal.replace('id=[' + $('.active-slide').next().data('id') + ']', id);
                history.pushState('', '', newLocal);
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
            $('.active-slide').prev().addClass('active-slide').removeClass('left-slide');
            $('.active-slide:last').removeClass('active-slide').addClass('right-slide');
            $('#current-position').text($('.active-slide').index() + 1);
            $('#current-position-zoom').text($('.active-slide').index() + 1);
            $('input[name=post_id]').val($('.active-slide').data('id'));
            id = 'id=[' + $('.active-slide').data('id') + ']';

            newLocal = window.location.href;
            newLocal = newLocal.replace('id=[' + $('.active-slide').next().data('id') + ']', id);
            history.pushState('', '', newLocal);

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
});
