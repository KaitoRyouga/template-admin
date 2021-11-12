@if ($paginator->hasPages())
    <!-- Pagination -->
    <ul class="page-numbers nav-pagination links text-center">
        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <li>
                <a class="prev page-number" href="{{ $paginator->previousPageUrl() }}">
                    <i class="icon-angle-left"></i>
                </a>
            </li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span aria-current="page" class="page-number current">{{ $page }}</span></li>
                    @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2)
                        || $page == $paginator->lastPage())
                        <li><a class="page-number" href="{{ $url }}">{{ $page }}</a></li>
                    @elseif ($page == $paginator->lastPage() - 1)
                        <li>
                            <a class="next page-number" href="{{ $paginator->nextPageUrl() }}">
                                <i class="icon-angle-right"></i></a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="next page-number" href="{{ $paginator->nextPageUrl() }}">
                    <i class="icon-angle-right"></i></a>
            </li>
        @endif
    </ul>
    <!-- Pagination -->
@endif
