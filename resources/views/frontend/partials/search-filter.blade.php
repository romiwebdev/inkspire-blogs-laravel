<form id="search-form" action="{{ route('frontend.search') }}" method="GET" 
    class="w-full max-w-4xl mx-auto p-2 md:p-4 bg-gray-900 text-gray-100 rounded-lg shadow-xl border border-gray-800">
    <div class="flex flex-wrap items-end space-x-1 md:space-x-2 space-y-1 md:space-y-0">
        <div class="w-[calc(33%-0.25rem)] md:w-[calc(33%-0.5rem)] flex-grow">
            <label for="category" class="block mb-1 md:mb-2 text-xs md:text-sm font-medium text-gray-100">
                Category
            </label>
            <select name="category_id" id="category" 
                class="w-full bg-gray-800 border border-gray-700 text-gray-100 text-xs md:text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block p-1.5 md:p-2.5 placeholder-gray-500">
                <option value="" class="bg-gray-900 text-xs">
                    <span class="text-[5px] md:text-sm">All Category</span>
                </option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        class="bg-gray-900 text-xs" 
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="w-[calc(33%-0.25rem)] md:w-[calc(33%-0.5rem)] flex-grow">
            <label for="author" class="block mb-1 md:mb-2 text-xs md:text-sm font-medium text-gray-100">
                Author
            </label>
            <select name="author_id" id="author" 
                class="w-full bg-gray-800 border border-gray-700 text-gray-100 text-xs md:text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block p-1.5 md:p-2.5 placeholder-gray-500">
                <option value="" class="bg-gray-900 text-xs">
                    <span class="hidden md:block text-xs md:text-sm">All Author</span>
                </option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" 
                        class="bg-gray-900 text-xs" 
                        {{ request('author_id') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="w-[calc(33%-0.25rem)] md:w-[calc(33%-0.5rem)] flex-grow relative">
            <label for="query" class="block mb-1 md:mb-2 text-xs md:text-sm font-medium text-gray-100">
                Search
            </label>
            <div class="relative w-full">
                <input type="search" name="query" id="query" 
                    class="w-full p-1.5 md:p-2.5 ps-2 md:ps-4 text-xs md:text-sm text-gray-100 border border-gray-700 rounded-lg bg-gray-800 
                    focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500" 
                    placeholder="Search" 
                    value="{{ request('query') }}"/>
                <button type="submit" 
                    class="absolute end-0 top-0 p-1.5 md:p-2.5 text-xs md:text-sm font-medium h-full text-white 
                    bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 
                    focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <svg class="w-3 h-3 md:w-4 md:h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('search-form').addEventListener('submit', function(event) {
        // Get the values of the inputs
        const category = document.getElementById('category').value;
        const author = document.getElementById('author').value;
        const query = document.getElementById('query').value;

        // Check if all fields are empty
        if (!category && !author && !query) {
            // Prevent form submission
            event.preventDefault();

            // Redirect to /blogs if all fields are empty
            window.location.href = '/blogs';
        }
    });
</script>
