<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <!-- membuat container -->
    <div class="container">
        <!-- membuat row  -->
         <div class="row">
            <!-- membuat kolom -->
            <div class="col">
                <div>
                    <h3 class="text-center my-4">Laravel CRUD | Barang Masuk</h3>

                </div>

                <!-- membuat card  -->
                <div class="card rounded">
                    <div class="card-body">
                        
                        <div class="col">
                            <h4>Jumlah barang</h4>
                            
                        </div>
                        
                        <br/>

                        <form action="{{ route('masuk.store') }}" method="POST">
                            @csrf
                            <br/>

                            <div>
                                <select name="barang_id" class="form-select" aria-label="Default select example">
                                    @foreach($barangList as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <br/>

                            <div class="form-floating">
                                <input type="number" name="qty_masuk" class="form-control @error('jumlah') is-invalid @enderror" id="qty_masuk" placeholder="Jumlah Barang Masuk" value="{{ old('qty_masuk') }}" required min="1">
                                <label for="jumlah">Jumlah Barang Masuk</label>
                            </div>

                            @error('qty_masuk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <br/>

                            <div>
                                <input type="hidden" name="tgl_masuk" value="{{ \Carbon\Carbon::now() }}">
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </div>
                                <div class="col text-end">
                                    <a href="{{ route('masuk.index') }}" class="btn btn-md btn-success mb-3">BACK</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- akhir card  -->
            </div>
            <!-- akhir kolom -->
         </div>
        <!-- akhir row -->


    </div>
    <!-- akhir container -->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>