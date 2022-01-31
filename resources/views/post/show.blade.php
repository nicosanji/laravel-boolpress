@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-primary text-uppercase">{{ $post['title'] }}</h1>
        <img src="{{ asset('storage/' . $post->cover_img) }}" alt="Image for '{{ $post['title'] }}'"
            class="w-50">
        <h5><span class="font-italic">Description: </span>{!! $post->description !!}</h5>
        <h3 class="text-primary"><span class="font-italic">Created by </span>{{ $post->user->name }}</h3>
        <h3 class="text-primary"><span class="font-italic">Category </span>{{ $post->category->cat_name }}</h3>
        <div class="form-group">
            <strong>Tag</strong>
            <br>
            @foreach ($post->tags as $tag)
                <span class="badge bg-primary text-white">{{ $tag->tag_name }}</span>
            @endforeach
        </div>

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
