import { URL_DEL_COM,
         URL_ADD_COM,
         URL_DWNLD_COM } from '../../lib/constant';
import { photoID,
         csrftoken,
         user_id,
         authID } from '../../lib/functions';
/**
* Класс комментарий для фотографий
* @class Comment
* @extends
*/
export class Comment {

    /**
  * Класс комментарий для фотографий
  * @constructor Comment
  * @param
  */
    constructor() {}

    newCommentValue() {
        $('.input-comment').val();
    }

    commentId() {
        $(this).children('.delete_comment_id').data('id');
    }

    /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
    deleteBTN(id) {
        return `<span class="remove-comment uk-icon-justify uk-icon-remove">
          <span class="delete_comment_id" data-id="${id}"></span>
        </span>`;
    }

    /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
    getAllComments () {
        $.ajax({
          type:'POST',
          data: {
                '_token'  : csrftoken,
                'comment' : comment,
                'post_id' : post_id,
                'user_id' : user_id
          },
          url: ADD_COM,

          success: function (data) {

          }
       });
    }

    getLastComment () {

    }

    addLastComment () {

    }

    render(array) {
        HTML(profile, user_quadro_ava, user_name, text_comment, rus_date).appendTo();
    }

    /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
    destroy() {
        $.ajax({
            type: 'POST',
            data: {
                '_token': csrftoken,
                'delete_comment_id': id
            },
            url: DEL_COM,
            success: function() {
                $(this).parent('.b-comment-wrap').remove();
            }
        });
    }

    /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
    HTML(user_id, user_quadro_ava, user_name, text_comment, rus_date) {
        return `<div class="b-comment-wrap">
                    ${authId === authorId ? deleteBTN(id) : ''}
                    <a href="profile/${user_id}" class="b-photo-comment">
                      <img src="${user_quadro_ava}"/>
                    </a>
                    <div class="b-comment">
                      <a href="profile/'${user_id}'" class="b-name-comment">
                        ${user_name}
                      </a>
                      <div class="b-text-comment">
                        ${text_comment}
                      </div>
                      <div class="b-date-comment">
                        ${rus_date}
                      </div>
                    </div>
                    <div class="clear"></div>
                </div>`;
    }

}
