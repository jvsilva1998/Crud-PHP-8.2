@if ($paginator->hasPages())
    <nav>
        <ul class="pagination justify-content-center">
            {{-- Botão "Anterior" --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">&laquo; Anterior</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Anterior</a>
                </li>
            @endif

            {{-- Páginas --}}
            @foreach ($elements as $element)
                {{-- "three dots" separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Links de páginas --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Botão "Próximo" --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Próximo &raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">Próximo &raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
