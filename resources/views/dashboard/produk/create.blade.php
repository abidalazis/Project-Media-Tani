@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Produk</h1>
    
  </div>
  <div class="container mt-5 mb-5">
      <div class="row">
          <div class="col-md-12">
              <div class="card border-0 shadow rounded">
                  <div class="card-body">
                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        
                        <div class="form-group">
                            <label class="font-weight-bold">KATEGORI</label>
                            <select class="form-select" name="id_kategori">
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">SUBKATEGORI</label>
                            <select class="form-select" name="id_subkategori">
                            @foreach ($subcategories as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_subkategori }}</option>
                            @endforeach
                        </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan Judul Post">
                        
                            <!-- error message untuk nama_barang -->
                            @error('nama_barang')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Konten Post" value="{{ old('deskripsi') }}">
                        
                            <!-- error message untuk deskripsi -->
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Harga</label>
                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Judul Post">
                        
                            <!-- error message untuk harga -->
                            @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">diskon</label>
                            <input type="text" class="form-control @error('diskon') is-invalid @enderror" name="diskon" value="{{ old('diskon') }}" placeholder="Masukkan Judul Post">
                            
                            <!-- error message untuk diskon -->
                            @error('diskon')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">bahan</label>
                            <input type="text" class="form-control @error('bahan') is-invalid @enderror" name="bahan" value="{{ old('bahan') }}" placeholder="Masukkan Judul Post">
                        
                            <!-- error message untuk bahan -->
                            @error('bahan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">ukuran</label>
                            <input type="text" class="form-control @error('ukuran') is-invalid @enderror" name="ukuran" value="{{ old('ukuran') }}" placeholder="Masukkan Judul Post">
                        
                            <!-- error message untuk ukuran -->
                            @error('ukuran')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar">
                        
                            <!-- error message untuk title -->
                            @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="col-lg-8">
  <form method="post" action="/dashboard/barang">
    <div class="mb-3">
      <label for="nama_barang" class="form-label">barang</label>
      <input type="text" class="form-control" id="nama_barang"  name="nama_barang" >
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <input type="text" class="form-control" id="deskripsi">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Gambar</label>
      <input type="password" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" class="btn btn-primary">Tambah</button>
  </form>
</div> --}}
@endsection