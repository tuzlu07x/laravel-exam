<x-side-accordion title="Operasyon" icon="fas fa-home" :active="request()->routeIs('dashboard')">
    <x-side-link href="{{ route('dashboard') }}" icon="fas fa-home" :active="request()->routeIs('dashboard')">
        {{ __('Home') }}
    </x-side-link>

    <x-side-link href="{{ route('dashboard') }}" icon="fas fa-desktop" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-side-link>
</x-side-accordion>
