@extends('layouts.app')

@section('content')
<section class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-gray-900 antialiased">
    <div class="container mx-auto px-4 max-w-4xl">
        <article class="bg-gray-800 rounded-2xl shadow-2xl p-4 lg:p-8 xl:p-12 relative overflow-hidden">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900/20 to-purple-900/20 opacity-0 hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

            <!-- Post Header -->
            <header class="mb-6 lg:mb-8 pb-4 lg:pb-6 border-b border-gray-700 relative z-10">
                <h1 class="mb-4 text-2xl lg:text-4xl font-extrabold leading-tight text-white group">
                    {{ $post->title }}
                    <div class="h-1 bg-gradient-to-r from-blue-500 to-purple-600 scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
                </h1>
                
                <div class="flex flex-wrap gap-4 text-sm text-gray-400">
                    <!-- Author -->
                    <div class="flex items-center space-x-2 hover:text-blue-400 transition-colors group">
                        <svg class="w-6 h-6 text-blue-500 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <a href="#" class="font-medium">{{ $post->author->name }}</a>
                    </div>

                    <!-- Category -->
                    <div class="flex items-center space-x-2 hover:text-purple-400 transition-colors group">
                        <svg class="w-6 h-6 text-purple-500 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        <span class="font-medium">{{ $post->category->name }}</span>
                    </div>

                    <!-- Date -->
                    <div class="flex items-center space-x-2 hover:text-green-400 transition-colors group">
                        <svg class="w-6 h-6 text-green-500 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ $post->created_at->diffForHumans() }}</span>
                    </div>

                    <!-- Views -->
                    <div class="flex items-center space-x-2 hover:text-red-400 transition-colors group">
                        <svg class="w-6 h-6 text-red-500 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span class="font-medium">{{ $post->views }} Views</span>
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed mt-6 relative z-10">
            {!! nl2br(\App\Helpers\TextHelpers::autoLink($post->content)) !!}
            </div>

            <!-- Back Button -->
            <div class="mt-8 pt-6 border-t border-gray-700 relative z-10">
                <a href="{{ route('frontend.index') }}" class="inline-flex items-center text-sm font-medium text-gray-400 hover:text-blue-500 transition-all group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Blogs
                </a>
            </div>

            <!-- Comments Section -->
            <div class="mt-12 relative z-10">
                <div class="border-t border-gray-700 pt-8">
                    <h2 class="text-xl lg:text-2xl font-bold text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 lg:w-7 lg:h-7 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Comments ({{ $post->comments->count() }})
                    </h2>

                    <!-- Comment Form -->
                    <form id="comment-form" action="{{ route('comments.store', $post->id) }}" method="POST" class="mb-8 bg-gray-700 rounded-lg p-4 lg:p-6">
                        @csrf
                        <div class="grid gap-4">
                            <input type="text" 
                                name="name" 
                                placeholder="Your Name" 
                                required 
                                class="w-full p-3 bg-gray-800 text-white rounded-lg focus:ring-2 focus:ring-blue-500 transition-all"
                            >
                            
                            <textarea 
                                name="content" 
                                placeholder="Write your comment..." 
                                rows="4" 
                                required 
                                class="w-full p-3 bg-gray-800 text-white rounded-lg focus:ring-2 focus:ring-blue-500 transition-all"
                            ></textarea>
                            
                            <button 
                                type="submit" 
                                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-all flex items-center justify-center space-x-2 group"
                            >
                                <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                                </svg>
                                <span>Post Comment</span>
                            </button>
                        </div>
                    </form>

                    <!-- Comments List -->
                    <div id="comments-container" class="space-y-4 lg:space-y-6">
                        @forelse($comments as $comment)
                            <div class="bg-gray-700 rounded-lg p-4 relative group">
                                <div class="flex items-center mb-2">
                                    <svg class="w-8 h-8 mr-3 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                    <div>
                                        <h4 class="font-semibold text-white">{{ $comment->name }}</h4>
                                        <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <p class="text-gray-300 mt-2">{{ $comment->content }}</p>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-6 flex flex-col items-center">
                                <svg class="w-16 h-16 text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                                <p>No comments yet. Be the first to comment!</p>
                            </div>
                        @endforelse

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection

@push('styles')
<style>
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .prose { font-size: 0.95rem; }
        .container { padding-left: 1rem; padding-right: 1rem; }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.querySelector('#comment-form');
    const commentsContainer = document.querySelector('#comments-container');
    
    if (commentForm) {
        commentForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            try {
                const formData = new FormData(this);
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });

                const data = await response.json();
                
                if (data.success) {
                    // Add new comment
                    const newCommentHtml = createCommentHTML(data.comment);
                    
                    if (commentsContainer.querySelector('.no-comments')) {
                        commentsContainer.innerHTML = '';
                    }
                    
                    commentsContainer.insertAdjacentHTML('afterbegin', newCommentHtml);
                    
                    // Reset form
                    this.reset();
                    
                    // Show success message
                    showNotification('Comment posted successfully!', 'success');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('Error posting comment. Please try again.', 'error');
            }
        });
    }
});

function createCommentHTML(comment) {
    return `
        <div class="bg-gray-700 rounded-lg p-4 relative group animate-fade-in">
            <div class="flex items-center mb-2">
                <svg class="w-8 h-8 mr-3 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
                <div>
                    <h4 class="font-semibold text-white">${comment.name}</h4>
                    <p class="text-xs text-gray-400">Just now</p>
                </div>
            </div>
            <p class="text-gray-300 mt-2">${comment.content}</p>
        </div>
    `;
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed bottom-4 right-4 px-6 py-3 rounded-lg text-white ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } animate-fade-in`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
}
</script>
@endpush