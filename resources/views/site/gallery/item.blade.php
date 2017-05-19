<a data-id="{{ $image->id }}"
   href="/photo/id={ {{ $image->id }}}&filtr={'room':[{{ $room }}],'styles':[{{ $style }}],'colors':{{ $color }},'sort':'{{ $sort }}','tag':'{{ $tag }}'}"
   class="item-gallery"
   data-grid-prepared="true"
   style="position:absolute;">
    <div class="uk-panel-box" >
        <img src="{{ $image->photo }}" >
    </div>
</a>