@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{route('comment.update', [
      $comment->tweet->id, $comment->id]
      )}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                   <div class="row">
                    <h1 class="text-secondary">Edit Comment</h1>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label">Comment</label>
                    <textarea id="description"
                    style="min-height: 150px"
                    class="form-control @error('caption') is-invalid @enderror"
                    name="text"
                    required
                    autocomplete="text" autofocus>{{$comment->text}}</textarea>
                    @error('text')
                        <strong>{{ $message }}</strong>

                    @enderror
                </div>

                    <div class="row pt-5">
                    <button class="btn btn-info">Save</button>
                    </div>

            </div>
        </div>
    </form>
</div>
@endsection
