<x-layout>
    <x-slot:heading>
        Blog Page
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($posts as $post)
            <a href="/blog/{{ $post['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <strong>{{ $post['name'] }}</strong> (<i>comments: {{ count($post->comments) }})</i>

                <x-tag-list :tags="$post->tags" :is_short=true />
            </a>
        @endforeach

        <div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>