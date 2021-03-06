@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/t" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>Add New Tweet</h1>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Tweet title</label>

                    <input id="title"
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ old('title') }}" required
                    autocomplete="title" autofocus>
                    @error('title')
                        <strong>{{ $message }}</strong>

                    @enderror
                </div>
                  <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Tweet text</label>

                    <textarea id="description"
                    style="min-height: 150px"
                    type="text"
                    class="form-control @error('description') is-invalid @enderror"
                    name="description"
                    value="{{ old('description') }}" required
                    autocomplete="description" autofocus> </textarea>
                    @error('description')
                        <strong>{{ $message }}</strong>

                    @enderror

                </div>

                     <div class="row pt-3">
                    <button class="btn btn-info">Tweet</button>
                </div>



            </div>
        </div>
    </form>
</div>
@endsection
