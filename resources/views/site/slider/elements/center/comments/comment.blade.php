@if (count($posts->first()->comments) > 3)
    <div class="btn-all-comments-news" id="postCommentUpload">Показать все {{ count($posts->first()->comments) }}
        @if (count($posts->first()->comments) % 10 === 1 && count($posts->first()->comments) !== 11)
            комментарий
        @endif
        @if (((count($posts->first()->comments) % 10) > 1 ||
             (count($posts->first()->comments) % 10) < 5) &&
             (count($posts->first()->comments) % 10 !== 12) &&
             (count($posts->first()->comments) % 10 !== 13) &&
             (count($posts->first()->comments) % 10 !== 14))
            комментария
        @endif
        @if ((count($posts->first()->comments) % 10) === 0 ||
             (count($posts->first()->comments) % 10) >= 5 ||
             (count($posts->first()->comments) % 10) <= 9)
            комментариев
        @endif
    </div>
@endif
@foreach ( $posts->first()->comments->reverse()->take(3)->reverse() as $comment )
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
