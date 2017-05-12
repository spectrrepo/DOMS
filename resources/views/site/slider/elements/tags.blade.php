<div id="tag" class="title-tag" {{ $tags->count() > 1 ? '' : 'style=display:none;' }}>
 Тэги
</div>
<div class="pole-tag" {{ $tags->count() > 1 ? '': 'style=display:none;' }}>
   @foreach ( $tags as $tag )
     <div class="tag-item">{{ $tag->title }}</div>
   @endforeach
</div>
