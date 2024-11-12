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
                            <a href="{{ route('masuk.create') }}" class="btn btn-md btn-primary mb-3">ENTRY</a>
                        </div>
                        <div class="col text-end">
                            <form action="#" method="GET">
                                
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
                                <th>TANGGAL MASUK</th>
                                <th>JUMLAH MASUK</th>
                                <th>MERK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = ($rsetMasuk->currentPage() - 1) * $rsetMasuk->perPage() + 1;
                            @endphp

                            @forelse($rsetMasuk as $row)
                                <tr>
                                    <td><a href="{{ route('masuk.show', $row->id) }}" class="link">{{ $no++ }}</td>
                                    <td><a href="{{ route('masuk.show', $row->id) }}" class="link">{{ \Carbon\Carbon::parse($row->tgl_keluar)->format('l, d F Y') }}</a></td>
                                    <td><a href="{{ route('masuk.show', $row->id) }}" class="link">{{ $row->qty_masuk }}</td>
                                    <td><a href="{{ route('masuk.show', $row->id) }}" class="link">{{ $row->barang->merk ?? 'N/A' }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No data available</td> <!-- Add a message if no data -->
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
