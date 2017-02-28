/**
* Класс комментарий для фотографий
* @class Comment
* @extends
*/
export default class Comment{

  /**
  * Класс комментарий для фотографий
  * @constructor Comment
  * @param
  */
  constructor () {

  }

  newCommentValue () {
    $('.input-comment').val(),
  }

  commentId () {
    $(this).children('.delete_comment_id').data('id'),
  }

  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  // for (variable of iterable) {
  //
  // }
  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  deleteBTN () {
    `<span class="remove-comment uk-icon-justify uk-icon-remove">
      <span class="delete_comment_id" data-id="${id}"></span>
     </span>`
  }

  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  comment () {
    // delete ;
    return ;
  }
  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
 //  $.ajax({
 //    type:'POST',
 //    data: {
 // token : $('meta[name=_token]').attr('content');
 //          '_token'  : csrftoken,
 //          'comment' : comment,
 //          'post_id' : post_id,
 //          'user_id' : user_id
 //    },
 //    url: ADD_COM,
 //
 //    success: function (data) {
 //      $('.input-comment').val('');
 //      if (data[0].user_quadro_ava === null) {
 //
 //      }else {
 //
 //      }
 //
 //    }
 // });
  render (array) {
    HTML(profile, user_quadro_ava, user_name, text_comment, rus_date).appendTo();
  }

  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  destroy () {
    $.ajax({
        type:'POST',
        data: {
             '_token'  : csrftoken,
             'delete_comment_id' : id,
        },
        url: DEL_COM
    });
    $(this).parent('.b-comment-wrap').remove();
  }

  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  write () {

  }

  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  HTML(user_id, user_quadro_ava, user_name, text_comment, rus_date) {
    return
      $(`<a href="profile/${user_id}" class="b-photo-comment">
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
         <div class="clear"></div>`);
  }

}


//               count = data.length;
//               if ((count > 3) && (comment_last_id != '')) {
//                   if (count + 1 === 4) {
//                       ending = 'я';
//                   } else {
//                       ending = 'ев';
//                   }
//                   btnTwo = '<div class="btn-all-comments">Показать все ' + count + ' комментари' + ending + '</div>';
//               } else {
//                   btnTwo = '';
//               }
//               $(btnTwo).appendTo('.b-all-comment');
//
//                   if ((i <= count - 3) && (count > 3)) {
//                       style = 'style="display:none"';
//                   } else {
//                       style = '';
//                   }
