<div id="modalDescriptionFull" class="zoom-slider-views">
    <span class="close uk-icon-justify uk-icon-remove white-close" id="close-modal-description"></span>
    <div class="views-zoom-space">
        <div class="description-scroll-place">
            <h3 class="uk-contrast">{{ $posts->first()->title }}</h3>
            <p class="b-description-slide">
                {{ $posts->first()->description }}
            </p>
        </div>
    </div>
</div>
