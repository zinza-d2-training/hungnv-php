<x-guest-layout>
    <x-auth-card >
        <x-slot name="title">
            <div class="border-inherit px-6 py-4" style="height: 72px; line-height: 38px; border-bottom-width: 1px;">
                <p class="font-bold" style="font-weight: 700;">
                    Login
                </p>
            </div>
        </x-slot>
        <x-slot name="logo">
            <div class="flex justify-center">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500 "/>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <input id="email"
                       class="block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       type="email"
                       name="email"
                       :value="old('email')"
                       placeholder="Email"
                       required autofocus
                       style="height: 37px;">
            </div>

            <!-- Password -->
            <div class="mt-4">
                <input id="password"
                       class="block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       type="password"
                       name="password"
                       placeholder="Password"
                       required autocomplete="current-password"
                       style="height: 37px;">
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 relative">
                <label for="remember_me" class="inline-flex items-center ">
                    <input id="remember_me" type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900 absolute right-0" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </label>
            </div>

            <div class="flex items-center mt-4">
                <button type="submit" class="w-full items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                    style="background-color: #3CA3DD;">
                    {{ __('Login') }}
                </button>
            </div>

        </form>
        <x-slot name="other">
            <div class="px-6 " >
                <div class="relative items-center" style="height: 36px; line-height: 36px;">
                    <div class="border absolute left-0 mt-4" style="width: 190px; border-color: black;"></div>
                    <div class="absolute" style="width: 20px; left: 205px;">Or</div>
                    <div class="border absolute right-0 mt-4" style="width: 190px; border-color: black;"></div>
                </div>

            </div>
            <div class="px-6 py-4 items-center relative" style="height: 320px;">
                <button type="submit" class="w-full items-center px-4 py-2 border border-inherit rounded-md font-semibold text-black content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        style="background-color: #F9F9FB; ">
                    <img src="/images/google.png" class="absolute" alt="google.png" style="left: 122px;">
                    {{ __('Login with google') }}
                </button>
                <button type="submit" class="w-full items-center px-4 py-2 mt-4 border border-inherit rounded-md font-semibold text-black content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        style="background-color: #F9F9FB;">
                    <img src="/images/facebook.png" class="absolute" alt="facebook.png" style="left: 122px;">
                    {{ __('Login with facebook') }}
                </button>
                <button type="submit" class="w-full items-center px-4 py-2 mt-4 border border-inherit rounded-md font-semibold text-black content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                        style="background-color: #F9F9FB;">
                    <img src="/images/apple.png" class="absolute" alt="apple.png" style="left: 122px;">
                    {{ __('Login with apple') }}
                </button>

            </div>
        </x-slot>
    </x-auth-card>
</x-guest-layout>
