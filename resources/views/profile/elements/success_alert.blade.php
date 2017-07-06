@if (Session::has('message'))
    <div class="uk-alert uk-alert-success" data-uk-alert=""style="display: block;width: 76%;position: fixed;top: 50px;right: 34px;z-index: 10000;">
        <a href="" class="uk-alert-close uk-close"></a>
        {{ Session::get('message') }}
    </div>
@endif
