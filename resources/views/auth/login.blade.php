<x-guest-layout>
<x-auth-session-status class="mb-4 text-yellow-accent" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <x-input-label for="email" :value="__('Email')" class="text-yellow-accent" />
        <x-text-input id="email" class="block mt-1 w-full
            bg-dark-secondary border-gray-600 text-white
            focus:border-yellow-accent focus:ring-yellow-accent"
            type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
    </div>

    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" class="text-yellow-accent" />

        <x-text-input id="password" class="block mt-1 w-full
            bg-dark-secondary border-gray-600 text-white
            focus:border-yellow-accent focus:ring-yellow-accent"
            type="password"
            name="password"
            required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded
                bg-dark-secondary border-gray-600 text-yellow-accent
                shadow-sm focus:ring-yellow-accent focus:ring-offset-dark-primary"
                name="remember">
            <span class="ml-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-300
                hover:text-yellow-accent rounded-md
                focus:outline-none focus:ring-2 focus:ring-offset-2
                focus:ring-yellow-accent focus:ring-offset-dark-primary"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-primary-button class="ml-3
            bg-yellow-accent text-dark-primary
            hover:bg-yellow-accent-dark focus:bg-yellow-accent-dark
            active:bg-yellow-accent-dark border-transparent
            focus:ring-yellow-accent focus:ring-offset-dark-primary">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
</form>
</x-guest-layout>
