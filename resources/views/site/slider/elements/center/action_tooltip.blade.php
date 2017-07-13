<div class="b-item-stat {{ $type }}">
    @if (Auth::check())
        <input type="hidden" name="post_id" value="{{ $posts->first()->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        @if($type === 'like')
            <input type="hidden" name="url-like" value="{{ $colorLike ? '/'.$type.'s/delete' : '/'.$type.'s/add' }}">
        @elseif($type ==='liked')
            <input type="hidden" name="url-liked" value="{{ $colorFavorite ? '/favorites/delete' : '/favorites/add' }}">
        @endif
    @endif
    @if ($type === 'like')
        <button class="{{ $colorLike ? 'active-like': ''}} ico-slider uk-icon-justify uk-icon-{{ $icon }}"></button>
    @endif
    @if ($type === 'liked')
        <button class="{{ $colorFavorite ? 'active-favorite': ''}} ico-slider uk-icon-justify uk-icon-{{ $icon }}"></button>
    @endif
    @if ($type == 'like')
        <span {{ Auth::check() ?  'id=num_liked' : ''}} >{{ $posts->first()->likes->count() }}</span>
    @endif
    <div class="tooltip-stat margin-{{ $margin }}-tooltip">
        <div class="text-tooltip-stat">
            {{ $text }}
            @if ($type == 'like')
                <div id="like-whom-pole">
                    @php $i = 0; @endphp
                    @foreach ($posts->first()->likes as $like)
                        @php if ($i >3) { return;} @endphp
                        <a class="mini-avatar" href="/user/{{ $like->user_id }}" title="{{ $like->user->name }}">
                            <img src="{{ Storage::url($like->user->img_mini) }}">
                        </a>
                        @php $i++; @endphp
                    @endforeach
                </div>
            @endif
        </div>
        <span class="triangle-tooltip-stat"></span>
    </div>
</div>
