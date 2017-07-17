<div id="modalLaw" class="modal-law">
    <div class="header-modal-law">
        <span class="title-modal-law">Заявить права на фотографию</span>
        <span id="close-modal-law"></span>
    </div>
    <form id="formPretense" enctype="multipart/form-data" name="pretense">
        <div class="body-modal-law">
            <input type="hidden" name="_token" value="{{  csrf_token() }}">
            <input type="hidden" name="post_id" value="{{ $posts->first()->id }}">
            <textarea class="text-pretense" name="text"></textarea>
        </div>
        <hr>
        <div class="footer-modal-law uk-clearfix">
            <button class="submit-pretense" type="submit">Отправить</button>
            <div class="wrap-file-modal-law uk-icon-plus">
                <input id="pretense-file" class="dwnld-file-input" type="file" name="file" value="">
            </div>
        </div>
    </form>
</div>