@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit subKategori</h1>
    
  </div>
  <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('subkategori.update', $subkategori->id) }}" method="POST" enctype="multipart/form-data">
                    
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar', $subkategori->gambar) }}">
                        
                            <!-- error message untuk title -->
                            @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">KATEGORI</label>
                            <select class="form-select" name="id_kategori">
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if($item->id==$subkategori->id_kategori) selected @endif>{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                            
                        <div class="form-group">
                            <label class="font-weight-bold">JUDUL subKATEGORI</label>
                            <input type="text" class="form-control @error('nama_subkategori') is-invalid @enderror" name="nama_subkategori" value="{{ old('nama_subkategori', $subkategori->nama_subkategori) }}" placeholder="Masukkan Judul Post"></input>
                        
                            <!-- error message untuk nama_subkategori -->
                            @error('nama_subkategori')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <input class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Konten Post" value="{{ old('deskripsi', $subkategori->deskripsi)}}"></input>
                        
                            <!-- error message untuk deskripsi -->
                            @error('deskripsi')
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
  <form method="post" action="/dashboard/subkategori">
    <div class="mb-3">
      <label for="nama_subkategori" class="form-label">subKategori</label>
      <input type="text" class="form-control" id="nama_subkategori"  name="nama_subkategori" >
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