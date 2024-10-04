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
                    <h3 class="text-center my-4">Laravel CRUD | Kategori</h3>

                </div>

                <!-- membuat card  -->
                <div class="card rounded">
                    <div class="card-body">
                        
                        <div class="col">
                            <h4>Entry Kategori</h4>
                            
                        </div>
                        
                        <br/>

                        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="form-floating">
                                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="floatingPassword" placeholder="Deskripsi" value="{{old('deskripsi')}}">
                                <label for="floatingPassword">Deskripsi</label>
                            </div>

                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <br/>

                            <div>
                                <select name="kategori" class="form-select" aria-label="Default select example">
                                    @foreach($listkategori as $key=>$val)
                                        <option value={{$key}}>{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('kategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror

                            <br/>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                    <button type="reset" class="btn btn-md btn-warning">RESET</button>
                                </div>
                                <div class="col text-end">
                                    <a href="{{ route('kategori.index') }}" class="btn btn-md btn-success mb-3">BACK</a>
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