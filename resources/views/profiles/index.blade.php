@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img style="height: 100px; width:100px" class="rounded-circle" src="{{$user->profile->profileImage()}}"
                alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <h1>{{$user->username}}</h1>
                </div>
                @can('update-profile', $user->profile)
                <a href="{{route('profile.edit', $user->id)}}">Edit Profile</a>
                <a href="{{route('tweet.create')}}">New Tweet</a>
                @endcan
            </div>
            <div class="d-flex mt-3">
                <div class="pr-5"><strong>{{$user->tweets->count()}}</strong> Tweets</div>
                <div class="pr-5"><strong>1000</strong> Followers</div>
                <div class="pr-5"><strong>10</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title ?? ''}}</div>
            <div class="">{{$user->profile->description ?? ''}}</div>

            <h4 class="my-3 text-info">{{$message ?? ''}}</h4>

        </div>
    </div>



    {{-- Single Post --}}
    @foreach($user->tweets as $tweet)
    <div class="row col-8 offset-2 mt-3" style="flex-direction: column">
        <h4 class="d-flex align-items-center">{{$tweet->title}}
            @can('update-tweet', $tweet)
            <span class="pl-5" style="font-size: 75%">
                <a href={{route('tweet.edit', $tweet->id)}}>Edit</a>
            </span>
            <span class="pl-5" style="font-size: 75%">
                <span>
                <form style="display: inline-block" action="{{route('tweet.destroy', $tweet->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="padding: 0"> Delete</button>
                </form>
                </span>

            @endcan
        </h4>
        <p class="mt-3">{{$tweet->description}}</p>
        <a href={{route('tweet.show', $tweet->id)}}>View Tweet</a>


    </div>

    @endforeach


</div>
@endsection
