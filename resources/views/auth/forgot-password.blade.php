<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                @error('email')
                    <div class="font-extralight text-red-600 pt-2">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                @error('messages')
                    <div class="font-extralight text-red-600 pt-2">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Send Email') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
