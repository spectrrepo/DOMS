/**
* Класс комментарий для фотографий
* @class Comment
* @extends
*/
export default class Comment{
  comment = $('.input-comment').val(),
  post_id = $('input[name=post_id]').val(),
  user_id = $('input[name=user_id]').val();
  id = $(this).children('.delete_comment_id').data('id'),
  token : $('meta[name=_token]').attr('content');
  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  URL:
  for (variable of iterable) {

  }
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
  * @constructor Comment
  * @param
  */
  constructor () {

  }
  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  get comment () {
    delete ;
    return ;
  }
  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  set comment () {

  }
  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  * render() {
    var index = 0;
    while(true)
      yield index++;
  }
  /**
  * Класс комментарий для фотографий
  * @method Comment
  * @param
  * @return
  */
  $.ajax({
    type:'POST',
    data: {
          '_token'  : csrftoken,
          'comment' : comment,
          'post_id' : post_id,
          'user_id' : user_id
    },
    url:'/comment',

    success: function (data) {
      $('.input-comment').val('');
      if (data[0].user_quadro_ava === null) {

      }else {

      }

    }
 });
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
        url: '/delete_comment'
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
  update () {

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
var id = $('.active-slide').data('id'),
      authID = $('meta[name=authID]').attr('content'),
      csrftoken = $('meta[name=_token]').attr('content');
      url: '/load_comments',

      success: function(data) {
          var btn, quadro_ava, style, comment_last_id, count;
          $('.btn-all-comments').remove();
          if (data.length == 0) {
              $('.b-all-comment').empty();
          } else {
              $('.b-all-comment').empty();
              $('<div></div>').appendTo('.b-all-comment');
              count = data.length;
              if ((count > 3) && (comment_last_id != '')) {
                  if (count + 1 === 4) {
                      ending = 'я';
                  } else {
                      ending = 'ев';
                  }
                  btnTwo = '<div class="btn-all-comments">Показать все ' + count + ' комментари' + ending + '</div>';
              } else {
                  btnTwo = '';
              }
              $(btnTwo).appendTo('.b-all-comment');

              for (var i = 0; i < data.length; i++) {
                  comment_last_id = data.id;
                  if (parseInt(authID) === parseInt(data[i].user_id)) {
                      btn = '<span class="remove-comment uk-icon-justify ' +
                          'uk-icon-remove"><span class="delete_comment_id" ' +
                          'data-id="' + data[i].id + '"></span></span>';
                  } else {
                      btn = '';
                  }
                  if (data[i].user_quadro_ava !== null) {
                      quadro_ava = data[i].user_quadro_ava;
                  } else {
                      quadro_ava = '/img/user.png';
                  }

                  if ((i <= count - 3) && (count > 3)) {
                      style = 'style="display:none"';
                  } else {
                      style = '';
                  }
                  $('<div class="b-comment-wrap" ' + style + '>' + btn +
                      '<a href="/profile/' + data[i].user_id +
                      '" class="b-photo-comment">' +
                      '<img src="' + quadro_ava + '"></a>' +
                      '<div class="b-comment">' +
                      '<a href="/profile/' + data[i].user_id + '" class="b-name-comment" ' +
                      ' >' +
                      data[i].user_name +
                      '</a><div class="b-text-comment">' +
                      data[i].text_comment +
                      '</div><div class="b-date-comment">' +
                      data[i].rus_date +
                      '</div></div><div class="clear"></div></div>').appendTo('.b-all-comment');
              }
              $('<div class="clear"></div>').appendTo('.b-all-comment');
              loadAllPhoto('.btn-all-comments');
          }
      }
  });
