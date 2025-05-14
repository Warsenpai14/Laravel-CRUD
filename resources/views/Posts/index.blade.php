@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2>LARAVEL</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}">Create Post</a>
            </div>
        </div>
    </div>

    <br>

    @if ($posts->isNotEmpty())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->category }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
@endif
@endsection
