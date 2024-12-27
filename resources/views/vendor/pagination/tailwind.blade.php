@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="bg-gray-900 text-gray-100 p-4 rounded-lg shadow-md">
        <div class="flex flex-col items-center space-y-4">
            {{-- Navigasi Halaman --}}
            <div class="flex items-center space-x-2">
                {{-- Tombol Sebelumnya --}}
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-2 text-sm text-gray-500 bg-gray-800 border border-gray-700 rounded-lg cursor-not-allowed" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 text-sm text-gray-100 bg-blue-700 hover:bg-blue-800 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                @endif

                {{-- Nomor Halaman --}}
                <div class="hidden md:flex space-x-2">
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="px-3 py-2 text-sm text-gray-500 bg-gray-800 border border-gray-700 rounded-lg">...</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="px-3 py-2 text-sm text-white bg-blue-700 rounded-lg">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-2 text-sm text-gray-100 bg-gray-800 hover:bg-gray-700 border border-gray-700 rounded-lg">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- Tombol Selanjutnya --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 text-sm text-gray-100 bg-blue-700 hover:bg-blue-800 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <span class="px-3 py-2 text-sm text-gray-500 bg-gray-800 border border-gray-700 rounded-lg cursor-not-allowed" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                @endif
            </div>

            {{-- Informasi Halaman --}}
            <div class="text-center">
                <p class="text-sm text-gray-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-semibold text-gray-100">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-semibold text-gray-100">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-semibold text-gray-100">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>
    </nav>
@endif