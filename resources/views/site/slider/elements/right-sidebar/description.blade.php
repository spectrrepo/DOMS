@include('site.slider.elements.right-sidebar.elements.header', ['name' => 'Описание'])
<div id="description-pole" class="view-photo-slide" {{ empty($posts[0]->description) ? 'style=display:none;' : '' }}>
    <h3>{{$posts[0]->title}}</h3>
    <p class="b-description-slide">
        {{ $posts[0]->description }}
    </p>
</div>