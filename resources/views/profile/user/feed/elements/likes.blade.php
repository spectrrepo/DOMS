@if (count($post['likes']) !== 0)
        <div class="uk-clearfix">
            <div class="col-news-min">
                <a href="{{ URL::route('userPage', ['id' => $post['likes'][0]['user_id']]) }}" class="b-portret-blogger">
                    <img src="{{ Storage::url($post['img_mini']) }}"/>
                    <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
                </a>
            </div>
            <div class="col-news-big">
                <div class="b-name-redactor">
                    <a href="{{ URL::route('userPage', ['id' => $favorite['user_id']])  }}"></a>
                    <div class="event-text">
                        @if($like['sex'] === 'man')
                            оценил фотографию
                        @endif
                        @if($like['sex'] === 'woman')
                            оценила фотографию
                        @endif
                        @if( count($post['favorites']) > 1)
                            и ещё {{ count($post['likes']) }} человек оценилии фотографию
                        @endif
                        @foreach($post['likes'] as $like )
                            <a href=" {{ URL::route('userPage', ['id' => $favorite['user_id']])}}" style="display:inline-block;width:50px;">
                                <img src="" alt="" />
                            </a>
                        @endforeach
                    </div>
                    @php setlocale(LC_ALL, 'ru_RU.utf8') @endphp
                    <p class="date-event-text"></p>
                </div>
            </div>
        </div>
@endif

{{--TODO: хз что, но нужно что-то доделать--}}