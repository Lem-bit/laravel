<ul class="nav">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('home')? 'active': ''}}" href="{{ route('home') }}">Главная страница</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('categories.all')? 'active': ''}}" href="{{ route('categories.all') }}">Категории новостей</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('admin.index')? 'active': ''}}" href="{{ route('admin.index') }}">Админка</a>
    </li>
</ul>

