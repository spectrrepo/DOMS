@extends('layouts.site')
@section('site-content')

<div class="content  uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 tm-grid-heights" data-uk-grid>
  <div class="item-gallery" data-grid-prepared="true"style="position:absolute;">
    <div class="uk-panel-box" style="height:290px;">
        <img src="img/test.jpg" alt="котэ" />
    </div>
  </div>

  <div class="b-next-page uk-width-1-1">
    Next page
  </div>
</div>

@endsection
