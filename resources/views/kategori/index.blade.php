<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
        <style>
            .link {
                color: black; /* Ganti warna teks menjadi hitam */
                text-decoration: none; /* Menghilangkan garis bawah */
            }
        </style>
  <body>
    <div class="container">
        @extends('layout.adm_tmplet')

        @section('content')
        <div class="row">
            <div class="col text-center">
                <h3>Laravel CRUD | Kategori</h3>
            </div>
        </div>
        <div class="row">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('kategori.create') }}" class="btn btn-md btn-primary mb-3">ENTRY</a>
                            </div>
                    <div class="col text-end">
                                <form action="/kategori" method="GET">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" class="form-control" placeholder="Cari kategori" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                    </div>
                                </form>
                            </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>DESKRIPSI</th>
                                <th>KATEGORI</th>
                                <th>KETERANGAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = ($rsetKategori->currentPage() - 1) * $rsetKategori->perPage() + 1;
                            @endphp

                            @forelse($rsetKategori as $row)
                                <tr>
                                    <td><a href="{{ route('kategori.show', $row->id) }}" class="link">{{ $no++ }}</td>
                                    <td><a href="{{ route('kategori.show', $row->id) }}" class="link">{{ $row->deskripsi }}</a></td>
                                    <td><a href="{{ route('kategori.show', $row->id) }}" class="link">{{ $row->kategori }}</td>
                                    <td><a href="{{ route('kategori.show', $row->id) }}" class="link">{{ $row->ket }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('kategori.destroy', $row->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-sm btn-primary" role="button">EDIT</a>
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No data available</td> <!-- Add a message if no data -->
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                    {{ $rsetKategori->links() }}
                </div>
            </div>
        </div>
        <div class="row">
        
        </div>
    @endsection
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>