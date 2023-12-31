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
                        <form action="kirim" method="POST" accept-charset="utf-8">
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
    </div>
    <!-- Contact End -->


  <!-- Footer Start -->
  <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
      <div class="row px-xl-5 pt-5">
          <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
              <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
              <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
              <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
              <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
              <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
          </div>
          <div class="col-lg-8 col-md-12">
              <div class="row">
                  <div class="col-md-4 mb-5">
                      <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                      <div class="d-flex flex-column justify-content-start">
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                          <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                      </div>
                  </div>
                  <div class="col-md-4 mb-5">
                      <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                      <div class="d-flex flex-column justify-content-start">
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                          <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                          <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                      </div>
                  </div>
                  <div class="col-md-4 mb-5">
                      <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                      <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                      <form action="">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="Your Email Address">
                              <div class="input-group-append">
                                  <button class="btn btn-primary">Sign Up</button>
                              </div>
                          </div>
                      </form>
                      <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                      <div class="d-flex">
                          <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                          <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                          <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                          <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
          <div class="col-md-6 px-xl-0">
              <p class="mb-md-0 text-center text-md-left text-secondary">
                  &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
                  by
                  <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
              </p>
          </div>
          <div class="col-md-6 px-xl-0 text-center text-md-right">
              <img class="img-fluid" src="assets/img/payments.png" alt="">
          </div>
      </div>
  </div>
  <!-- Footer End -->


@endsection