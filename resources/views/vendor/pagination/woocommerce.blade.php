@if ($paginator->hasPages())
    <ul class="page-numbers">
        @if ($paginator->onFirstPage())
            <li><span class="prev page-numbers disabled" aria-hidden="true">&larr;</span></li>
        @else
            <li><a class="prev page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr;</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li><span class="page-numbers dots">{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span aria-current="page" class="page-numbers current">{{ $page }}</span></li>
                    @else
                        <li><a class="page-numbers" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next">&rarr;</a></li>
        @else
            <li><span class="next page-numbers disabled" aria-hidden="true">&rarr;</span></li>
        @endif
    </ul>
@endif
