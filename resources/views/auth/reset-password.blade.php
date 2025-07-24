<x-guest-layout>
    {{-- Assuming you might have session status messages here --}}
    <x-auth-session-status class="mb-4 text-yellow-accent" :status="session('status')" />
    {{-- Assuming you might have validation errors here --}}
    <x-auth-validation-errors class="mb-4 text-red-400" :errors="$errors" />

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-yellow-accent" />
            <x-text-input id="email" class="block mt-1 w-full
                bg-dark-secondary border-gray-600 text-white
                focus:border-yellow-accent focus:ring-yellow-accent"
                type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-yellow-accent" />
            <x-text-input id="password" class="block mt-1 w-full
                bg-dark-secondary border-gray-600 text-white
                focus:border-yellow-accent focus:ring-yellow-accent"
                type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-yellow-accent" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full
                bg-dark-secondary border-gray-600 text-white
                focus:border-yellow-accent focus:ring-yellow-accent"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="
                bg-yellow-accent text-dark-primary
                hover:bg-yellow-accent-dark focus:bg-yellow-accent-dark
                active:bg-yellow-accent-dark border-transparent
                focus:ring-yellow-accent focus:ring-offset-dark-primary">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
