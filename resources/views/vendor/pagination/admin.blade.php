@if ($paginator->hasPages())
    <nav class="admin-pagination" aria-label="Pagination">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="admin-pagination-disabled">←</span>
        @else
            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="admin-pagination-link"
            >
                ←
            </a>
        @endif

        {{-- Pages --}}
        @foreach ($elements as $element)

            @if (is_string($element))
                <span class="admin-pagination-dots">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())
                        <span class="admin-pagination-current">
                            {{ $page }}
                        </span>
                    @else
                        <a
                            href="{{ $url }}"
                            class="admin-pagination-link"
                        >
                            {{ $page }}
                        </a>
                    @endif

                @endforeach
            @endif

        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="admin-pagination-link"
            >
                →
            </a>
        @else
            <span class="admin-pagination-disabled">→</span>
        @endif

    </nav>
@endif