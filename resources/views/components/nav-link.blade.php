@props([
    'active' => false,
    'type' => 'a'
])

@if ($type === 'a')
    <a class="{{ $active ? 'bg-gray-950/50 text-white' : 'text-gray-300 bg-gray-500/10 hover:bg-gray-300/10 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}
    >
        {{ $slot }}
    </a>
@else
    <button class="{{ $active ? 'bg-gray-950/50 text-white' : 'text-gray-300 bg-gray-500/10 hover:bg-gray-300/10 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}
    >
        {{ $slot }}
    </button>
@endif
