@if (Auth::check())
  <div class="b-add-comment">
    <form class="comment-add-form">
      <input type="text" name="comment" autocomplete="off" class="input-comment" placeholder="Комментировать">
      <input type="hidden" name="post_id" value="{{ $posts[0]->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <button class="submit-comment" type="submit" >
        <span class="uk-icon-justify uk-icon-plus"></span>
      </button>
    </form>
  </div>
@else
  <p>Только зарегистрированные пользователи могут оставить комментарий</p>
@endif