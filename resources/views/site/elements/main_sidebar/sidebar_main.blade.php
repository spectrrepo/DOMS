<nav class="sidebar">
  <ul>
    @include('helpers.main_sidebar.menu_items.placements')
    @include('helpers.main_sidebar.menu_items.styles')
    @include('helpers.main_sidebar.menu_items.colors')
    @include('helpers.main_sidebar.menu_items.orders')
  </ul>
    <div class="search">
      <div class="popup-search-tag"></div>
      <form class="ajax-search {{ preg_match('[/photo/]', URL::current()) ? 'ajax-search-slider' : ''}}">
        <input class="popup-tag input-search {{ preg_match('[/photo/]', URL::current()) ? 'ajax-input-search-slider' : 'ajax-input-search'}}"
               type="search"
               name="tagSearch"
               autocomplete="off"
               placeholder="Поиск по тегам">
        <button class="search-submit" type="submit">
            <span class="uk-icon-justify uk-icon-search"></span >
        </button>
      </form>
    </div>
</nav>
@include('helpers.main_sidebar.news')
