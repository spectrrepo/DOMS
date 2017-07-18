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