@if (($count >= 3)&&($comment_last_id != ''))
  <div class="btn-all-comments">
    Показать все {{ $count+1 }} комментари{{ $count+1==4 ? 'я':'ев' }}
  </div>
@endif
@foreach ( $comments as $comment )
  <div class="b-comment-wrap" {{ ($k<=$count-3)&&($count>=3) ? 'style=display:none' : '' }}>
      <?php $k++; ?>
    @if (Auth::check())
      {!! Auth::user()->id === $comment->user_id ? HTML::decode('<span class="remove-comment uk-icon-justify uk-icon-remove"><span class="delete_comment_id" data-id="'.$comment->id.'"></span></span>') : ''!!}
    @endif
    <a href="{{ URL::to('profile/'.$comment->user_id) }}" class="b-photo-comment">
      <img src="{{ empty($comment->user_quadro_ava) ? '/img/user.png' : $comment->user_quadro_ava }}" alt="" />
    </a>
    <div class="b-comment">
      <a href="{{ URL::to('profile/'.$comment->user_name) }}" class="b-name-comment">
        {{ $comment->user_name }}
      </a>
      <div class="b-text-comment">
        {{ $comment->text_comment }}
      </div>
      <div class="b-date-comment">
        {{ $comment->rus_date }}
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <?php $i++; ?>
  @endforeach
  </div>
  <div class="clear"></div>
  </div>