<li class="item-moodal-sidebar uk-clearfix" data-id="{{$name->id}}" data-val="{{$name->title}}">
    <span class="item-modal-text">{{ $name->title }}</span>
    @if($filter[$nameCat] !== 0)
        <span class="choose-ico uk-icon-justify uk-icon-check {{ $filter[$nameCat]->contains($name)  ? 'active-choose-ico' : ''}}"></span>
    @else
        <span class="choose-ico uk-icon-justify uk-icon-check"></span>
    @endif
</li>