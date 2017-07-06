@extends('profile.layout')
@section('profile-content')
    <div class="uk-grid">
        <h2>Новости</h2>
        <div class="uk-width-8-10">

        </div>
        <div class="uk-width-1-10">
            <button data-uk-modal="{target:'#my-id'}" class="uk-float-right uk-button uk-button-success" type="button">
                <i class="uk-icon-pencil"></i>
                Добавить
            </button>
        </div>
        <div id="my-id" class="uk-modal">
            <div class="uk-modal-dialog">
                <a class="uk-modal-close uk-close"></a>
                ...
            </div>
        </div>
    </div>
    <div class="uk-panel-box">
        <table class="uk-table uk-table-striped">
            <thead>
            <td>B</td>
            <td>2</td>
            <td>2</td>
            <td>2</td>
            <td>2</td>
            </thead>
            <tr>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
            </tr>
            <tr>
                <td>1</td>
                <td>w</td>
                <td>2</td>
                <td>2</td>
                <td>
                    <button class="uk-button uk-button-success" type="button">
                        <i class="uk-icon-pencil"></i>
                        Редактировать
                    </button>
                    <button class="uk-button uk-button-danger" type="button">
                        <i class="uk-icon-trash"></i>
                        Удалить
                    </button>
                </td>
            </tr>
        </table>
    </div>
    <ul class="uk-pagination">
        <li><a href="">1</a></li>
        <li class="uk-active"><span>2</span></li>
        <li><a href="">3</a></li>
    </ul>
@endsection