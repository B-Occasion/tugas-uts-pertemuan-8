@extends('layouts.master')

@section('content')
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="post" action="{{ route('buku.store')}}">
            @csrf 
            <div>Judul <input type="text" name="judul"></div>
            <div>Penulis <input type="text" name="penulis"></div>
            <div>Harga <input type="number" name="harga"></div>
            <div>Tgl. Terbit <input type="date" name="tgl_terbit"></div>
            <div><button type="submit">Submit</button>
            <a href="/buku">Batal</a></div>
        </form>
    </div>
@endsection
