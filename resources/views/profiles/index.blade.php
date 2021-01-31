@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img style="height: 100px; width:100px" class="rounded-circle" src="{{$user->profile->profileImage()}}" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <h1>{{$user->username}}</h1>
                </div>
                @can('update-profile', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex mt-3">
                <div class="pr-5"><strong>50</strong> Posts</div>
                <div class="pr-5"><strong>1000</strong> Followers</div>
                <div class="pr-5"><strong>10</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title ?? ''}}</div>
            <div class="">{{$user->profile->description ?? ''}}</div>


        </div>
    </div>
    {{-- Single Post --}}
    <div class="row col-8 offset-2 mt-3">
        <h4 class="mb-4">Post title</h4>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos repellat consequuntur sit illum
            perspiciatis soluta odio vitae necessitatibus, earum cupiditate totam nesciunt dolores? Architecto maxime
            quam repellat cum molestias iste?Sunt, aperiam, accusamus sequi voluptates excepturi praesentium et
            molestiae, cumque facere consequatur facilis illo quia vero? Libero sed accusantium quo commodi, pariatur
            dolores assumenda odit nemo animi nobis eum at!</p>
    </div>

</div>
@endsection
