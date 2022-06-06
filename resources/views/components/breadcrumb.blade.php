<nav class="flex px-6" aria-label="Breadcrumb" style="height: 35px; ">
    <ol class="inline-flex items-center space-x-1 md:space-x-1">
        @if(is_array($breadcrumbs) || count($breadcrumbs))
            @foreach ($breadcrumbs as $href => $item)
                @if($item == end($breadcrumbs))
                    <li aria-current="page">
                        <div class="flex items-center">
                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400"
                          style="color: blue;">{{ $item }}</span>
                        </div>
                    </li>
                @else
                    <li class="inline-flex items-center">
                        <a href="/{{ $href }}"
                           class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                            {{ $item }}
                            <span class="ml-2 w-4">/</span>
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    </ol>
</nav>
