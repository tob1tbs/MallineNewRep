@if ($paginator->hasPages())
<div class="pagination-area mt-20 mb-20">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if($paginator->onFirstPage())

            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fi-rs-arrow-small-left"></i></a>
            </li>
            @endif

            @foreach($elements as $element)
                @if (is_string($element))
                    <li class="page-item active"><a class="page-link">{{ $element }}</a></li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fi-rs-arrow-small-right"></i></a>
            </li>
            @endif
        </ul>
    </nav>
</div>
@endif

