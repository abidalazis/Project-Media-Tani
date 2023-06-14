@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Kategori, {{ auth()->user()->name }}</h1>
  
</div>


<h2>Section title</h2>
<div class="table-responsive">
  <a href="/dashboard/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Gambar</th>
        <th scope="col">Perintah</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kategori as $item)
          
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->nama_kategori }}</td>
        <td>{{ $item->deskripsi }}</td>
        <td class="align-middle"><img src="{{URL::to('/')}}/img/uploads/kategori/{{$item->gambar}}" width="60px"></td>
        {{-- <td class="align-middle"><img src={{URL::to('/img/uploads/kategori').$item->gambar}} width="60px"></td> --}}
        <td>
          <form action="/dashboard/kategori/{{ $item->id }}/edit" class="d-inline" >
          <button class="badge bg-warning border-0"><span data-feather="edit" ></button>
          </form>
          
          <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline" >
            @csrf
            @method('delete')
          <button class="badge bg-danger border-0"><span data-feather="x-circle" ></button>
          </form>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
@endsection