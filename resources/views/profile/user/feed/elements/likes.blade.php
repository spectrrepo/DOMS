@if (count($post['likes']->toArray()) !== 0)
        <div class="uk-clearfix">
            <div class="col-news-min">
                <a href="{{ URL::route('userPage', ['id' => $post['likes'][0]['user_id']]) }}" class="b-portret-blogger">
                    <img src="{{ $post['likes'][0]['img_middle'] }}"/>
                    <span class="ico ico-news ico-news-hearth uk-icon-justify uk-icon-heart"></span>
                </a>
            </div>
            <div class="col-news-big">
                <div class="b-name-redactor">
                    <a href="{{ URL::route('userPage', ['id' => $post['likes']->first()['user_id']])  }}">
                        {{ $post['likes'][0]['name'] }}
                    </a>
                    <div class="event-text">
                        @if($post['likes']->first()['sex'] === 'man')
                            оценил фотографию
                        @endif
                        @if($post['likes']->first()['sex'] === 'woman')
                            оценила фотографию
                        @endif
                        @if( count($post['likes']) > 1)
                            и ещё {{ count($post['likes']) }} человек оценилии фотографию
                        @endif
                        @if(count($post['likes']) > 1)
                            @foreach($post['likes']->toArray() as $like )
                                <a href=" {{ URL::route('userPage', ['id' => $like['user_id']])}}" style="display:inline-block;width:50px;">
                                    <img src="" alt="" />
                                </a>
                            @endforeach
                        @endif
                    </div>
                    @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
                    <p class="date-event-text">
                        {{ $post['likes'][0]['date']->formatLocalized('%d %B %Y г.') }}
                    </p>
                </div>
            </div>
        </div>
@endif