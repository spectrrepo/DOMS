import { viewComment } from './tpl';
/**
 *
 * @returns {boolean}
 */
export function commentAdd () {
    let comment = $('.input-comment').val();
    let postId = $('input[name=post_id]').val();
    let csrf = $('input[name=csrf]').val();
    let currentUserId = $('meta[name=authID]').attr('content');
    $.ajax({
        type:'POST',
        data: {
            '_token'  : csrf,
            'comment' : comment,
            'post_id' : postId
        },
        url: '/comments/add',
        success: function (data) {
            $(viewComment(data, currentUserId)).appendTo('#insertComment');
            $('.input-comment').val('');
            $(`span[data-id=${data.id}]`).parent().on('click', deleteComment);
        }
    });

    return false;
}

/**
 * @function deleteComment
 */
export function deleteComment() {
    let id = $(this).children('.delete_comment_id').data('id');

    $.ajax({
        type:'GET',
        url: '/comments/delete/'+id,
    });

    $(this).closest('.b-comment-wrap').remove();
}

/**
 * @function getAllComments
 */
export function getAllComments() {
    let csrf = $('input[name=csrf]').val();
    let postId = $('input[name=post_id]').val();
    let currentUserId = $('meta[name=authID]').attr('content');

    $.ajax({
        type:'POST',
        data: {
            '_token'  : csrf,
            'id' : postId
        },
        url: '/comments/allCommentsLoad',
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                $(viewComment(data, currentUserId)).prependTo('#insertComment');
            }
        }
    });

    $(this).remove();
}

/**
 * @function getAllCommentsForNews
 */
export function getAllCommentsForNews() {
    let csrf = $('input[name=csrf]').val();
    let postId = $(this).children('input[name=post_id]').val();
    let context = $(this).next().children('#insertComment');
    $.ajax({
        type:'POST',
        data: {
            '_token'  : csrf,
            'id' : postId
        },
        url: '/comments/allCommentsLoad',
        context: context,
        success: function (data) {
            for (let i = 0; i < data.length; i++) {
                $(this).prepend(viewComment(data));
            }
        }
    });

    $(this).remove();
}
