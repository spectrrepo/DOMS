@include('site.slider.elements.right-sidebar.elements.header', ['name' => 'Теги'])
<div class="pole-tag" {{ $tags->count() > 1 ? '': 'style=display:none;' }}>
    @foreach ( $tags as $tag )
        @include('site.slider.elements.right-sidebar.tag_item')
    @endforeach
</div>
