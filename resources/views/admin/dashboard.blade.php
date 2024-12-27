@extends('admin.layouts.app')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-gray-900 text-gray-100">
    <!-- Mobile Sidebar Toggle -->
    <div class="md:hidden bg-gray-800 p-4 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Admin Panel</h2>
        <button id="mobile-menu-toggle" class="text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 w-64 bg-gray-800 p-4 shadow-lg z-50 transition-transform duration-300 ease-in-out">
        <div class="flex items-center mb-8 justify-between">
            <div class="flex items-center">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
            </div>
            <button id="mobile-menu-close" class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <nav>
            <ul class="space-y-2">
            <li>
                    <a href="#analisis" id="analisis-btn" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
    <a href="#blogs-admin" id="blogs-admin-btn" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 group-hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2h-5V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2H5a2 2 0 00-2 2v2" />
        </svg>
        Admin Posts
    </a>
</li>

                <li>
                    <a href="#authors" id="authors-btn" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Authors
                    </a>
                </li>
                <li>
                    <a href="#categories" id="categories-btn" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        Categories
                    </a>
                </li>
                <li>
                    <a href="#posts" id="posts-btn" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Posts
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profile.edit') }}" class="flex items-center p-3 hover:bg-gray-700 rounded-lg transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Profile Settings
                    </a>
                </li>
                <li class="border-t border-gray-700 pt-4 mt-4">
    <a href="{{ url('/blogs') }}" class="flex items-center p-3 hover:bg-blue-700 rounded-lg transition">
        <div class="flex items-center text-blue-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8M8 8h8M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Blogs
        </div>
    </a>
</li>

                <!-- Logout Button -->
                <li class="border-t border-gray-700 pt-4 mt-4">
    <form action="{{ route('logout') }}" method="POST" class="flex items-center p-3 hover:bg-red-700 rounded-lg transition">
        @csrf
        <button type="submit" class="flex items-center text-red-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Logout
        </button>
    </form>
</li>

            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto p-4 md:p-8">
        <!-- Analisis Section -->
        <div id="analisis" class="section">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @php
                $cards = [
                ['title' => 'Total Authors', 'value' => $totalAuthors, 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'text-blue-500'],
                ['title' => 'Total Posts', 'value' => $totalPosts, 'icon' => 'M9 12h6m-6 4h6m2 5H7a 2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'color' => 'text-green-500'],
                ['title' => 'Total Categories', 'value' => $totalCategories, 'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z', 'color' => 'text-purple-500'],
                ['title' => 'Total Comments', 'value' => $totalComments, 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z', 'color' => 'text-red-500'],
                ['title' => 'Total Views', 'value' => $totalViews, 'icon' => 'M12 3C6.48 3 2 7.58 2 12s4.48 9 10 9 10-4.58 10-9-4.48-9-10-9zm0 16c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zm-1-9h2v4h-2zm0-2h2V7h-2z', 'color' => 'text-yellow-500'],
                ['title' => 'Total Visits', 'value' => $totalVisits, 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0', 'color' => 'text-indigo-500']
            ];
                @endphp
                @foreach($cards as $card)
                    <div class="bg-gray-800 p-4 rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 {{ $card['color'] }} mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}" />
                            </svg>
                            <div>
                                <h5 class="text-base md:text-lg font-semibold text-gray-300">{{ $card['title'] }}</h5>
                                <p class="text-xl md:text-2xl font-bold text-white">{{ $card['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Analytics Insights (Responsive Grid) -->
            <div class="mt-6 grid md:grid-cols-2 gap-4">
                <div class="bg-gray-800 rounded-lg p-4 md:p-6">
                    <h3 class="text-lg md:text-xl font-semibold text-white mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 mr-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Analytics Overview
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-gray-300">
                          <span>Average Views per Post</span>
                          <span class="font-bold">
                        {{ $totalPosts > 0 ? number_format($totalViews / $totalPosts, 2) : 0 }}
                         </span>
                         </div>
                            <div class="flex justify-between text-gray-300">
                            <span>Engagement Rate</span>
                             <span class="font-bold">
                             {{ number_format($engagementRate, 2) }}%
                             </span>
                             </div>
                    </div>
                </div>
                
                <div class="bg-gray-800 rounded-lg p-4 md:p-6">
                    <h3 class="text-lg md:text-xl font-semibold text-white mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        Recent Trends
                    </h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-gray-300">
                            <span>New Posts This Month</span>
                             <span class="font-bold">{{ $newPostsThisMonth ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between text-gray-300">
                            <span>New Authors This Month</span>
                            <span class="font-bol d">{{ $newAuthorsThisMonth ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="blogs-admin" class="section hidden container mx-auto px-4 py-8 bg-gray-800">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
        <h2 class="text-3xl font-extrabold text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Posts Admin Management
        </h2>
        <a href="{{ route('posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition-all duration-300 shadow-lg hover:shadow-xl">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
    </svg>
    <span>Add New Blog</span>
</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($adminPosts as $post)
        <div class="bg-gray-700 rounded-xl overflow-hidden shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-2xl relative">
            <div class="absolute top-4 right-4 flex space-x-2 z-10">
                <div class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $post->category->name }}
                </div>
                <div class="{{ $post->status == 'published' ? 'bg-green-500' : 'bg-yellow-500' }} text-white px-3 py-1 rounded-full text-xs font-semibold">
                    {{ ucfirst($post->status) }}
                </div>
            </div>

            <div class="p-6 pt-12 relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-purple-600"></div>
                
                <h3 class="text-xl font-bold text-white mb-4 pr-20">
                    {{ Str::limit($post->title, 60) }}
                </h3>
                
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr($post->author->name, 0, 1)) }}
                        </div>
                        <div class="flex flex-col">
                            <span class="text-gray-300">{{ $post->author->name }}</span>
                            <span class="text-xs text-gray-400 flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="flex space-x-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-400 tooltip" title="View Post">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        {{-- Edit Button --}}
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-400 hover:text-blue-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                        
                        {{-- Delete Button --}}
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6l1-1M5 7h14a2 2 0 012 2v-3a2 2 0 00-2-2H5a2 2 0 00-2 2v3a2 2 0 002 2z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8 flex justify-center">
        {{ $adminPosts->links('vendor.pagination.tailwind') }}
    </div>
</div>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    #blogs-admin .grid > div {
        animation: fadeIn 0.5s ease-out;
        animation-fill-mode: backwards;
    }
    
    #blogs-admin .grid > div:nth-child(2n) {
        animation-delay: 0.1s;
    }
    
    #blogs-admin .grid > div:nth-child(3n) {
        animation-delay: 0.2s;
    }
</style>



        <!-- Other Sections (Authors, Categories, Posts) -->
        <div id="authors" class="section hidden">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0" />
            </svg>
            Author Management
        </h3>
    </div>
    @if($authors->count() > 0)
        <div class="grid gap-4 md:grid-cols-1 lg:grid-cols-2">
            @foreach($authors as $author)
                <div class="bg-gray-800 rounded-lg p-5 shadow-lg hover:shadow-xl transition-all duration-300 group">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="relative">
                                <img 
                                    src="{{ $author->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode($author->name) }}" 
                                    alt="{{ $author->name }}" 
                                    class="w-12 h-12 rounded-full border-2 border-indigo-500 object-cover"
                                >
                                <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full ring-2 ring-white bg-green-400"></span>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-white">{{ $author->name }}</h4>
                                <p class="text-sm text-gray-400">{{ $author->email }}</p>
                            </div>
                        </div>
                        
                        <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('admin.users.show', $author->id) }}" class="text-blue-500 hover:text-blue-400 tooltip" title="View Profile">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('admin.users.edit', $author->id) }}" class="text-yellow-500 hover:text-yellow-400 tooltip" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.users.destroy', $author->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this author?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 tooltip" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class=" grid grid-cols-3 gap-2 text-center">
                        
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $authors->links() }}
        </div>
    @else
        <div class="bg-gray-800 rounded-lg p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
            </svg>
            <p class="text-gray-400">No authors found.</p>
        </div>
    @endif
</div>

