/**
 *
 * @param comment
 * @returns {string}
 * @constructor
 */
export function viewComment (comment, currentUserId = false){
    let removeBtn = '';
    if ((delBtn !== false) && (currentUserId === comment.user_id)) {
        removeBtn = `<div class="remove-comment uk-icon-justify uk-icon-remove"> 
                        <span class="delete_comment_id" data-id="${comment.id}"></span>
                    </div>`;
    }
    let el  = `<div class="b-comment-wrap uk-clearfix"> 
                    ${removeBtn}
                    <a href="/user/${comment.user_id}" class="b-photo-comment">
                        <img src="${comment.user_img}">
                    </a>
                    <div class="b-comment">
                        <a href="/user/${comment.user_id}" class="b-name-comment">
                            ${comment.user_name}
                        </a>
                        <div class="b-text-comment">
                            ${comment.comment}
                        </div>
                        <div class="b-date-comment">
                            ${comment.date}
                        </div>
                    </div> 
                </div>`;
    return el;
}

/**
 * 
 * @param {*} img 
 * @param {*} variant 
 */
export function viewRacourse (img, variant = 'active-view-min') {
    return `<div class="item-view-min ${variant}">
                <img src="${img}">
            </div>`;
}

/**
 * 
 * @param {*} tag 
 */
export function viewTag (tag) {
    return `<div class="tag-item">${tag}</div>`;
}

export function viewPost (post) {
   return `<div class="b-person-post uk-clearfix" data-new-id="${post['id']}">
        <div class="col-news-min">
            <a href="${post['idAuthor']}" class="b-portret-blogger">
                <img src="${post['avaAuthor']}">
            </a>
        </div>
        <div class="col-news-big">
            <div class="b-name-redactor">
                <a href="${post['idAuthor']}">${post['nameAuthor']}</a>
            </div>
            <div class="b-post-body">
                <a href='/gallery/${post['id']}/rule={"color":0,"placements":[0],"style":[0],"tag":"0"}' class="b-photo-post">
                    <img src="${post['image']}" class="img-post" alt="">
                </a>
                <div class="b-iformation">
                    <div class="b-date">
                        ${new Date(post['dateEvent'].date).toLocaleString('ru', { year: 'numeric', month: 'long', day: 'numeric',})}
                    </div>
                    <div class="b-statistics">
                       ${newsViewsView(post['numViews'])} 
                       ${newsLikesView(post['numLikes'])} 
                       ${newsFavoritesView(post['numFavorites'])}
                    </div>
                </div> 
            </div>
            <div id="rubberSquare" class="uk-clearfix">
                <div class="insertComment"></div>
            </div>
        </div>
        <div class="insertLikes"></div>
        <div class="insertFavorites"></div>
    </div>`;
}

/**
 *
 * @param views
 * @returns {string}
 */
function newsViewsView (views) {
    return `<div class="b-item-stat">
                <span class="ico uk-icon-justify uk-icon-eye"></span>
                <span class="num-stat">${views}</span>
                    <span class="tooltip-stat margin-num-comment-tooltip">
                    <span class="text-tooltip-stat">
                        количество просмотров
                    </span>
                    <span class="triangle-tooltip-stat"></span>
                </span>
            </div>`;
}

/**
 *
 * @param likes
 * @returns {string}
 */
function newsLikesView (likes) {
    return `<div class="b-item-stat">
                <span class="ico uk-icon-justify uk-icon-heart"></span>
                <span class="num-stat">${likes}</span>
                <span class="tooltip-stat margin-like-tooltip">
                    <span class="text-tooltip-stat">
                        понравилось
                    </span>
                    <span class="triangle-tooltip-stat"></span>
                </span>
            </div>`;
}

/**
 *
 * @param favorites
 * @returns {string}
 */
