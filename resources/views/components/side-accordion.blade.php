@props(['icon', 'title', 'active' => false])

<li class="nav-item {{ $active ? 'menu-open' : '' }}">
    <a href="#" class="nav-link p-3 h5 {{ $active ? 'active' : '' }}">
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
            <i class="fas fa-angle-left right my-2"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
