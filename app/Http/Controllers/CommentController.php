<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, ContactForm $contactForm)
    {
        $comment = new Comment($request->all());
        $comment->user_id = Auth::id();
        $contactForm->comments()->save($comment);

        return redirect()->back();
    }

}
