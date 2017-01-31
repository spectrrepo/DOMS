@extends('layouts.profile')
@section('profile-content')
  <div class="wrap-personal-information edit-line-profile">
    {{ Form::open( array('id'=> 'editUser', 'url' => '/update/profile', 'files' => 'true') ) }}
      <div class="b-photo-person" id="photo-person">
          <img src="{{ $user->quadro_ava }}" alt="" />
          <div class="hover-effect-person uk-icon-justify uk-icon-pencil"></div>
          <input id="photo" type="file" name="avatar">
      </div>
      <div class="b-persobal-information edit-personal-info">
          <div class="b-common-person-information">
            <input class="input-name-pers" type="text" placeholder="Имя" name="name" value="{{ $user->name }}">
            <div class="wrap-sex">
              <div class="b-item-sex left-item-sex">
                <input class="opacity-radio"   {{$user->sex ==1 ? ' checked ' : ''}} type="radio" name="sex" value="1">
                <div class="sex-name">Мужской</div>
              </div>
              <div class="b-item-sex right-item-sex">
                <input class="opacity-radio"   {{$user->sex ==2 ? ' checked ' : ''}}type="radio" name="sex" value="2">
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
            <span class="contact-item-name edit-name-item">соц.сети</span>
            <span class="list-links">
              <?php $i = 0; ?>
              @foreach ($links as $link_item)
                <li class="item-links uk-icon-external-link open-modal-link" data-action="editLinks" data-id="{{ $link_item->id }}">
                  <input class="contact-item-value soc-set-edit" type="hidden" name="soc_net_{{ $link_item->id }}" value="{{ $link_item->link }}">
                </li>
              @endforeach
              <li class="open-di-link uk-icon-plus open-modal-link" data-action="addLinks">
                  <input class="contact-item-value soc-set-edit" type="hidden" name="soc_net">
              </li>
            </span>
          </div>
          <input type="submit" class="save-info-user" value="Сохранить">
      {{ Form::close() }}
    </div>
  </div>
  @include('../popups.links')
  <script type="text/javascript">

  function FileSelect(evt) {
      var files = evt.target.files; // FileList object

      // Loop through the FileList and render image files as thumbnails.
      for (var i = 0, f; f = files[i]; i++) {

        // Only process image files.
        if (!f.type.match('image.*')) {
          continue;
        }

        var reader = new FileReader();

        // Closure to capture the file information.
        reader.onload = (function(theFile) {
          return function(e) {
            // Render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img class="thumb" src="', e.target.result,
                              '" title="', escape(theFile.name), '"/>'].join('');
            document.getElementById('photo-person').insertBefore(span, null);
          };
        })(f);

        // Read in the image file as a data URL.
        reader.readAsDataURL(f);
      }
    }
    document.getElementById('photo').addEventListener('change', FileSelect, false);
  </script>

@endsection
