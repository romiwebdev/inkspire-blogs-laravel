@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-10 px-4">
    <div class="container mx-auto max-w-7xl">
        {{-- Header Profile Section --}}
        <div class="grid md:grid-cols-12 gap-6 mb-8">
            {{-- Profile Card --}}
            <div class="md:col-span-4 bg-slate-800 rounded-2xl p-6 shadow-xl border border-slate-700">
                <div class="text-center">
                    <div class="relative inline-block">
                        <img 
                            src="{{ optional($user)->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(optional($user)->name ?? 'User') }}" 
                            alt="{{ optional($user)->name ?? 'User' }}" 
                            class="w-32 h-32 rounded-full mx-auto mb-4 ring-4 ring-blue-500/50 object-cover"
                        >
                        <span class="absolute bottom-0 right-0 bg-green-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>

                    <h2 class="text-2xl font-bold text-white mb-2">
                        {{ optional($user)->name ?? 'Unknown User' }}
                    </h2>
                    <p class="text-slate-400 mb-4">
                        {{ optional($user)->email ?? 'No email provided' }}
                    </p>

                    <div class="grid grid-cols-3 gap-4 bg-slate-700 rounded-xl p-4">
                        <div>
                            <h3 class="text-xl font-bold text-blue-400">
                                {{ optional($user)->posts ? $user->posts->count() : 0 }}
                            </h3>
                            <p class="text-xs text-slate-300">Posts</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-purple-400">
                                {{ optional($user)->created_at ? now()->diffInDays($user->created_at) : 0 }}
                            </h3>
                            <p class="text-xs text-slate-300">Days Active</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Details & Stats Section --}}
            <div class="md:col-span-8 space-y-6">
                {{-- Quick Actions --}}
                <div class="bg-slate-800 rounded-2xl p-6 shadow-xl border border-slate-700">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold text-white">Quick Actions</h3>
                        <div class="flex space-x-3">
                            <button class="btn-action bg-blue-600 hover:bg-blue-700">
                                <i class="fas fa-edit mr-2"></i>Edit Profile
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn-action bg-blue-600 hover:bg-blue-700 transition-all duration-300 ease-in-out">
    <i class="fas fa-home mr-2 group-hover:animate-bounce"></i>
    <span class="group-hover:text-white/80">Back to Dashboard</span>
</a>
                        </div>
                        
                    </div>
                </div>

                {{-- User Details --}}
                <div class="bg-slate-800 rounded-2xl p-6 shadow-xl border border-slate-700">
                    <h3 class="text-xl font-semibold text-white mb-4">
                        <i class="fas fa-info-circle mr-2 text-blue-500"></i>User Details
                    </h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-slate-400">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>
                                <strong>Email:</strong> {{ optional($user)->email ?? 'Not available' }}
                            </p>
                            <p class="text-slate-400 mt-2">
                                <i class="fas fa-calendar-alt mr-2 text-green-500"></i>
                                <strong>Joined:</strong> 
                                {{ optional($user)->created_at ? $user->created_at->format('d M Y') : 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <p class="text-slate-400">
                                <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
                                <strong>Location:</strong> 
                                {{ optional($user)->location ?? 'Not Set' }}
                            </p>
                            <p class="text-slate-400 mt-2">
                                <i class="fas fa-user-tag mr-2 text-purple-500"></i>
                                <strong>Role:</strong> 
                                {{ optional($user)->role ?? 'User' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Posts Section --}}
        <div class="bg-slate-800 rounded-2xl p-6 shadow-xl border border-slate-700">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-white">
                    <i class="fas fa-file-alt mr-2 text-blue-500"></i>
                    Recent Posts
                </h3>
            </div>

            @if(optional($user)->posts && $user->posts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($user->posts->take(6) as $post)
                        <div class="bg-slate-700 rounded-xl p-4 hover:bg-slate-600 transition">
                            <h4 class="text-lg font-semibold text-white mb-2">
                                {{ $post->title ?? 'Untitled Post' }}
                            </h4>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-slate-400">
                                    <i class="fas fa-calendar mr-2"></i>
                                    {{ optional($post->created_at)->diffForHumans() ?? 'Unknown date' }}
                                </span>
                                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 transition flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0 V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Delete Post
                                </button>
                            </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10">
                    <i class="fas fa-inbox text-slate-500 text-4xl mb-4"></i>
                    <p class="text-slate-400">No posts yet</p>
                </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .btn-action {
        @apply px-4 py-2 rounded-lg text-white flex items-center transition;
    }
</style>
@endpush
@endsection