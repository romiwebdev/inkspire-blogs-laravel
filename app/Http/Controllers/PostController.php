<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category; // Add this import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Menampilkan form untuk membuat post
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'author_id' => Auth::id(),
        ]);

        // Redirect based on the role (admin or author)
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Post created successfully');
        } else {
            return redirect()->route('author.dashboard')->with('success', 'Post created successfully');
        }
    }

    // Menampilkan form untuk mengedit post
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        // Cek apakah user memiliki izin untuk mengedit
        if ($post->author_id !== Auth::id() && Auth::user()->role !== 'admin') {
            return redirect()->route('posts.index')->withErrors('You are not authorized to edit this post');
        }

        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    // Memperbarui post yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);

        // Cek apakah user memiliki izin untuk memperbarui
        if ($post->author_id !== Auth::id() && Auth::user()->role !== 'admin') {
            return redirect()->route('posts.index')->withErrors('You are not authorized to update this post');
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        // Redirect based on the role (admin or author)
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Post updated successfully');
        } else {
            return redirect()->route('author.dashboard')->with('success', 'Post updated successfully');
        }
    }
    // Menghapus post
    public function destroy($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
    
        if ($post->author_id === Auth::id() || Auth::user()->role === 'admin') {
            $post->delete();
    
            return redirect()
                ->route(Auth::user()->role === 'admin' ? 'admin.dashboard' : 'author.dashboard')
                ->with('success', 'Post deleted successfully');
        }
    
        return back()->withErrors('You are not authorized to delete this post');
    }
    
    // Menampilkan detail post
    public function show($id)
{
    $post = Post::with(['category', 'author'])->findOrFail($id);

    // Increment views
    $post->increment('views');

    return view('posts.show', compact('post'));
}

}
