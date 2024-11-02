@extends('layouts.master')

@section('content')
    <div class="container">
        <h4>Edit User</h4>
        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <div>
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" width="100px" alt="Current Photo">
                @endif
            </div>

            <div>
                <button type="submit">Update</button>
                <a href="{{ route('users.index') }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
