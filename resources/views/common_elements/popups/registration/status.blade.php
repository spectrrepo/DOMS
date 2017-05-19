@foreach ($roles as $role)
  <div class="b-item-status">
    <input class="radio-opacity" type="radio" name="status" value="{{ $role->nickname }}">
    <div class="b-img">
      <img src="{{ $role->img }}" alt="{{ $role->alt }}" />
      <span class="check-status-reg uk-icon-justify uk-icon-check"></span>
    </div>
    <span class="name-status">{{ $role->name }}</span>
    <p class="description-status">
      {{ $role->text }}
    </p>
  </div>
@endforeach
