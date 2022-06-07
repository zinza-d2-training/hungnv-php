<x-app-layout>
    @section('title')
        Update company
    @endsection
    @php
        $breadcrumbs = [
            'dashboard' => 'Dasboard',
            'companies' => 'Company',
            'update' => 'Update',
            ];
    @endphp
    <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb>

    <div class="w-full mx-auto">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="px-6 py-2 bg-white border-b border-gray-200">
                <div class="relative mt-1 mb-5">
                    <span style="font-size: 17px; font-weight: bold;">Update company</span>
                    <a href="{{ route('companies.index') }}">
                        <button type="submit"
                                class="absolute right-0 px-6 py-1 border border-transparent rounded-md text-white content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                style="background-color: #3CA3DD; height: 36px;">
                            {{ __('Back') }}
                        </button>
                    </a>
                </div>
                <form class="w-full" action="{{ route('companies.update', $company->id) }}"
                      enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap mb-6 pt-1">
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Name
                            </label>
                            <input
                                class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                id="name" name="name" type="text" placeholder="Name"
                                value="{{ old('name') ?? $company->name }}">
                            @error('name')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="name" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Avatar
                            </label>
                            <input
                                class="appearance-none block w-full text-gray-700 border border-gray-300 rounded leading-tight focus:outline-none focus:border-gray-500"
                                id="avatar" name="avatar" type="file" placeholder="Avatar" style="padding: 9px 16px;">
                            @error('avatar')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <img src="/storage/uploads/company/{{ $company->avatar }}" id="img-preview" width="90"
                                 alt="" class="{{ empty($company->avatar) ? 'hidden' : '' }}">
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-6">
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="old_password" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Address
                            </label>
                            <input
                                class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                id="address" name="address" type="text" placeholder="Address"
                                value="{{  old('address') ?? $company->address }}">
                            @error('address')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="max_users" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Max users
                            </label>
                            <input
                                class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                id="max_users" name="max_users" type="text" placeholder="Max users"
                                value="{{  old('max_users') ?? $company->max_users }}">
                            @error('max_users')
                            <x-toast>{{ $message }}</x-toast>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-2">
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <div class="relative">
                                <label class="block tracking-wide text-gray-700 font-bold"
                                       for="expired_at" style="height: 32px; font-size: 16px; font-weight: 400;">
                                    Expired at
                                </label>
                                <input datepicker type="text" id="expired_at" name="expired_at"
                                       class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500"
                                       placeholder="Expired at" datepicker-format="dd/mm/yyyy"
                                       value="{{ old('expired_at') ?? date('d-m-Y', strtotime($company->expired_at)) }}">
                                @error('expired_at')
                                <x-toast>{{ $message }}</x-toast>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <label class="block tracking-wide text-gray-700 font-bold"
                                   for="status" style="height: 32px; font-size: 16px; font-weight: 400;">
                                Status
                            </label>
                            <select id="status" name="status"
                                    class="appearance-none block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500">
                                <option value="1" {{ $company->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $company->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap mb-2">
                        <div class="w-full md:w-1/4" style="padding-right: 10px;">
                            <button type="submit"
                                    class="w-full items-center mt-4 px-4 py-2 border border-transparent rounded-md text-white content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                    style="background-color: #3CA3DD; height: 40px;">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        <script src="/js/datepicker.js"></script>
        <script>
            const input = document.getElementById('avatar');
            const image = document.getElementById('img-preview');

            input.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    image.classList.remove("hidden");
                    image.src = src;
                }
            });
        </script>
    @endpush
</x-app-layout>
