<x-app-layout>
    @section('title')
        Create company
    @endsection
    @php
        $breadcrumbs = [
            'dashboard' => 'Dasboard',
            'companies' => 'Company',
            'create' => 'Create',
            ];
    @endphp
    <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb>

    <div class="w-full mx-auto">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="px-6 py-2 bg-white border-b border-gray-200">
                <div class="relative mt-1 mb-5">
                    <span style="font-size: 17px; font-weight: bold;">Create company</span>
                    <a href="{{ route('companies.index') }}">
                        <button type="submit"
                                class="absolute right-0 px-6 py-1 border border-transparent rounded-md text-white content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                style="background-color: #3CA3DD; height: 36px;">
                            {{ __('Back') }}
                        </button>
                    </a>
                </div>
                <form class="w-full md:w-1/2" action="{{ route('companies.store') }}" method="POST"
                      enctype="multipart/form-data" style="min-height: 460px;">
                    @csrf
                    <div class="flex gap-5 mb-6">
                        <div class="flex-1">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Name
                            </label>
                            <input
                                class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                id="name" name="name" type="text" placeholder="Name"
                                value="{{ old('name') }}">
                            @error('name')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Avatar
                            </label>
                            <div class="image-preview-box"></div>
                            @error('avatar')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-5 mb-6">
                        <div class="flex-1">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="old_password" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Address
                            </label>
                            <input
                                class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                id="address" name="address" type="text" placeholder="Address"
                                value="{{  old('address') }}">
                            @error('address')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="max_users" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Max users
                            </label>
                            <input
                                class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                id="max_users" name="max_users" type="text" placeholder="Max users"
                                value="{{  old('max_users') }}">
                            @error('max_users')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-5 mb-6">
                        <div class="flex-1">
                            <div class="relative">
                                <label class="block tracking-wide text-gray-700 font-bold"
                                       for="dob" style="height: 32px; font-size: 16px; font-weight: 400;">
                                    Expired at
                                </label>
                                <input datepicker type="text" id="expired_at" name="expired_at"
                                       class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                       placeholder="Expired at" datepicker-format="dd/mm/yyyy"
                                       value="{{ old('expired_at') }}">
                                @error('expired_at')
                                <x-toast>{{ $message }}</x-toast>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-1">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="status" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Status
                            </label>
                            <select id="status" name="status"
                                    class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500">
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-5 mb-6">
                        <div class="flex-1">
                            <button type="submit"
                                    class="w-full items-center mt-4 px-4 py-2 border border-transparent rounded-md text-white content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    style="background-color: #3CA3DD; height: 40px;">
                                {{ __('Save') }}
                            </button>
                        </div>
                        <div class="flex-1"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script src="{{ asset('/js/datepicker.js') }}"></script>
        <script>
            previewImage.init('.image-preview-box', {
                inputClass: "appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500",
                inputName: 'avatar',
                placeholder: "Avatar",
                style: "padding: 9px 16px;",
            })
        </script>
    @endpush
</x-app-layout>
