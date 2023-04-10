@extends('layouts.master')

@section('title', "Register")

@section("content")

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="mb-3">Register</h3>
            @if (Session::has('status'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('status')}}
            </div>
            @endif
            <form method="post" action="{{ url('register') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                  <label for="name" class="form-label">Username</label>
                  <input type="name" class="form-control" id="name" name="name">
                  @error('name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</div>


@endsection

