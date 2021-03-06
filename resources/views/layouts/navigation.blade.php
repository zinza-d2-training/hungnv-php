<nav x-data="{ open: false }" class="border-b border-gray-100"
     style="background: linear-gradient(90deg, #D51E36 0%, rgba(39, 52, 148, 0.98) 100%);">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:flex text-white">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('user')" :active="request()->routeIs('user')">
                        {{ __('User') }}
                    </x-nav-link>
                    <x-nav-link :href="route('companies.index')" :active="request()->routeIs('companies.index')">
                        {{ __('Company') }}
                    </x-nav-link>
                    <x-nav-link :href="route('topic')" :active="request()->routeIs('topic')">
                        {{ __('Topic') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tag')" :active="request()->routeIs('tag')">
                        {{ __('Tag') }}
                    </x-nav-link>
                    <x-nav-link :href="route('post')" :active="request()->routeIs('post')">
                        {{ __('Post') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <input id="password"
                       class="block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mr-10"
                       type="text"
                       name="keyword"
                       placeholder="Search..."
                       required autocomplete="current-password"
                       style="height: 40px; width: 252px; margin-right: 30px;">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div id="avt">
                                <img
                                    src="{{ empty(auth()->user()->avatar) ? '/images/logo.png' : '/storage/uploads/user/'.auth()->user()->avatar }}"
                                    alt="avatar.png" width="36px" style="border-radius: 18px;">
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <x-dropdown-link :href="route('user.setting')">
                            {{ __('Setting') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user')" :active="request()->routeIs('user')">
                {{ __('User') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('companies.index')" :active="request()->routeIs('companies.index')">
                {{ __('Company') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('topic')" :active="request()->routeIs('topic')">
                {{ __('Topic') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tag')" :active="request()->routeIs('tag')">
                {{ __('Tag') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('post')" :active="request()->routeIs('post')">
                {{ __('Post') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ auth()->user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
