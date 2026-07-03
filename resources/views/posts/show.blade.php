<x-layout>
    <x-slot:heading>
        Blog Post Page
    </x-slot:heading>

    <h2 class="font-bold text-lg">
        {{ $post['name'] }}
    </h2>

    <p class="italic">
        {{ $post['body'] }}
    </p>

    <x-tag-list :tags="$post->tags" :is_short=false />

    <div class="ml-5 mt-5 space-y-4">
        @foreach ($post->comments as $comment)
        <div
            class="comment-item bg-slate-800 border border-slate-700 rounded-xl p-4 shadow-sm transition hover:border-slate-600">

            <div class="comment-meta flex items-center justify-between mb-2">
                <div class="flex items-center space-x-3">
                    <div
                        class="size-8 rounded-full bg-indigo-600 flex items-center justify-center text-sm font-semibold text-white">
                        {{ mb_substr($comment->user->name ?? 'A', 0, 1) }}
                    </div>

                    <strong class="comment-author text-slate-200 font-medium tracking-tight">
                        {{ $comment->user->name ?? 'Anonymous' }}
                    </strong>
                </div>

                <span class="comment-date text-xs text-slate-400">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
            </div>

            <div class="comment-body text-slate-300 text-sm leading-relaxed pl-11">
                {{ $comment->body }}
            </div>

        </div>
        @endforeach
    </div>
</x-layout>