<div id="wrap-d">
    <div class="wrap-dwnld-photo">
        <span class="add-photo-ico racurs-margin-ico uk-icon-justify uk-icon-camera"></span>
        <span class="add-photo-text racurs-margin-text">Добавить ракурсы</span>
        <input id="files" class="input-dwnld-view-photo" type="file">
    </div>
    @if(!empty($post->view))
        @foreach ($post->view as $view)
            <span class="deleteSome delete-view-edit">
                <input type="hidden" name="id" value="{{ $view->id }}">
                <img class="thumb" src="{{ $view->img_middle }}">
                <span class="b-hover-add-view">
                    <span class="uk-icon-justify uk-icon-remove vertical-align"></span>
                </span>
            </span>
        @endforeach
    @endif
</div>