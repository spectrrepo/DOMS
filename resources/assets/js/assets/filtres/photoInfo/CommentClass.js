import defaultMember from "module-name";

/**
* Класс комментарий для фотографий
* @class Comment
*/
export class Comment extends Struct{
  comment = $('.input-comment').val(),
  post_id = $('input[name=post_id]').val(),
  user_id = $('input[name=user_id]').val();
  id = $(this).children('.delete_comment_id').data('id'),
  token : $('meta[name=_token]').attr('content');
  img;
  id;
  user_name;
  text_comment;
  rus_date;
  for (variable of iterable) {

  }
  deleteBTN () {
    '<span class="remove-comment uk-icon-justify uk-icon-remove">'+
    '<span class="delete_comment_id" data-id="'+data[0].id+'"></span>'+
    '</span>'+
  }
  constructor () {

  }
  get comment () {
    delete ;
    return ;
  }
  set comment () {

  }
  * render() {
    var index = 0;
    while(true)
      yield index++;
  }
  render () {
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
  }
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
  write () {

  }
  update () {

  }
  HTML() {
    '<a href="'profile/'.user_id" class="b-photo-comment">'
         '<img src="" alt="" />'
      '</a>'
      '<div class="b-comment">'
        '<a href="profile/.user_id" class="b-name-comment">'
           user_name
        '</a>'
        '<div class="b-text-comment">'
           text_comment
        '</div>'
        '<div class="b-date-comment">'
           rus_date
        '</div>'
      '</div>'
      '<div class="clear"></div>';
  }
}
