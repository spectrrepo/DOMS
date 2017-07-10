@extends('profile.layout')
@section('profile-content')
    @include('profile.elements.info_user')
    <div class="separate-title">
        Лента
    </div>
    <div class="wrap-personal-news">
        <div class="b-setting-switcher">
            <ul class="switcher">
                <li class="item-swicher{{ substr_count(URL::current(), '/profile/') ? ' item-switcher-active': ' none' }}"><a href="{{ URL::to('/profile/'.Auth::id()) }}">Обновления</a></li>
                <li class="item-swicher{{ substr_count(URL::current(), '/your_photo') ? ' item-switcher-active': ' none' }}"><a href="{{ URL::to('/profile/'.Auth::id().'/your_photo') }}">Фотографии</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="b-personal-news">
                <div class="b-person-post">
                    <div class="col-news-min">
                        <a href="" class="b-portret-blogger">
                            <img src=""/>
                        </a>
                    </div>
                    <div class="col-news-big">
                        <div class="b-name-redactor">
                            <a href=""></a>
                        </div>
                        <div class="b-post-body">
                            <a href="/photo/id=" class="b-photo-post">
                                <img src="" class="img-post" alt="" />
                            </a>
                            <div class="b-iformation">
                                <div class="b-date">
                                </div>
                                <div class="b-statistics">
                                    <div class="b-item-stat">
                                        <span class="ico uk-icon-justify uk-icon-eye"></span>
                                        <span class="num-stat"></span>
                                        <span class="tooltip-stat margin-num-comment-tooltip">
                                            <span class="text-tooltip-stat">
                                              количество просмотров
                                            </span>
                                            <span class="triangle-tooltip-stat"></span>
                                        </span>
                                    </div>
                                    <div class="b-item-stat">
                                        <span class="ico uk-icon-justify uk-icon-heart"></span>
                                        <span class="num-stat"></span>
                                        <span class="tooltip-stat margin-like-tooltip">
                                        <span class="text-tooltip-stat">
                                          понравилось
                                        </span>
                                        <span class="triangle-tooltip-stat"></span>
                                      </span>
                                    </div>
                                    <div class="b-item-stat">
                                        <span class="ico uk-icon-justify uk-icon-star"></span>
                                        <span class="num-stat"></span>
                                        <span class="tooltip-stat margin-liked-tooltip">
                                        <span class="text-tooltip-stat">
                                        избранное
                                        </span>
                                        <span class="triangle-tooltip-stat"></span>
                                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                            <div class="btn-all-comments-news">Показать все</div>
                        <div id="rubberSquare">
                                    <div class="b-comment-wrap">
                                        <a href="" class="b-photo-comment">
                                            <img src="" alt="">
                                        </a>
                                        <div class="b-comment">
                                            <a href="" class="b-name-comment"></a>
                                            <div class="b-text-comment">
                                            </div>
                                            <div class="b-date-comment">
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                        </div>
                    </div>
                            <div class="">
                                <div class="col-news-min">
                                    <a href="" class="b-portret-blogger">
                                        <img src=""/>
                                        <span class="ico ico-news ico-news-hearth uk-icon-justify uk-icon-heart"></span>
                                    </a>
                                </div>
                                <div class="col-news-big">
                                    <div class="b-name-redactor">
                                        <a href="">
                                        </a>
                                        <span class="event-text">
                                                <div class="clear"></div>
                                                        <a href="" style="display:inline-block;width:50px;">
                          <img src="" alt="" />
                        </a>
                </span>
                                        <p class="date-event-text">
                                        </p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="">
                                <div class="col-news-min">
                                    <a href="" class="b-portret-blogger">
                                        <img src=""/>
                                        <span class="ico ico-news ico-news-star uk-icon-justify uk-icon-star"></span>
                                    </a>
                                </div>
                                <div class="col-news-big">
                                    <div class="b-name-redactor">
                                        <a href="">
                                        </a>
                                        <span class="event-text">
                                                добавил фотографию в избранное
                                                добавила фотографию в избранное
                                                    и ещё человек добавили фотографию в избранное
                                                    и ещё человек добавили фотографию в избранное
                                                <div class="clear"></div>
                                                        <a href="" style="display:inline-block;width:50px;">
                            <img src="" alt="" />
                          </a>
                  </span>
                                        <p class="date-event-text">
                                        </p>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                    <div class="clear"></div>
                </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="btn-dwnld-new">
        Загрузить ещё
    </div>
@endsection
