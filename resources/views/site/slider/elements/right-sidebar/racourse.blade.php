@include('site.slider.elements.right-sidebar.elements.header', ['name' => 'Ракурсы'])
<div id="views-pole" class="view-photo-slide" {{ empty($posts->first()->view)  ? 'style=display:none;': '' }}>
    <div class="b-change-photo">
        @foreach ($posts->first()->view as $view)
        @if ($posts->first()->view->first() == $view)
            <div class="item-view-min active-view-min">
                <img src="{{ $view->img_middle }}" alt="" />
            </div>
        @else
            <div class="item-view-min right-view-min">
                <img src="{{ $view->img_middle }}" alt="" />
            </div>
        @endif
        @endforeach
    </div>
    <span class="min-nav-views prev-min-nav-views" data-direction="prev"></span>
    <span class="min-nav-views next-min-nav-views" data-direction="next"></span>
</div>
