@extends('home.layouts.main')
@section('container')


  <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                        <form action="kirim" method="POST" accept-charset="utf-8" target="_blank">
                            @csrf
                            <div class="form-group">
                            <div class="input Nomer"><label for="Nomer">Your Number</label><input placeholder="62812xxxx" name="nomer" type="number" class="form-control" id="nomer" required /></div>
                            </div>
                            <div class="form-group">
                            <div class="input nama"><label for="nama">Your Name</label><input placeholder="nama" name="nama" type="text" class="form-control" id="nama" required /></div>
                            </div>
                            <div class="form-group">
                            <div class="input pesan"><label for="pesan">Message</label><textarea class="form-control" rows="4" id="pesan" name="pesan" placeholder="pesan"></textarea></div>
                            </div>
                            <div class="form-group">
                            <div class="submit"><button type="submit" id="btn-wa" class="btn btn-primary btn-user btn-block">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4932977407857!2d111.50957807497062!3d-7.947865992076491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e790b04bc7ebf63%3A0x450d456c9d6bf19d!2sMedia%20Tani%20Toko%20Sarana%20Pertanian!5e0!3m2!1sen!2sbd!4v1686815310560!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Jalan Mlarak Sambit, RT/RW 02/01, Ngrayut, Coper, Kec. Jetis, Kabupaten Ponorogo, Jawa Timur 63473</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>mediatani@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>0813-3063-5775</p>
                </div>
            </div>
        </div>
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Form Pesanan Barang</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-12 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                        <form action="kirim_barang" method="POST" accept-charset="utf-8" target="_blank">
                            @csrf
                            <div class="form-group">
                            <div class="input Nomer"><label for="Nomer">Your Number</label><input placeholder="62812xxxx" name="nomer" type="number" class="form-control" id="nomer" required /></div>
                            </div>
                            <div class="form-group">
                            <div class="input nama"><label for="nama">Your Name</label><input placeholder="nama" name="nama" type="text" class="form-control" id="nama" required /></div>
                            </div>
                            <div class="form-group">
                            <div class="input alamat"><label for="alamat">Alamat</label><textarea class="form-control" rows="4" id="alamat" name="alamat" placeholder="alamat"></textarea></div>
                            </div>
                            <div class="form-group">
                                <div class="input barang"><label for="barang">barang pesanan</label>
                                    @php 
                                $test = "";
                                
                                foreach ($cart as $item){
                                    
                                    $test .= $item->nama_barang.", ";
                                    
                                }
                                
                                echo str_replace(" ","",$test);
                                @endphp
                                <textarea class="form-control" rows="4" id="barang" name="barang" placeholder="barang">
                                </textarea>
                                <script>
                                    document.getElementById("barang").value="{{ $test }}";
                                </script>
                            </div>
                            <div class="form-group">
                            <div class="submit"><button type="submit" id="btn-wa" class="btn btn-primary btn-user btn-block">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->



@endsection