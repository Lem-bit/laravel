<ul class="nav">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('main')? 'active': ''}}" href="{{ route('main') }}">Главная страница</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('admin.index')? 'active': ''}}" href="{{ route('admin.index') }}">" Админка "</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" {{request()->routeIs('admin.action_one')? 'active': ''}} href="{{ route('admin.action_one') }}">Скачать изображение</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" {{request()->routeIs('admin.action_two')? 'active': ''}} href="{{ route('admin.action_two') }}">Скачать текст</a>
    </li>
</ul>

