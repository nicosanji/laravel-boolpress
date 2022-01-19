@extends('layouts.app')

@section('content')
    <div class="container">

        <ol class="mt-5">
            @foreach ($posts as $post)
                <li class="mb-5">
                    <a href="{{ route('admin.post.show', $post->id) }}">
                        <h3>{{ $post['title'] }}</h3>
                    </a>
            @endforeach
            </li>
        </ol>

    </div>
@endsection
