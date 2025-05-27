@extends('layouts.main')

@section('content')
    <div class="container">
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" value="{{ $post->title }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Content">{{ $post->content }}</textarea>
                @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="Image" value="{{ $post->image }}">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category->id ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{ $tag->id === $postTag->id ? 'selected' : '' }}
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
