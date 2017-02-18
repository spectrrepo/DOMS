<div id="views" class="title-tag margin-title-tag" {{ $views->count() >= 1 ? '': 'style=display:none;' }}>
  Ракурсы
</div>
<div id="views-pole" class="view-photo-slide" {{ $views->count() >= 1 ? '': 'style=display:none;' }}>
  <div class="b-change-photo">
   @foreach ($views as $view)
     @if ($views[0] == $view)
        <div class="item-view-min active-view-min">
          <img src="{{ $view->path_min }}" alt="" />
        </div>
     @else
        <div class="item-view-min right-view-min">
          <img src="{{ $view->path_min }}" alt="" />
        </div>
     @endif
   @endforeach
  </div>
    <span class="min-nav-views prev-min-nav-views" data-direction="prev"></span>
    <span class="min-nav-views next-min-nav-views" data-direction="next"></span>
</div>
