<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Simpan komentar.
     */
    public function store(Request $request, $postId)
    {
        // Validasi input: Nama dan komentar harus diisi
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        // Cari post berdasarkan postId
        $post = Post::findOrFail($postId);

        // Simpan komentar
        Comment::create([
            'name' => $request->name,
            'post_id' => $post->id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar Anda telah diposting.');
    }

    /**
     * Hapus komentar.
     */
    public function destroy(Comment $comment)
    {
        // Cek apakah user yang login adalah admin atau author dari post terkait
        if (Auth::check() && (Auth::user()->id === $comment->post->author_id || Auth::user()->role === 'admin')) {
            // Menghapus komentar
            $comment->delete();
            return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
        }
        

        // Jika user tidak memiliki izin
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }
}
