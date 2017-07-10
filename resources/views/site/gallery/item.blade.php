<a data-id="{{ $post->id }}"
   href='/gallery/{{ $post->id }}/rule={{ $json }}'
   class="item-gallery"
   data-grid-prepared="true"
   style="position:absolute;">
    <div class="uk-panel-box" >
        <img src="{{ Storage::url($post->img) }}" >
    </div>
</a>