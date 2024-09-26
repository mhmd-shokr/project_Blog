<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth; 

class PostController extends Controller
{
    public function index() {
        $posts = Post::all(); // جلب كل المنشورات
        return view('home', ['posts' => $posts]); // عرض المنشورات في الصفحة الرئيسية
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {   
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);
        
        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    public function show($id)
{
    $post = Post::with('comments')->findOrFail($id);
    return view('posts.show', compact('post')); 
}
    
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('posts.index');
    }
    public function destroy($id)
{
    $post = Post::find($id);

    if ($post) {
        $post->delete();
        return redirect()->route('home')->with('success', ' post deleted successfully');
    }

    return redirect()->back()->with('error', 'the post not found');
}
}
