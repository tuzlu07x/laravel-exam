@props(['active', 'icon'])

@php
$classes = $active ?? false ? 'nav-link p-3 h5 active font-weight-bolder' : 'nav-link p-3 h5';
@endphp

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        <i class="nav-icon {{ $icon ?? 'far fa-circle' }}"></i>
        <p>
            {{ $slot }}
        </p>
    </a>
</li>
