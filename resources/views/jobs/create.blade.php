<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <h2 class="text-base/7 font-semibold text-white">Create a New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-400">We need some details.</p>

                {{-- <div class="mt-10">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="italic text-red-500">&mdash; {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div> --}}

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="title"
                                name="title"
                                placeholder="Shift Leader"
                                :value="old('title')"
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
                                placeholder="$50,000 per year"
                                :value="old('salary')"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="salary"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button class="text-sm/6 font-semibold text-white" type="button">
                Cancel
            </button>

            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