function newsFavoritesView (favorites) {
    return `<div class="b-item-stat">
                <span class="ico uk-icon-justify uk-icon-star"></span>
                <span class="num-stat">${favorites}</span>
                <span class="tooltip-stat margin-liked-tooltip">
                    <span class="text-tooltip-stat">
                        избранное
                    </span>
                    <span class="triangle-tooltip-stat"></span>
                </span>
            </div>`;
}

function newsFavoritesEventView (favorite) {
    return `<div class="uk-clearfix">
            <div class="col-news-min">
                <a href="/user/${favorite.user_id}" class="b-portret-blogger">
                    <img src="${favorite.img_middle}">
                    <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
                </a>
            </div>
            <div class="col-news-big">
                <div class="b-name-redactor">
                    <a href="/user/${favorite.user_id}">
                        ${favorite.name}
                    </a>
                    <div class="event-text">
                        добавил фотографию в избранное
                    </div>
                    <p class="date-event-text">
                        ${new Date(favorite.date.date).toLocaleString('ru', { year: 'numeric', month: 'long', day: 'numeric',})}
                    </p>
                </div>
            </div>
        </div>`;
}

function newsLikesEventView (like) {
    return `<div class="uk-clearfix">
                <div class="col-news-min">
                    <a href="/user/${like.user_id}" class="b-portret-blogger">
                        <img src="${like.img_middle}">
                        <span class="ico ico-news ico-news-hearth uk-icon-justify uk-icon-heart"></span>
                    </a>
                </div>
                <div class="col-news-big">
                    <div class="b-name-redactor">
                        <a href="/user/${like.user_id}">
                            ${like.name}
                        </a>
                        <div class="event-text">
                            оценил фотографию
                        </div>
                        <p class="date-event-text">
                            ${new Date(like.date.date).toLocaleString('ru', { year: 'numeric', month: 'long', day: 'numeric',})}
                        </p>
                    </div>
                </div>
            </div>`;
}

function newsCommentsView (comment) {
    return `<div class="b-comment-wrap uk-clearfix">
                <a href="/user/${comment.user_id}" class="b-photo-comment">
                    <img src="${comment.img_middle}" alt="">
                </a>
                <div class="b-comment">
                    <a href="/user/${comment.user_id}" class="b-name-comment">
                        ${comment.name}
                    </a>
                    <div class="b-text-comment">
                        ${comment.comment}
                    </div>
                    <div class="b-date-comment">
                        ${new Date(comment.date).toLocaleString('ru', { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric',})}   
                    </div>
                </div>
            </div>`;
}

export function uploadMoreNews () {
    let last  = $('.b-person-post').length;
    let user = $('#userId').val();
    let token = $('meta[name=_token]').attr('content');
    $.ajax({
        type: 'POST',
        data: {
            '_token' : token,
            'userId': user,
            'last' : last
        },
        url: '/user/ajaxLoadNews',
        success: function (data) {
            for (let i = 0; i < data.length; ++i) {
                $('.b-personal-news').append(viewPost(data[i]));
                if (data[i]['comments'].length > 0) {
                    //comments
                    for (let j = 0; j < data[i]['comments'].length; ++j) {
                        $(`[data-new-id=${data[i]['id']}]`).find('.insertComment').append(newsCommentsView(data[i]['comments'][j]));
                    }
                }
                if (data[i]['likes'].length > 0) {
                    //likes
                    for (let j = 0; j < data[i]['likes'].length; ++j) {
                        $(`[data-new-id=${data[i]['id']}]`).find('.insertLikes').append(newsLikesEventView(data[i]['likes'][j]));
                    }
                }
                // alert(data[i]['favorites'].length);
                if (data[i]['favorites'].length > 0) {
                    //favorites
                    for (let j = 0; j < data[i]['favorites'].length; ++j) {
                        $(`[data-new-id=${data[i]['id']}]`).find('.insertFavorites').append(newsFavoritesEventView(data[i]['favorites'][j]));
                    }
                }
            }
        }
    })
}