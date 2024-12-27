@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-10 px-4 flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="relative">
            {{-- Back Button --}}
            <a href="{{ route('admin.dashboard') }}" class="absolute -top-12 left-0 flex items-center text-white hover:text-blue-400 transition">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Dashboard
            </a>

            {{-- Form Container --}}
            <div class="bg-slate-800 rounded-2xl shadow-2xl border border-slate-700 overflow-hidden">
                {{-- Header --}}
                <div class="bg-slate-700/50 px-6 py-4 border-b border-slate-600">
                    <h1 class="text-2xl font-bold text-white flex items-center">
                        <i class="fas fa-tag text-blue-400 mr-3"></i>
                        Create New Category
                    </h1>
                </div>

                {{-- Form --}}
                <form action="{{ route('categories.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-slate-300 mb-2">
                            Category Name
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-slate-500"></i>
                            </div>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                placeholder="Enter category name" 
                                required 
                                class="w-full pl-10 pr-3 py-3 bg-slate-700 border border-slate-600 rounded-lg 
                                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                                       text-white placeholder-slate-400 transition duration-300"
                            >
                        </div>
                        @error('name')
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button 
                            type="submit" 
                            class="btn-primary group"
                        >
                            <i class="fas fa-plus mr-2 group-hover:animate-pulse"></i>
                            Create Category
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
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .btn-primary {
        @apply w-full bg-blue-600 text-white py-3 rounded-lg 
               hover:bg-blue-500 transition duration-300 
               flex items-center justify-center;
    }

    .btn-secondary {
        @apply w-full bg-slate-700 text-white py-3 rounded-lg 
               hover:bg-slate-600 transition duration-300 
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
