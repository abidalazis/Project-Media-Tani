<!-- Topbar Start -->
<div class="container-fluid">
        
  <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
      <div class="col-lg-4">
          <a href="" class="text-decoration-none">
              <span class="h1 text-uppercase text-primary bg-dark px-2">Media</span>
              <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Tani</span>
          </a>
      </div>
      <div class="col-lg-4 col-6 text-left">
          <form action="">
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Klik untuk mencari">
                  <div class="input-group-append">
                      <span class="input-group-text bg-transparent text-primary">
                          <i class="fa fa-search"></i>
                      </span>
                  </div>
              </div>
          </form>
      </div>
      <div class="col-lg-4 col-6 text-right">
          <p class="m-0">Customer Service</p>
          <h5 class="m-0">0813-3063-5775</h5>
      </div>
  </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<header>
<nav>
<div class="container-fluid bg-dark mb-30">
  <div class="row px-xl-5">
      <div class="col-lg-3 d-none d-lg-block">
          <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
              <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Kategori</h6>
              <i class="fa fa-angle-down text-dark"></i>
          </a>
          <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
              <div class="navbar-nav w-100">

                @php
                      $kategori = App\Models\Kategori::all();
                @endphp

                @foreach ($kategori as $item)
                  <div class="nav-item dropdown dropright">
                        
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $item->nama_kategori }}<i class="fa fa-angle-right float-right mt-1"></i></a>
                    <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                        @php
                             $subkategori = App\Models\Subkategori::where('id_kategori', $item->id)->get();
                        @endphp
                        @foreach ($subkategori as $item)
                        <a href="/produk/{{ $item->id }}" class="dropdown-item">{{ $item->nama_subkategori }}</a>
                        @endforeach
                    </div>
                </div>
                {{-- <a href="" class="nav-item nav-link">Pupuk</a>
                <a href="" class="nav-item nav-link">Benih</a>
                <a href="" class="nav-item nav-link">Peralatan</a> --}}
                @endforeach
            </div>
          </nav>
      </div>
      <div class="col-lg-9">
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
              <a href="" class="text-decoration-none d-block d-lg-none">
                  <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                  <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
              </a>
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                  <div class="navbar-nav mr-auto py-0">
                      <a href="/" class="nav-item nav-link active">Home</a>
                      <a href="/tentang" class="nav-item nav-link">Tentang</a>
                      <a href="/pesanan" class="nav-item nav-link">Cara Pemesanan</a>
                      <div class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pembayaran <i class="fa fa-angle-down mt-1"></i></a>
                          <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                              <a href="cart.html" class="dropdown-item">Konfirmasi</a>
                              <a href="checkout.html" class="dropdown-item">Pengiriman</a>
                          </div>
                      </div>
                      <a href="/kontak" class="nav-item nav-link">Hubungi Kami</a>
                  </div>
                  <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                      <a href="" class="btn px-0">
                          <i class="fas fa-heart text-primary"></i>
                          <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                      </a>
                      <a href="/cart" class="btn px-0 ml-3">
                          <i class="fas fa-shopping-cart text-primary"></i>
                          <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                      </a>
                      <a href="/login" class="btn px-0 ml-3" target="_blank">
                        <span class="badge text-secondary " style="padding-bottom: 2px;">Sign In</span>
                        <i class="fas fa-sign-in-alt text-primary"></i>
                      </a>
                  </div>
              </div>
          </nav>
      </div>
  </div>
</div>
</nav>
</header>