@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed font-medium">
                &laquo; Sebelumnya
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-white border-2 border-[#5EA38B] text-[#5EA38B] rounded-xl hover:bg-[#5EA38B] hover:text-white transition-all duration-300 font-medium">
                &laquo; Sebelumnya
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-4 py-2 text-gray-500">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-[#5EA38B] text-white rounded-xl font-bold shadow-md">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-white border-2 border-gray-200 text-gray-700 rounded-xl hover:border-[#5EA38B] hover:text-[#5EA38B] transition-all duration-300 font-medium">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-white border-2 border-[#5EA38B] text-[#5EA38B] rounded-xl hover:bg-[#5EA38B] hover:text-white transition-all duration-300 font-medium">
                Selanjutnya &raquo;
            </a>
        @else
            <span class="px-4 py-2 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed font-medium">
                Selanjutnya &raquo;
            </span>
        @endif
    </nav>
@endif
