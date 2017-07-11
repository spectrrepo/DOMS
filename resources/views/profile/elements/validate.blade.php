@if ($errors->any())
    <div class="uk-alert uk-alert-danger uk-width-1-1" data-uk-alert=""style="display: block;">
        <a href="" class="uk-alert-close uk-close"></a>
        @foreach ($errors->all() as $error)
            <ul style="margin-left: 12px;" class="uk-list">
                <li>{{ $error }}</li>
            </ul>
        @endforeach
    </div>
@endif
