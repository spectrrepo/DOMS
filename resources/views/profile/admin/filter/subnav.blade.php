<nav class="uk-navbar">
    <ul class="uk-navbar-nav">
        <li class="{{ route('listPlacePage') === URL::current() ? 'uk-active' : '' }}">
            <a href="{{ route('listPlacePage') }}">Помещения</a>
        </li>
        <li class="{{ route('listStylePage') === URL::current() ? 'uk-active' : '' }}">
            <a href="{{ route('listStylePage') }}">Стили</a>
        </li>
        <li class="{{ route('listColorPage') === URL::current() ? 'uk-active' : '' }}">
            <a href="{{ route('listColorPage') }}">Цвета</a>
        </li>
        <li class="{{ route('listTagPage') === URL::current() ? 'uk-active' : '' }}">
            <a href="{{ route('listTagPage') }}">Теги</a>
        </li>
    </ul>
</nav>