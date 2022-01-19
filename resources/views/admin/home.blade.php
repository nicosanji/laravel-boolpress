@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>

        {{-- pulsanti show e create --}}
        <div class="row justify-content-center mt-5">
            <a href="{{ route('admin.post.index') }}" class="btn btn-primary mr-5">Show All Posts</a>
            <a href="{{ route('admin.post.create') }}" class="btn btn-success">Create New Post</a>
        </div>

    </div>
@endsection
