<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style>
            .button_container{
                display: flex;
                gap: 10px;
                width: 100%;
                justify-content: center;
                background-color: aquamarine;
            }
        </style>
    </head>

    <body>
        <table class="table table-stripped" style="border: 2pt solid">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data_buku as $buku)
                <tr>
                    <td>{{ $buku ->id }}</td>
                    <td>{{ $buku ->judul }}</td>
                    <td>{{ $buku ->penulis }}</td>
                    <td>{{ "Rp. ".number_format($buku -> harga, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                    <td>
                        <div class="button_container">
                        <form action="{{ route('buku.destroy', $buku->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit">Delete?</button>
                        </form>
                            <button><a href="{{ route('buku.edit', $buku->id) }}">Edit?</a></button>
                        </div>
                    </td>                        
                </tr>
                @endforeach
            </tbody>
        </table>
        <p style="text-align:right"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>
    </body>
</html>
