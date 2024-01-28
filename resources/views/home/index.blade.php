@extends('home.layouts.main')
@section('container')


  <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
      <div class="row px-xl-5">
          <div class="col-lg-12">
              <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                  <ol class="carousel-indicators">
                      <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                      <li data-target="#header-carousel" data-slide-to="1"></li>
                      <li data-target="#header-carousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                      <div class="carousel-item position-relative active" style="height: 430px;">
                          <img class="position-absolute w-100 h-100" src="/img/mt_1.jpg" style="object-fit: cover;">
                          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                              <div class="p-3" style="max-width: 700px;">
                                  <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Pupuk</h1>
                                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Bahan yang memiliki kandungan satu atau lebih unsur hara yang diberikan pada tanaman atau media tanam untuk mendukung proses pertumbuhannya agar bisa berkembang secara maksimal.</p>
                                  <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" target="_blank" href="/cart">Shop Now</a>
                              </div>
                          </div>
                      </div>
                      <div class="carousel-item position-relative" style="height: 430px;">
                          <img class="position-absolute w-100 h-100" src="/img/mt_2.jpg" style="object-fit: cover;">
                          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                              <div class="p-3" style="max-width: 700px;">
                                  <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Pestisida</h1>
                                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn"></p>
                                  <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" target="_blank" href="/cart">Shop Now</a>
                              </div>
                          </div>
                      </div>
                      <div class="carousel-item position-relative" style="height: 430px;">
                          <img class="position-absolute w-100 h-100" src="/img/mt_3.jpg" style="object-fit: cover;">
                          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                              <div class="p-3" style="max-width: 700px;">
                                  <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Benih</h1>
                                  <p class="mx-md-5 px-5 animate__animated animate__bounceIn"></p>
                                  <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" target="_blank" href="/cart">Shop Now</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Carousel End -->


  <!-- Featured Start -->
  <div class="container-fluid pt-5">
      <div class="row px-xl-5 pb-3">
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
              <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                  <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                  <h5 class="font-weight-semi-bold m-0">Produk Terjamin</h5>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
              <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                  <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                  <h5 class="font-weight-semi-bold m-0">Pengiriman Cepat</h5>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
              <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                  <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                  <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
              <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                  <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                  <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
              </div>
          </div>
      </div>
  </div>
  <!-- Featured End -->


  <!-- Categories Start -->
  <div class="container-fluid pt-5">
      <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Kategori</span></h2>
      <div class="row px-xl-5 pb-3">
        @foreach ($kategori as $item)
            
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="/produk/{{ $item->id }}">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <img class="img-fluid" src="img/uploads/kategori/{{ $item->gambar }}" alt="">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6>{{ $item ->nama_kategori }}</h6>
                        <small class="text-body">100 Products</small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
          
      </div>
  </div>
  <!-- Categories End -->


  <!-- Products Start -->
  <div class="container-fluid pt-5 pb-3">
      <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"> Produk Rekomendasi</span></h2>
      <div class="row px-xl-5">
        @foreach ($produk as $item)
            
        
          <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
              <div class="product-item bg-light mb-4">
                  <div class="product-img position-relative overflow-hidden">
                      <img class="img-fluid w-100" src="img/uploads/produk/{{ $item->gambar }}" alt="">
                      <div class="product-action">
                          <a class="btn btn-outline-dark btn-square" href="/detail/{{ $item->id }}"><i class="fa fa-search"></i></a>
                      </div>
                  </div>
                  <div class="text-center py-4">
                      <a class="h3 text-decoration-none text-truncate" href="/detail/{{ $item->id }}">{{ $item->nama_barang }}</a>
                      <p> Ukuran :  {{ $item->ukuran }}</p>
                      <div class="d-flex align-items-center justify-content-center mt-2">
                          <h5>{{ number_format($item->harga) }}</h5>
                      </div>
                      <div class="d-flex align-items-center justify-content-center mb-1">
                          <small class="fa fa-star text-primary mr-1"></small>
                          <small class="fa fa-star text-primary mr-1"></small>
                          <small class="fa fa-star text-primary mr-1"></small>
                          <small class="fa fa-star text-primary mr-1"></small>
                          <small class="fa fa-star text-primary mr-1"></small>
                          <small>(99)</small>
                      </div>
                      <div class="d-flex align-items-center justify-content-center mb-1">
                        <form  action="{{ route('cart.store') }}" method="POST" target="_blank">
                            @csrf
                            <input type="hidden" value="{{ $item->nama_barang }}" name="nama_barang">
                            <input type="hidden" value="{{ $item->harga }}" name="harga">
                            <input type="submit" class="btn btn-outline-dark btn-square "  value="Beli">
                            </form>
                            </div>
                    </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>
  <!-- Products End -->







  <!-- Vendor Start -->
  {{-- <div class="container-fluid py-5">
      <div class="row px-xl-5">
          <div class="col">
              <div class="owl-carousel vendor-carousel">
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-1.jpg" alt="">
                  </div>
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-2.jpg" alt="">
                  </div>
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-3.jpg" alt="">
                  </div>
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-4.jpg" alt="">
                  </div>
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-5.jpg" alt="">
                  </div>
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-6.jpg" alt="">
                  </div>
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-7.jpg" alt="">
                  </div>
                  <div class="bg-light p-4">
                      <img src="assets/img/vendor-8.jpg" alt="">
                  </div>
              </div>
          </div>
      </div>
  </div> --}}
  <!-- Vendor End -->






@endsection