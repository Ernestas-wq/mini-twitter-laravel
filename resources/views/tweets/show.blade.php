@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <h4>{{$tweet->title}} <span style="font-size: 75%" class="ml-4 text-info font-italic">by
                    {{$tweet->user->username}}</span></h4>
            <p class="mt-4">
                {{$tweet->description}}
            </p>
            <a href="" data-toggle="modal" data-target="#exampleModal">Comment</a>

        </div>
    </div>
    {{-- Comment Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('comment.store', $tweet->id)}}" class="d-flex" style="flex-direction: column" method="POST">
                       @csrf
                        <textarea name="text" id="text" required name="" id="" cols="30" rows="5"></textarea>
                        <button type="submit" type="button" class="btn btn-success mt-3">Leave Comment</button>
                        <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <div><i class="bi bi-twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg></i></div>
                    minitter
                </div>
            </div>
        </div>
    </div>
        {{-- Comment Modal End --}}
    <div class="row mt-4">
        <div class="col8 offset-2 my-4">
                    <h2 class="text-secondary text-dark">Comments</h2>

            <h4 class="my-3 text-info">{{$message ?? ''}}</h4>
        </div>

            @foreach ($tweet->comments as $comment)
            <div class="col-8 offset-2 mb-3">
              <h4 class="mb-3 font-weight-bold d-flex justify-content-between align-items-center" style="font-size: 22px; border-bottom: 1px solid #aaa">{{$comment->user->username}}
                <hr>
                <span style="font-size: 70%" class="ml-5 font-weight-light">{{$comment->created_at}}</span>
            </h4>
            <p>{{$comment->text}} <span style="position:absolute; bottom:0; right:30px">
             @can('access-comment', $comment)
            <a href="{{route('comment.edit', [$comment->tweet_id, $comment->id ])}}">Edit</a></span></p>
            @endcan
        </div>

            @endforeach
    </div>

</div>
@endsection
