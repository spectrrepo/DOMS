@if (count($post['favorites']) !== 0)
    <div class="uk-clearfix">
        <div class="col-news-min">
            <a href="{{ URL::route('userPage', ['id' => $post['favorites'][0]['user_id']]) }}" class="b-portret-blogger">
                <img src="{{ Storage::url($post['img_mini']) }}"/>
                <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
            </a>
        </div>
        <div class="col-news-big">
            <div class="b-name-redactor">
                <a href="{{ URL::route('userPage', ['id' => $favorite['user_id']])  }}"></a>
                <div class="event-text">
                    @if($favorite['sex'] === 'man')
                        добавил фотографию в избранное
                    @endif
                    @if($favorite['sex'] === 'woman')
                        добавила фотографию в избранное
                    @endif
                    @if( count($post['favorites']) > 1)
                        и ещё {{ count($post['favorites']) }} человек добавили фотографию в избранное
                    @endif
                    @foreach($post['favorites'] as $favorite)
                        <a href="{{ URL::route('userPage', ['id' => $favorite['user_id']]) }}" style="display:inline-block;width:50px;">
                            <img src="" alt="" />
                        </a>
                    @endforeach
                </div>
                <p class="date-event-text">
                    @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
                    {{ $favorite->date->formatLocalized('%d %B %Y г. %H:%M')}}
                </p>
            </div>
        </div>
    </div>
@endif
{{--TODO: хз что, но нужно что-то доделать--}}