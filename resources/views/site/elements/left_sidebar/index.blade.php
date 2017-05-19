<nav class="sidebar">
    <ul>
        @include('site.elements.left_sidebar.elements.menu_items.placements')
        @include('site.elements.left_sidebar.elements.menu_items.styles')
        @include('site.elements.left_sidebar.elements.menu_items.colors')
        @include('site.elements.left_sidebar.elements.menu_items.orders')
    </ul>
    @include('site.elements.left_sidebar.elements.search')
</nav>
@include('site.elements.left_sidebar.elements.news')
@include('site.elements.left_sidebar.elements.popup')
