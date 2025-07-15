@if ($paginator->hasPages())
    <div class="flex flex-col items-center space-y-2">
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="w-8 h-8 flex items-center justify-center text-gray-400 cursor-not-allowed">&lsaquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous" class="w-8 h-8 flex items-center justify-center rounded-full text-red-800 hover:bg-red-100 hover:text-red-900 transition">&lsaquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="w-8 h-8 flex items-center justify-center text-gray-400">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-red-800 text-white font-bold shadow">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="w-8 h-8 flex items-center justify-center rounded-full text-red-800 hover:bg-red-100 hover:text-red-900 transition">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next" class="w-8 h-8 flex items-center justify-center rounded-full text-red-800 hover:bg-red-100 hover:text-red-900 transition">&rsaquo;</a>
            @else
                <span class="w-8 h-8 flex items-center justify-center text-gray-400 cursor-not-allowed">&rsaquo;</span>
            @endif
        </nav>
        <div class="text-gray-500 text-sm mt-1">
            @php
                $from = ($paginator->currentPage() - 1) * $paginator->perPage() + 1;
                $to = min($paginator->currentPage() * $paginator->perPage(), $paginator->total());
                $total = $paginator->total();
            @endphp
            Showing {{ $from }}-{{ $to }} of {{ $total }} items
        </div>
    </div>
@endif
