<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8">
                    <x-form-field>
                        <x-form-label for="firstname">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="firstname"
                                name="firstname"
                                :value="old('firstname')"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="firstname"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="lastname">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="lastname"
                                name="lastname"
                                :value="old('lastname')"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="lastname"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="email"
                                name="email"
                                :value="old('email')"
                                type="email"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="email"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="password"
                                name="password"
                                :value="old('password')"
                                type="password"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="password"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input
                                id="password_confirmation"
                                name="password_confirmation"
                                :value="old('password_confirmation')"
                                type="password"
                                required
                            >
                            </x-form-input>

                            <x-form-error for="password_confirmation"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-white">
                Cancel
            </a>

            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>
