@extends('layouts.master')

@section('content')
    <div class="container">
        <h4>Edit Buku</h4>         
        <form method="post" action="{{ route('buku.update', $buku->id) }}">
            @csrf
            @method('PUT')
            <div>Judul <input type="text" name="judul" value="{{ $buku->judul }}"></div>
            <div>Penulis <input type="text" name="penulis" value="{{ $buku->penulis }}"></div>
            <div>Harga <input type="number" name="harga" value="{{ $buku->harga }}"></div>
            <div>Tgl. Terbit <input type="date" name="tgl_terbit" value="{{ $buku->tgl_terbit }}"></div>
            <div><button type="submit">Submit</button>
            <a href="/buku">Batal</a></div>
        </form>
    </div>
@endsection
