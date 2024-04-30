@props(['title', 'icon', 'router', 'parms' => null])

@if (Route::has($router))
    <li class="menu-item">
        <a href="{{ route($router, $parms) }}" class="menu-link">
            <i class="menu-icon tf-icons {{ $icon }}"></i>
            <div>{{ $slot ?? $title }}</div>
        </a>
    </li>
@endif
