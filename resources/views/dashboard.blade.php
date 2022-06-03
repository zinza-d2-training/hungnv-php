<x-app-layout>
    @section('title')
        Dashboard
    @endsection
    @php
        $array = ['Dashboard'];
    @endphp
    <x-breadcrumb :array="$array"></x-breadcrumb>

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
