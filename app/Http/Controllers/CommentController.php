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

    public function adopt(ContactForm $contactForm, Comment $comment)
    {
        $contactForm->comments()->where('id', '!=', $comment->id)->delete();
        $contact = ContactForm::find($contactForm->id);
        $contact->solutionist = Comment::find($comment->id)->user->name;
        $contact->solution = 1;
        $contact->save();

        return to_route('solution.index');
    }



}
