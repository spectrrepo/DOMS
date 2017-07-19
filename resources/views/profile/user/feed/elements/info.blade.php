<div class="b-iformation">
    <div class="b-date">
        @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
        {{ $post['dateEvent']->formatLocalized('%d %B %Y г.')}}</div>
    <div class="b-statistics">
        <div class="b-item-stat">
            <span class="ico uk-icon-justify uk-icon-eye"></span>
            <span class="num-stat">{{ $post['numViews'] }}</span>
            <span class="tooltip-stat margin-num-comment-tooltip">
                <span class="text-tooltip-stat">
                    количество просмотров
                </span>
                <span class="triangle-tooltip-stat"></span>
            </span>
        </div>
        <div class="b-item-stat">
            <span class="ico uk-icon-justify uk-icon-heart"></span>
            <span class="num-stat">{{ $post['numLikes'] }}</span>
            <span class="tooltip-stat margin-like-tooltip">
                <span class="text-tooltip-stat">
                    понравилось
                </span>
                <span class="triangle-tooltip-stat"></span>
            </span>
        </div>
        <div class="b-item-stat">
            <span class="ico uk-icon-justify uk-icon-star"></span>
            <span class="num-stat">{{ $post['numFavorites'] }}</span>
            <span class="tooltip-stat margin-liked-tooltip">
                <span class="text-tooltip-stat">
                    избранное
                </span>
                <span class="triangle-tooltip-stat"></span>
            </span>
        </div>
    </div>
</div>