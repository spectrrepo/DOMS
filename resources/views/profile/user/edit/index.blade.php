@extends('profile.layout')
@section('profile-content')
    <div class="wrap-personal-information edit-line-profile">
        {{ Form::open( array('id'=> 'editUser', 'route' => 'editUser', 'files' => 'true') ) }}
        <div class="b-photo-person" id="photo-person">
            <img src="{{ empty($user->img_middle) ? '/img/user.png' : Storage::url($user->img_large) }}" alt="" />
            <div class="hover-effect-person uk-icon-justify uk-icon-pencil"></div>
            <input id="photo" type="file" name="img">
        </div>
        <div class="b-persobal-information edit-personal-info">
            @include('profile.elements.validate')
            <div class="b-common-person-information">
                <input class="input-name-pers" type="text" placeholder="Имя" name="name" value="{{ $user->name }}">
                <div class="wrap-sex">
                    <div class="b-item-sex left-item-sex">
                        <input class="opacity-radio"   {{$user->sex =='man' ? ' checked ' : ''}} type="radio" name="sex" value="man">
                        <div class="sex-name">Мужской</div>
                    </div>
                    <div class="b-item-sex right-item-sex">
                        <input class="opacity-radio"   {{$user->sex =='woman' ? ' checked ' : ''}}type="radio" name="sex" value="woman">
                        <div class="sex-name">Женский</div>
                    </div>
                </div>
                <textarea class="about-user-text" name="about" placeholder="О себе">
                    {{ $user->about }}
                </textarea>
            </div>
            <div class="b-spec-info">
                <span class="contact-item-name edit-name-item">email</span>
                <a class="contact-item-value email-edit" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                <span class="contact-item-name edit-name-item">skype</span>
                <input class="contact-item-value edit-value-item" type="text"type="text" name="skype" value="{{ $user->skype }}">
                <span class="contact-item-name edit-name-item">телефон</span>
                <input class="contact-item-value edit-value-item" type="text" name="phone" value="{{ $user->phone }}">
                <span class="contact-item-name edit-name-item soc-edit-name">соц.сети</span>
                <div class="uk-clearfix list-links">
                <?php $i = 0; ?>
                    @foreach ($links as $link_item)
                        <li class="item-links uk-icon-external-link open-modal-link" data-action="editLinks" data-id="{{ $link_item->id }}">
                            <input class="contact-item-value soc-set-edit" type="hidden" name="soc_net_{{ $link_item->id }}" value="{{ $link_item->link }}">
                        </li>
                    @endforeach
                    <li class="open-di-link uk-icon-plus open-modal-link" data-action="addLinks">
                        <input class="contact-item-value soc-set-edit" type="hidden" name="soc_net">
                    </li>
                </div>
            </div>
            <input type="submit" class="save-info-user" value="Сохранить">
            {{ Form::close() }}
        </div>
    </div>
    @include('profile.elements.links')
@endsection
