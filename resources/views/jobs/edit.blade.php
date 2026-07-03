<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="title"
                                name="title"
                                value="{{ $job->title }}"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="title"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="salary"
                                name="salary"
                                value="{{ $job->salary }}"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="salary"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button class="text-sm/6 font-semibold text-red-500" form="delete_form">
                    Delete
                </button>
            </div>

            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-white" type="button">Cancel</a>
                <button
                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                    type="submit"
                >
                    Update
                </button>

            </div>
        </div>
    </form>

    <form
        id="delete_form"
        class="hidden"
        method="POST"
        action="/jobs/{{ $job->id }}"
    >
        @csrf
        @method('DELETE')
    </form>
</x-layout>
