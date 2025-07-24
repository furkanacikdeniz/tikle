<x-guest-layout>
    <div class="mb-4 text-sm text-gray-300"> {{-- Changed text color for readability --}}
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <x-auth-session-status class="mb-4 text-yellow-accent" :status="session('status')" /> {{-- Added text-yellow-accent --}}

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-yellow-accent" /> {{-- Added text-yellow-accent --}}
            <x-text-input id="email" class="block mt-1 w-full
                bg-dark-secondary border-gray-600 text-white
                focus:border-yellow-accent focus:ring-yellow-accent" {{-- Applied input styling --}}
                type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" /> {{-- Added text-red-400 --}}
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="
                bg-yellow-accent text-dark-primary
                hover:bg-yellow-accent-dark focus:bg-yellow-accent-dark
                active:bg-yellow-accent-dark border-transparent
                focus:ring-yellow-accent focus:ring-offset-dark-primary"> {{-- Applied button styling --}}
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
