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
    `<div class="b-person-post uk-clearfix">
        <div class="col-news-min">
            <a href="${post.idAuthor}" class="b-portret-blogger">
                <img src="${post.avaAuthor}">
            </a>
        </div>
        <div class="col-news-big">
            <div class="b-name-redactor">
                <a href="${post.idAuthor}">Георгий</a>
            </div>
            <div class="b-post-body">
                <a href="${post.id}" class="b-photo-post">
                    <img src="${post.image}" class="img-post" alt="">
                </a>
                <div class="b-iformation">
                    <div class="b-date">
                        ${post.date}
                    </div>
                    <div class="b-statistics">
                       ${newsViewsView(post.numViews)} 
                       ${newsLikesView(post.numLikes)} 
                       ${newsFavoritesView(post.numFavorites)}
                    </div>
                </div> 
            </div>
            <div id="rubberSquare" class="uk-clearfix">
                <div id="insertComment"></div>
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
                <a href="http://localhost:8000/user/2" class="b-portret-blogger">
                    <img src="/storage/user/mini/2a/53/2a538e54b334127eb35f9bac586d0fbd.jpg">
                    <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
                </a>
            </div>
            <div class="col-news-big">
                <div class="b-name-redactor">
                    <a href="http://localhost:8000/user/2">
                        Георгий
                    </a>
                    <div class="event-text">
                        добавил фотографию в избранное
                    </div>
                    <p class="date-event-text">
                        19 Июль 2017 г.
                    </p>
                </div>
            </div>
        </div>`;
}

function newsLikesEventView (like) {
    return `<div class="uk-clearfix">
                <div class="col-news-min">
                    <a href="${like.user_link}" class="b-portret-blogger">
                        <img src="${like.user_name}">
                        <span class="ico ico-news ico-news-hearth uk-icon-justify uk-icon-heart"></span>
                    </a>
                </div>
                <div class="col-news-big">
                    <div class="b-name-redactor">
                        <a href="http://localhost:8000/user/2">
                            ${like.user_name}
                        </a>
                        <div class="event-text">
                            оценил фотографию
                        </div>
                        <p class="date-event-text">
                            ${like.date}
                        </p>
                    </div>
                </div>
            </div>`;
}

function newsCommentsView (comment) {
    return `<div class="b-comment-wrap uk-clearfix">
                <a href="${like.user_link}" class="b-photo-comment">
                    <img src="${comment.user_img}" alt="">
                </a>
                <div class="b-comment">
                    <a href="" class="b-name-comment">
                        ${comment.user_name}
                    </a>
                    <div class="b-text-comment">
                        ${comment.text}
                    </div>
                    <div class="b-date-comment">
                        ${comment.date} 
                    </div>
                </div>
            </div>`;
}

export function uploadMoreNews () {
    let last  = '';
    let currentUser = '';
    $.ajax({
        url:s,
        type: POST,
        url: url,
        success: function (data) {
            for (let i = 0; i < data.length; ++i) {
                $().appendTo(viewPost(data[i]));
                if (data['comments'].length !== 0) {
                    //comments
                    for (let i = 0; i < data['comments'].length; ++i) {
                        $().appendTo(newsCommentsView(data['comments'][i]));
                    }
                }
                if (data['likes'].length !== 0) {
                    //likes
                    for (let i = 0; i < data['likes'].length; ++i) {
                        $().appendTo(newsLikesEventView(data['likes'][i]));
                    }
                }
                if (data['favorites'].length !== 0) {
                    //favorites
                    for (let i = 0; i < data['favorites'].length; ++i) {
                        $().appendTo(newsFavoritesEventView(data['favorites'][i]));
                    }
                }
            }
        }
    })
}