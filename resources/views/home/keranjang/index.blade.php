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
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($cart as $item)
                            
                       
                        <tr>
                            <td class="align-middle"><img src="/img/uploads/produk/{{ $item->gambar }}" alt="" style="width: 50px;"> {{ $item->nama_barang }}</td>
                            <td class="align-middle">{{ number_format($item->harga) }}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">{{ number_format($item->total) }}</td>
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
                        <form action="/checkout" method="POST" class="d-inline" >
                            @csrf
                            {{-- <input type="hidden" value="{{ $cart->id }}" name="id">
                            <input type="hidden" value="{{ $cart->harga }}" name="harga">
                            <input type="hidden" value="{{ $cart->nama_barang }}" name="nama_barang">
                            <input type="hidden" value="{{ $total }}" name="total"> --}}
                          <button class="btn btn-sm btn-danger"><span data-feather="x-circle" ></button>
                          </form>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->



@endsection