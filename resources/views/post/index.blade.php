@extends('layouts.app')

@section('content')
    <div class="container">

        <ul class="mt-5">
            @foreach ($posts as $post)
                <li class="mb-5">
                    <a href="{{ route('admin.post.show', $post->id) }}">
                        <h3>{{ $post['title'] }}</h3>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="d-flex justify-content-center my-4">
            {!! $posts->links() !!}
        </div>



    </div>
@endsection
