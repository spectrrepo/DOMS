@extends('layouts.profile')
@section('profile-content')
  <div class="wrap-personal-information edit-line-profile">
    {{ Form::open( array('url' => '/update/profile', 'files' => 'true') ) }}
      <div class="b-photo-person" id="photo-person">
          <div class="hover-effect-person uk-icon-justify uk-icon-pencil"></div>
          <img class="img-full-width" src="{{ $user->avatar->url('max')}}" alt="user_{{ $user->id }} " />
          <input id="photo" type="file" name="avatar">
      </div>
      <div class="b-persobal-information edit-personal-info">
          <div class="b-common-person-information">
            <input class="input-name-pers" type="text" name="name" value="{{ $user->name }}">
            <div class="wrap-sex">
              <div class="b-item-sex left-item-sex">
                <input class="opacity-radio" type="radio" name="sex" value="1">
                <div class="sex-name">Мужской</div>
              </div>
              <div class="b-item-sex right-item-sex">
                <input class="opacity-radio" type="radio" name="sex" value="2">
                <div class="sex-name">Женский</div>
              </div>
            </div>
            <textarea class="about-user-text" name="name"></textarea>
          </div>
          <div class="b-spec-info">
            <span class="contact-item-name edit-name-item">email</span>
            <input class="contact-item-value edit-value-item" type="text" name="e_mail" value="{{ $user->e_mail }}">
            <span class="contact-item-name edit-name-item">skype</span>
            <input class="contact-item-value edit-value-item" type="text"type="text" name="skype" value="{{ $user->skype }}">
            <span class="contact-item-name edit-name-item">телефон</span>
            <input class="contact-item-value edit-value-item" type="text" name="phone" value="{{ $user->phone }}">
            <span class="contact-item-name edit-name-item">соц.сети</span>
            <input class="contact-item-value edit-value-item" type="text"type="text" name="soc_net" value="{{ $user->soc_net }}">
          </div>
          <input type="submit" class="save-info-user">
      {{ Form::close() }}
    </div>
  </div>
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
