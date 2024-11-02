@extends('auth.layouts')
@section('content')
<table style="width: 100%;">
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Photo</td>
        <td>Action</td>
    </tr>
    @foreach ($userss as $Suser)
    <tr>
        <td>{{ $Suser->name }}</td>
        <td>{{ $Suser->email }}</td>
        <td>
            @if($Suser->photo)
                <img src="{{ asset('storage/' . $Suser->photo) }}" width="100px">
            @else
                <img src="{{ asset('noimage.jpg') }}" width="100px">
            @endif
        </td>
        <td>
            <button><a href="{{ route('users.edit', $Suser->id)}}">Edit</a></button>
            <form action="{{ route('users.destroy', $Suser->id) }}" method="POST">
                @method('DELETE')
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
