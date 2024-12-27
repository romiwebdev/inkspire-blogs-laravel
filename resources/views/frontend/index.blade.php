@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header with Animation --}}
        <h1 class="text-4xl font-bold text-white mb-12 text-center flex items-center justify-center space-x-4 animate-fade-in">
            <svg class="w-12 h-12 text-blue-500 transform hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.071 0l-.344.344a2.5 2.5 0 01-3.536 0l-.344-.344z"></path>
            </svg>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">All Posts</span>
        </h1>

        {{-- Pencarian dan Filter --}}
        @include('frontend.partials.search-filter')

        {{-- Conditional Content Rendering --}}
@if(request()->has('query') && request('query') !== '')
    {{-- Display Search Results --}}
    <div class="mt-12">
        <h2 class="text-3xl font-bold text-white mb-6 flex items-center">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">Search Results</span>
            <div class="h-1 flex-grow ml-6 bg-gradient-to-r from-blue-400 to-transparent rounded"></div>
        </h2>

        @if($posts->isEmpty())
            <p class="text-white">No results found for your search.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mx-4 sm:mx-0">
                @foreach($posts as $key => $post)
                <div class="post-card group relative bg-gradient-to-br from-gray-800 
                    {{ $key % 4 == 0 ? 'to-rose-900' : 
                       ($key % 4 == 1 ? 'to-indigo-800' : 
                       ($key % 4 == 2 ? 'to-blue-800' : 
                       'to-sky-900')) }} 
                    rounded-2xl overflow-hidden shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                    <div class="p-6 flex flex-col h-full">
                        <!-- Header with Animation -->
                        <div class="flex justify-between items-start mb-4">
                            <span class="bg-white/10 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm group-hover:bg-blue-500/20 transition-all duration-300">
                                {{ $post->category->name }}
                            </span>
                            <div class="flex items-center text-white/70">
                                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $post->views }}</span>
                            </div>
                        </div>

                        <!-- Title with Hover Effect -->
                        <a href="{{ route('frontend.post', $post->id) }}" class="block text-xl md:text-2xl font-bold text-white mb-3 hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                            {{ $post->title }}
                        </a>
                        
                        <!-- Author Info -->
                        <div class="flex items-center space-x-2 text-white/60 mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm">{{ $post->author->name }}</span>
                        </div>

                        <!-- Content -->
                        <div class="flex-grow">
                            <p class="text-white/70 line-clamp-3 mb-4">
                                {{ $post->excerpt ?? Str::limit($post->content, 100) }}
                            </p>
                        </div>

                        <!-- Modern Footer -->
                        <div class="mt-auto pt-4 flex justify-between items-center border-t border-white/10">
                            <span class="text-sm text-white/60">{{ $post->created_at->diffForHumans() }}</span>
                            <a href="{{ route('frontend.post', $post->id) }}" class="group flex items-center text-white hover:text-blue-400 transition-colors duration-300">
                                <span class="mr-2 text-sm">Read More</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-12">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
        @endif
    </div>
        @else
            {{-- Display Popular Posts, Admin Posts, Author Posts --}}
            {{-- Post Populer dengan Animation --}}
        @if($popularPosts->isNotEmpty())
        <div class="mt-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-white mb-6 flex items-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">Popular Posts</span>
                <div class="h-1 flex-grow ml-6 bg-gradient-to-r from-blue-400 to-transparent rounded"></div>
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mx-4 sm:mx-0">
    @foreach($popularPosts as $key => $post)
    <div class="post-card relative bg-gradient-to-br from-gray-800 {{ $key == 0 ? 'to-red-900' : ($key == 1 ? 'to-blue-900' : ($key == 2 ? 'to-green-900' : 'to-purple-900')) }} rounded-2xl overflow-hidden shadow-lg transform transition-all duration-300 hover:scale-105">
        <div class="p-6 flex flex-col h-full">
                        {{-- Header --}}
                        <div class="flex justify-between items-start mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="bg-white/20 text-white font-bold rounded-full w-10 h-10 flex items-center justify-center">
                                    #{{$key + 1}}
                                </div>
                                <span class="bg-white/20 text-white text-xs px-3 py-1 rounded-full">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                            <div class="flex items-center text-white/70">
                                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $post->views }}</span>
                            </div>
                        </div>

                        {{-- Title & Author --}}
                        <a href="{{ route('frontend.post', $post->id) }}" class="block text-2xl font-bold text-white mb-3 hover:text-blue-300 transition-colors line-clamp-2">
                            {{ $post->title }}
                        </a>
                        
                        <div class="flex items-center space-x-2 text-white/60 mb-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-sm">{{ $post->author->name }}</span>
                        </div>

                        {{-- Content --}}
                        <div class="flex-grow">
                            <p class="text-white/70 line-clamp-3 mb-4">
                                {{ $post->excerpt ?? Str::limit($post->content, 100) }}
                            </p>
                        </div>

                        {{-- Footer --}}
                        <div class="mt-auto pt-4 flex justify-between items-center border-t border-white/10">
                            <span class="text-sm text-white/60">{{ $post->created_at->diffForHumans() }}</span>
                            <a href="{{ route('frontend.post', $post->id) }}" class="group flex items-center text-white hover:text-blue-300 transition-colors">
                                <span class="mr-2 text-sm">Read More</span>
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Postingan Admin dengan Carousel --}}
@if($adminPosts->isNotEmpty())
<div class="mt-12 px-4 sm:px-0" data-aos="fade-up">
<h2 class="text-3xl font-bold text-white mb-6 flex items-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">Admin Posts</span>
                <div class="h-1 flex-grow ml-6 bg-gradient-to-r from-blue-400 to-transparent rounded"></div>
            </h2>
    
    <!-- Carousel Container -->
    <div id="admin-posts-carousel" class="relative w-full" data-carousel="slide">
    <div class="relative h-auto overflow-hidden rounded-lg gap-4" style="display: flex; align-items: stretch;">
        @foreach($adminPosts as $key => $post)
        <div class="{{ $key == 0 ? 'block' : 'hidden' }} duration-[3000ms] ease-in-out" data-carousel-item aria-hidden="{{ $key == 0 ? 'false' : 'true' }}">
            <div class="post-card flex-none w-full bg-gradient-to-br from-gray-800 to-blue-800 rounded-2xl overflow-hidden shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
                <div class="p-6 flex flex-col h-full">
                    <!-- Konten Post -->
                    <div class="flex justify-between items-start mb-4">
                        <span class="bg-white/20 text-white text-xs px-3 py-1 rounded-full">{{ $post->category->name }}</span>
                        <div class="flex items-center text-white/70">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $post->views }}</span>
                        </div>
                    </div>

                    <!-- Title & Author -->
                    <a href="{{ route('frontend.post', $post->id) }}" class="block text-xl sm:text-2xl font-bold text-white mb-3 hover:text-blue-300 transition-colors line-clamp-2">
                        {{ $post->title }}
                    </a>
                    
                    <div class="flex items-center space-x-2 text-white/60 mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-sm">{{ $post->author->name }}</span>
                    </div>

                    <!-- Content -->
                    <div class="flex-grow">
                        <p class="text-white/70 mb-4 md:line-clamp-3 line-clamp-1">
                            {{ $post->excerpt ?? Str::limit($post->content, 300) }}
                        </p>
                    </div>

                    <!-- Footer -->
                    <div class="mt-auto pt-4 flex flex-wrap justify-between items-center border-t border-white/10">
                        <span class="text-sm text-white/60">{{ $post->created_at->diffForHumans() }}</span>
                        <a href="{{ route('frontend.post', $post->id) }}" class="group flex items-center text-white hover:text-blue-300 transition-colors">
                            <span class="mr-2 text-sm">Read More</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

