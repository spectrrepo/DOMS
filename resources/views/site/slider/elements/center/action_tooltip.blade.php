<div class="b-item-stat {{ $type }}">
    @if (Auth::check())
      <input type="hidden" name="post_id" value="{{ $posts->first()->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <input type="hidden" name="url-{{ $type }}" value="{{ $colorFavorite ? '/delete_'.$type : '/'.$type }}">
    @endif
    <button class="{{ $colorFavorite ? 'active-favorite': ''}} ico-slider uk-icon-justify uk-icon-{{ $icon }}"></button>
    @if ($type == 'like')
        <span {{ Auth::check() ?  'id=num_liked' : ''}} >{{ $posts->first()->likes->count() }}</span>
    @endif
    <span class="tooltip-stat margin-{{ $margin }}-tooltip">
        <span class="text-tooltip-stat">
          {{ $text }}
          @if ($type == 'like')
              <span id="like-whom-pole">
                  @php $i = 0; @endphp
                  @foreach ($posts->first()->likes as $like)
                      @php if ($i >3) { break;} @endphp
                      <a class="mini-avatar"
                      href="/user/{{ $like->user_id }}"
                      title="{{ $like->user->name }}">
                      <img src="{{ $like->user->img_mini }}"></a>
                      @php $i++; @endphp
                  @endforeach
              </span>
          @endif
        </span>
        <span class="triangle-tooltip-stat"></span>
    </span>
</div>
