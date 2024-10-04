<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .link {
            color: black;
            text-decoration: none;
        }
    </style>
  </head>
  <body>
    <div class="container">
        @extends('layout.adm_tmplet')

        @section('content')
        <div class="row">
            <div class="col text-center">
                <h3>Laravel CRUD | Barang</h3>
            </div>
        </div>
        <div class="row">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('barang.create') }}" class="btn btn-md btn-primary mb-3">ENTRY</a>
                        </div>
                        <div class="col text-end">
                            <form action="/barang" method="GET">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" placeholder="Cari barang" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>MERK</th>
                                <th>SERI</th>
                                <th>STOK</th>
                                <th>KATEGORI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = ($rsetBarang->currentPage() - 1) * $rsetBarang->perPage() + 1;
                            @endphp

                            @forelse($rsetBarang as $row)
                                <tr>
                                    <td><a href="{{ route('barang.show', $row->id) }}" class="link">{{ $no++ }}</a></td>
                                    <td><a href="{{ route('barang.show', $row->id) }}" class="link">{{ $row->merk }}</a></td>
                                    <td><a href="{{ route('barang.show', $row->id) }}" class="link">{{ $row->seri }}</a></td>
                                    <td><a href="{{ route('barang.show', $row->id) }}" class="link">{{ $row->stok }}</a></td>
                                    <td><a href="{{ route('barang.show', $row->id) }}" class="link">{{ $row->kategori->deskripsi ?? 'N/A' }}</a></td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('barang.destroy', $row->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('barang.edit', $row->id) }}" class="btn btn-sm btn-primary" role="button">EDIT</a>
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data Barang belum Tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $rsetBarang->links() }}
                </div>
            </div>
        </div>
        @endsection
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>