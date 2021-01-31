<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {

        // dd($user);
        return view('profiles.index', compact('user'));
    }
    //
    public function edit(User $user)
    {
        Gate::authorize('update-profile', $user->profile);
        // if (!Gate::allows('update-profile', $user->profile)) {
        //     abort(403);
        // }
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        Gate::authorize('update-profile', $user->profile);
        $data = request()->validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:255'],
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge($data, $imageArray ?? []));
        // dd($data);

        return redirect('/profile/' . $user->id);
    }

}
