@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name='title'>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Img Cover</label>
                <input name="cover_img" class="form-control" type="file">
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
            <div class="mb-3">
                <div class="form-group">
                    @foreach ($tags as $tag)
                        <label>
                            {{ $tag->tag_name }}
                            <input name="tags[]" type="checkbox" value="{{ $tag->id }}">
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary mr-3">Create This Post</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>

        </form>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
