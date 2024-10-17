<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data_buku = Buku::all() -> sortBy('harga');

        return view('buku.index', compact('data_buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buku = new Buku;
        $buku ->judul = $request ->judul;
        $buku ->penulis = $request ->penulis;
        $buku ->harga = $request ->harga;
        $buku ->tgl_terbit = $request ->tgl_terbit;
        $buku->save();
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::find($id);
        $buku ->judul = $request ->input('judul');
        $buku ->penulis = $request ->input('penulis');
        $buku ->harga = $request ->input('harga');
        $buku ->tgl_terbit = $request ->input('tgl_terbit');
        $buku->save();
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('/buku');
    }
}
