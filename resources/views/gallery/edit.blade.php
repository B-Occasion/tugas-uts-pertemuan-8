@extends('auth.layouts')

@section('content')
    <div class="container">
        <h4>Edit Post</h4>
        <form action="{{ route('gallery.update', $post->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1rem; max-width: ;">
            @csrf
            @method('PUT')

            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}" style="padding: 0.5rem;">

            <label for="description">Description:</label>
            <textarea name="description" id="description" style="padding: 0.5rem;">{{ $post->description }}</textarea>

            <label for="picture">Picture:</label>
            <input type="file" name="picture" id="picture" style="padding: 0.5rem;">
            <!-- Display current image if available -->
            @if($post->picture != 'noimage.png')
                <img src="{{ asset('storage/posts_image/' . $post->picture) }}" alt="Current Image" width="100" style="margin-top: 1rem;">
            @endif

            <button type="submit" style="padding: 0.5rem; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Update</button>
        </form>
    </div>
@endsection
