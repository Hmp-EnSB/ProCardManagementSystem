<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 p-10 rounded-xl shadow-lg max-w-md mx-auto border border-blue-700">
        @csrf

        <h2 class="text-3xl font-extrabold mb-8 text-center text-white">Join Us Today</h2>

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" class="text-white font-semibold" />
            <x-text-input id="name"
                class="block mt-1 w-full focus:ring focus:ring-blue-300 focus:ring-opacity-50 rounded-md bg-blue-500 text-white"
                style="background-color: #3B82F6 !important; color: #FFFFFF !important;"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-300" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-white font-semibold" />
            <x-text-input id="email"
                class="block mt-1 w-full focus:ring focus:ring-blue-300 focus:ring-opacity-50 rounded-md bg-blue-500 text-white"
                style="background-color: #3B82F6 !important; color: #FFFFFF !important;"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-white font-semibold" />
            <x-text-input id="password"
                class="block mt-1 w-full focus:ring focus:ring-blue-300 focus:ring-opacity-50 rounded-md bg-blue-500 text-white"
                style="background-color: #3B82F6 !important; color: #FFFFFF !important;"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white font-semibold" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full focus:ring focus:ring-blue-300 focus:ring-opacity-50 rounded-md bg-blue-500 text-white"
                style="background-color: #3B82F6 !important; color: #FFFFFF !important;"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300" />
        </div>

        <div class="flex items-center justify-between mt-8">
            <a class="text-sm text-blue-200 hover:text-white font-semibold" href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </a>

            <x-primary-button class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                {{ __('Create Account') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
