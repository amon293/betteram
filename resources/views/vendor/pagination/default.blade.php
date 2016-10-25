@if ($paginator->count() > 1)
        <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <a class="disabled item">&laquo;</a>
        @else
            <a class="item" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        <!-- Pagination Elements -->
        @foreach ($elements as $element)
            <!-- "Three Dots" Separator -->
            @if (is_string($element))
                <a class="disabled item">{{ $element }}</a>
            @endif

            <!-- Array Of Links -->
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active item">{{ $page }}</a>
                    @else
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Next Page Link -->
        @if ($paginator->hasMorePages())
            <a class="item" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a class="disabled item">&raquo;</a>
        @endif
@endif
