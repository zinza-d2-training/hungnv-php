<x-app-layout>
    @section('title')
        Company management
    @endsection
    @push('css')
        <link rel="stylesheet"
              href="/css/sweetalert2.min.css"
              integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <script src="/js/sweetalert2.all.min.js"
                integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endpush
    @php
        $breadcrumbs = [
            'dashboard' => 'Dasboard',
            'user' => 'Company'
            ];
    @endphp
    <x-breadcrumb :breadcrumbs="$breadcrumbs"></x-breadcrumb>

    <div class="w-full mx-auto relative">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="px-6 py-2 bg-white border-b border-gray-200">
                <div class="relative mt-1">
                    <span style="font-size: 17px; font-weight: bold;">Company management</span>
                    <a href="{{ route('companies.create') }}">
                        <button type="submit"
                                class="absolute right-0 px-4 py-1 border border-transparent rounded-md text-white content-center hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                style="background-color: #3CA3DD; height: 36px;">
                            {{ __('New Company') }}
                        </button>
                    </a>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10" style="min-height: 400px;">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-200 border dark:bg-gray-800 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Company account
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Company name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Number of users
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">
                                            <img class="rounded-full" src="/images/logo.png" width="40" height="40"
                                                 alt="">
                                        </div>
                                        <div class="font-normal text-gray-900">Admin<br>
                                            <span class="text-gray-600">
                                            admin@zinza.com.vn
                                        </span>
                                        </div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($item->status == 1)
                                        <span
                                            class="bg-green-700 text-white text-xs uppercase font-semibold mr-2 px-2 py-1 rounded dark:bg-green-200 dark:text-green-900">Active</span>
                                    @elseif($item->status == 0)
                                        <span
                                            class="bg-red-700 text-white text-xs uppercase font-semibold mr-2 px-2 py-1 rounded dark:bg-red-200 dark:text-red-900">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->max_users }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <x-dropdown align="right" width="40">
                                        <x-slot name="trigger">
                                            <button
                                                class="text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                                ...
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Authentication -->
                                            <x-dropdown-link :href="route('companies.edit',$item->id)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link class="btn-delete" data-id="{{ $item->id }}">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination px-4 py-3">
                        {!! $companies->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            const deleteBtns = document.querySelectorAll('.btn-delete');
            deleteBtns.forEach(btn => {
                btn.addEventListener('click', confirmDelete);
            });

            function confirmDelete(event) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((isConfirm) => {
                    if (isConfirm.value) {
                        let url = '{{ route("companies.destroy", ":id") }}';
                        url = url.replace(':id', event.target.dataset.id);
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            success: function (data) {
                                Swal.fire(`${data.title}!`, data.message, "success");
                                const trElement = event.target.closest('tr');
                                trElement.remove();
                            },
                            error: function (data) {
                                Swal.fire(data.title + "!", data.message, data.status);
                            }
                        });
                    } else {
                        Swal.fire("Cancelled", "Action has been canceled.", "error");
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
