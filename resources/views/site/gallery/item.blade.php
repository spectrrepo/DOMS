<a data-id="{{ $post->id }}"
   href='/gallery/{{ $post->id }}/rule={"color":1,"placements":[0],"style":[0],"tag":"0"}'
   class="item-gallery"
   data-grid-prepared="true"
   style="position:absolute;">
    <div class="uk-panel-box" >
        <img src="{{ Storage::url($post->img) }}" >
    </div>
</a>