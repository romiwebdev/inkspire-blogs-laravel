@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-10 px-4 flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="relative">
            {{-- Back Button --}}
            <a href="{{ route('admin.dashboard') }}" class="absolute -top-12 left-0 flex items-center text-white hover:text-amber-400 transition">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>

            {{-- Form Container --}}
            <div class="bg-slate-800 rounded-3xl shadow-2xl border border-slate-700 overflow-hidden">
                {{-- Header --}}
                <div class="bg-gradient-to-r from-amber-600 to-amber-500 px-6 py-5">
                    <h1 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-edit text-white mr-3"></i>
                        Edit Category
                    </h1>
                </div>

                {{-- Form --}}
                <form action="{{ route('categories.update', $category->id) }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-300 mb-2">
                            Category Name
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-slate-500 group-focus-within:text-amber-500 transition"></i>
                            </div>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name', $category->name) }}" 
                                required 
                                placeholder="Enter category name"
                                class="w-full pl-12 pr-4 py-3 bg-slate-700 border border-slate-600 rounded-xl 
                                       focus:outline-none focus:ring-2 focus:ring-amber-500 
                                       text-white placeholder-slate-400 
                                       transition duration-300 ease-in-out"
                            >
                        </div>
                        @error('name')
                            <p class="text-red-400 text-sm mt-2 pl-4">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button 
                            type="submit" 
                            class="btn-primary group"
                        >
                            <i class="fas fa-save mr-2 group-hover:animate-pulse"></i>
                            Update Category
                        </button>
                        
                        <a 
                            href="{{ route('admin.dashboard') }}" 
                            class="btn-secondary group"
                        >
                            <i class="fas fa-times mr-2 group-hover:rotate-180 transition duration-300"></i>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            {{-- Decorative Element --}}
            <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-amber-500/20 rounded-full blur-2xl"></div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .btn-primary {
        @apply w-full bg-gradient-to-r from-amber-600 to-amber-500 text-white py-3 rounded-xl 
               hover:from-amber-500 hover:to-amber-600 
               focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-50
               transition duration-300 
               flex items-center justify-center;
    }

    .btn-secondary {
        @apply w-full bg-slate-700 text-white py-3 rounded-xl 
               hover:bg-slate-600 
               transition duration-300 
               flex items-center justify-center;
    }

    /* Responsive Adjustments */
    @media (max-width: 640px) {
        .grid-cols-2 {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }
</style>
@endpush
@endsection
