@extends('author.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100">
    <div class="max-w-4xl mx-auto">
        {{-- Header Section - Responsive Flex --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
            <h1 class="text-2xl md:text-3xl font-bold text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 md:h-8 w-6 md:w-8 mr-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Author Dashboard
            </h1>

            {{-- Responsive Button Group --}}
            <div class="flex flex-wrap justify-center md:justify-end gap-2">
                <a href="{{ route('author.profile.edit') }}" class="flex items-center bg-gray-700 text-white px-3 py-1.5 rounded-lg hover:bg-gray-600 transition text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Edit Profile
                </a>
                <a href="{{ route('posts.create') }}" class="flex items-center bg-green-600 text-white px-3 py-1.5 rounded-lg hover:bg-green-500 transition text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Create Post
                </a>
                <a href="{{ url('/blogs') }}" class="flex items-center bg-blue-600 text-white px-3 py-1.5 rounded-lg hover:bg-blue-500 transition text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                    </svg>
                    View Blogs
                </a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center bg-red-600 text-white px-3 py-1.5 rounded-lg hover:bg-red-500 transition text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>

        {{-- Posts Section --}}
        <div class="bg-gray-800 rounded-lg shadow-lg p-6">
            <h3 class="text-xl md:text-2xl font-bold mb-6 text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 mr-3 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Your Posts
            </h3>

            @if($posts->count() > 0)
                <div class="space-y-4">
                    @foreach($posts as $post)
                        <div class="bg-gray-700 rounded-lg p-4 hover:bg-gray-600 transition">
                            <div class="flex flex-col md:flex-row justify-between items-start">
                                <div class="mb-2 md:mb-0">
                                    <h4 class="text-lg font-semibold text-white">{{ $post->title }}</h4>
                                    <div class="text-gray-400 space-y-1">
                                        <p>Category: {{ $post->category->name }}</p>
                                        <p class="text-sm">Posted: {{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11a1 1 0 112 0v5a1 1 0 11-2 0V7zm0 8a1 1 0 112 0v1a1 1 0 11-2 0v-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-400">You have no posts yet.</p>
            @endif
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection