/**
 * @function photoID - возвращает id текущей фотографии
 * @return integer
 */
export let photoID = photoID => $('.active-slide').data('id');

/**
 * @function csrftoken - возвращает текущий токен приложения
 * @return string
 */
export let csrftoken = csrftoken => $('meta[name=_token]').attr('content');

/**
 * @function user_id - возвращает id пользователя
 * @return string
 */
export let user_id = user_id => $('input[name=user_id]').val();

/**
 * @function authID - хз чем отличается от id
 * @return {[type]} [description]
 */
export let authID = authID => $('meta[name=authID]').attr('content');
