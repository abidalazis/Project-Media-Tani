@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit barang</h1>
    
  </div>
  <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">KATEGORI</label>
                            <select class="form-select" name="id_kategori">
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if($item->id==$produk->id_kategori) selected @endif>{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">SUBKATEGORI</label>
                            <select class="form-select" name="id_subkategori">
                            @foreach ($subcategories as $item)
                            <option value="{{ $item->id }}" @if($item->id==$produk->id_subkategori) selected @endif>{{ $item->nama_subkategori }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar', $produk->gambar) }}">
                        
                            <!-- error message untuk title -->
                            @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang', $produk->nama_barang) }}" placeholder="Masukkan Judul Post"></input>
                        
                            <!-- error message untuk nama_barang -->
                            @error('nama_barang')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <input class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Konten Post" value="{{ old('deskripsi', $produk->deskripsi)}}"></input>
                        
                            <!-- error message untuk deskripsi -->
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Harga</label>
                            <input class="form-control @error('harga') is-invalid @enderror" name="harga" rows="5" placeholder="Masukkan Konten Post" value="{{ old('harga', $produk->harga)}}"></input>
                        
                            <!-- error message untuk harga -->
                            @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Diskon</label>
                            <input class="form-control @error('diskon') is-invalid @enderror" name="diskon" rows="5" placeholder="Masukkan Konten Post" value="{{ old('diskon', $produk->diskon)}}"></input>
                        
                            <!-- error message untuk diskon -->
                            @error('diskon')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Bahan</label>
                            <input class="form-control @error('bahan') is-invalid @enderror" name="bahan" rows="5" placeholder="Masukkan Konten Post" value="{{ old('bahan', $produk->bahan)}}"></input>
                        
                            <!-- error message untuk bahan -->
                            @error('bahan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Ukuran</label>
                            <input class="form-control @error('ukuran') is-invalid @enderror" name="ukuran" rows="5" placeholder="Masukkan Konten Post" value="{{ old('ukuran', $produk->ukuran)}}"></input>
                        
                            <!-- error message untuk ukuran -->
                            @error('ukuran')
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