<script>
    window.addEventListener('load', function () {
        adjustCarouselHeight();
    });

    window.addEventListener('resize', function () {
        adjustCarouselHeight();
    });

    function adjustCarouselHeight() {
        var carouselItems = document.querySelectorAll('#admin-posts-carousel .post-card');
        var maxHeight = 0;

        // Menemukan tinggi terbesar di antara semua card
        carouselItems.forEach(function(item) {
            var itemHeight = item.offsetHeight;
            if (itemHeight > maxHeight) {
                maxHeight = itemHeight;
            }
        });

        // Mengatur tinggi carousel berdasarkan tinggi item terbesar
        var carouselWrapper = document.querySelector('#admin-posts-carousel .relative');
        if (carouselWrapper) {
            carouselWrapper.style.height = maxHeight + 'px';
        }
    }
</script>


    <!-- Slider Indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        @foreach($adminPosts as $key => $post)
        <button type="button" class="w-3 h-3 rounded-full {{ $key == 0 ? 'bg-blue-600' : 'bg-white/50' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key + 1 }}" data-carousel-slide-to="{{ $key }}"></button>
        @endforeach
    </div>

    <!-- Slider Controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/20 group-hover:bg-white/40 focus:ring-4 focus:ring-white">
            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/20 group-hover:bg-white/40 focus:ring-4 focus:ring-white">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 9l4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

