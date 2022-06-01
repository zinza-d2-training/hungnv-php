<x-guest-layout>
    <x-auth-card>
        <x-slot name="title">
            <div class="border-inherit px-6 py-4" style="height: 72px; line-height: 38px; border-bottom-width: 1px;">
                <p class="font-bold" style="font-weight: 700;">
                    Reset Password
                </p>
            </div>
        </x-slot>

        <x-slot name="logo">
            <div class="flex justify-center">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 "/>
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
            <x-slot name="other">
            </x-slot>
        </form>
    </x-auth-card>
</x-guest-layout>
