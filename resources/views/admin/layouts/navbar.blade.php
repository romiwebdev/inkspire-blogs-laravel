<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
            </li>
            <li class="nav-item">
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="nav-link btn btn-link" style="border: none; padding: 0; color: inherit; text-decoration: none; background: none;">
            Logout
        </button>
    </form>
</li>

        </ul>
    </div>
</nav>
