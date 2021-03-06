@if (count($post['favorites']->toArray()) !== 0)
    <div class="uk-clearfix">
        <div class="col-news-min">
            <a href="{{ URL::route('userPage', ['id' => $post['favorites'][0]['user_id']]) }}" class="b-portret-blogger">
                <img src="{{ $post['favorites'][0]['img_middle'] }}"/>
                <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
            </a>
        </div>
        <div class="col-news-big">
            <div class="b-name-redactor">
                <a href="{{ URL::route('userPage', ['id' => $post['favorites'][0]['user_id']])  }}">
                    {{ $post['favorites'][0]['name'] }}
                </a>
                <div class="event-text">
                    @if($post['favorites'][0]['sex'] === 'man')
                        добавил фотографию в избранное
                    @endif
                    @if($post['favorites'][0]['sex'] === 'woman')
                        добавила фотографию в избранное
                    @endif
                    @if( count($post['favorites']) > 1)
                        и ещё {{ count($post['favorites']) }} человек добавили фотографию в избранное
                    @endif
                    @if(count($post['favorites']) > 1)
                        @foreach($post['favorites'] as $favorite)
                            <a href="{{ URL::route('userPage', ['id' => $favorite['user_id']]) }}" style="display:inline-block;width:50px;">
                                <img src="" alt="" />
                            </a>
                        @endforeach
                    @endif
                </div>
                <p class="date-event-text">
                    @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
                    {{ $post['favorites'][0]['date']->formatLocalized('%d %B %Y г.')}}
                </p>
            </div>
        </div>
    </div>
@endif
