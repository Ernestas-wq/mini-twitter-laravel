@extends('layouts.app')

@section('content')
<div class="container">

        <h1 class="text-primary display-4 text-center">Latest tweets </h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            @foreach($tweets as $tweet)
            <div class="card mt-3">
                <div class="card-header">{{$tweet->title}}
                <p style="position: absolute; top:0; right: 5px">
                    <a class="font-weight-bold text-primary" href={{route('profile.show', $tweet->user->id)}}>
                        @
            {{$tweet->user->username}}

                    </a>
                </p>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{$tweet->description}}
                    </p>
                    <p style="position: absolute; bottom: 0; right: 5px; font-size: 14px">
                    {{$tweet->created_at}}</p>
                </div>
        </div>
        @endforeach


        </div>
        <div class="col-8">
            <div>
                {{$tweets->links()}}
            </div>
        </div>
    </div>
</div>
@endsection