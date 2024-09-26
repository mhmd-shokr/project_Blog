<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth; 
use App\Models\Post;      

class CommentController extends Controller
{
    public function store(Request $request, $postId)
{
    $request->validate([
        'comment' => 'required|string',
    ]);

    $comment = new Comment();
    $comment->user_id = Auth::id();
    $comment->post_id = $postId;
    $comment->comment = $request->input('comment'); 
    $comment->save();

    return redirect()->back()->with('success', 'Comment added successfully');
}


    
public function destroy($id)
{
    $comment = Comment::find($id);

    if ($comment) {
        $comment->delete();
        return redirect()->back()->with('success', 'comment deleted successfully');
    }

    return redirect()->back()->with('error', 'the comment not found');
}
}