<div class="big-col uk-clearfix">
    <div class="uk-grid">
        @if ((Auth::user()->roles[0]->nickname === 'admin') || (Auth::user()->roles[0]->nickname === 'moderator'))
            <div class="uk-width-1-2 uk-margin-small-top">
                <a class="uk-width-1-1 uk-button uk-button-success uk-border-rounded" href="{{ route('addPostSite', [ 'id' => $post->id])}}" >
                    <span class="save-text">Изображение проверено</span>
                    <span class="save-ico uk-icon-justify uk-icon-check"></span>
                </a>
            </div>
        @endif
        <div class="uk-width-1-2 uk-margin-small-top">
            <a class="uk-width-1-1 uk-button uk-button-danger uk-border-rounded" href="{{ route('deleteVerPost', [ 'id' => $post->id]) }}">
                <span class="save-text uk-margin-small-top">Удалить изображение</span>
                <span class="save-ico uk-icon-justify uk-icon-trash"></span>
            </a>
        </div>
    </div>
</div>