<div id="categories" class="section hidden">
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
        <h3 class="text-2xl font-bold text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            Category Management
        </h3>
        <a href="{{ route('categories.create') }}" class="flex items-center bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Create Category
        </a>
    </div>

    @if($categories->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <div class="bg-gray-800 rounded-xl p-6 shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl group">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-emerald-500/20 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-white">{{ $category->name }}</h4>
                        </div>
                        <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-500 hover:text-yellow-400 tooltip" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 tooltip" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-2 text-center bg-gray-700/50 rounded-lg p-3">
                        <div>
                            <p class="text-sm text-gray-400">Posts</p>
                            <p class="text-white font-bold">{{ $category->posts_count ?? 0 }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Created</p>
                            <p class="text-white text-sm">{{ $category->created_at->format('M d') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Updated</p>
                            <p class="text-white text-sm">{{ $category->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    @else
        <div class="bg-gray-800 rounded-xl p-8 text-center flex flex-col items-center">
            <div class="bg-gray-700 p-4 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h4 class="text-xl font-semibold text-white mb-2">No Categories Found</h4>
            <p class="text-gray-400 mb-4">It seems you haven't created any categories yet.</p>
            <a href="{{ route('categories.create') }}" class="flex items-center bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg- emerald-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create Your First Category
            </a>
        </div>
    @endif
</div>

<div id="posts" class="section hidden">
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
        <h3 class="text-2xl font-bold text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-3 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
            </svg>
            Post Management
        </h3>
        <a href="{{ route('posts.create') }}" class="flex items-center bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Create New Post
        </a>
    </div>

    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-gray-800 rounded-xl p-6 shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl group relative">
                    <div class="flex items-start mb-4 space-x-4">
                        <div class="bg-purple-500/20 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-xl font-semibold text-white line-clamp-2">{{ $post->title }}</h4>
                                    <p class="text-gray-400 text-sm mt-1">By {{ $post->author->name }}</p>
                                </div>
                                <span class="bg-purple-500/20 px-2 py-1 rounded-full text-xs text-purple-400 ml-2">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <span class="text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                        <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-400 tooltip" title="View Post">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-400 tooltip" title="Edit Post">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            
                            <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500 hover:text-red-400 tooltip" title="Delete Post">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </button>
</form>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @else
        <div class="bg-gray-800 rounded-xl p-8 text-center flex flex-col items-center">
             <div class="bg-gray-700 p-4 rounded-full mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h4 class="text-xl font-semibold text-white mb-2">No Posts Found</h4>
            <p class="text-gray-400 mb-4">It seems you haven't created any posts yet.</p>
            <a href="{{ route('posts.create') }}" class="flex items-center bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create Your First Post
            </a>
        </div>
    @endif
</div>

<!-- Script to toggle sections -->
<script>
    // Check saved section in local storage or set a default
    let savedSection = localStorage.getItem("selectedSection") || "analisis";

    // Function to toggle the visibility of sections
    function toggleSection(section) {
        const sections = document.querySelectorAll(".section");
        sections.forEach((sec) => sec.classList.add("hidden")); // Hide all sections
        document.getElementById(section).classList.remove("hidden"); // Show selected section
        localStorage.setItem("selectedSection", section); // Save selected section
    }

    // Add event listeners for menu buttons
    document.getElementById("analisis-btn").addEventListener("click", () => toggleSection("analisis"));
    document.getElementById("blogs-admin-btn").addEventListener("click", () => toggleSection("blogs-admin"));
    document.getElementById("authors-btn").addEventListener("click", () => toggleSection("authors"));
    document.getElementById("categories-btn").addEventListener("click", () => toggleSection("categories"));
    document.getElementById("posts-btn").addEventListener("click", () => toggleSection("posts"));

    // Call the function to display the saved section
    toggleSection(savedSection);

    // --- Mobile Menu Toggle ---
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const sidebar = document.getElementById('sidebar');

    // Function to create an overlay when mobile menu is opened
    const createOverlay = () => {
        const overlay = document.createElement('div');
        overlay.id = 'sidebar-overlay';
        overlay.classList.add('fixed', 'inset-0', 'bg-black', 'bg-opacity-50', 'z-40', 'md:hidden');
        document.body.appendChild(overlay);
        
        // Close sidebar when clicking the overlay
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            overlay.remove();
        });
    };

    // Function to open sidebar and add overlay
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            createOverlay();
        });
    }

    // Function to close sidebar and remove overlay
    if (mobileMenuClose) {
        mobileMenuClose.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            const overlay = document.getElementById('sidebar-overlay');
            if (overlay) overlay.remove();
        });
    }
</script>

@endsection