<?php
 $statuses = Illuminate\Support\Facades\DB::table('status_description')->get();
?>
@foreach ($statuses as $status)
  <div class="b-item-status">
    <input class="radio-opacity" type="radio" name="status" value="{{ $status->nickname }}">
    <div class="b-img">
      <img src="{{ $status->img }}" alt="иконка пользователя DOMS" />
      <span class="check-status-reg uk-icon-justify uk-icon-check"></span>
    </div>
    <span class="name-status">{{ $status->name }}</span>
    <p class="description-status">
      {{ $status->text }}
    </p>
  </div>
@endforeach
