<?php

namespace App\Http\Controllers;

use App\Models\Retweet;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RetweetsController extends Controller
{
    public function store(Tweet $tweet) {
        Gate::authorize('can-retweet', $tweet);

        $retweet = Retweet::create([
            'title' => $tweet->title,
            'description' => $tweet->description,
            'author' => $tweet->user->username,
            'user_id' => auth()->user()->id,
            'tweet_id' => $tweet->id
        ]);

        $retweet->save();


     return redirect('/profile/'. auth()->user()->id);
    }

    public function destroy(Retweet $retweet) {
        Gate::authorize('delete-retweet', $retweet);
        $retweet->delete();
        return redirect('/profile/'.auth()->user()->id);
    }

}
