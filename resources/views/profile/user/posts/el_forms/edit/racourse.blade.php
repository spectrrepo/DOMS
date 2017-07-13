<div id="wrap-d">
    <div class="wrap-dwnld-photo">
        <span class="add-photo-ico racurs-margin-ico uk-icon-justify uk-icon-camera"></span>
        <span class="add-photo-text racurs-margin-text">Добавить ракурсы</span>
        <input id="files" class="input-dwnld-view-photo" type="file" name="views">
    </div>
    @if(!empty($post->view))
        <ul class="uk-list angles-list uk-grid uk-grid-width-1-3 uk-margin-remove">
            @foreach ($post->view as $view)
                <li class="delete-racourse uk-margin-bottom uk-margin-top uk-padding-remove" data-id="{{ $view->id }}">
                    <div class="uk-overlay uk-width-1-1">
                        <img src="{{ Storage::url($view->img_middle) }}">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">
                                <span class="fz-big">×</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>