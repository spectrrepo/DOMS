@include('site.slider.elements.right-sidebar.elements.header', ['name' => 'Теги'])
<div class="pole-tag uk-clearfix" {{ empty($posts->first()->tags) ? 'style=display:none;': '' }}>
    @foreach ( $posts->first()->tags as $tag )
        @include('site.slider.elements.right-sidebar.tag_item')
    @endforeach
</div>
