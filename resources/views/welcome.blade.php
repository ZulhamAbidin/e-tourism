
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Pariwisata</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="{{ asset('landing/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('assets/images/brand/logo-2.png') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.destinasi.index') }}">Wisata</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.kebudayaan.index') }}">Budaya</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.kuliner.index') }}">Kuliner</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pengunjung.hotel.index') }}">Penginapan</a></li>

                        @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        @endauth
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Selamat Datang</div>
                <div class="masthead-heading text-uppercase">Di E-Pariwisata Kabupaten Soppeng</div>
            </div>
        </header>

        <section class="page-section" id="Menu">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Menu</h2>
                    <h3 class="section-subheading text-muted">Destinasi Wisata, Kuliner, Kebudayaan dan lokasi penginapan.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-3">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-image fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Destinasi Wisata</h4>
                        <p class="text-muted text-justify"> Destinasi wisata merujuk pada tempat-tempat yang dikunjungi oleh orang-orang untuk tujuan rekreasi, liburan, atau pengalaman budaya. Ini bisa mencakup tempat-tempat alam seperti pantai, gunung, dan danau, serta tempat-tempat bersejarah, taman hiburan, museum, dan sebagainya.</p>
                        <a href="{{ route('pengunjung.destinasi.index') }}" class="btn btn-primary"> Lihat semua</a>
                    </div>

                    <div class="col-md-3">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-image fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Destinasi Kuliner</h4>
                        <p class="text-muted text-justify">Kuliner mengacu pada makanan dan minuman yang khas dari suatu daerah atau budaya. Ini meliputi berbagai jenis masakan, hidangan khas, resep tradisional, serta makanan dan minuman unik yang dijual di restoran, kafe, pasar tradisional, atau warung makan.</p>
                        <a href="{{ route('pengunjung.kuliner.index') }}" class="btn btn-primary"> Lihat semua</a>
                    </div>

                    <div class="col-md-3">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Destinasi Budaya</h4>
                        <p class="text-muted text-justify">Kebudayaan mencakup segala aspek dari kehidupan sosial, keagamaan, seni, dan tradisi suatu masyarakat. Ini termasuk seni pertunjukan seperti musik, tarian, teater, dan seni rupa, serta festival, upacara adat, ritual keagamaan, dan praktik budaya lainnya.</p>
                        <a href="{{ route('pengunjung.kebudayaan.index') }}" class="btn btn-primary"> Lihat semua</a>
                    </div>

                    <div class="col-md-3">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Lokasi Penginapan</h4>
                        <p class="text-muted text-justify">Lokasi penginapan adalah tempat-tempat di mana wisatawan dapat tinggal sementara selama perjalanan mereka. Ini bisa berupa hotel, resort, vila, penginapan, hostel, rumah tamu, atau akomodasi lainnya yang menyediakan tempat tidur, fasilitas mandi, dan layanan lainnya untuk wisatawan.</p>
                        <a href="{{ route('pengunjung.hotel.index') }}" class="btn btn-primary"> Lihat semua</a>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; E-Pariwisata</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
 

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset ('landing/js/scripts.js')}}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
