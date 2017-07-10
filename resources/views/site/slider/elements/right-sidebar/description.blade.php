@include('site.slider.elements.right-sidebar.elements.header', ['name' => 'Описание'])
<div id="description-pole" class="view-photo-slide" {{ empty($posts->first()->description) ? 'style=display:none;' : '' }}>
    <h3>{{$posts->first()->title}}</h3>
    <p class="b-description-slide">
        {{ $posts->first()->description }}
    </p>
</div>