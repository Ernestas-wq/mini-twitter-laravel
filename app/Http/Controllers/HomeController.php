<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $tweets = Tweet::whereIn('user_id', $users)->latest()->paginate(3);
        return view('home', compact('tweets'));

    }
    //
}
