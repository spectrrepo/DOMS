<div class="b-item-stat {{ $type }}">
    @if (Auth::check())
      <input type="hidden" name="post_id" value="{{ $image->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <input type="hidden" name="url-{{ $type }}" value="{{ $colorLiked ? '/delete_{{ $type }}' : '/{{ $type }}' }}">
    @endif
    <button class="{{ $colorLiked ? 'active-favorite': ''}} ico-slider uk-icon-justify uk-icon-{{ $icon }}"></button>
    <span class="tooltip-stat margin-{{ $margin }}-tooltip">
        <span class="text-tooltip-stat">
          {{ $text }}
        </span>
        <span class="triangle-tooltip-stat"></span>
    </span>
</div>

@include('site.slider_components.tags', ['type' => 'liked', 'icon' => 'star', 'margin' => 'liked', 'text' => 'избранное', 'active' => 'favorite'])
@include('site.slider_components.tags', ['type' => 'like', 'icon' => 'heart', 'margin' => 'like', 'text' => 'понравилось', 'active' => 'like'])

{{ Auth::check() ?  'id=num_liked' : ''}}

<span id="like-whom-pole">
   ?php $i = 0; ?>
  @foreach ($likeWhom as $like)
     ?php if ($i >3) { break;}?>
        <a class="mini-avatar"
        href="/user/{{ $like[0]['user_id'] }}"
        title="{{ $like[0]['name'] }}">
        <img src="{{ $like[0]['portret'] }}"></a>
     ?php $i++;?>
  @endforeach
</span>