</div>
@endif

{{-- Post Author with Modern Grid --}}
        <div class="mt-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-white mb-6 flex items-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-600">Author Posts</span>
                <div class="h-1 flex-grow ml-6 bg-gradient-to-r from-blue-400 to-transparent rounded"></div>
            </h2>
            
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mx-4 sm:mx-0">
    @foreach($authorPosts as $key => $post)
    <div class="post-card group relative bg-gradient-to-br from-gray-800 
        {{ $key % 4 == 0 ? 'to-rose-900' : 
           ($key % 4 == 1 ? 'to-indigo-800' : 
           ($key % 4 == 2 ? 'to-blue-800' : 
           'to-sky-900')) }} 
        rounded-2xl overflow-hidden shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-2xl">
        <div class="p-6 flex flex-col h-full">
            <!-- Header with Animation -->
            <div class="flex justify-between items-start mb-4">
                <span class="bg-white/10 text-white text-xs px-3 py-1 rounded-full backdrop-blur-sm group-hover:bg-blue-500/20 transition-all duration-300">
                    {{ $post->category->name }}
                </span>
                <div class="flex items-center text-white/70">
                    <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ $post->views }}</span>
                </div>
            </div>

            <!-- Title with Hover Effect -->
            <a href="{{ route('frontend.post', $post->id) }}" class="block text-xl md:text-2xl font-bold text-white mb-3 hover:text-blue-400 transition-colors duration-300 line-clamp-2">
                {{ $post->title }}
            </a>
            
            <!-- Author Info -->
            <div class="flex items-center space-x-2 text-white/60 mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="text-sm">{{ $post->author->name }}</span>
            </div>

            <!-- Content -->
            <div class="flex-grow">
                <p class="text-white/70 line-clamp-3 mb-4">
                    {{ $post->excerpt ?? Str::limit($post->content, 100) }}
                </p>
            </div>

            <!-- Modern Footer -->
            <div class="mt-auto pt-4 flex justify-between items-center border-t border-white/10">
                <span class="text-sm text-white/60">{{ $post->created_at->diffForHumans() }}</span>
                <a href="{{ route('frontend.post', $post->id) }}" class="group flex items-center text-white hover:text-blue-400 transition-colors duration-300">
                    <span class="mr-2 text-sm">Read More</span>
                    <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>


            {{-- Modern Pagination --}}
            <div class="mt-12">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</div>
            @endif
    </div>
</div>
@endsection
