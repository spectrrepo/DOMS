@include('site.slider.elements.right-sidebar.elements.header', ['name' => 'Описание'])
<div id="description-pole" class="view-photo-slide" {{ empty($image->description) ? 'style=display:none;' : '' }}>
    <h3>{{$image->title}}</h3>
    <p class="b-description-slide">
        {{ $image->description }}
    </p>
</div>