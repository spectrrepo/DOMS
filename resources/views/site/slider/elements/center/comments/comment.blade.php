<div class="btn-all-comments">
    Показать все {{ 1 }} комментари{{ 4 ? 'я':'ев' }}
</div>
@foreach ( $posts->first()->comments as $comment )
    <div class="b-comment-wrap uk-clearfix">
        @if (Auth::check())
            {!! Auth::user()->id === $comment->user_id ? HTML::decode('<span class="remove-comment uk-icon-justify uk-icon-remove"><span class="delete_comment_id" data-id="'.$comment->id.'"></span></span>') : ''!!}
        @endif
        <a href="{{ URL::route('userPage', $comment->user_id) }}" class="b-photo-comment">
            <img src="{{ empty($comment->user->img_middle) ? '/img/user.png' : Storage::url($comment->user->img_middle) }}"/>
        </a>
        <div class="b-comment">
            <a href="{{ URL::route('userPage', $comment->user_id) }}" class="b-name-comment">
                {{ $comment->user->name }}
            </a>
            <div class="b-text-comment">
                {{ $comment->comment }}
            </div>
            <div class="b-date-comment">
                @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
                {{ $article->date->formatLocalized('%d %B %Y г. %H:%M')}}
            </div>
        </div>
    </div>
@endforeach
