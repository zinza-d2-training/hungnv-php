<x-app-layout>
    <x-slot name="header">
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
    </x-slot>

    <nav class="flex px-6" aria-label="Breadcrumb" style="height: 35px; ">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-blue-600 dark:text-blue-400 dark:hover:text-white">
                    Dashboard
                </a>
            </li>
        </ol>
    </nav>

{{--    <div style="margin-top: 35px;">--}}
        <div class="w-full mx-auto">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6 bg-white border-b border-gray-200">
                    Dashboard
                </div>
            </div>
        </div>
{{--    </div>--}}
</x-app-layout>
