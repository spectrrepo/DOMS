@if (count($post['comments']) > 3)
    <div class="btn-all-comments-news">Показать все {{ count($post['comments']) }}
        @if (count($post['comments']) % 10 === 1 && count($post['comments']) !== 11)
            комментарий
        @endif
        @if (((count($post['comments']) % 10) > 1 ||
             (count($post['comments']) % 10) < 5) &&
             (count($post['comments']) % 10 !== 12) &&
             (count($post['comments']) % 10 !== 13) &&
             (count($post['comments']) % 10 !== 14))
            комментария
        @endif
        @if ((count($post['comments']) % 10) === 0 || (count($post['comments']) % 10) >= 5 || (count($post['comments']) % 10) <= 9)
            комментариев
        @endif
    </div>
@endif
<div id="rubberSquare uk-clearfix">
    @foreach ( $post['comments'] as $comment)
        <div class="b-comment-wrap uk-clearfix">
            <a href="{{ $comment->id }}" class="b-photo-comment">
                <img src="{{ Storage::url($comment->img_mini) }}" alt="">
            </a>
            <div class="b-comment">
                <a href="" class="b-name-comment">
                    {{ $comment->name }}
                </a>
                <div class="b-text-comment">
                    {{ $comment->comment }}
                </div>
                <div class="b-date-comment">
                    @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
                    {{ $comment->date->formatLocalized('%d %B %Y г. %H:%M')}}
                </div>
            </div>
        </div>
    @endforeach
</div>