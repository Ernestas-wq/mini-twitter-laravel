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


            <div class="col-12 mt-1" style="padding-left: 0">
                <form method="POST" action={{route('follow.store', $user->id)}}>
                    @csrf
                    <button class="btn btn-info" type="submit">
                        {{ Auth::user()->isFollowing(Auth::user(), $user) ? 'Unfollow' : 'Follow'}}
                    </button>
                </form>
            </div>

            <div class="d-flex mt-3">
                <div class="pr-5"><strong>{{$user->tweets->count()}}</strong> Tweets</div>
                <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> Followers</div>
                <div class="pr-5"><strong>{{$user->following->count()}}</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title ?? ''}}</div>
            <div class="">{{$user->profile->description ?? ''}}</div>

            <h4 class="my-3 text-info">{{$message ?? ''}}</h4>

        </div>
    </div>



    {{-- Single Tweet --}}
    <div class="row col-8 offset-2 mt-3">
       <h2 class="display-5">Tweets</h2>
    </div>
    @foreach($user->tweets as $tweet)
    <div class="row col-8 offset-2 mt-3"
     style="
     flex-direction: column; border: 1px solid #aaa;padding: 10px; border-radius: 10px;
     ">
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
                    <span style="font-size: 16px" class="pl-5 text-primary">
                        {{$tweet->updated_at}}
                    </span>

        </h4>
        <p class="mt-3">{{$tweet->description}}</p>
        <a href={{route('tweet.show', $tweet->id)}}>View Tweet</a>

    </div>
     @endforeach

     <div class="row col-8 offset-2 mt-3">
       <h2 class="display-5">Retweets</h2>
           </div>

        @foreach($user->retweets as $retweet)
         <div class="row col-8 offset-2 mt-3" style="
     flex-direction: column; border: 1px solid #aaa;padding: 10px; border-radius: 10px;
     ">
        <h4 class="d-flex align-items-center">{{$retweet->title}}
            @can('delete-retweet', $retweet)
                <form class="ml-4" style="display: inline-block"
                 action="{{route('retweet.destroy', $retweet->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="padding: 0"> Delete</button>
                </form>
                </span>

            @endcan
                    <span style="font-size: 16px" class="pl-5 text-primary">
                        {{$retweet->created_at}}
                    </span>

        </h4>
        <p class="mt-3">{{$retweet->description}}</p>
        <a href={{route('tweet.show', $retweet->tweet->id)}}>View Original</a>
        <p style="position: absolute; bottom: 0; right: 30%;">by
            <span class="font-weight-bold font-italic">{{$retweet->author}}</span>
        </p>
    </div>

        @endforeach





</div>
@endsection
