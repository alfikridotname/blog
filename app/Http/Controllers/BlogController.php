<?php

namespace App\Http\Controllers;

use App\Models\Post; // Pastikan menggunakan model Post
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Menampilkan daftar post
    public function index()
    {
        $posts = Post::paginate(10); // Mengambil daftar post dengan pagination
        return view('blog', compact('posts')); // Pastikan nama view sesuai
    }

    // Menampilkan form create post
    public function create()
    {
        return view('blog_create'); // Pastikan nama view sesuai
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255', // Validasi untuk title
            'content' => 'required|string', // Validasi untuk content
        ]);

        Post::create($request->all()); // Simpan data post

        return redirect()->route('blog.index')->with('success', 'Post created successfully!');
    }

    // Menampilkan form edit post
    public function edit($id)
    {
        $post = Post::findOrFail($id); // Cari post berdasarkan ID
        return view('blog_edit', compact('post')); // Pastikan nama view sesuai
    }

    // Memperbarui data post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255', // Validasi untuk title
            'content' => 'required|string', // Validasi untuk content
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save(); // Simpan perubahan

        return redirect()->route('blog.index')->with('success', 'Post updated successfully!');
    }

    // Menghapus post
    public function destroy($id)
    {
        $post = Post::findOrFail($id); // Cari post berdasarkan ID
        $post->delete(); // Hapus post

        return redirect()->route('blog.index')->with('success', 'Post deleted successfully!');
    }
}
