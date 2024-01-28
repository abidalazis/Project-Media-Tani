@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Halloo, {{ auth()->user()->name }}</h1>
  
</div>


<h2>Halaman Dashboard Toko Media Tani</h2>

@endsection