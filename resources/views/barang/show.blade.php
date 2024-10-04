<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background: #aceafc">
    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                    <h3 class="text-center my-4">Laravel CRUD | Detail Barang</h3>
                </div>

                <div class="card rounded">
                    <div class="card-body">
                        <div class="col6">
                            <h3>Detail Barang</h3>
                        </div>
                        
                        <br/>

                        <div class="row">
                            <div class="col">
                                <table>
                                    <tr>
                                        <td>ID</td>
                                        <td>&nbsp;</td>
                                        <td>{{ $rsetBarang->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Merk</td>
                                        <td>&nbsp;</td>
                                        <td>{{ $rsetBarang->merk }}</td>
                                    </tr>
                                    <tr>
                                        <td>Seri</td>
                                        <td>&nbsp;</td>
                                        <td>{{ $rsetBarang->seri }}</td>
                                    </tr>
                                    <tr>
                                        <td>Spesifikasi</td>
                                        <td>&nbsp;</td>
                                        <td>{{ $rsetBarang->spesifikasi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>&nbsp;</td>
                                        <td>{{ $rsetBarang->stok }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>&nbsp;</td>
                                        <td>{{ $rsetBarang->kategori->deskripsi ?? 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                            <a href="{{ route('barang.index') }}" class="btn btn-md btn-dark mb-3">KEMBALI</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>