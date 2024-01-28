@extends('home.layouts.main')
@section('container')


  <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Banyak</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cart as $item)
                            
                       
                        <tr>
                            <td class="align-middle"><img src="/img/uploads/produk/{{ $item->gambar }}" alt="" style="width: 50px;"> {{ $item->nama_barang }}</td>
                            <td class="align-middle">{{ number_format($item->harga) }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                   
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                    
                                </div>
                            </td>
                            <td class="align-middle">
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="d-inline" >
                                @csrf
                                @method('delete')
                                {{-- <input type="hidden" value="{{ $item->id }}" name="id"> --}}
                              <button class="btn btn-sm btn-danger"><span data-feather="x-circle" ></button>
                              </form>
                            </td>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                 
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>{{ number_format($total) }}</h5>
                        </div>
                        {{-- <form action="/checkout" method="POST" class="d-inline" >
                            @csrf
                            {{-- <input type="hidden" value="{{ $cart->id }}" name="id">
                            <input type="hidden" value="{{ $cart->harga }}" name="harga">
                            <input type="hidden" value="{{ $cart->nama_barang }}" name="nama_barang">
                            <input type="hidden" value="{{ $total }}" name="total"> 
                          <button class="btn btn-sm btn-danger"><span data-feather="x-circle" ></button>
                          </form> --}}
                          <!-- Button trigger modal -->
                            <!-- Tombol untuk menampilkan modal-->
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Pesan Langsung</button>
 
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Bagian heading modal</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<div id="success"></div>
                        <form action="kirim_barang" method="POST" accept-charset="utf-8" target="_blank">
                            @csrf
                            <div class="form-group">
                            <div class="input Nomer"><label for="Nomer">Nomer HP</label><input placeholder="62812xxxx" name="nomer" type="number" class="form-control" id="nomer" required /></div>
                            </div>
                            <div class="form-group">
                            <div class="input nama"><label for="nama">Nama</label><input placeholder="nama" name="nama" type="text" class="form-control" id="nama" required /></div>
                            </div>
                            <div class="form-group">
                            <div class="input alamat"><label for="alamat">Alamat</label><textarea class="form-control" rows="4" id="alamat" name="alamat" placeholder="alamat"></textarea></div>
                            </div>
                            <div class="form-group">
                            <div class="input barang"><label for="barang">barang pesanan</label>
                                <textarea class="form-control" rows="4" id="barang" name="barang" placeholder="barang">
                                    @php 
                                $test = "";
                                
                                foreach ($cart as $item){
                                    
                                    $test .= $item->nama_barang.", ";
                                    
                                }
                                
                                echo str_replace(" ","",$test);
                                @endphp
                                </textarea>
                                <script>
                                    document.getElementById("barang").value="{{ $test }}";
                                </script>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="submit"><button type="submit" id="btn-wa" class="btn btn-primary btn-user btn-block">Send</button>
                            </div>
                        </form>
                    </div>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
				</div>
			</div>
		</div>
	</div>
   </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->



@endsection