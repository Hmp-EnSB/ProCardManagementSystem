<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                @if (Route::has('login'))
                                    @auth
                                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                            {{ __('Dashboard') }}
                                        </x-nav-link>
                                    @else
                                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                            {{ __('Log in') }}
                                        </x-nav-link>

                                        @if (Route::has('register'))
                                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                                                {{ __('Register') }}
                                            </x-nav-link>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </body>
</html>
