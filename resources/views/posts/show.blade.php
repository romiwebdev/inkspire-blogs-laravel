@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto space-y-6">
        {{-- Post Header --}}
        <div class="bg-white/5 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/10">
            <div class="px-4 sm:px-6 py-5 flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
                <div class="flex items-center space-x-4 w-full">
                    <div class="bg-blue-500/20 p-3 rounded-xl flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h1 class="text-xl sm:text-2xl font-semibold text-white break-words">
                            {{ $post->title }}
                        </h1>
                    </div>
                </div>
                <div class="flex space-x-3 w-full sm:w-auto justify-end">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn-elegant-edit flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="btn-elegant-delete flex items-center"
                            onclick="return confirm('Are you sure you want to delete this post?');"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            {{-- Post Metadata --}}
            <div class="px-4 sm:px-6 py-5 border-t border-white/10 grid grid-cols-1 sm:grid-cols-3 gap-4">
                @php
                    $metaItems = [
                        ['icon' => 'blue', 'svg' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z', 'text' => $post->category->name],
                        ['icon' => 'green', 'svg' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'text' => $post->author->name],
                        ['icon' => 'purple', 'svg' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'text' => $post->created_at->diffForHumans()]
                    ]
                @endphp

                @foreach($metaItems as $item)
                    <div class="flex items-center space-x-3 text-white/70">
                        <div class="bg-{{ $item['icon'] }}-500/20 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $item['icon'] }}-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['svg'] }}" />
                            </svg>
                        </div>
                        <span class="truncate">{{ $item['text'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Post Content --}}
        <div class="bg-white/5 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/10">
            <div class="px-4 sm:px-6 py-8">
                <div class="prose prose-invert max-w-none text-white/80 break-words">
                {!! nl2br(\App\Helpers\TextHelpers::autoLink($post->content)) !!}


                </div>
            </div>
        </div>

        {{-- Comments Section --}}
        <div class="bg-white/5 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/10">
            <div class="px-4 sm:px-6 py-6">
                <h3 class="text-2xl font-semibold text-white mb-6 flex items-center">
                    <div class="bg-blue-500/20 p-3 rounded-xl mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5 a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    Comments
                </h3>

                @forelse($post->comments as $comment)
                    <div class="bg-gray-800 rounded-lg p-4 mb-4 flex justify-between items-start">
                        <div>
                            <p class="text-white font-semibold">{{ $comment->name }}</p>
                            <p class="text-gray-400">{{ $comment->content }}</p>
                            <small class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                        @if(Auth::user()->id === $post->author_id || Auth::user()->role === 'admin')
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 mt-2">Delete</button>
                            </form>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-400">No comments yet. Be the first to comment!</p>
                @endforelse
            </div>
        </div>

        <div class="mt-6">
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Admin Dashboard</a>
            @elseif(Auth::user()->role === 'author')
                <a href="{{ route('author.dashboard') }}" class="btn btn-secondary">Back to Author Dashboard</a>
            @endif
        </div>
    </div>
</div>
@endsection