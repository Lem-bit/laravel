<ul class="nav">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('home')? 'active': ''}}" href="{{ route('home') }}">Главная страница</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('admin.index')? 'active': ''}}" href="{{ route('admin.index') }}">" Админка "</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" {{request()->routeIs('admin.save_news')? 'active': ''}} href="{{ route('admin.save_news') }}">Скачать новости</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" {{request()->routeIs('admin.action_two')? 'active': ''}} href="{{ route('admin.action_two') }}">Скачать все новости</a>
    </li>
</ul>

