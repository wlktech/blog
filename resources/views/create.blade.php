@extends('layouts.master')

@section('title', "Add Post")

@section("content")

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Add Post</h3>
            @if (Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('status')}}
            </div>
            @endif
            <form method="post" action="{{ url('post') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="title" class="form-control" id="title" name="title">
                  @error('title')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea type="text" class="form-control" id="description" name="description"></textarea>
                  @error('description')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>

</div>


@endsection

