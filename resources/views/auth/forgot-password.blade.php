<x-guest-layout>
    <x-auth-card>
        <x-slot name="title">
            <div class="border-inherit px-6 py-4" style="height: 72px; line-height: 38px; border-bottom-width: 1px;">
                <p class="font-bold" style="font-weight: 700;">
                    Forgot password
                </p>
            </div>
        </x-slot>

        <x-slot name="logo">
{{--            <a href="/">--}}
                <div class="flex justify-center">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </div>
{{--            </a>--}}
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                         autofocus/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        style="background-color: #3CA3DD;">
                    {{ __('Email Password Reset Link') }}
                </button>
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
            </div>
        </form>
        <x-slot name="other">
        </x-slot>
    </x-auth-card>
</x-guest-layout>
