<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Visit; 

class FrontendController extends Controller
{
    // Menampilkan semua postingan
    public function index()
    {

        // Mencatat kunjungan setiap kali pengguna mengunjungi halaman home
        Visit::create([
            'ip_address' => request()->ip(),      // Mengambil IP address pengguna
            'user_agent' => request()->userAgent(), // Mengambil User Agent pengguna
        ]);
        $posts = Post::with('category', 'author')->latest()->paginate(0);
$categories = Category::all();
$authors = User::where('role', 'author')->get();
$popularPosts = Post::orderBy('views', 'desc')->take(4)->get(); // Contoh, ambil 4 post populer
$adminPosts = Post::whereHas('author', function ($query) {
    $query->where('role', 'admin'); // Pastikan kolom 'role' ada di tabel 'users'
})->latest()->take(4)->get();

// Ambil semua postingan dari author dengan paginasi 8
$authorPosts = Post::whereHas('author', function ($query) {
    $query->where('role', 'author'); // Menentukan role author
})->latest()->paginate(8); // Ambil semua post author dengan paginasi 8

return view('frontend.index', compact('posts', 'categories', 'authors', 'popularPosts', 'adminPosts', 'authorPosts'));

    }

    // Menampilkan detail postingan
    public function show($id)
    {
        $post = Post::with('category', 'author')->findOrFail($id);
        // Increment views
        $post->increment('views');
        $comments = $post->comments()->paginate(5);
        return view('frontend.post', compact('post', 'comments'));
    }

    // Filter postingan berdasarkan kategori atau author
    public function filter(Request $request)
    {
        $query = Post::with('category', 'author')->latest();

        // Filter berdasarkan kategori
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Filter berdasarkan author
        if ($request->has('author_id') && $request->author_id) {
            $query->where('author_id', $request->author_id);
        }

        $posts = $query->paginate(8);
        $categories = Category::all();
        $authors = User::where('role', 'author')->get();

        return view('frontend.index', compact('posts', 'categories', 'authors'));
    }

    public function search(Request $request)
{
    $query = $request->query('query'); // Query dari input pencarian
    $categoryId = $request->query('category_id'); // Filter kategori
    $authorId = $request->query('author_id'); // Filter author

    // Query untuk mencari postingan
    $posts = Post::with('category', 'author')
        ->when($query, function ($q) use ($query) {
            $q->where('title', 'like', "%$query%") // Cari berdasarkan judul
              ->orWhereHas('author', function ($authorQuery) use ($query) { // Cari berdasarkan nama author
                  $authorQuery->where('name', 'like', "%$query%");
              })
              ->orWhereHas('category', function ($categoryQuery) use ($query) { // Cari berdasarkan nama kategori
                  $categoryQuery->where('name', 'like', "%$query%");
              });
        })
        ->when($categoryId, function ($q) use ($categoryId) {
            $q->where('category_id', $categoryId); // Filter kategori
        })
        ->when($authorId, function ($q) use ($authorId) {
            $q->where('author_id', $authorId); // Filter author
        })
        ->latest()
        ->paginate(8);

    $categories = Category::all();
    $authors = User::where('role', 'author')->get();
    

    return view('frontend.index', compact('posts', 'categories', 'authors'));
}
public function hero()
    {
        return view('frontend.hero');
    }

public function about()
    {
        return view('frontend.about');
    }

    public function report()
    {
        return view('frontend.report');
    }
}
