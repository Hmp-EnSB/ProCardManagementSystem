<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-gradient-to-r from-blue-400 to-indigo-400 p-10 rounded-xl shadow-lg max-w-md mx-auto border border-blue-500">
        @csrf

        <h2 class="text-3xl font-extrabold mb-8 text-center text-blue-900">Join Us Today</h2>

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" class="text-blue-900 font-semibold" />
            <x-text-input id="name"
                class="block mt-1 w-full focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md bg-blue-300 text-blue-900"
                style="background-color: #93C5FD !important; color: #1E3A8A !important;"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-blue-900 font-semibold" />
            <x-text-input id="email"
                class="block mt-1 w-full focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md bg-blue-300 text-blue-900"
                style="background-color: #93C5FD !important; color: #1E3A8A !important;"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-blue-900 font-semibold" />
            <x-text-input id="password"
                class="block mt-1 w-full focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md bg-blue-300 text-blue-900"
                style="background-color: #93C5FD !important; color: #1E3A8A !important;"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-blue-900 font-semibold" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full focus:ring focus:ring-blue-500 focus:ring-opacity-50 rounded-md bg-blue-300 text-blue-900"
                style="background-color: #93C5FD !important; color: #1E3A8A !important;"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <div class="flex items-center justify-between mt-8">
            <a class="text-sm text-blue-800 hover:text-blue-900 font-semibold" href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>

            <x-primary-button class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
