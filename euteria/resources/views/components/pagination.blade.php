@if ($paginator->hasPages())
    <div class="row gx-3 mt-5 justify-content-center align-items-center paginate-nav">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{--  --}}
            @else
                <div class="col-auto">
                    <a href="{{ $paginator->previousPageUrl() }}" class="paginate-nav-item is-ball is-border" data-to="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="col-auto">
                        <span class="paginate-nav-item is-ball">{{ $element }}</span>
                    </div>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <div class="col-auto">
                            @if ($page == $paginator->currentPage())
                                <span class="paginate-nav-item is-ball active">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="paginate-nav-item is-ball">
                                    {{ $page }}
                                </a>
                            @endif
                        </div>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div class="col-auto">
                    <a href="{{ $paginator->nextPageUrl() }}" class="paginate-nav-item is-ball is-border" data-to="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            @else
                {{--  --}}
            @endif
        </ul>
    </nav>
@endif
