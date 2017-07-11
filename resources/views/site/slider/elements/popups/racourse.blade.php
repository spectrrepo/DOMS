<div id="modalViewsZoom" class="zoom-slider-views">
    <span class="close uk-icon-justify uk-icon-remove white-close" id="close-modal-views"></span>
      <div class="views-zoom-space">
        <ul class="views-zoom-list">
            @foreach ($views as $view)
                @if ($views[0] == $view)
                  <li class="item-views-zoom active-slide-zoom-views">
                    <img class="img-views-zoom" src="{{ Storage::url($view->img_large) }}">
                  </li>
                @else
                  <li class="item-views-zoom right-slide-zoom-views">
                    <img class="img-views-zoom" src="{{ Storage::url($view->img_large) }}">
                  </li>
                @endif
            @endforeach
         </ul>
        <span class="nav-zoom-views nav-left-zoom-views" data-direction="prev"></span>
        <span class="nav-zoom-views nav-right-zoom-views" data-direction="next"></span>
      </div>
      <ul class="images-navigator">
          @foreach ($views as $view)
              @if ($views[0] == $view)
                  <li class="nav-cicle active-cicle"></li>
              @else
                  <li class="nav-cicle"></li>
              @endif
          @endforeach
      </ul>
</div>
