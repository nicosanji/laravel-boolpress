@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.post.update', $post->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input value='{{ $post['title'] }}' type="text" class="form-control" name='title'>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input value='{{ $post['description'] }}' type="text" class="form-control" name='description'>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success mr-3">Edit & Save</button>
                <button type="reset" class="btn btn-secondary mr-3">Reset</button>
            </div>
        </form>
        <form class="mb-0 mt-3 text-center" action="{{ route('admin.post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Delete This Post">
        </form>
    </div>
@endsection
