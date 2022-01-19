@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-primary text-uppercase">{{ $post['title'] }}</h1>
        <h5><span class="font-italic">Description: </span>{{ $post['description'] }}</h5>

        <div class="row justify-content-center mt-5">
            <a class="btn btn-primary mr-5" href="{{ route('admin.post.edit', $post->id) }}">Edit This Post</a>

            <form class="mb-0" action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Delete This Post">
            </form>
        </div>
    </div>
@endsection