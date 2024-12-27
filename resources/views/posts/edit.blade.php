@extends(Auth::user()->role == 'admin' ? 'admin.layouts.app' : 'author.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 bg-gray-900 text-gray-100">
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg shadow-lg p-4 md:p-8">
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-white flex items-center mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 md:h-8 w-6 md:w-8 mr-3 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Post
            </h1>
            <a href="{{ route(Auth::user()->role == 'admin' ? 'admin.dashboard' : 'author.dashboard') }}" class="flex items-center bg-gray-700 text-white px-3 py-2 rounded-lg hover:bg-gray-600 transition text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        {{-- Error Handling --}}
        @if ($errors->any())
            <div class="bg-red-600 text-white rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <strong>Whoops! Something went wrong.</strong>
                </div>
                <ul class="list-disc pl-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            {{-- Title Input --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Post Title</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ old('title', $post->title) }}" 
                        required 
                        class="w-full pl-10 pr-3 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-white placeholder-gray-500"
                        placeholder="Enter post title"
                    >
                </div>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Content Input --}}
            <div>
                <label for="content" class="block text-sm font-medium text-gray-300 mb-2">Post Content</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 pt-2 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <textarea 
                        id="content" 
                        name="content" 
                        rows="6" 
                        required 
                        class="w-full pl-10 pr-3 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-white placeholder-gray-500"
                        placeholder="Write your post content here"
                    >{{ old('content', $post->content) }}</textarea>
                </div>
                @error('content')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category Select --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none ```blade
                        " viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                    <select 
                        id="category_id" 
                        name="category_id" 
                        required 
                        class="w-full pl-10 pr-3 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-white"
                    >
                        <option value="" disabled>Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }} class="bg-gray-800">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit and Cancel Buttons --}}
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <button 
                    type="submit" 
                    class="flex-1 bg-yellow-600 text-white py-2 rounded-lg hover:bg-yellow-500 transition flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Update Post
                </button>
                
                <a 
                    href="{{ route(Auth::user()->role == 'admin' ? 'admin.dashboard' : 'author.dashboard') }}" 
                    class="flex-1 bg-gray-700 text-white py-2 rounded-lg hover:bg-gray-600 transition flex items-center justify-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                    </svg>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection