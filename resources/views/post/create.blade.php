@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('admin.post.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name='title'>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name='description'>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary mr-3">Create This Post</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

        </form>
    </div>
@endsection
