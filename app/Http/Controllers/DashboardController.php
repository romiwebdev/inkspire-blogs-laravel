<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Category; 
use App\Models\Comment; 
use App\Models\Visit; 
use Carbon\Carbon;


class DashboardController extends Controller
{
    // Dashboard untuk Admin
    public function admin()
{
    // Pastikan hanya admin yang bisa mengakses dashboard ini
    if (Auth::check() && Auth::user()->role !== 'admin') {
        return redirect('/'); // Redirect ke halaman utama jika bukan admin
    }

    // Ambil semua post dengan relasi category dan author untuk kebutuhan umum
    $posts = Post::with(['category', 'author'])->paginate(12);

    // Ambil hanya post yang dibuat oleh admin
    $adminPosts = Post::with(['category', 'author'])
        ->whereHas('author', function ($query) {
            $query->where('role', 'admin'); // Pastikan author memiliki role 'admin'
        })
        ->paginate(12);

    // Data lainnya
    $categories = Category::withCount('posts')->get();
    $authors = User::where('role', 'author')->paginate(20);
    $totalViews = Post::sum('views');
    $totalVisits = Visit::count();
    $totalAuthors = User::where('role', 'author')->count();
    $totalPosts = Post::count();
    $totalCategories = Category::count();
    $totalComments = Comment::count();
    $newPostsThisMonth = Post::whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->count();
    $newAuthorsThisMonth = User::whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->count();

    // Engagement Rate calculation
    $engagementRate = $totalViews > 0 ? ($totalComments / $totalViews) * 100 : 0;

    // Kirimkan data ke view
    return view('admin.dashboard', compact(
        'posts',
        'adminPosts', // Kirimkan adminPosts untuk bagian Blogs Admin
        'categories',
        'authors',
        'totalAuthors',
        'totalPosts',
        'totalCategories',
        'totalComments',
        'totalViews',
        'totalVisits',
        'newPostsThisMonth',
        'newAuthorsThisMonth',
        'engagementRate'
    ));
}

    // Dashboard untuk Author
    public function author()
    {
        // Pastikan hanya author yang bisa mengakses dashboard ini
        if (Auth::check() && Auth::user()->role !== 'author') {
            return redirect('/'); // Redirect ke halaman utama jika bukan author
        }

        // Ambil post yang hanya milik author yang sedang login
        $posts = Post::with(['category', 'author'])
            ->where('author_id', Auth::id())
            ->paginate(20);

        return view('author.dashboard', compact('posts')); // Kirim variabel $posts ke view
    }

    public function showUser($id)
{
    // Ambil data user berdasarkan ID dan pastikan hanya author yang bisa diakses
    $user = User::with('posts.category')->where('role', 'author')->findOrFail($id);

    // Kirim data user dan post ke view
    return view('admin.user-detail', compact('user'));
}

    // Fungsi untuk menghapus user
    public function destroyAuthor($id)
    {
        $user = User::findOrFail($id);

        // Pastikan user yang dihapus adalah author
        if ($user->role !== 'author') {
            return redirect()->route('admin.dashboard')->withErrors('You are not allowed to delete this user');
        }

        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Author deleted successfully');
    }
}
