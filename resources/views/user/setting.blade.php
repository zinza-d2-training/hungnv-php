<x-app-layout>
    @section('title')
        Setting
    @endsection
    @push('css')
        <style>
            .image-upload > input {
                display: none;
            }
        </style>

    @endpush
    @php
        $array = [
            'dashboard' => 'Dasboard',
            'user' => 'User'
            ];
        $lastItem = "Setting";
    @endphp
    <x-breadcrumb :array="$array" :lastItem="$lastItem">

    </x-breadcrumb>

    {{--    <div style="margin-top: 35px;">--}}
    <div class="w-full mx-auto">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="px-6 py-2 bg-white border-b border-gray-200">
                <span style="font-size: 17px; font-weight: bold;">Account info</span>
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6 image-upload relative">
                        <img src="/images/logo.png" style="height: 92px;border-radius: 9999px; margin: 20px 0;">
                        <label for="file-input">
                            <img src="/images/camera.png" class="absolute" style="left: 100px; bottom: 20px"/>
                        </label>
                        <input id="file-input" type="file"/>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6 pt-1" style="padding-bottom: 20px;">
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold mb-2"
                                   for="grid-last-name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Name
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Name">
                        </div>
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold mb-2"
                                   for="grid-last-name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Email
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Email">
                        </div>
                        <div class="w-full md:w-1/4"></div>
                        <div class="w-full md:w-1/4"></div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6" style="padding-bottom: 20px;">
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold mb-2"
                                   for="grid-last-name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Old password
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Old password">
                        </div>
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold mb-2"
                                   for="grid-last-name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Password
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Password">
                        </div>
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold mb-2"
                                   for="grid-last-name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Confirm password
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Confirm password">
                        </div>
                        <div class="w-full md:w-1/4"></div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold mb-2"
                                   for="grid-last-name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Dob
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="text" placeholder="Doe">
                        </div>
                        <div class="w-full md:w-1/4"></div>
                        <div class="w-full md:w-1/4"></div>
                        <div class="w-full md:w-1/4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    </div>--}}
</x-app-layout>
