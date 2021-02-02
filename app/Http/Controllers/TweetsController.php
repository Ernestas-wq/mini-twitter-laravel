<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Support\Facades\Gate;

class TweetsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('tweets.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:255'],
        ]);

        auth()->user()->tweets()->create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);
        return redirect('/profile/' . auth()->user()->id);

    }
    public function edit(Tweet $tweet) {
        Gate::authorize('update-tweet', $tweet);
        return view('tweets.edit', compact('tweet'));
    }
    public function update(Tweet $tweet) {
        Gate::authorize('update-tweet', $tweet);
        $data = request()->validate([
        'title' => ['required', 'max:50'],
        'description' => ['required', 'max:255'],
        ]);
        $tweet->update($data);
        $user = auth()->user();
        $message = "Updated successfully";
        return view('profiles.index', compact('user', 'message'));

    }
    public function destroy(Tweet $tweet) {
        Gate::authorize('update-tweet', $tweet);
        $tweet->delete();
        $user = auth()->user();
        $message = "Deleted successfully";
        return view('profiles.index', compact('user', 'message'));
    }
    public function show(Tweet $tweet) {

        return view('tweets.show', compact('tweet'));

    }



}
