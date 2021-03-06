@if (count($post["comments"]) > 3)
    <div class="btn-all-comments-news news-upload-comments">Показать все {{ ($post['numComments']) }}
        @if ($post['numComments'] % 10 === 1 && $post['numComments'] !== 11)
            комментарий
        @endif
        @if (($post['numComments'] % 10) > 1 &&
             ($post['numComments'] % 10) < 5 &&
             ($post['numComments'] !== 12) &&
             ($post['numComments'] !== 13) &&
             ($post['numComments'] !== 14))
            комментария
        @endif
        @if (($post['numComments'] % 10) === 0 ||
              ($post['numComments'] % 10) >= 5 &&
              ($post['numComments'] % 10) <= 9)
            комментариев
        @endif
        <input type="hidden" name="csrf" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value="{{ $post['id'] }}">
    </div>
@endif
<div id="rubberSquare" class="uk-clearfix">
    <div id="insertComment">
        @foreach ( $post['comments'] as $comment)
            <div class="b-comment-wrap uk-clearfix">
                <a href="{{ $comment['id'] }}" class="b-photo-comment">
                    <img src="{{ $comment['img_middle'] }}" alt="">
                </a>
                <div class="b-comment">
                    <a href="" class="b-name-comment">
                        {{ $comment['name'] }}
                    </a>
                    <div class="b-text-comment">
                        {{ $comment['comment'] }}
                    </div>
                    <div class="b-date-comment">
                        @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp

                        <script> var d = document.getElementsByClassName('.b-date-comment');
                        var a = new Date('{!!  $comment['date'] !!}')
                            .toLocaleString('ru', { year: 'numeric', month: 'long', day: 'numeric'});
                        d[0].innerHTML(a) </script>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>