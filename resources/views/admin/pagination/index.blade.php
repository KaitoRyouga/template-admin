@if ($paginator->hasPages())
    <div class="row p-4">
        <div class="col-md-6 mt-1 d-none d-md-block">
            {{-- {{ $paginator->total() }}1-{{ $paginator->total() <= $paginator->perPage() ? $paginator->total() : ($paginator->currentPage() * $paginator->perPage() >= $paginator->total() ? $paginator->total() : $paginator->currentPage() * $paginator->perPage()) }}
            photos --}}
        </div>
        <div class="col-md-6">
            <div class="float-end" style="float: right">
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item page-prev disabled"> <a class="page-link" href="#"
                                tabindex="-1">Prev</a>
                        </li>
                    @else
                        <li class="page-item page-prev"> <a class="page-link"
                                href="{{ $paginator->previousPageUrl() }}" tabindex="-1">Prev</a> </li>
                    @endif

                    @if ($paginator->lastPage() > 3)
                        @if ($paginator->currentPage() > 3)
                            <li class="page-item active"><a class="page-link"
                                    href="{{ $paginator->url(1) }}">1</a>
                            </li>
                        @endif
                        @if ($paginator->currentPage() >= 3 && $paginator->currentPage() <= $paginator->lastPage())
                            <li class="page-item page-next disabled"> <a class="page-link" href="#">...</a>
                            </li>
                        @endif

                    @endif

                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active"><a class="page-link"
                                            href="#">{{ $page }}</a>
                                    </li>
                                @elseif (($page == $paginator->currentPage() + 1 || $page ==
                                    $paginator->currentPage() - 1 )
                                    || $page == $paginator->lastPage())
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @elseif ($page == $paginator->lastPage() - 1)
                                    <li class="page-item page-next disabled"> <a class="page-link" href="#">...</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    @if ($paginator->hasMorePages())
                        <li class="page-item page-next"> <a class="page-link"
                                href="{{ $paginator->nextPageUrl() }}">Next</a> </li>
                    @else
                        <li class="page-item page-next disabled"> <a class="page-link" href="#">Next</a> </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
@else
    <div class="row p-4">
        <div class="col-md-6 mt-1 d-none d-md-block">
            {{-- {{ $paginator->total() }}1-{{ $paginator->total() <= $paginator->perPage() ? $paginator->total() : ($paginator->currentPage() * $paginator->perPage() >= $paginator->total() ? $paginator->total() : $paginator->currentPage() * $paginator->perPage()) }}
            photos --}}
        </div>
    </div>
@endif