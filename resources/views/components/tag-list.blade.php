@props([
    'tags' => [],
    'max_display_tags' => 10,
    'is_short' => true,
])

@php
    $tags_count = count($tags);
@endphp

<div class="flex flex-wrap gap-2 mt-4" data-tags>
    @foreach ($tags as $tag)
        <span
            class="
            inline-flex items-center rounded-md px-2 py-1 text-xs font-medium inset-ring
            bg-{{ $tag->color_name }}-400/10 text-{{ $tag->color_name }}-400 inset-ring-{{ $tag->color_name }}-400/20
            {{ $is_short && $loop->iteration > $max_display_tags ? 'hidden data-hidden-tag' : '' }}
        ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="size-3 mr-1.5 opacity-80 rotate-45]">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581a1.125 1.125 0 0 0 1.591 0l7.181-7.181a1.125 1.125 0 0 0 0-1.591l-9.581-9.581A2.25 2.25 0 0 0 9.568 3Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
            </svg>

            {{ $tag->name }}
        </span>
    @endforeach

    @if ($is_short && $tags_count > $max_display_tags)
        <button type="button" onclick="toggleTags(event, this)"
            class="inline-flex items-center text-xs font-medium text-slate-400 hover:text-white px-2 py-1 bg-gray-900/80 backdrop-blur-sm rounded-md transition border border-dashed border-gray-700 data-trigger">
            +{{ $tags_count - $max_display_tags }} more
        </button>

        <script>
            function toggleTags(event, button) {
                event.preventDefault();
                event.stopPropagation();

                const container = button.closest('[data-tags]');
                const hiddenTags = container.querySelectorAll('.data-hidden-tag');

                hiddenTags.forEach(tag => {
                    tag.classList.remove('hidden');
                });

                button.remove();
            }
        </script>
    @endif
</div>
