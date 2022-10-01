@if ($paginator->hasPages())
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
        <p class="flex items-center col-span-3">
            {!! __('Showing') !!} {{ $paginator->firstItem() }} {!! __('to') !!}
            {{ $paginator->lastItem() }} {!! __('of') !!} {{ $paginator->total() }} {!! __('results') !!}

        </p>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <li>
                        @if ($paginator->onFirstPage())
                            <a class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none  cursor-not-allowed"
                                aria-label="Previous">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}"
                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none"
                                aria-label="Previous">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </a>
                        @endif
                    </li>
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li>
                                <span class="px-3 py-1" aria-disabled="true">{{ $element }}</span>
                            </li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li>
                                        <button aria-current="page"
                                            class="px-3 py-1 text-white transition-colors duration-150 bg-red-600 border border-r-0 border-red-600 rounded-md focus:outline-none">
                                            {{ $page }}
                                        </button>
                                    </li>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-3 py-1 rounded-md focus:outline-none" id="pagenum">
                                        {{ $page }}
                                    </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach


<li>
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none" aria-label="Next">
        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
            <path
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
    </a>
    @else
    <a class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none cursor-not-allowed" aria-label="Next">
        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
            <path
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
    </a>
    @endif
</li>
</ul>
</nav>
</span>
</div>
@endif
