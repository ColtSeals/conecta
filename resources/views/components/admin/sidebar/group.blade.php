<li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon {{ $icon }}"></i>
        <div>{{ $title ?? 'Default' }}</div>
    </a>

    <ul class="menu-sub">
        {{ $slot }}
    </ul>
</li>
