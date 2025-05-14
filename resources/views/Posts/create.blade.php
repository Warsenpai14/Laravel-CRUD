@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Back to Post List</a>
            </div>
        </div>
    </div>

    <br>

    <!-- Check for success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form for creating a new post -->
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf <!-- CSRF Token for security -->
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            @error('title') <!-- Display validation error -->
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" id="content" rows="5" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ old('author') }}" required>
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" class="form-control" id="category" value="{{ old('category') }}" required>
            @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
@endsection
