<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function store(User $user, Tweet $tweet) {
        // dd($tweet);
        $user = auth()->user();
        $data = request()->validate([
            'text' => ['required', 'max:150']
        ]);
        $comment = Comment::create([
            'user_id' => $user->id,
            'tweet_id' => $tweet->id,
            'text' => $data['text']
        ]);
        $comment->save();

        return redirect('/t/' . $tweet->id);
    }

    public function edit(Tweet $tweet, Comment $comment) {

        return view('comments.edit', compact('comment'));

    }
    public function update(Tweet $tweet, Comment $comment) {
        Gate::authorize('access-comment', $comment);
        $data = request()->validate([
            'text' => ['required', 'max:150'],
        ]);
        $comment->update($data);
        $message = 'Updated successfuly';
        return view('tweets.show', compact('tweet','message'));

    }
    public function destroy(Tweet $tweet, Comment $comment) {
        Gate::authorize('access-comment', $comment);
        $comment->delete();
        $message = 'Deleted successfuly';
        return view('tweets.show', compact('tweet', 'message'));

    }


    //
}
