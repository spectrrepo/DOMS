<div class="b-item-stat {{ $type }}">
    @if (Auth::check())
      <input type="hidden" name="post_id" value="{{ $posts[0]->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      {{--<input type="hidden" name="url-{{ $type }}" value="{{ $colorLiked ? '/delete_'.$type : '/'.$type }}">--}}
    @endif
    {{--<button class="{{ $colorLiked ? 'active-favorite': ''}} ico-slider uk-icon-justify uk-icon-{{ $icon }}"></button>--}}
    @if ($type == 'like')
        {{--<span {{ Auth::check() ?  'id=num_liked' : ''}} >{{ $num_like }}</span>--}}
    @endif
    <span class="tooltip-stat margin-{{ $margin }}-tooltip">
        <span class="text-tooltip-stat">
          {{ $text }}
          {{--@if ($type == 'like')--}}
              {{--<span id="like-whom-pole">--}}
                  {{--@php $i = 0; @endphp--}}
                  {{--@foreach ($likeWhom as $like)--}}
                      {{--@php if ($i >3) { break;} @endphp--}}
                      {{--<a class="mini-avatar"--}}
                      {{--href="/user/{{ $like[0]['user_id'] }}"--}}
                      {{--title="{{ $like[0]['name'] }}">--}}
                      {{--<img src="{{ $like[0]['portret'] }}"></a>--}}
                      {{--@php $i++; @endphp--}}
                  {{--@endforeach--}}
              {{--</span>--}}
          {{--@endif--}}
        </span>
        <span class="triangle-tooltip-stat"></span>
    </span>
</div>
