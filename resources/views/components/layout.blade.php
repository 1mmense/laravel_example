<!DOCTYPE html>
<html class="h-full bg-gray-900" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('icons/drake.ico') }}" rel="icon" type="image/x-icon">
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800/50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="size-12" src="{{ asset('icons/drake.ico') }}" alt="Your Company" />
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <x-nav-link href="/" :active="request()->is('/')">
                                    Home
                                </x-nav-link>
                                <x-nav-link href="/jobs" :active="request()->is('jobs')">
                                    Jobs
                                </x-nav-link>
                                <x-nav-link href="/blog" :active="request()->is('blog')">
                                    Blog
                                </x-nav-link>
                                <x-nav-link href="/bb_stats_table/" :active="request()->is('bb_stats_table')">
                                    Stats Table
                                </x-nav-link>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center space-x-4 md:ml-6">
                            @guest
                                <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                            @endguest

                            @auth
                                @csrf

                                <form action="/logout" method="POST">
                                    <x-form-button class="bg-indigo-500/30 hover:bg-indigo-400/30">Log Out</x-form-button>
                                </form>
                            @endauth

                            {{-- <button type="button"
                                class="relative rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">View notifications</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6">
                                    <path
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <el-dropdown class="relative ml-3">
                                <button
                                    class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>
                                    <img src="{{ asset('icons/hedge_knight.png') }}"
                                        alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                                </button>
                            </el-dropdown> --}}
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex md:hidden">
                        <button
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500"
                            type="button"
                            command="--toggle"
                            commandfor="mobile-menu"
                        >
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg
                                class="in-aria-expanded:hidden size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                data-slot="icon"
                                aria-hidden="true"
                            >
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                            <svg
                                class="not-in-aria-expanded:hidden size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                data-slot="icon"
                                aria-hidden="true"
                            >
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Mobile --}}
            <el-disclosure id="mobile-menu" class="block md:hidden" hidden>
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                    <a href="/" class="block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium text-white"
                        aria-current="page"
                    >
                        Home
                    </a>
                    <a href="/jobs"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                    >
                        Jobs
                    </a>
                    <a href="/contact"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                    >
                        Contact
                    </a>
                    <a href="/bb_stats_table/"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white"
                    >
                        Stats Table
                    </a>
                </div>
                <div class="border-t border-white/10 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="shrink-0">
                            <img class="size-10 rounded-full outline -outline-offset-1 outline-white/10"
                                src="{{ asset('icons/hedge_knight.png') }}" alt=""
                            />
                        </div>
                        <div class="ml-3">
                            <div class="text-base/5 font-medium text-white">Hedge Knight</div>
                            <div class="text-sm font-medium text-gray-400">hedgeknight@example.net</div>
                        </div>
                        <button
                            class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500"
                            type="button"
                        >
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg
                                class="size-6"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.5"
                                data-slot="icon"
                                aria-hidden="true"
                            >
                                <path
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                    stroke-linecap="round" stroke-linejoin="round"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </el-disclosure>
        </nav>

        <header
            class="relative bg-gray-800 after:pointer-events-none after:absolute after:inset-x-0 after:inset-y-0 after:border-y after:border-white/10"
        >
            <div class="mx-auto max-w-7xl px-4 py-6 sm:flex sm:justify-between sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-white">
                    {{ $heading }}
                </h1>

                <x-button href="/jobs/create">
                    Create a Job
                </x-button>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 text-slate-100 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
