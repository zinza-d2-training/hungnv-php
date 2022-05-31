<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
{{--    <div>--}}
{{--        {{ $logo }}--}}
{{--    </div>--}}
{{--    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" >--}}
    <div class="w-full bg-white sm:rounded-lg" style="width: 480px !important;">
        {{ $title }}

        <div class="border-inherit px-6 py-4" style="height: 113px; line-height: 113px;">
            {{ $logo }}
        </div>
        <div class="px-6 py-4" style="min-height: 223px; ">
            {{ $slot }}
        </div>

        {{ $other }}

    </div>
</div>
