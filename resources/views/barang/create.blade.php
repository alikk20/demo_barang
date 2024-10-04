<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa;
      }
      .container {
        max-width: 800px;
        margin-top: 50px;
      }
      .card {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      }
      .card-body {
        padding: 2rem;
      }
      h3 {
        color: #007bff;
      }
      h4 {
        color: #6c757d;
        margin-bottom: 1.5rem;
      }
      .form-floating {
        margin-bottom: 1rem;
      }
      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
      }
      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
      }
      .btn-warning {
        color: #212529;
      }
      .btn-success {
        background-color: #28a745;
        border-color: #28a745;
      }
      .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <div>
            <h3 class="text-center my-4">Laravel CRUD | Tambah Barang</h3>
          </div>

          <div class="card rounded">
            <div class="card-body">
              <div class="col">
                <h4>Tambah Barang Baru</h4>
              </div>
              
              <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                  <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" id="floatingMerk" placeholder="Merk Barang" value="{{ old('merk') }}">
                  <label for="floatingMerk">Merk Barang</label>
                </div>

                @error('merk')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror

                <div class="form-floating mb-3">
                  <input type="text" name="seri" class="form-control @error('seri') is-invalid @enderror" id="floatingSeri" placeholder="Seri Barang" value="{{ old('seri') }}">
                  <label for="floatingSeri">Seri Barang</label>
                </div>

                @error('seri')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror

                <div class="form-floating mb-3">
                  <textarea name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" id="floatingSpesifikasi" placeholder="Spesifikasi" style="height: 100px;">{{ old('spesifikasi') }}</textarea>
                  <label for="floatingSpesifikasi">Spesifikasi</label>
                </div>

                @error('spesifikasi')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror

                <div class="form-floating mb-3">
                  <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="floatingStok" placeholder="Stok" value="{{ old('stok') }}">
                  <label for="floatingStok">Stok</label>
                </div>

                @error('stok')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror

                <div class="mb-3">
                  <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" aria-label="Pilih Kategori">
                    <option selected disabled>Pilih Kategori</option>
                    @foreach($kategoriList as $key => $val)
                      <option value="{{ $key }}" {{ old('kategori_id') == $key ? 'selected' : '' }}>{{ $val }}</option>
                    @endforeach
                  </select>
                </div>

                @error('kategori_id')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror

                <div class="row">
                  <div class="col">
                    <button type="submit" class="btn btn-md btn-primary me-3">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                  </div>
                  <div class="col text-end">
                    <a href="{{ route('barang.index') }}" class="btn btn-md btn-success mb-3">KEMBALI</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>