<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentCustom;
use Illuminate\Support\Facades\Session;
use App\DataTables\CommentCustomDataTable;

class CommentCustomController extends Controller
{
    public function index(CommentCustomDataTable $dataTable)
    {
        return $dataTable->render('back.comment_custom.index');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'p_id' => 'required',
            'comment' => 'required',
            'name' => 'required|max:266',
            'email' => 'required|email',
            'blog_id' => 'required'
        ]);

        $comment = new CommentCustom();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->p_id = $request->p_id;
        $comment->blog_id = $request->blog_id;
        $comment->status = STATUS_ACTIVE;
        $comment->save();
        
        Session::put('comment_username', $request->name);
        Session::put('comment_email', $request->email);

        return redirect()->back()->with('success', 'Comment added');
    }


    public function delete(Request $request)
    {
        $comment = CommentCustom::where('id', $request->id)->firstOrFail();

        foreach (CommentCustom::where('p_id', $comment->id)->get() as $b) {
            $b->delete();
        }
        
        $comment->delete();

        return redirect()->back()->with('success', 'Blog removed successfully');
    }

    public function status($id)
    {
        $comment = CommentCustom::where('id', $id)->firstOrFail();

        if ($comment->status == STATUS_ACTIVE) {
            $comment->status = STATUS_INACTIVE;
        } else {
            $comment->status = STATUS_ACTIVE;
        }

        $comment->save();

        return redirect()->back()->with('success', 'Status updated successfully');

    }
}
