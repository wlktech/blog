@extends('layouts.master')

@section('title', 'Post Lists')

@section('content')
<div class="container mt-5">
    <a href="{{ url('logout') }}" class="btn btn-sm btn-danger float-end">Logout</a>
    <h3 class="text-start mb-5">Post Lists <a href='{{url("post")}}' class="btn btn-sm btn-primary float-end">Add Post</a></h3>
    @if (Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ Session::get('status') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href='{{url("posts/edit/$post->id")}}' class="btn btn-sm btn-primary">Edit</a>
                        <a href='{{url("posts/$post->id")}}' class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
