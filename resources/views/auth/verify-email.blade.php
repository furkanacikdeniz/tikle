<x-guest-layout>
    <div class="mb-4 text-sm text-gray-300">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-yellow-accent"> {{-- Changed to yellow-accent --}}
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="
                    bg-yellow-accent text-dark-primary
                    hover:bg-yellow-accent-dark focus:bg-yellow-accent-dark
                    active:bg-yellow-accent-dark border-transparent
                    focus:ring-yellow-accent focus:ring-offset-dark-primary">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-300 {{-- Changed text color --}}
                hover:text-yellow-accent rounded-md focus:outline-none focus:ring-2
                focus:ring-offset-2 focus:ring-yellow-accent focus:ring-offset-dark-primary"> {{-- Changed focus ring --}}
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
